<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Mitra;
use App\Models\MitraPermintaanIzin;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class MitraizinController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:mitraizin-list', only: ['index', 'fetch']),
            new Middleware('permission:mitraizin-create', only: ['create', 'store']),
            new Middleware('permission:mitraizin-edit', only: ['edit', 'update']),
            new Middleware('permission:mitraizin-show', only: ['show']),
            new Middleware('permission:mitraizin-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('mitraizin_pp')) {
            $request->session()->put('mitraizin_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('mitraizin_show')) {
            $request->session()->put('mitraizin_show', '0');
        }
        if (!$request->session()->exists('mitraizin_branch_id')) {
            $request->session()->put('mitraizin_branch_id', 'all');
        }
        if (!$request->session()->exists('mitraizin_mitra_id')) {
            $request->session()->put('mitraizin_mitra_id', 'all');
        }
        if (!$request->session()->exists('mitraizin_tanggal_mulai')) {
            $request->session()->put('mitraizin_tanggal_mulai', '_');
        }

        $search_arr = ['mitraizin_show', 'mitraizin_branch_id', 'mitraizin_mitra_id', 'mitraizin_tanggal_mulai'];

        $branches = Branch::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $mitras = Mitra::where('isactive', 1)->orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');
        $datas = MitraPermintaanIzin::join('branches', 'branches.id', '=', 'mitra_permintaan_izins.branch_id')
            ->join('mitras', 'mitras.id', '=', 'mitra_permintaan_izins.mitra_id')
            ->join('products', 'products.id', '=', 'mitra_permintaan_izins.product_id')
            ->join('jenis_izin_pegawais', 'jenis_izin_pegawais.id', '=', 'mitra_permintaan_izins.jenis_izin_pegawai_id')
            ->select('mitra_permintaan_izins.*', 'branches.nama as branch_nama', 'mitras.nama_lengkap as mitra_nama', 'jenis_izin_pegawais.nama as jenis_nama', 'products.nama as product_nama');

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('mitraizin_'));

            if ($search_arr[$i] == 'mitraizin_show') {
                if (session($search_arr[$i]) == '0') {
                    $datas = $datas->where('mitra_permintaan_izins.approved_hrd', 0);
                }
            } else if ($search_arr[$i] == 'mitraizin_branch_id' || $search_arr[$i] == 'mitraizin_mitra_id') {
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
        $datas = $datas->latest()->paginate(session('mitraizin_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('mitraizin.index', compact(['datas', 'branches', 'mitras']))->with('i', (request()->input('page', 1) - 1) * session('mitraizin_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('mitraizin_pp', $request->pp);
        $request->session()->put('mitraizin_show', $request->show);
        $request->session()->put('mitraizin_branch_id', $request->branch);
        $request->session()->put('mitraizin_mitra_id', $request->mitra);
        $request->session()->put('mitraizin_tanggal_mulai', $request->tanggal);

        $search_arr = ['mitraizin_show', 'mitraizin_branch_id', 'mitraizin_mitra_id', 'mitraizin_tanggal_mulai'];

        $branches = Branch::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $mitras = Mitra::where('isactive', 1)->orderBy('nama_lengkap')->pluck('nama_lengkap', 'id');
        $datas = MitraPermintaanIzin::join('branches', 'branches.id', '=', 'mitra_permintaan_izins.branch_id')
            ->join('mitras', 'mitras.id', '=', 'mitra_permintaan_izins.mitra_id')
            ->join('products', 'products.id', '=', 'mitra_permintaan_izins.product_id')
            ->join('jenis_izin_pegawais', 'jenis_izin_pegawais.id', '=', 'mitra_permintaan_izins.jenis_izin_pegawai_id')
            ->select('mitra_permintaan_izins.*', 'branches.nama as branch_nama', 'mitras.nama_lengkap as mitra_nama', 'jenis_izin_pegawais.nama as jenis_nama', 'products.nama as product_nama');

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('mitraizin_'));

            if ($search_arr[$i] == 'mitraizin_show') {
                if (session($search_arr[$i]) == '0') {
                    $datas = $datas->where('mitra_permintaan_izins.approved_hrd', 0);
                }
            } else if ($search_arr[$i] == 'mitraizin_branch_id' || $search_arr[$i] == 'mitraizin_mitra_id') {
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
        $datas = $datas->latest()->paginate(session('mitraizin_pp'));

        $datas->withPath('/human-resource/mitraizin'); // pagination url to

        $view = view('mitraizin.partials.table', compact(['datas', 'branches', 'mitras']))->with('i', (request()->input('page', 1) - 1) * session('mitraizin_pp'))->render();

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
        $datas = MitraPermintaanIzin::join('branches', 'branches.id', '=', 'mitra_permintaan_izins.branch_id')
            ->join('mitras', 'mitras.id', '=', 'mitra_permintaan_izins.mitra_id')
            ->join('products', 'products.id', '=', 'mitra_permintaan_izins.product_id')
            ->join('jenis_izin_pegawais', 'jenis_izin_pegawais.id', '=', 'mitra_permintaan_izins.jenis_izin_pegawai_id')
            ->select('mitra_permintaan_izins.*', 'branches.nama as branch_nama', 'mitras.nama_lengkap as mitra_nama', 'jenis_izin_pegawais.nama as jenis_nama', 'products.nama as product_nama')
            ->where('mitra_permintaan_izins.id', Crypt::decrypt($request->mitraizin))
            ->first();

        return view('mitraizin.edit', compact(['datas']));
    }

    public function update(Request $request): RedirectResponse
    {
        $mitraizin = MitraPermintaanIzin::find(Crypt::decrypt($request->mitraizin));

        if ($mitraizin) {
            $namamitra = $mitraizin->mitra->nama_lengkap;
            $penanganan = $request->input('penanganan');
            $status = $request->input('status');

            $mitraizin->update([
                'penanganan' => $penanganan,
                'approved_hrd' => $status,
            ]);

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $namamitra);
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
