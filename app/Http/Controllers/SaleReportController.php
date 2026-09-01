<?php

namespace App\Http\Controllers;

use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class SaleReportController extends Controller implements HasMiddleware
{
    protected array $array_hari;
    protected array $array_bulan;

    public function __construct()
    {
        $this->array_hari = [
            ['hari' => ['id' => 0, 'name' => __('calendar.sunday')]],
            ['hari' => ['id' => 1, 'name' => __('calendar.monday')]],
            ['hari' => ['id' => 2, 'name' => __('calendar.tuesday')]],
            ['hari' => ['id' => 3, 'name' => __('calendar.wednesday')]],
            ['hari' => ['id' => 4, 'name' => __('calendar.thursday')]],
            ['hari' => ['id' => 5, 'name' => __('calendar.friday')]],
            ['hari' => ['id' => 6, 'name' => __('calendar.saturday')]],
        ];

        $this->array_bulan = [
            ['bulan' => ['id' => 1, 'name' => __('calendar.january')]],
            ['bulan' => ['id' => 2, 'name' => __('calendar.february')]],
            ['bulan' => ['id' => 3, 'name' => __('calendar.march')]],
            ['bulan' => ['id' => 4, 'name' => __('calendar.apryl')]],
            ['bulan' => ['id' => 5, 'name' => __('calendar.may')]],
            ['bulan' => ['id' => 6, 'name' => __('calendar.june')]],
            ['bulan' => ['id' => 7, 'name' => __('calendar.july')]],
            ['bulan' => ['id' => 8, 'name' => __('calendar.august')]],
            ['bulan' => ['id' => 9, 'name' => __('calendar.september')]],
            ['bulan' => ['id' => 10, 'name' => __('calendar.october')]],
            ['bulan' => ['id' => 11, 'name' => __('calendar.november')]],
            ['bulan' => ['id' => 12, 'name' => __('calendar.december')]],
        ];
    }

    public static function middleware(): array
    {
        return [
            new Middleware('permission:laporan-create', only: ['create', 'store']),
            new Middleware('permission:laporan-show', only: ['show']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('report_bulan')) {
            $request->session()->put('report_bulan', 'all');
        }
        if (!$request->session()->exists('report_tahun')) {
            $request->session()->put('report_tahun', '_');
        }

        $search_arr = ['report_bulan', 'report_tahun'];

        $bulans = Arr::pluck($this->array_bulan, 'bulan.name', 'bulan.id');
        $datas = SaleOrder::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('report_'));

            if ($search_arr[$i] == 'report_bulan') {
                if (session($search_arr[$i]) !== 'all') {
                    $datas = $datas->whereRaw('MONTH(tanggal) = ?', [session($search_arr[$i])]);
                }
            } elseif ($search_arr[$i] == 'report_tahun') {
                if (session($search_arr[$i]) !== '_') {
                    $datas = $datas->whereRaw('YEAR(tanggal) = ?', [session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } elseif (session($search_arr[$i]) == 'all') {
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

        $datas = $datas->where('branch_id', auth()->user()->profile->branch_id);
        $datas = $datas->orderBy('tanggal', 'desc')->orderBy('no_order');
        $datas = $datas->get();

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('sale-report.index', compact(['datas', 'bulans']));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('report_tahun', $request->tahun);
        $request->session()->put('report_bulan', $request->bulan);

        $search_arr = ['report_bulan', 'report_tahun'];

        $bulans = Arr::pluck($this->array_bulan, 'bulan.name', 'bulan.id');
        $datas = SaleOrder::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('report_'));

            if ($search_arr[$i] == 'report_bulan') {
                if (session($search_arr[$i]) !== 'all') {
                    $datas = $datas->whereRaw('MONTH(tanggal) = ?', [session($search_arr[$i])]);
                }
            } elseif ($search_arr[$i] == 'report_tahun') {
                if (session($search_arr[$i]) !== '_') {
                    $datas = $datas->whereRaw('YEAR(tanggal) = ?', [session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } elseif (session($search_arr[$i]) == 'all') {
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

        $datas = $datas->where('branch_id', auth()->user()->profile->branch_id);
        $datas = $datas->orderBy('tanggal', 'desc')->orderBy('no_order');
        $datas = $datas->get();

        $view = view('sale-report.partials.table', compact(['datas', 'bulans']))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }
}
