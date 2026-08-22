<?php

namespace App\Services\Accounting;

use App\Models\PurchaseOrder;

class PurchasePostingService
{
    public function post(PurchaseOrder $purchase)
    {
        $details = [
            [
                'account_id' => $inventoryAccountId,
                'debit' => $purchase->total,
                'credit' => 0,
            ],
            [
                'account_id' => $payableAccountId,
                'debit' => 0,
                'credit' => $purchase->total,
            ],
        ];

        return $this->journalService->createJournal(
            $purchase->date,
            'Pembelian #' . $purchase->invoice_no,
            'purchase',
            $purchase->id,
            $details
        );
    }
}
