<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JenisPerawatan;
use App\Models\Pegawai;
use App\Models\ServiceOrder;
use App\Models\ServiceOrderPerawatan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class MaintenanceController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:perawatan-list', only: ['index', 'fetch']),
            new Middleware('permission:perawatan-create', only: ['create', 'store']),
            new Middleware('permission:perawatan-edit', only: ['edit', 'update']),
            new Middleware('permission:perawatan-show', only: ['show']),
            new Middleware('permission:perawatan-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('maintenance_pp')) {
            $request->session()->put('maintenance_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('maintenance_isactive')) {
            $request->session()->put('maintenance_isactive', 'all');
        }
        if (!$request->session()->exists('maintenance_tanggal')) {
            $request->session()->put('maintenance_tanggal', '_');
        }
        if (!$request->session()->exists('maintenance_customer_id')) {
            $request->session()->put('maintenance_customer_id', 'all');
        }
        if (!$request->session()->exists('maintenance_petugas_maintenance_id')) {
            $request->session()->put('maintenance_petugas_maintenance_id', 'all');
        }

        $search_arr = ['maintenance_isactive', 'maintenance_customer_id', 'maintenance_petugas_maintenance_id', 'maintenance_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1)->where('isperawatan', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('maintenance_'));

            if ($search_arr[$i] == 'maintenance_isactive' || $search_arr[$i] == 'maintenance_customer_id' || $search_arr[$i] == 'maintenance_petugas_maintenance_id') {
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
        $datas = $datas->latest()->paginate(session('maintenance_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('service-perawatan.index', compact(['datas', 'customers', 'petugass']))->with('i', (request()->input('page', 1) - 1) * session('maintenance_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('maintenance_pp', $request->pp);
        $request->session()->put('maintenance_isactive', $request->isactive);
        $request->session()->put('maintenance_customer_id', $request->customer);
        $request->session()->put('maintenance_petugas_maintenance_id', $request->petugas);
        $request->session()->put('maintenance_tanggal', $request->tanggal);

        $search_arr = ['maintenance_isactive', 'maintenance_customer_id', 'maintenance_petugas_maintenance_id', 'maintenance_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $petugass = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1)->where('isperawatan', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('maintenance_'));

            if ($search_arr[$i] == 'maintenance_isactive' || $search_arr[$i] == 'maintenance_customer_id' || $search_arr[$i] == 'maintenance_petugas_maintenance_id') {
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
        $datas = $datas->latest()->paginate(session('maintenance_pp'));

        $datas->withPath('/service/maintenance'); // pagination url to

        $view = view('service-perawatan.partials.table', compact(['datas', 'customers', 'petugass']))->with('i', (request()->input('page', 1) - 1) * session('maintenance_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create(): View
    {
        //
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
        $jenis_perawatan = JenisPerawatan::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $datas = ServiceOrder::find(Crypt::decrypt($request->inspect));
        $details = ServiceOrderPerawatan::where('service_order_id', Crypt::decrypt($request->inspect))->get();

        return view('maintenance.edit', compact(['datas', 'details', 'customers', 'branch_id', 'jenis_perawatan']));
    }

    public function update(ServiceOrderRequest $request): RedirectResponse
    {
        $order = ServiceOrder::find(Crypt::decrypt($request->inspect));

        if ($request->validated()) {
            $order->update([
                'keterangan' => $request->keterangan,
                'isperawatan' => ($request->isperawatan == 'on' ? 1 : 0),
                'isperbaikan' => ($request->isperbaikan == 'on' ? 1 : 0),
                'isgantibaru' => ($request->isgantibaru == 'on' ? 1 : 0),
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

    public function updateDetail(Request $request)
    {
        $master_id = $request->detail;
        $standars = $request->input('standars');

        foreach ($standars as $standar) {
            $detail = ServiceOrderInspections::where('service_order_id', $master_id)->where('id', $standar['id']);
            if (Arr::exists($standar, 'ischeck')) {
                $ischeck = $standar['ischeck'];
            } else {
                $ischeck = 'off';
            }

            $detail->update([
                'keterangan' => $standar['keterangan'],
                'ischeck' => ($ischeck == 'on' ? 1 : 0),
                'updated_by' => auth()->user()->email,
            ]);
        }

        $details = ServiceOrderInspections::where('service_order_id', $master_id)->get();
        $viewMode = false;

        $view = view('maintenance.partials.details', compact(['details', 'viewMode']))->render();

        return response()->json([
            'view' => $view,
        ], 200);
    }
}
