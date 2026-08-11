<?php

namespace App\Console\Commands;

use App\Models\Barang;
use App\Models\Notif;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:check-minimum-stock')]
#[Description('Command description')]

class CheckMinimumStock extends Command
{
    public function handle()
    {
        Barang::query()
            ->whereColumn('stock', '<', 'minstock')
            ->each(function ($barang) {

                Notif::updateOrCreate(
                    [
                        'table'         => 'barangs',
                        'row_id'        => $barang->id,
                    ],
                    [
                        'title'         => 'Peringatan Stok Minimal',
                        'message'       => 'Stok barang ' . $barang->nama . ' sudah berada di bawah batas minimal jumlah stok.',
                        'table'         => 'barangs',
                        'row_id'        => $barang->id,
                        'isactive'      => 1,
                        'tanggal_awal'  => now(),
                        'tanggal_akhir' => now()->addDays(3),
                        'created_by'    => 'scheduler',
                        'created_at'    => now(),
                    ]
                );
            });

        $safeProductIds = Barang::whereColumn('stock', '>', 'minstock')->pluck('id');

        Notif::where('table', 'barangs')
            ->whereIn('row_id', $safeProductIds)
            ->delete();

        $this->info('Minimum stock checking completed.');

        return self::SUCCESS;
    }
}
