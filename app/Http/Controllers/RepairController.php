<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceOrderRequest;
use App\Models\Barang;
use App\Models\Customer;
use App\Models\JenisPelayanan;
use App\Models\JenisPerbaikan;
use App\Models\Pegawai;
use App\Models\Satuan;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderPerbaikan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class RepairController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:perbaikan-list', only: ['index', 'fetch']),
            new Middleware('permission:perbaikan-create', only: ['create', 'store']),
            new Middleware('permission:perbaikan-edit', only: ['edit', 'update']),
            new Middleware('permission:perbaikan-show', only: ['show']),
            new Middleware('permission:perbaikan-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('repair_pp')) {
            $request->session()->put('repair_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('repair_isactive')) {
            $request->session()->put('repair_isactive', 'all');
        }
        if (!$request->session()->exists('repair_tanggal')) {
            $request->session()->put('repair_tanggal', '_');
        }
        if (!$request->session()->exists('repair_customer_id')) {
            $request->session()->put('repair_customer_id', 'all');
        }
        if (!$request->session()->exists('repair_petugas_repair_id')) {
            $request->session()->put('repair_petugas_repair_id', 'all');
        }

        $search_arr = ['repair_isactive', 'repair_customer_id', 'repair_petugas_repair_id', 'repair_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1)->where('isperbaikan', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('repair_'));

            if ($search_arr[$i] == 'repair_isactive' || $search_arr[$i] == 'repair_customer_id' || $search_arr[$i] == 'repair_petugas_repair_id') {
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
        $datas = $datas->latest()->paginate(session('repair_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('service-perbaikan.index', compact(['datas', 'customers', 'petugass']))->with('i', (request()->input('page', 1) - 1) * session('repair_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('repair_pp', $request->pp);
        $request->session()->put('repair_isactive', $request->isactive);
        $request->session()->put('repair_customer_id', $request->customer);
        $request->session()->put('repair_petugas_repair_id', $request->petugas);
        $request->session()->put('repair_tanggal', $request->tanggal);

        $search_arr = ['repair_isactive', 'repair_customer_id', 'repair_petugas_repair_id', 'repair_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1)->where('isperbaikan', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('repair_'));

            if ($search_arr[$i] == 'repair_isactive' || $search_arr[$i] == 'repair_customer_id' || $search_arr[$i] == 'repair_petugas_repair_id') {
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
        $datas = $datas->latest()->paginate(session('repair_pp'));

        $datas->withPath('/service/repair'); // pagination url to

        $view = view('service-perbaikan.partials.table', compact(['datas', 'customers', 'petugass']))->with('i', (request()->input('page', 1) - 1) * session('repair_pp'))->render();

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
        $jenis_perbaikans = JenisPerbaikan::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $datas = ServiceOrder::find(Crypt::decrypt($request->repair));
        $details = ServiceOrderPerbaikan::where('service_order_id', Crypt::decrypt($request->repair))->get();
        $barangs = Barang::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $satuans = Satuan::where('isactive', 1)->orderBy('singkatan')->pluck('singkatan', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');


        $total_price = ServiceOrderPerbaikan::where('service_order_id', Crypt::decrypt($request->repair))->select(DB::raw('SUM((harga_satuan * (1 + (pajak/100))) * kuantiti) as total_price'))->value('total_price');
        $totals = [
            'sub_price' => $total_price * 1,
            'total_price' => $datas->total_harga,
        ];

        return view('service-perbaikan.edit', compact(['datas', 'details', 'customers', 'branch_id', 'jenis_perbaikans', 'barangs', 'satuans', 'petugass', 'totals', 'jenis_pelayanan_id']));
    }

    public function update(ServiceOrderRequest $request): RedirectResponse
    {
        $order = ServiceOrder::find(Crypt::decrypt($request->repair));

        if ($request->validated()) {
            $order->update([
                'keterangan' => $request->keterangan,
                'petugas_repair_id' => $request->petugas_repair_id,
                'isperawatan' => ($request->isperawatan == 'on' ? 1 : $order->isperawatan),
                'isperawatan_by' => $request->isperawatan == 'on' ? auth()->user()->email : $order->isperawatan_by,
                'isperawatan_at' => $request->isperawatan == 'on' ? date('Y-m-d H:i:s') : $order->isperawatan_at,
                'isgantibaru' => ($request->isgantibaru == 'on' ? 1 : $order->isgantibaru),
                'isgantibaru_by' => $request->isgantibaru == 'on' ? auth()->user()->email : $order->isgantibaru_by,
                'isgantibaru_at' => $request->isgantibaru == 'on' ? date('Y-m-d H:i:s') : $order->isgantibaru_at,
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

        $jenis_perbaikan = JenisPerbaikan::find($request->jenis_perbaikan_id);

        $detail = ServiceOrderPerbaikan::create([
            'service_order_id' => $order_id,
            'branch_id' => $request->branch_id,
            'barang_id' => $request->barang_id,
            'satuan_id' => $request->satuan_id,
            'jenis_perbaikan_id' => $request->jenis_perbaikan_id,
            'nama_perbaikan' => $jenis_perbaikan ? $jenis_perbaikan->nama : NULL,
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
        $total_price = ServiceOrderPerbaikan::where('service_order_id', $order_id)->select(DB::raw('SUM((harga_satuan * (1 + (pajak/100))) * kuantiti) as total_price'))->value('total_price');
        $totals = [
            'sub_price' => $total_price * 1,
            'total_price' => $po->total_harga,
        ];

        // $po->update([
        //     'total_harga' => $totals['total_price'],
        // ]);

        $details = ServiceOrderPerbaikan::where('service_order_id', $order_id)->get();
        $viewMode = false;

        $view = view('service-perbaikan.partials.details', compact(['details', 'viewMode']))->render();

        return response()->json([
            'view' => $view,
            'total_harga_master' => $totals['total_price'],
            'total_harga_detail' => $totals['sub_price'],
        ], 200);
    }

    public function deleteDetail(Request $request): JsonResponse
    {
        $detail = ServiceOrderPerbaikan::find($request->detail);
        $order = ServiceOrder::where('id', $detail->service_order_id)->get();

        $order_id = $detail->service_order_id;
        $view = [];

        try {
            $detail->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json(['QueryException' => $e->getMessage()], 500);
        }

        $po = ServiceOrder::find($order_id);
        $total_price = ServiceOrderPerbaikan::where('service_order_id', $order_id)->select(DB::raw('SUM((harga_satuan * (1 + (pajak/100))) * kuantiti) as total_price'))->value('total_price');
        $totals = [
            'sub_price' => $total_price * 1,
            'total_price' => $po->total_harga,
        ];

        // $po->update([
        //     'total_harga' => $totals['total_price'],
        // ]);

        $details = ServiceOrderPerbaikan::where('service_order_id', $order_id)->get();
        $viewMode = false;

        if ($details->count() > 0) {
            $view = view('service-perbaikan.partials.details', compact(['details', 'viewMode']))->render();
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
