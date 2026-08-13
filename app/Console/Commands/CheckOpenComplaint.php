<?php

namespace App\Console\Commands;

use App\Models\Barang;
use App\Models\Notif;
use App\Models\Pengaduan;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:check-open-complaint')]
#[Description('Command description')]

class CheckOpenComplaint extends Command
{
    public function handle()
    {
        Pengaduan::query()
            ->where('isactive', 1)
            ->orderBy('tanggal')
            ->each(function ($pengaduan) {

                Notif::updateOrCreate(
                    [
                        'table'         => 'pengaduans',
                        'row_id'        => $pengaduan->id,
                    ],
                    [
                        'title'         => 'Pengaduan dari ' . $pengaduan->user->name . ' (' . $pengaduan->user->profile->branch->kode . ')',
                        'message'       => $pengaduan->aduan,
                        'tema'          => 'Pengaduan',
                        'tabel'         => 'pengaduans',
                        'row_id'        => $pengaduan->id,
                        'isactive'      => 1,
                        'tanggal_awal'  => now(),
                        'tanggal_akhir' => now()->addDays(3),
                        'created_by'    => 'scheduler',
                        'created_at'    => now(),
                    ]
                );
            });

        $closedIds = Pengaduan::where('isactive', 0)->pluck('id');

        Notif::where('table', 'pengaduans')
            ->whereIn('row_id', $closedIds)
            ->delete();

        $this->info('Open Complaint checking completed.');

        return self::SUCCESS;
    }
}
