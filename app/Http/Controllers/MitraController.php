<?php

namespace App\Http\Controllers;

use App\Models\Brandivjab;
use App\Models\Branch;
use App\Models\Jabatan;
use App\Models\Mitra;
use App\Models\User;
use App\Models\Brandivjabmit;
use App\Models\MitraGaji;
use App\Http\Requests\MitraRequest;
use App\Models\Gerobak;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class MitraController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pegawai-list', only: ['index', 'fetch']),
            new Middleware('permission:pegawai-create', only: ['create', 'store']),
            new Middleware('permission:pegawai-edit', only: ['edit', 'update']),
            new Middleware('permission:pegawai-show', only: ['show']),
            new Middleware('permission:pegawai-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('mitra_pp')) {
            $request->session()->put('mitra_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('mitra_isactive')) {
            $request->session()->put('mitra_isactive', 'all');
        }
        if (!$request->session()->exists('mitra_kelamin')) {
            $request->session()->put('mitra_kelamin', 'all');
        }
        if (!$request->session()->exists('mitra_cabang_id')) {
            $request->session()->put('mitra_cabang_id', 'all');
        }
        if (!$request->session()->exists('mitra_jabatan_id')) {
            $request->session()->put('mitra_jabatan_id', 'all');
        }
        if (!$request->session()->exists('mitra_nama_lengkap')) {
            $request->session()->put('mitra_nama_lengkap', '_');
        }
        if (!$request->session()->exists('mitra_alamat_tinggal')) {
            $request->session()->put('mitra_alamat_tinggal', '_');
        }
        if (!$request->session()->exists('mitra_telpon')) {
            $request->session()->put('mitra_telpon', '_');
        }

        $search_arr = ['mitra_isactive', 'mitra_kelamin', 'mitra_nama_lengkap', 'mitra_alamat_tinggal', 'mitra_telpon', 'mitra_cabang_id', 'mitra_jabatan_id'];

        $cabangs = Branch::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $jabatans = Jabatan::where('isactive', 1)->orderBy('islevel')->pluck('nama', 'id');
        $datas = Mitra::query();
        $datas = $datas->select('mitras.*', 'branches.nama as nama_cabang', 'larisma7_jualankeliling.gerobaks.kode as kode_gerobak')
            ->leftJoin('brandivjabmits', function ($join) {
                $join->on('brandivjabmits.mitra_id', '=', 'mitras.id')
                    ->where('brandivjabmits.isactive', 1);
            })
            ->leftJoin('brandivjabs', 'brandivjabs.id', 'brandivjabmits.brandivjab_id')
            ->leftJoin('branches', 'branches.id', 'brandivjabs.branch_id')
            ->leftJoin('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->leftJoin('larisma7_jualankeliling.gerobaks', 'brandivjabmits.gerobak_id', 'larisma7_jualankeliling.gerobaks.id')
            ->orderByRaw('jabatans.islevel, mitras.nama_lengkap');
        // ->groupByRaw('brandivjabs.jabatan_id, brandivjabs.branch_id, mitras.id, jabatans.islevel, mitras.nama_lengkap')

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = 'mitras.' . substr($search_arr[$i], strlen('mitra_'));

            if ($search_arr[$i] == 'mitra_isactive' || $search_arr[$i] == 'mitra_kelamin' || $search_arr[$i] == 'mitra_cabang_id' || $search_arr[$i] == 'mitra_jabatan_id') {
                if (session($search_arr[$i]) != 'all') {
                    if ($search_arr[$i] == 'mitra_cabang_id' || $search_arr[$i] == 'mitra_jabatan_id') {
                    } else {
                        $datas = $datas->where([$field => session($search_arr[$i])]);
                    }
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
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

        $datas = $datas->latest()->paginate(session('mitra_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('mitra.index', compact(['datas', 'cabangs', 'jabatans']))->with('i', (request()->input('page', 1) - 1) * session('mitra_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('mitra_pp', $request->pp);
        $request->session()->put('mitra_isactive', $request->isactive);
        $request->session()->put('mitra_kelamin', $request->kelamin);
        $request->session()->put('mitra_cabang_id', $request->cabang);
        $request->session()->put('mitra_jabatan_id', $request->jabatan);
        $request->session()->put('mitra_nama_lengkap', $request->nama_lengkap);
        $request->session()->put('mitra_alamat_tinggal', $request->alamat_tinggal);
        $request->session()->put('mitra_telpon', $request->telpon);

        $search_arr = ['mitra_isactive', 'mitra_kelamin', 'mitra_nama_lengkap', 'mitra_alamat_tinggal', 'mitra_telpon', 'mitra_cabang_id', 'mitra_jabatan_id'];

        $cabangs = Branch::where('isactive', 1)->orderBy('nama')->pluck('nama', 'id');
        $jabatans = Jabatan::where('isactive', 1)->orderBy('islevel')->pluck('nama', 'id');
        $datas = Mitra::query();
        $datas = $datas->select('mitras.*', 'branches.nama as nama_cabang', 'larisma7_jualankeliling.gerobaks.kode as kode_gerobak')
            ->leftJoin('brandivjabmits', function ($join) {
                $join->on('brandivjabmits.mitra_id', '=', 'mitras.id')
                    ->where('brandivjabmits.isactive', 1);
            })
            ->leftJoin('brandivjabs', 'brandivjabs.id', 'brandivjabmits.brandivjab_id')
            ->leftJoin('branches', 'branches.id', 'brandivjabs.branch_id')
            ->leftJoin('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->leftJoin('larisma7_jualankeliling.gerobaks', 'brandivjabmits.gerobak_id', 'larisma7_jualankeliling.gerobaks.id')
            ->orderByRaw('jabatans.islevel, mitras.nama_lengkap');
        // ->groupByRaw('brandivjabs.jabatan_id, brandivjabs.branch_id, mitras.id, jabatans.islevel, mitras.nama_lengkap')

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = 'mitras.' . substr($search_arr[$i], strlen('mitra_'));

            if ($search_arr[$i] == 'mitra_isactive' || $search_arr[$i] == 'mitra_kelamin' || $search_arr[$i] == 'mitra_cabang_id' || $search_arr[$i] == 'mitra_jabatan_id') {
                if (session($search_arr[$i]) != 'all') {
                    if ($search_arr[$i] == 'mitra_cabang_id') {
                        $datas = $datas->where('brandivjabs.branch_id', session($search_arr[$i]));
                    } else if ($search_arr[$i] == 'mitra_jabatan_id') {
                        $datas = $datas->where('brandivjabs.jabatan_id', session($search_arr[$i]));
                    } else {
                        $datas = $datas->where([$field => session($search_arr[$i])]);
                    }
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
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

        $datas = $datas->latest()->paginate(session('mitra_pp'));

        $datas->withPath('/human-resource/mitra'); // pagination url to

        $view = view('mitra.partials.table', compact(['datas', 'cabangs', 'jabatans']))->with('i', (request()->input('page', 1) - 1) * session('mitra_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create(): View
    {
        return view('mitra.create');
    }

    public function store(MitraRequest $request): RedirectResponse
    {
        if ($request->validated()) {
            $mitra = Mitra::create([
                'nama_lengkap' => ucfirst($request->nama_lengkap),
                'nama_panggilan' => ucfirst($request->nama_panggilan),
                'alamat_asal' => $request->alamat_asal,
                'alamat_tinggal' => $request->alamat_tinggal,
                'telpon' => $request->telpon,
                'kelamin' => $request->kelamin,
                'email' => $request->email,
                'nik' => $request->nik,
                'nip' => $request->nip,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'keterangan' => $request->keterangan,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'created_by' => auth()->user()->email,
                'updated_by' => auth()->user()->email,
            ]);

            if ($mitra) {
                return redirect()->route('mitra.edit', Crypt::encrypt($mitra->id))->with('success', __('messages.successadded') . ' 👉 ' . $request->nama_lengkap);
            }
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while saving!');
    }

    public function show(Request $request): View
    {
        $datas = Mitra::find(Crypt::decrypt($request->mitra));
        $details = Brandivjabmit::where('mitra_id', Crypt::decrypt($request->mitra))->orderBy('tanggal_mulai', 'desc')->get();

        return view('mitra.show', compact(['datas', 'details']));
    }

    public function edit(Request $request): View
    {
        $datas = Mitra::find(Crypt::decrypt($request->mitra));
        $penggajian = MitraGaji::find(Crypt::decrypt($request->mitra));
        $details = Brandivjabmit::where('brandivjabmits.mitra_id', Crypt::decrypt($request->mitra))
            ->join('brandivjabs', 'brandivjabs.id', 'brandivjabmits.brandivjab_id')
            ->join('branches', 'branches.id', 'brandivjabs.branch_id')
            ->join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->leftJoin('divisions', 'divisions.id', 'brandivjabs.division_id')
            ->leftJoin('larisma7_jualankeliling.gerobaks', 'larisma7_jualankeliling.gerobaks.id', 'brandivjabmits.gerobak_id')
            ->selectRaw('brandivjabmits.*, larisma7_jualankeliling.gerobaks.kode as kode_gerobak, jabatans.nama as nama_jabatan, brandivjabs.keterangan as keterangan_jabatan, brandivjabs.division_id, divisions.nama as nama_division, branches.nama as nama_cabang, branches.kode as kode_cabang')
            ->orderBy('brandivjabmits.tanggal_mulai', 'desc')
            ->get();
        $brandivjabs = Brandivjab::join('jabatans', 'jabatans.id', 'brandivjabs.jabatan_id')
            ->join('branches', 'branches.id', 'brandivjabs.branch_id')
            ->select('brandivjabs.*')
            ->where('brandivjabs.isactive', 1)
            ->orderBy('jabatans.islevel')
            ->orderBy('jabatans.nama')
            ->orderBy('brandivjabs.keterangan')
            ->orderBy('branches.nama')
            ->get();
        $gerobaks = Gerobak::where('isactive', 1)->orderBy('id')->get();

        return view('mitra.edit', compact(['datas', 'details', 'brandivjabs', 'penggajian', 'gerobaks']));
    }

    public function update(MitraRequest $request): RedirectResponse
    {
        $mitra = Mitra::find(Crypt::decrypt($request->mitra));

        if ($request->validated()) {
            $mitra->update([
                'nama_lengkap' => ucfirst($request->nama_lengkap),
                'nama_panggilan' => ucfirst($request->nama_panggilan),
                'alamat_asal' => $request->alamat_asal,
                'alamat_tinggal' => $request->alamat_tinggal,
                'telpon' => $request->telpon,
                'kelamin' => $request->kelamin,
                'email' => $request->email,
                'nik' => $request->nik,
                'nip' => $request->nip,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'keterangan' => $request->keterangan,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'updated_by' => auth()->user()->email,
            ]);

            if ($mitra) {
                if ($mitra->isactive == 1) {
                    $user = User::where('email', $mitra->email)->first();

                    if ($user) {
                        $user->update([
                            'nama' => $mitra->nama_lengkap,
                            'approved' => 1,
                        ]);
                    }
                }

                $n_penggajian = MitraGaji::where('mitra_id', Crypt::decrypt($request->mitra))->count();
                // dd($n_penggajian);

                if ($n_penggajian > 0) {
                    $penggajian = MitraGaji::where('mitra_id', Crypt::decrypt($request->mitra));
                    $penggajian->update([
                        'gaji_pokok' => $request->gaji_pokok,
                        't1_keterangan' => $request->t1_keterangan,
                        't1_gaji' => $request->t1_gaji,
                        't2_keterangan' => $request->t2_keterangan,
                        't2_gaji' => $request->t2_gaji,
                        't3_keterangan' => $request->t3_keterangan,
                        't3_gaji' => $request->t3_gaji,
                        'rek_nama_bank' => ucfirst($request->rek_nama_bank),
                        'rek_nomor' => $request->rek_nomor,
                        'rek_nama_pemilik' => ucfirst($request->rek_nama_pemilik),
                        'updated_by' => auth()->user()->email,
                    ]);
                } else {
                    $penggajian = MitraGaji::create([
                        'mitra_id' => Crypt::decrypt($request->mitra),
                        'gaji_pokok' => $request->gaji_pokok,
                        't1_keterangan' => $request->t1_keterangan,
                        't1_gaji' => $request->t1_gaji,
                        't2_keterangan' => $request->t2_keterangan,
                        't2_gaji' => $request->t2_gaji,
                        't3_keterangan' => $request->t3_keterangan,
                        't3_gaji' => $request->t3_gaji,
                        'rek_nama_bank' => ucfirst($request->rek_nama_bank),
                        'rek_nomor' => $request->rek_nomor,
                        'rek_nama_pemilik' => ucfirst($request->rek_nama_pemilik),
                        'created_by' => auth()->user()->email,
                        'updated_by' => auth()->user()->email,
                    ]);
                }

                $lokasi = $this->GetLokasiUpload($mitra->id);
                $pathym = $lokasi['path'] . '/' . $lokasi['id'];

                $image_1 = $request->file('gambar_1_nama');
                $image_1Name = $mitra->gambar_1_nama;
                $delete_1Name = $mitra->gambar_1_nama;
                $delete_1Path = $mitra->gambar_1_lokasi;

                if ($image_1) {
                    File::delete(public_path($delete_1Path) . '/' . $delete_1Name);
                    $image_1Name = $image_1->hashName();
                    $gambar_1NamaAwal = $image_1->getClientOriginalName();

                    $mitra->update([
                        'gambar_1_lokasi' => is_null($image_1) ? NULL : $pathym,
                        'gambar_1_nama' => is_null($image_1) ? NULL : $image_1Name,
                    ]);

                    if (!is_null($image_1)) {
                        $dest = $this->compress_image($image_1, $image_1->path(), public_path($pathym), $image_1Name, 50);
                    }
                }

                $image_2 = $request->file('gambar_2_nama');
                $image_2Name = $mitra->gambar_2_nama;
                $delete_2Name = $mitra->gambar_2_nama;
                $delete_2Path = $mitra->gambar_2_lokasi;

                if ($image_2) {
                    File::delete(public_path($delete_2Path) . '/' . $delete_2Name);
                    $image_2Name = $image_2->hashName();
                    $gambar_2NamaAwal = $image_2->getClientOriginalName();

                    $mitra->update([
                        'gambar_2_lokasi' => is_null($image_2) ? NULL : $pathym,
                        'gambar_2_nama' => is_null($image_2) ? NULL : $image_2Name,
                    ]);

                    if (!is_null($image_2)) {
                        $dest = $this->compress_image($image_2, $image_2->path(), public_path($pathym), $image_2Name, 50);
                    }
                }

                $image_3 = $request->file('gambar_3_nama');
                $image_3Name = $mitra->gambar_3_nama;
                $delete_3Name = $mitra->gambar_3_nama;
                $delete_3Path = $mitra->gambar_3_lokasi;

                if ($image_3) {
                    File::delete(public_path($delete_3Path) . '/' . $delete_3Name);
                    $image_3Name = $image_3->hashName();
                    $gambar_3NamaAwal = $image_3->getClientOriginalName();

                    $mitra->update([
                        'gambar_3_lokasi' => is_null($image_3) ? NULL : $pathym,
                        'gambar_3_nama' => is_null($image_3) ? NULL : $image_3Name,
                    ]);

                    if (!is_null($image_3)) {
                        $dest = $this->compress_image($image_3, $image_3->path(), public_path($pathym), $image_3Name, 50);
                    }
                }

                $image_4 = $request->file('gambar_4_nama');
                $image_4Name = $mitra->gambar_4_nama;
                $delete_4Name = $mitra->gambar_4_nama;
                $delete_4Path = $mitra->gambar_4_lokasi;

                if ($image_4) {
                    File::delete(public_path($delete_4Path) . '/' . $delete_4Name);
                    $image_4Name = $image_4->hashName();
                    $gambar_4NamaAwal = $image_4->getClientOriginalName();

                    $mitra->update([
                        'gambar_4_lokasi' => is_null($image_4) ? NULL : $pathym,
                        'gambar_4_nama' => is_null($image_4) ? NULL : $image_4Name,
                    ]);

                    if (!is_null($image_4)) {
                        $dest = $this->compress_image($image_4, $image_4->path(), public_path($pathym), $image_4Name, 50);
                    }
                }

                $image_5 = $request->file('gambar_5_nama');
                $image_5Name = $mitra->gambar_5_nama;
                $delete_5Name = $mitra->gambar_5_nama;
                $delete_5Path = $mitra->gambar_5_lokasi;

                if ($image_5) {
                    File::delete(public_path($delete_5Path) . '/' . $delete_5Name);
                    $image_5Name = $image_5->hashName();
                    $gambar_5NamaAwal = $image_5->getClientOriginalName();

                    $mitra->update([
                        'gambar_5_lokasi' => is_null($image_5) ? NULL : $pathym,
                        'gambar_5_nama' => is_null($image_5) ? NULL : $image_5Name,
                    ]);

                    if (!is_null($image_5)) {
                        $dest = $this->compress_image($image_5, $image_5->path(), public_path($pathym), $image_5Name, 50);
                    }
                }

                return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $request->nama_lengkap);
            }
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while updating!');
    }

    public function delete(Request $request): View
    {
        $datas = Mitra::find(Crypt::decrypt($request->mitra));
        $details = Brandivjabmit::where('mitra_id', Crypt::decrypt($request->mitra))->orderBy('tanggal_mulai', 'desc')->get();

        return view('mitra.delete', compact(['datas', 'details']));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $mitra = Mitra::find(Crypt::decrypt($request->mitra));

        try {
            $mitra->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                return redirect()->route('mitra.index')->with('error', 'Integrity constraint violation');
            }
            return redirect()->route('mitra.index')->with('error', $e->getMessage());
        }

        return redirect()->route('mitra.index')
            ->with('success', __('messages.successdeleted') . ' 👉 ' . $mitra->nama_lengkap);
    }

    public function compress_image($image, $src, $dest, $filename, $quality)
    {
        $info = getimagesize($src);

        if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg') {
            $image = imagecreatefromjpeg($src);
            $pathfile = $dest . '/' . $filename;
            imagejpeg($image, $pathfile, $quality);
        } elseif ($info['mime'] == 'image/gif') {
            $image->storeAs($dest, $image->hashName());
            // $image = imagecreatefromgif($src);
            // imagejpeg($image, $dest, $quality);
        } elseif ($info['mime'] == 'image/png') {
            $image->storeAs($dest, $image->hashName());
            // $image = imagecreatefrompng($src);
            // imagepng($image, $dest, 5);
        } else {
            die('Unknown image file format');
        }

        //compress and save file to jpg
        //usage
        // $compressed = compress_image('boy.jpg', 'destination.jpg', 50);
        //return destination file
        return $dest;
    }

    public function GetLokasiUpload($id)
    {
        $path = 'storage/uploads/mitra/profile';
        $ym = date('Ym');
        // $dir = $path . '/' . $ym;
        $dir = $path . '/' . $id;
        $is_dir = is_dir($dir);

        if (!$is_dir) {
            mkdir($dir, 0755);
        }

        return [
            'path' => $path,
            'ym' => $ym,
            'id' => $id,
        ];
    }
}
