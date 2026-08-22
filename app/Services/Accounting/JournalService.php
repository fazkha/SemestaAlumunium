<?php

namespace App\Services\Accounting;

use App\Models\Journal;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class JournalService
{
    public function createJournal(
        Carbon $date,
        string $description,
        string $referenceType,
        int $referenceId,
        array $details
    ) {
        return DB::transaction(function () use (
            $date,
            $description,
            $referenceType,
            $referenceId,
            $details
        ) {

            $debit = collect($details)->sum('debit');
            $credit = collect($details)->sum('credit');

            if ($debit != $credit) {
                throw new Exception(
                    'Journal debit and credit are not balanced.'
                );
            }

            $journal = Journal::create([
                'journal_no' => $this->generateJournalNumber(),
                'journal_date' => $date,
                'description' => $description,
                'reference_type' => $referenceType,
                'reference_id' => $referenceId,
                'status' => 'posted',
            ]);

            foreach ($details as $detail) {
                $journal->details()->create([
                    'account_id' => $detail['account_id'],
                    'debit' => $detail['debit'],
                    'credit' => $detail['credit'],
                    'description' => $detail['description'] ?? null,
                ]);
            }

            return $journal;
        });
    }

    public function generateJournalNumber()
    {
        return '-random-';
    }
}
