<?php

namespace App\Http\Controllers;

use App\Models\Brandivjabpeg;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BrandivjabpegController extends Controller
{
    public function storeJabatan(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'brandivjab_id' => ['required', 'exists:brandivjabs,id'],
            'pegawai_id' => ['required', 'exists:pegawais,id'],
            'tanggal_mulai' => ['nullable'],
            'tanggal_akhir' => ['nullable'],
            'keterangan' => ['nullable', 'string', 'max:200'],
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();

            foreach ($errors->all() as $message) {
                return response()->json([
                    'status' => 'Error Validation',
                ], 400);
            }
        }

        $jabatan = Brandivjabpeg::create([
            'brandivjab_id' => $request->brandivjab_id,
            'pegawai_id' => $request->pegawai_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'keterangan' => $request->keterangan,
            'isactive' => $request->isactive,
            'created_by' => auth()->user()->email,
            'updated_by' => auth()->user()->email,
        ]);

        if ($jabatan) {
            $details = Brandivjabpeg::where('brandivjabpegs.pegawai_id', $request->pegawai_id)
                ->join('brandivjabs', 'brandivjabs.id', 'brandivjabpegs.brandivjab_id')
                ->join('branches', 'branches.id', 'brandivjabs.branch_id')
                ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
                ->leftJoin('divisions', 'divisions.id', 'brandivjabs.division_id')
                ->selectRaw('brandivjabpegs.*, jabatans.nama as nama_jabatan, brandivjabs.keterangan as keterangan_jabatan, brandivjabs.division_id, divisions.nama as nama_division, branches.nama as nama_cabang, branches.kode as kode_cabang')
                ->orderBy('brandivjabpegs.tanggal_mulai', 'desc')
                ->get();
            $viewMode = false;

            $view = view('pegawai.partials.details', compact(['details', 'viewMode']))->render();

            return response()->json([
                'view' => $view,
            ], 200);
        }

        return response()->json([
            'status' => 'Not Found',
        ], 400);
    }

    public function deleteJabatan(Request $request): JsonResponse
    {
        $detail = Brandivjabpeg::find($request->jabatan);
        $pegawai = Pegawai::where('id', $detail->pegawai_id)->get();

        $pegawai_id = $detail->pegawai_id;
        $view = [];

        $detail->update([
            'isactive' => 3,
            'tanggal_akhir' => $detail->tanggal_akhir ? $detail->tanggal_akhir : date('Y-m-d'),
        ]);

        // try {
        //     $detail->delete();
        // } catch (\Illuminate\Database\QueryException $e) {
        //     return response()->json(['status' => 'Not Found'], 404);
        // }

        $details = Brandivjabpeg::where('pegawai_id', $pegawai_id)->orderBy('tanggal_mulai', 'desc')->get();
        $viewMode = true;

        if ($details->count() > 0) {
            $view = view('pegawai.partials.details', compact(['details', 'viewMode']))->render();
        }

        if ($view) {
            return response()->json([
                'view' => $view,
            ], 200);
        } else {
            return response()->json([
                'status' => 'Not Found',
            ], 200);
        }
    }
}
