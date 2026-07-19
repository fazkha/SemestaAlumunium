<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\PcIzin;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class PcizinController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pcizin-list', only: ['index', 'fetch']),
            new Middleware('permission:pcizin-create', only: ['create', 'store']),
            new Middleware('permission:pcizin-edit', only: ['edit', 'update']),
            new Middleware('permission:pcizin-show', only: ['show']),
            new Middleware('permission:pcizin-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('pcizin_pp')) {
            $request->session()->put('pcizin_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('pcizin_show')) {
            $request->session()->put('pcizin_show', '0');
        }
        if (!$request->session()->exists('pcizin_branch_id')) {
            $request->session()->put('pcizin_branch_id', 'all');
        }
        if (!$request->session()->exists('pcizin_pegawai_id')) {
            $request->session()->put('pcizin_pegawai_id', 'all');
        }
        if (!$request->session()->exists('pcizin_tanggal_mulai')) {
            $request->session()->put('pcizin_tanggal_mulai', '_');
        }

        $search_arr = ['pcizin_show', 'pcizin_branch_id', 'pcizin_pegawai_id', 'pcizin_tanggal_mulai'];

        $branches = Branch::where('isactive', 1)->where('wilayah_id', 5)->orderBy('nama')->pluck('nama', 'id');
        $pegawais = Pegawai::where('isactive', 1)->orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');
        $datas = PcIzin::join('branches', 'branches.id', '=', 'pc_permintaan_izins.branch_id')
            ->join('pegawais', 'pegawais.id', '=', 'pc_permintaan_izins.pegawai_id')
            ->join('products', 'products.id', '=', 'pc_permintaan_izins.product_id')
            ->join('jenis_izin_pegawais', 'jenis_izin_pegawais.id', '=', 'pc_permintaan_izins.jenis_izin_pegawai_id')
            ->select('pc_permintaan_izins.*', 'branches.nama as branch_nama', 'pegawais.nama_lengkap as pc_nama', 'jenis_izin_pegawais.nama as jenis_nama', 'products.nama as product_nama');

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('pcizin_'));

            if ($search_arr[$i] == 'pcizin_show') {
                if (session($search_arr[$i]) == '0') {
                    $datas = $datas->where('pc_permintaan_izins.approved_hrd', 0);
                }
            } else if ($search_arr[$i] == 'pcizin_branch_id' || $search_arr[$i] == 'pcizin_pegawai_id') {
                if (session($search_arr[$i]) != 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } else {
                    $like = '%' . session($search_arr[$i]) . '%';
                    $datas = $datas->where($field, 'LIKE', $like);
                }
            }
        }

        // $sql = $datas->toSql();
        // $bindings = $datas->getBindings();
        // foreach ($bindings as $binding) {
        //     $sql = preg_replace('/\?/', "'" . addslashes($binding) . "'", $sql, 1);
        // }
        // dd($sql);

        // $datas = $datas->where('user_id', auth()->user()->id);
        $datas = $datas->latest()->paginate(session('pcizin_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('pcizin.index', compact(['datas', 'branches', 'pegawais']))->with('i', (request()->input('page', 1) - 1) * session('pcizin_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('pcizin_pp', $request->pp);
        $request->session()->put('pcizin_show', $request->show);
        $request->session()->put('pcizin_branch_id', $request->branch);
        $request->session()->put('pcizin_pegawai_id', $request->pegawai);
        $request->session()->put('pcizin_tanggal_mulai', $request->tanggal);

        $search_arr = ['pcizin_show', 'pcizin_branch_id', 'pcizin_pegawai_id', 'pcizin_tanggal_mulai'];

        $branches = Branch::where('isactive', 1)->where('wilayah_id', 5)->orderBy('nama')->pluck('nama', 'id');
        $pegawais = Pegawai::where('isactive', 1)->orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');
        $datas = PcIzin::join('branches', 'branches.id', '=', 'pc_permintaan_izins.branch_id')
            ->join('pegawais', 'pegawais.id', '=', 'pc_permintaan_izins.pegawai_id')
            ->join('products', 'products.id', '=', 'pc_permintaan_izins.product_id')
            ->join('jenis_izin_pegawais', 'jenis_izin_pegawais.id', '=', 'pc_permintaan_izins.jenis_izin_pegawai_id')
            ->select('pc_permintaan_izins.*', 'branches.nama as branch_nama', 'pegawais.nama_lengkap as pc_nama', 'jenis_izin_pegawais.nama as jenis_nama', 'products.nama as product_nama');

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('pcizin_'));

            if ($search_arr[$i] == 'pcizin_show') {
                if (session($search_arr[$i]) == '0') {
                    $datas = $datas->where('pc_permintaan_izins.approved_hrd', 0);
                }
            } else if ($search_arr[$i] == 'pcizin_branch_id' || $search_arr[$i] == 'pcizin_pegawai_id') {
                if (session($search_arr[$i]) != 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } else {
                    $like = '%' . session($search_arr[$i]) . '%';
                    $datas = $datas->where($field, 'LIKE', $like);
                }
            }
        }
        // $datas = $datas->where('user_id', auth()->user()->id);
        $datas = $datas->latest()->paginate(session('pcizin_pp'));

        $datas->withPath('/human-resource/pcizin'); // pagination url to

        $view = view('pcizin.partials.table', compact(['datas', 'branches', 'pegawais']))->with('i', (request()->input('page', 1) - 1) * session('pcizin_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $request)
    {
        //
    }

    public function edit(Request $request): View
    {
        $datas = PcIzin::join('branches', 'branches.id', '=', 'pc_permintaan_izins.branch_id')
            ->join('pegawais', 'pegawais.id', '=', 'pc_permintaan_izins.pegawai_id')
            ->join('products', 'products.id', '=', 'pc_permintaan_izins.product_id')
            ->join('jenis_izin_pegawais', 'jenis_izin_pegawais.id', '=', 'pc_permintaan_izins.jenis_izin_pegawai_id')
            ->select('pc_permintaan_izins.*', 'branches.nama as branch_nama', 'pegawais.nama_lengkap as pc_nama', 'jenis_izin_pegawais.nama as jenis_nama', 'products.nama as product_nama')
            ->where('pc_permintaan_izins.id', Crypt::decrypt($request->pcizin))
            ->first();

        return view('pcizin.edit', compact(['datas']));
    }

    public function update(Request $request): RedirectResponse
    {
        $pcizin = PcIzin::find(Crypt::decrypt($request->pcizin));

        if ($pcizin) {
            $namapegawai = $pcizin->pegawai->nama_lengkap;
            $penanganan = $request->input('penanganan');
            $status = $request->input('status');

            $pcizin->update([
                'penanganan' => $penanganan,
                'approved_hrd' => $status,
            ]);

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $namapegawai);
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while updating!');
    }

    public function delete(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }
}
