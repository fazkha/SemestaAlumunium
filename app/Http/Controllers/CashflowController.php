<?php

namespace App\Http\Controllers;

use App\Models\Cashflow;
use App\Models\CashflowGroup;
use App\Models\CashflowSubtotal;
use App\Models\CashflowTotal;
use App\Models\SaleOrder;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Arr;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class CashflowController extends Controller implements HasMiddleware
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
        if (!$request->session()->exists('cashflow_pp')) {
            $request->session()->put('cashflow_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('cashflow_bulan')) {
            $request->session()->put('cashflow_bulan', 'all');
        }
        if (!$request->session()->exists('cashflow_tahun')) {
            $request->session()->put('cashflow_tahun', '_');
        }

        $search_arr = ['cashflow_bulan', 'cashflow_tahun'];

        $bulans = Arr::pluck($this->array_bulan, 'bulan.name', 'bulan.id');
        $datas = CashflowTotal::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('cashflow_'));

            if ($search_arr[$i] == 'cashflow_isactive') {
                if (session($search_arr[$i]) !== 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
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

        // $datas = $datas->where('branch_id', auth()->user()->profile->branch_id);
        $datas = $datas->orderBy('tahun', 'desc')->orderBy('bulan', 'desc');
        $datas = $datas->latest()->paginate(session('cashflow_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('cashflow.index', compact(['datas', 'bulans']))->with('i', (request()->input('page', 1) - 1) * session('cashflow_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('cashflow_pp', $request->pp);
        $request->session()->put('cashflow_tahun', $request->tahun);
        $request->session()->put('cashflow_bulan', $request->bulan);

        $search_arr = ['cashflow_bulan', 'cashflow_tahun'];

        $bulans = Arr::pluck($this->array_bulan, 'bulan.name', 'bulan.id');
        $datas = CashflowTotal::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('cashflow_'));

            if ($search_arr[$i] == 'cashflow_isactive') {
                if (session($search_arr[$i]) !== 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
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

        $datas = $datas->orderBy('tahun', 'desc')->orderBy('bulan', 'desc');
        $datas = $datas->latest()->paginate(session('cashflow_pp'));

        $datas->withPath('/report/cashflow'); // pagination url to

        $view = view('cashflow.partials.table', compact(['datas', 'bulans']))->with('i', (request()->input('page', 1) - 1) * session('cashflow_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create()
    {
        $bulans = Arr::pluck($this->array_bulan, 'bulan.name', 'bulan.id');

        return view('cashflow.create', compact(['bulans']));
    }

    public function store(Request $request)
    {
        // $ct = CashflowTotal::find(Crypt::decrypt($request->cashflow));
        $groups = CashflowGroup::where('isactive', 1)->orderBy('urutan')->get();
        $product_id = 1;
        $tahun = $request->tahun ? $request->tahun : date('Y');
        $bulan = $request->bulan == 'all' ? date('n') : $request->bulan;

        $ct = $this->updateCashflow($product_id, $tahun, $bulan, $groups);

        return redirect()->route('cashflow.edit', Crypt::encrypt($ct->id));
    }

    public function show(Request $request): View
    {
        $datas = CashflowSubtotal::where('cashflow_subtotals.cashflow_total_id', Crypt::decrypt($request->cashflow))
            ->join('cashflows', 'cashflows.id', 'cashflow_subtotals.cashflow_id')
            ->join('cashflow_groups', 'cashflow_groups.id', 'cashflows.cashflow_group_id')
            ->select('cashflow_subtotals.*', 'cashflow_groups.nama as nama_group', 'cashflow_groups.urutan as urutan_group', 'cashflows.subgroup as nama_subgroup')
            ->orderBy('cashflow_subtotals.cashflow_id')
            ->get();
        $cfgroups = CashflowGroup::where('isactive', 1)->orderBy('urutan')->get();
        $bulan = $this->array_bulan[$datas[0]->bulan - 1]['bulan']['name'];
        $tahun = $datas[0]->tahun;
        $kas_awal = CashflowTotal::where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->where('isclosed', 1)
            ->value('kas_awal');

        return view('cashflow.show', compact(['bulan', 'tahun', 'datas', 'cfgroups', 'kas_awal']));
    }

    public function edit(Request $request): View
    {
        $datas = CashflowSubtotal::where('cashflow_subtotals.cashflow_total_id', Crypt::decrypt($request->cashflow))
            ->join('cashflows', 'cashflows.id', 'cashflow_subtotals.cashflow_id')
            ->join('cashflow_groups', 'cashflow_groups.id', 'cashflows.cashflow_group_id')
            ->select('cashflow_subtotals.*', 'cashflow_groups.nama as nama_group', 'cashflow_groups.urutan as urutan_group', 'cashflows.subgroup as nama_subgroup')
            ->orderBy('cashflow_subtotals.cashflow_id')
            ->get();
        $cfgroups = CashflowGroup::where('isactive', 1)->orderBy('urutan')->get();
        $bulan = $this->array_bulan[$datas[0]->bulan - 1]['bulan']['name'];
        $tahun = $datas[0]->tahun;
        $kas_awal = CashflowTotal::where('tahun', $tahun)
            ->where('bulan', $bulan)
            ->where('isclosed', 1)
            ->value('kas_awal');

        return view('cashflow.edit', compact(['bulan', 'tahun', 'datas', 'cfgroups', 'kas_awal']));
    }

    public function update(Request $request, string $id)
    {
        $ct = CashflowTotal::find(Crypt::decrypt($request->cashflow));
        $groups = CashflowGroup::where('isactive', 1)->orderBy('urutan')->get();
        $product_id = 1;
        $tahun = $ct->tahun ? $ct->tahun : date('Y');
        $bulan = $ct->bulan == 'all' ? date('n') : $ct->bulan;

        $ct = $this->updateCashflow($product_id, $tahun, $bulan, $groups);

        return redirect()->route('cashflow.edit', Crypt::encrypt($ct->id));
    }

    public function destroy(string $id)
    {
        //
    }

    public function updateCashflow($product_id, $tahun, $bulan, $groups)
    {
        $post_totals = 0;
        $totals = 0;

        $ct = CashflowTotal::updateOrCreate(
            [
                'product_id' => $product_id,
                'tahun' => $tahun,
                'bulan' => $bulan,
            ],
            [
                'product_id' => $product_id,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kas_awal' => 0,
                'kas_akhir' => $post_totals,
            ]
        );

        foreach ($groups as $group) {
            $posts = Cashflow::where('isactive', 1)->where('cashflow_group_id', $group->id)->orderBy('urutan')->get();
            $subtotals = 0;

            foreach ($posts as $post) {
                $post_totals = 0;

                switch ($post->kode) {
                    case 'CF11':
                        $post_totals = DB::table('sale_orders')
                            ->whereYear('tanggal', $tahun)
                            ->whereMonth('tanggal', $bulan)
                            ->where('kode_cashflow', 'CF11')
                            ->where('isactive', 1)
                            ->sum('total_harga');

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF12':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF13':
                        $post_totals = DB::table('purchase_orders')
                            ->whereYear('tanggal', $tahun)
                            ->whereMonth('tanggal', $bulan)
                            ->where('kode_cashflow', 'CF13')
                            ->where('isactive', 1)
                            ->sum('total_harga');

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF14':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF15':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF21':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF22':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF31':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    case 'CF32':
                        $post_totals = 0;

                        $pt = CashflowSubtotal::updateOrCreate(
                            [
                                'cashflow_total_id' => $ct->id,
                                'cashflow_id' => $post->id,
                            ],
                            [
                                'cashflow_total_id' => $ct->id,
                                'product_id' => $product_id,
                                'cashflow_id' => $post->id,
                                'tahun' => $tahun,
                                'bulan' => $bulan,
                                'nominal' => $post_totals * $post->pengali,
                            ]
                        );
                        break;

                    default:
                        break;
                }

                $subtotals += $post_totals * $post->pengali;
            }

            $totals += $subtotals;
        }

        $ct = CashflowTotal::updateOrCreate(
            [
                'product_id' => $product_id,
                'tahun' => $tahun,
                'bulan' => $bulan,
            ],
            [
                'product_id' => $product_id,
                'tahun' => $tahun,
                'bulan' => $bulan,
                'kas_awal' => 0,
                'kas_akhir' => $totals,
            ]
        );

        return $ct;
    }
}
