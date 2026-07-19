<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Resign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class ResignController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:resign-list', only: ['index', 'fetch']),
            new Middleware('permission:resign-create', only: ['create', 'store']),
            new Middleware('permission:resign-edit', only: ['edit', 'update']),
            new Middleware('permission:resign-show', only: ['show']),
            new Middleware('permission:resign-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('resign_pp')) {
            $request->session()->put('resign_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('resign_show')) {
            $request->session()->put('resign_show', '0');
        }
        if (!$request->session()->exists('resign_branch_id')) {
            $request->session()->put('resign_branch_id', 'all');
        }
        if (!$request->session()->exists('resign_user_id')) {
            $request->session()->put('resign_user_id', 'all');
        }
        if (!$request->session()->exists('resign_tanggal')) {
            $request->session()->put('resign_tanggal', '_');
        }

        $search_arr = ['resign_show', 'resign_branch_id', 'resign_user_id', 'resign_tanggal'];

        $branches = Branch::where('isactive', 1)->where('wilayah_id', 5)->orderBy('nama')->pluck('nama', 'id');
        $users = User::where('approved', 1)->join('pegawais', 'pegawais.email', 'users.email')->where('pegawais.isactive', 1)->orderBy('users.name')->pluck('users.name', 'users.id');
        $datas = Resign::join('users', 'users.id', '=', 'resigns.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('branches', 'branches.id', '=', 'profiles.branch_id')
            ->select('resigns.*', 'branches.id as branch_id', 'branches.nama as branch_nama', 'users.name as user_nama');

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('resign_'));

            if ($search_arr[$i] == 'resign_show') {
                if (session($search_arr[$i]) == '0') {
                    $datas = $datas->where('resigns.approved_hrd', 0);
                }
            } else if ($search_arr[$i] == 'resign_branch_id' || $search_arr[$i] == 'resign_user_id') {
                if ($search_arr[$i] == 'resign_user_id') {
                    $field = 'resigns.user_id';
                }
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
        $datas = $datas->latest()->paginate(session('resign_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('resign.index', compact(['datas', 'branches', 'users']))->with('i', (request()->input('page', 1) - 1) * session('resign_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('resign_pp', $request->pp);
        $request->session()->put('resign_show', $request->show);
        $request->session()->put('resign_branch_id', $request->branch);
        $request->session()->put('resign_user_id', $request->user);
        $request->session()->put('resign_tanggal', $request->tanggal);

        $search_arr = ['resign_show', 'resign_branch_id', 'resign_user_id', 'resign_tanggal'];

        $branches = Branch::where('isactive', 1)->where('wilayah_id', 5)->orderBy('nama')->pluck('nama', 'id');
        $users = User::where('approved', 1)->join('pegawais', 'pegawais.email', 'users.email')->where('pegawais.isactive', 1)->orderBy('users.name')->pluck('users.name', 'users.id');
        $datas = Resign::join('users', 'users.id', '=', 'resigns.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('branches', 'branches.id', '=', 'profiles.branch_id')
            ->select('resigns.*', 'branches.id as branch_id', 'branches.nama as branch_nama', 'users.name as user_nama');

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('resign_'));

            if ($search_arr[$i] == 'resign_show') {
                if (session($search_arr[$i]) == '0') {
                    $datas = $datas->where('resigns.approved_hrd', 0);
                }
            } else if ($search_arr[$i] == 'resign_branch_id' || $search_arr[$i] == 'resign_user_id') {
                if ($search_arr[$i] == 'resign_user_id') {
                    $field = 'resigns.user_id';
                }
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
        $datas = $datas->latest()->paginate(session('resign_pp'));

        $datas->withPath('/human-resource/resign'); // pagination url to

        $view = view('resign.partials.table', compact(['datas', 'branches', 'users']))->with('i', (request()->input('page', 1) - 1) * session('resign_pp'))->render();

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
        $datas = Resign::join('users', 'users.id', '=', 'resigns.user_id')
            ->join('profiles', 'profiles.user_id', '=', 'users.id')
            ->join('branches', 'branches.id', '=', 'profiles.branch_id')
            ->select('resigns.*', 'branches.id as branch_id', 'branches.nama as branch_nama', 'users.name as user_nama')
            ->where('resigns.id', Crypt::decrypt($request->resign))
            ->first();

        return view('resign.edit', compact(['datas']));
    }

    public function update(Request $request): RedirectResponse
    {
        $resign = Resign::find(Crypt::decrypt($request->resign));

        if ($resign) {
            $namauser = $resign->user->name;
            $tanggapan_hrd = $request->input('tanggapan_hrd');
            $status = $request->input('status');

            $resign->update([
                'tanggapan_hrd' => $tanggapan_hrd,
                'approved_hrd' => $status,
            ]);

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $namauser);
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
