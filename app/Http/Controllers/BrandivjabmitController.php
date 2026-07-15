<?php

namespace App\Http\Controllers;

use App\Models\Brandivjabmit;
use App\Models\Mitra;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class BrandivjabmitController extends Controller
{
    public function storeJabatan(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'brandivjab_id' => ['required', 'exists:brandivjabs,id'],
            'mitra_id' => ['required', 'exists:mitras,id'],
            'gerobak_id' => ['required', 'exists:mysql2.gerobaks,id'],
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

        $jabatan = Brandivjabmit::create([
            'brandivjab_id' => $request->brandivjab_id,
            'mitra_id' => $request->mitra_id,
            'gerobak_id' => $request->gerobak_id,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir,
            'keterangan' => $request->keterangan,
            'isactive' => $request->isactive,
            'created_by' => auth()->user()->email,
            'updated_by' => auth()->user()->email,
        ]);

        if ($jabatan) {
            $details = Brandivjabmit::where('brandivjabmits.mitra_id', $request->mitra_id)
                ->join('brandivjabs', 'brandivjabs.id', 'brandivjabmits.brandivjab_id')
                ->join('branches', 'branches.id', 'brandivjabs.branch_id')
                ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
                ->join('larisma7_jualankeliling.gerobaks', 'larisma7_jualankeliling.gerobaks.id', 'brandivjabmits.gerobak_id')
                ->leftJoin('divisions', 'divisions.id', 'brandivjabs.division_id')
                ->selectRaw('brandivjabmits.*, larisma7_jualankeliling.gerobaks.kode as kode_gerobak, jabatans.nama as nama_jabatan, brandivjabs.keterangan as keterangan_jabatan, brandivjabs.division_id, divisions.nama as nama_division, branches.nama as nama_cabang, branches.kode as kode_cabang')
                ->orderBy('brandivjabmits.tanggal_mulai', 'desc')
                ->get();
            $viewMode = false;

            $view = view('mitra.partials.details', compact(['details', 'viewMode']))->render();

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
        $detail = Brandivjabmit::find($request->jabatan);
        $mitra = Mitra::where('id', $detail->mitra_id)->get();

        $mitra_id = $detail->mitra_id;
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

        $details = Brandivjabmit::where('mitra_id', $mitra_id)->orderBy('tanggal_mulai', 'desc')->get();
        $viewMode = true;

        if ($details->count() > 0) {
            $view = view('mitra.partials.details', compact(['details', 'viewMode']))->render();
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
