<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceOrderRequest;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\JenisPelayanan;
use App\Models\JenisGantibaru;
use App\Models\Pegawai;
use App\Models\Satuan;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderGantibaru;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class ReplacementController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:gantibaru-list', only: ['index', 'fetch']),
            new Middleware('permission:gantibaru-create', only: ['create', 'store']),
            new Middleware('permission:gantibaru-edit', only: ['edit', 'update']),
            new Middleware('permission:gantibaru-show', only: ['show']),
            new Middleware('permission:gantibaru-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('replacement_pp')) {
            $request->session()->put('replacement_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('replacement_isactive')) {
            $request->session()->put('replacement_isactive', 'all');
        }
        if (!$request->session()->exists('replacement_tanggal')) {
            $request->session()->put('replacement_tanggal', '_');
        }
        if (!$request->session()->exists('replacement_customer_id')) {
            $request->session()->put('replacement_customer_id', 'all');
        }
        if (!$request->session()->exists('replacement_petugas_replacement_id')) {
            $request->session()->put('replacement_petugas_replacement_id', 'all');
        }

        $search_arr = ['replacement_isactive', 'replacement_customer_id', 'replacement_petugas_replacement_id', 'replacement_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1)->where('isgantibaru', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('replacement_'));

            if ($search_arr[$i] == 'replacement_isactive' || $search_arr[$i] == 'replacement_customer_id' || $search_arr[$i] == 'replacement_petugas_replacement_id') {
                if (session($search_arr[$i]) != 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } else if ($field == 'tanggal') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                } else {
                    $like = '%' . session($search_arr[$i]) . '%';
                    $datas = $datas->where($field, 'LIKE', $like);
                }
            }
        }

        $datas = $datas->where('branch_id', auth()->user()->profile->branch_id);
        $datas = $datas->latest()->paginate(session('replacement_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('service-gantibaru.index', compact(['datas', 'customers', 'petugass']))->with('i', (request()->input('page', 1) - 1) * session('replacement_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('replacement_pp', $request->pp);
        $request->session()->put('replacement_isactive', $request->isactive);
        $request->session()->put('replacement_customer_id', $request->customer);
        $request->session()->put('replacement_petugas_replacement_id', $request->petugas);
        $request->session()->put('replacement_tanggal', $request->tanggal);

        $search_arr = ['replacement_isactive', 'replacement_customer_id', 'replacement_petugas_replacement_id', 'replacement_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1)->where('isgantibaru', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('replacement_'));

            if ($search_arr[$i] == 'replacement_isactive' || $search_arr[$i] == 'replacement_customer_id' || $search_arr[$i] == 'replacement_petugas_replacement_id') {
                if (session($search_arr[$i]) != 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } else if ($field == 'tanggal') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                } else {
                    $like = '%' . session($search_arr[$i]) . '%';
                    $datas = $datas->where($field, 'LIKE', $like);
                }
            }
        }

        $datas = $datas->where('branch_id', auth()->user()->profile->branch_id);
        $datas = $datas->latest()->paginate(session('replacement_pp'));

        $datas->withPath('/service/replacement'); // pagination url to

        $view = view('service-gantibaru.partials.table', compact(['datas', 'customers', 'petugass']))->with('i', (request()->input('page', 1) - 1) * session('replacement_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create(): View
    {
        // Gate::authorize('perbaikan-create');
    }

    public function store(ServiceOrderRequest $request)
    {
        //
    }

    public function show(Request $request): View
    {
        //
    }

    public function edit(Request $request): View
    {
        $branch_id = auth()->user()->profile->branch_id;
        $jenis_pelayanan_id = JenisPelayanan::where('nama', 'Inspeksi')->value('id');
        $jenis_gantibarus = JenisGantibaru::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $datas = ServiceOrder::find(Crypt::decrypt($request->replacement));
        $details = ServiceOrderGantibaru::where('service_order_id', Crypt::decrypt($request->replacement))->get();
        $barangs = Barang::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $satuans = Satuan::where('isactive', 1)->orderBy('singkatan')->pluck('singkatan', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');


        $total_price = ServiceOrderGantibaru::where('service_order_id', Crypt::decrypt($request->replacement))->select(DB::raw('SUM((harga_satuan * (1 + (pajak/100))) * kuantiti) as total_price'))->value('total_price');
        $totals = [
            'sub_price' => $total_price * 1,
            'total_price' => $datas->total_harga,
        ];

        return view('service-gantibaru.edit', compact(['datas', 'details', 'customers', 'branch_id', 'jenis_gantibarus', 'barangs', 'satuans', 'petugass', 'totals', 'jenis_pelayanan_id']));
    }

    public function update(ServiceOrderRequest $request): RedirectResponse
    {
        $order = ServiceOrder::find(Crypt::decrypt($request->replacement));

        if ($request->validated()) {
            $order->update([
                'keterangan' => $request->keterangan,
                'petugas_replacement_id' => $request->petugas_replacement_id,
                'isperawatan' => ($request->isperawatan == 'on' ? 1 : $order->isperawatan),
                'isperawatan_by' => $request->isperawatan == 'on' ? auth()->user()->email : $order->isperawatan_by,
                'isperawatan_at' => $request->isperawatan == 'on' ? date('Y-m-d H:i:s') : $order->isperawatan_at,
                'isperbaikan' => ($request->isperbaikan == 'on' ? 1 : $order->isperbaikan),
                'isperbaikan_by' => $request->isperbaikan == 'on' ? auth()->user()->email : $order->isperbaikan_by,
                'isperbaikan_at' => $request->isperbaikan == 'on' ? date('Y-m-d H:i:s') : $order->isperbaikan_at,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'updated_by' => auth()->user()->email,
            ]);

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $request->no_order);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error occured while updating!');
        }
    }

    public function delete(Request $request): View
    {
        // 
    }

    public function destroy(Request $request): RedirectResponse
    {
        // 
    }

    public function storeDetail(Request $request)
    {
        $order_id = Crypt::decrypt($request->detail);
        $pajak = $request->pajak ? $request->pajak : 0;

        $jenis_gantibaru = JenisGantibaru::find($request->jenis_gantibaru_id);

        $detail = ServiceOrderGantibaru::create([
            'service_order_id' => $order_id,
            'branch_id' => $request->branch_id,
            'barang_id' => $request->barang_id,
            'satuan_id' => $request->satuan_id,
            'jenis_gantibaru_id' => $request->jenis_gantibaru_id,
            'nama_gantibaru' => $jenis_gantibaru ? $jenis_gantibaru->nama : NULL,
            'kuantiti' => $request->kuantiti,
            'stock' => $request->stock,
            'pajak' => $pajak,
            'harga_satuan' => $request->harga_satuan,
            'keterangan' => $request->keterangan,
            'created_by' => auth()->user()->email,
            'updated_by' => auth()->user()->email,
            'approved' => (config('custom.sale_approval') == false) ? 1 : 0,
            'approved_by' => (config('custom.sale_approval') == false) ? 'system' : NULL,
            'approved_at' => (config('custom.sale_approval') == false) ? date('Y-m-d H:i:s') : NULL,
        ]);

        $selaluUpdateHargaJual = config('custom.selaluUpdateHargaJual');

        if ($selaluUpdateHargaJual) {
            $barang = Barang::find($request->barang_id);

            if ($barang) {
                $barang->update([
                    'satuan_jual_id' => $request->satuan_id,
                    'harga_satuan_jual' => $request->harga_satuan,
                    'updated_by' => auth()->user()->email,
                ]);
            }
        }

        $po = ServiceOrder::find($order_id);
        $total_price = ServiceOrderGantibaru::where('service_order_id', $order_id)->select(DB::raw('SUM((harga_satuan * (1 + (pajak/100))) * kuantiti) as total_price'))->value('total_price');
        $totals = [
            'sub_price' => $total_price * 1,
            'total_price' => $po->total_harga,
        ];

        // $po->update([
        //     'total_harga' => $totals['total_price'],
        // ]);

        $details = ServiceOrderGantibaru::where('service_order_id', $order_id)->get();
        $viewMode = false;

        $view = view('service-gantibaru.partials.details', compact(['details', 'viewMode']))->render();

        return response()->json([
            'view' => $view,
            'total_harga_master' => $totals['total_price'],
            'total_harga_detail' => $totals['sub_price'],
        ], 200);
    }

    public function deleteDetail(Request $request): JsonResponse
    {
        $detail = ServiceOrderGantibaru::find($request->detail);
        $order = ServiceOrder::where('id', $detail->service_order_id)->get();

        $order_id = $detail->service_order_id;
        $view = [];

        try {
            $detail->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['QueryException' => $e->getMessage()], 500);
        }

        $po = ServiceOrder::find($order_id);
        $total_price = ServiceOrderGantibaru::where('service_order_id', $order_id)->select(DB::raw('SUM((harga_satuan * (1 + (pajak/100))) * kuantiti) as total_price'))->value('total_price');
        $totals = [
            'sub_price' => $total_price * 1,
            'total_price' => $po->total_harga,
        ];

        // $po->update([
        //     'total_harga' => $totals['total_price'],
        // ]);

        $details = ServiceOrderGantibaru::where('service_order_id', $order_id)->get();
        $viewMode = false;

        if ($details->count() > 0) {
            $view = view('service-gantibaru.partials.details', compact(['details', 'viewMode']))->render();
        }

        if ($view) {
            return response()->json([
                'view' => $view,
                'total_harga_master' => $totals['total_price'],
                'total_harga_detail' => $totals['sub_price'],
            ], 200);
        } else {
            return response()->json([
                'status' => 'Not Found',
                'total_harga_master' => $totals['total_price'],
                'total_harga_detail' => $totals['sub_price'],
            ], 200);
        }
    }
}
