<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Pegawai;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class InspectController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:inspect-list', only: ['index', 'fetch']),
            new Middleware('permission:inspect-create', only: ['create', 'store']),
            new Middleware('permission:inspect-edit', only: ['edit', 'update']),
            new Middleware('permission:inspect-show', only: ['show']),
            new Middleware('permission:inspect-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('service-order_pp')) {
            $request->session()->put('service-order_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('service-order_isactive')) {
            $request->session()->put('service-order_isactive', 'all');
        }
        if (!$request->session()->exists('service-order_tanggal')) {
            $request->session()->put('service-order_tanggal', '_');
        }
        if (!$request->session()->exists('service-order_customer_id')) {
            $request->session()->put('service-order_customer_id', 'all');
        }
        if (!$request->session()->exists('service-order_pegawai_id')) {
            $request->session()->put('service-order_pegawai_id', 'all');
        }

        $search_arr = ['service-order_isactive', 'service-order_customer_id', 'service-order_pegawai_id', 'service-order_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $pegawais = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('service-order_'));

            if ($search_arr[$i] == 'service-order_isactive' || $search_arr[$i] == 'service-order_customer_id' || $search_arr[$i] == 'service-order_pegawai_id') {
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
        $datas = $datas->latest()->paginate(session('service-order_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('service-order.index', compact(['datas', 'customers', 'pegawais']))->with('i', (request()->input('page', 1) - 1) * session('service-order_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('service-order_pp', $request->pp);
        $request->session()->put('service-order_isactive', $request->isactive);
        $request->session()->put('service-order_customer_id', $request->customer);
        $request->session()->put('service-order_pegawai_id', $request->pegawai);
        $request->session()->put('service-order_tanggal', $request->tanggal);

        $search_arr = ['service-order_isactive', 'service-order_customer_id', 'service-order_pegawai_id', 'service-order_tanggal'];

        $branch_id = auth()->user()->profile->branch_id;
        $customers = Customer::where('branch_id', $branch_id)->where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $pegawais = Pegawai::join('brandivjabpegs', 'brandivjabpegs.pegawai_id', 'pegawais.id')
            ->join('brandivjabs', 'brandivjabpegs.brandivjab_id', 'brandivjabs.id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->where('pegawais.isactive', 1)
            ->whereIn('jabatans.islevel', [3, 7])
            ->orderBy('pegawais.nama_lengkap')
            ->pluck('pegawais.nama_lengkap', 'pegawais.id');
        $datas = ServiceOrder::where('jenis_pelayanan_id', 1);

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('service-order_'));

            if ($search_arr[$i] == 'service-order_isactive' || $search_arr[$i] == 'service-order_customer_id' || $search_arr[$i] == 'service-order_pegawai_id') {
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
        $datas = $datas->latest()->paginate(session('service-order_pp'));

        $datas->withPath('/service/inspect'); // pagination url to

        $view = view('service-order.partials.table', compact(['datas', 'customers', 'pegawais']))->with('i', (request()->input('page', 1) - 1) * session('service-order_pp'))->render();

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

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request): View
    {
        //
    }

    public function edit(Request $request): View
    {
        //
    }

    public function update(Request $request): RedirectResponse
    {
        //
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
        //
    }

    public function deleteDetail(Request $request): JsonResponse
    {
        //
    }

    public function approval(Request $request)
    {
        //
    }

    public function updateApproval(Request $request)
    {
        //
    }
}
