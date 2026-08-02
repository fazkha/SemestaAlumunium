<?php

namespace App\Http\Controllers;

use App\Models\StdInspect;
use App\Http\Requests\StdInspectRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class StdInspectController extends Controller implements HasMiddleware
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
        if (!$request->session()->exists('std-inspect_pp')) {
            $request->session()->put('std-inspect_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('std-inspect_isactive')) {
            $request->session()->put('std-inspect_isactive', 'all');
        }
        if (!$request->session()->exists('std-inspect_standar')) {
            $request->session()->put('std-inspect_standar', '_');
        }

        $search_arr = ['std-inspect_isactive', 'std-inspect_standar'];

        $datas = StdInspect::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('std-inspect_'));

            if ($search_arr[$i] == 'std-inspect_isactive') {
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
        // $datas = $datas->latest()->paginate(session('std-inspect_pp'));
        $datas = $datas->orderBy('standar')->paginate(session('std-inspect_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('satuan.index', compact(['datas']))->with('i', (request()->input('page', 1) - 1) * session('std-inspect_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('std-inspect_pp', $request->pp);
        $request->session()->put('std-inspect_isactive', $request->isactive);
        $request->session()->put('std-inspect_standar', $request->standar);

        $search_arr = ['std-inspect_isactive', 'std-inspect_standar'];

        $datas = StdInspect::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('std-inspect_'));

            if ($search_arr[$i] == 'std-inspect_isactive') {
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
        // $datas = $datas->latest()->paginate(session('std-inspect_pp'));
        $datas = $datas->orderBy('standar')->paginate(session('std-inspect_pp'));

        $datas->withPath('/service/std-inspect'); // pagination url to

        $view = view('std-inspect.partials.table', compact(['datas']))->with('i', (request()->input('page', 1) - 1) * session('std-inspect_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create(): View
    {
        return view('std-inspect.create');
    }

    public function store(StdInspectRequest $request): RedirectResponse
    {
        if ($request->validated()) {
            $std_inspect = StdInspect::create([
                'urutan' => $request->urutan,
                'standar' => $request->standar,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'created_by' => auth()->user()->email,
                'updated_by' => auth()->user()->email,
            ]);

            if ($std_inspect) {
                return redirect()->back()->with('success', __('messages.successadded') . ' 👉 ' . $request->standar);
            }
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while saving!');
    }

    public function show(Request $request): View
    {
        $datas = StdInspect::find(Crypt::decrypt($request->standar));

        return view('std-inspect.show', compact(['datas']));
    }

    public function edit(Request $request): View
    {
        $datas = StdInspect::find(Crypt::decrypt($request->standar));

        return view('std-inspect.edit', compact(['datas']));
    }

    public function update(StdInspectRequest $request): RedirectResponse
    {
        $std_inspect = StdInspect::find(Crypt::decrypt($request->standar));

        if ($request->validated()) {

            $std_inspect->update([
                'urutan' => $request->urutan,
                'standar' => $request->standar,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'updated_by' => auth()->user()->email,
            ]);

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $request->standar);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error occured while updating!');
        }
    }

    public function delete(Request $request): View
    {
        $std_inspect = StdInspect::find(Crypt::decrypt($request->standar));

        $datas = $std_inspect;

        return view('std-inspect.delete', compact(['datas']));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $std_inspect = StdInspect::find(Crypt::decrypt($request->standar));

        try {
            $std_inspect->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                return redirect()->route('std-inspect.index')->with('error', 'Integrity constraint violation');
            }
            return redirect()->route('std-inspect.index')->with('error', $e->getMessage());
        }

        return redirect()->route('std-inspect.index')
            ->with('success', __('messages.successdeleted') . ' 👉 ' . $std_inspect->standar);
    }
}
