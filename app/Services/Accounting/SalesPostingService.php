<?php

namespace App\Services\Accounting;

use App\Models\AppSetting;
use App\Models\SaleOrder;
use App\Models\SaleOrderDetail;

class SalesPostingService
{
    protected JournalService $journalService;

    public function post(SaleOrder $sale)
    {
        $total_hpp = SaleOrderDetail::join('barangs', 'barangs.id', 'sale_order_details.barang_id')
            ->where('sale_order_details.sale_order_id', $sale->id)
            ->sum('barangs.hpp');

        switch ($sale->tunai) {
            // kredit
            case '2':
                $details = [
                    [
                        'account_id' => AppSetting::where('parm', 'receivable_acct')->value('value'),
                        'debit' => $sale->total_harga,
                        'credit' => 0,
                    ],
                ];
                break;

            // bank
            case '3':
                $details = [
                    [
                        'account_id' => AppSetting::where('parm', 'bank_acct')->value('value'),
                        'debit' => $sale->total_harga,
                        'credit' => 0,
                    ],
                ];
                break;

            // kas
            default:
                $details = [
                    [
                        'account_id' => AppSetting::where('parm', 'cash_acct')->value('value'),
                        'debit' => $sale->total_harga,
                        'credit' => 0,
                    ],
                ];
                break;
        }

        $details[] = [
            [
                'account_id' => AppSetting::where('parm', 'penjualan_acct')->value('value'),
                'debit' => 0,
                'credit' => $sale->total_harga - $sale->biaya_angkutan,
            ],
            [
                'account_id' => AppSetting::where('parm', 'hpp_acct')->value('value'),
                'debit' => $total_hpp,
                'credit' => 0,
            ],
            [
                'account_id' => AppSetting::where('parm', 'persediaan_acct')->value('value'),
                'debit' => 0,
                'credit' => $total_hpp,
            ],
        ];

        return $this->journalService->createJournal(
            $sale->tanggal,
            'Penjualan #' . $sale->no_order,
            'sale',
            $sale->id,
            $details
        );
    }
}
