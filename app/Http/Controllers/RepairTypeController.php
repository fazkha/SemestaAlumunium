<?php

namespace App\Http\Controllers;

use App\Models\JenisPerbaikan;
use App\Http\Requests\RepairTypeRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class RepairTypeController extends Controller implements HasMiddleware
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
        if (!$request->session()->exists('repair-type_pp')) {
            $request->session()->put('repair-type_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('repair-type_isactive')) {
            $request->session()->put('repair-type_isactive', 'all');
        }
        if (!$request->session()->exists('repair-type_nama')) {
            $request->session()->put('repair-type_nama', '_');
        }

        $search_arr = ['repair-type_isactive', 'repair-type_nama'];

        $datas = JenisPerbaikan::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('repair-type_'));

            if ($search_arr[$i] == 'repair-type_isactive') {
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
        // $datas = $datas->latest()->paginate(session('maintenance_type_pp'));
        $datas = $datas->orderBy('nama')->paginate(session('repair-type_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('jenis-perbaikan.index', compact(['datas']))->with('i', (request()->input('page', 1) - 1) * session('repair-type_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('repair-type_pp', $request->pp);
        $request->session()->put('repair-type_isactive', $request->isactive);
        $request->session()->put('repair-type_nama', $request->nama);

        $search_arr = ['repair-type_isactive', 'repair-type_nama'];

        $datas = JenisPerbaikan::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('repair-type_'));

            if ($search_arr[$i] == 'repair-type_isactive') {
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
        // $datas = $datas->latest()->paginate(session('repair-type_pp'));
        $datas = $datas->orderBy('nama')->paginate(session('repair-type_pp'));

        $datas->withPath('/service/repair-type'); // pagination url to

        $view = view('jenis-perbaikan.partials.table', compact(['datas']))->with('i', (request()->input('page', 1) - 1) * session('repair-type_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create(): View
    {
        return view('jenis-perbaikan.create');
    }

    public function store(RepairTypeRequest $request): RedirectResponse
    {
        if ($request->validated()) {
            $repairType = JenisPerbaikan::create([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'created_by' => auth()->user()->email,
                'updated_by' => auth()->user()->email,
            ]);

            if ($repairType) {
                return redirect()->back()->with('success', __('messages.successadded') . ' 👉 ' . $request->nama);
            }
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while saving!');
    }

    public function show(Request $request): View
    {
        $datas = JenisPerbaikan::find(Crypt::decrypt($request->repair_type));

        return view('jenis-perbaikan.show', compact(['datas']));
    }

    public function edit(Request $request): View
    {
        $datas = JenisPerbaikan::find(Crypt::decrypt($request->repair_type));

        return view('jenis-perbaikan.edit', compact(['datas']));
    }

    public function update(RepairTypeRequest $request): RedirectResponse
    {
        $repairType = JenisPerbaikan::find(Crypt::decrypt($request->repair_type));

        if ($request->validated()) {

            $repairType->update([
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'updated_by' => auth()->user()->email,
            ]);

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $request->nama);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error occured while updating!');
        }
    }

    public function delete(Request $request): View
    {
        $repairType = JenisPerbaikan::find(Crypt::decrypt($request->repair_type));

        $datas = $repairType;

        return view('jenis-perbaikan.delete', compact(['datas']));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $repairType = JenisPerbaikan::find(Crypt::decrypt($request->repair_type));

        try {
            $repairType->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                return redirect()->route('repair-type.index')->with('error', 'Integrity constraint violation');
            }
            return redirect()->route('repair-type.index')->with('error', $e->getMessage());
        }

        return redirect()->route('repair-type.index')
            ->with('success', __('messages.successdeleted') . ' 👉 ' . $repairType->nama);
    }
}
