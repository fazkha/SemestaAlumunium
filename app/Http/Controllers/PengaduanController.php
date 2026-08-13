<?php

namespace App\Http\Controllers;

use App\Http\Requests\PengaduanRequest;
use App\Models\Customer;
use App\Models\JenisPelayanan;
use App\Models\KalenderHke;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\Profile;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PengaduanController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pengaduan-list', only: ['index', 'fetch']),
            new Middleware('permission:pengaduan-create', only: ['create', 'store']),
            new Middleware('permission:pengaduan-edit', only: ['edit', 'update']),
            new Middleware('permission:pengaduan-show', only: ['show']),
            new Middleware('permission:pengaduan-delete', only: ['delete', 'destroy']),
        ];
    }

    public function index(Request $request)
    {
        if (!$request->session()->exists('pengaduan_pp')) {
            $request->session()->put('pengaduan_pp', config('custom.list_per_page_opt_1'));
        }
        if (!$request->session()->exists('pengaduan_isactive')) {
            $request->session()->put('pengaduan_isactive', 'all');
        }
        if (!$request->session()->exists('pengaduan_user_id')) {
            $request->session()->put('pengaduan_user_id', 'all');
        }
        if (!$request->session()->exists('pengaduan_aduan')) {
            $request->session()->put('pengaduan_aduan', '_');
        }

        $search_arr = ['pengaduan_isactive', 'pengaduan_user_id', 'pengaduan_aduan'];

        $users = User::orderBy('name')->pluck('name', 'id');
        $datas = Pengaduan::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('pengaduan_'));

            if ($search_arr[$i] == 'pengaduan_isactive' || $search_arr[$i] == 'pengaduan_user_id') {
                if (session($search_arr[$i]) != 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } else {
                    $like = '%' . session($search_arr[$i]) . '%';
                    $datas = $datas->where($field, 'LIKE', $like);
                }
            }
        }

        $datas = $datas->where('user_id', auth()->user()->id);
        $datas = $datas->latest()->paginate(session('pengaduan_pp'));

        if ($request->page && $datas->count() == 0) {
            return redirect()->route('dashboard');
        }

        return view('pengaduan.index', compact(['datas', 'users']))->with('i', (request()->input('page', 1) - 1) * session('pengaduan_pp'));
    }

    public function fetchdb(Request $request): JsonResponse
    {
        $request->session()->put('pengaduan_pp', $request->pp);
        $request->session()->put('pengaduan_isactive', $request->isactive);
        $request->session()->put('pengaduan_user_id', $request->user);
        $request->session()->put('pengaduan_aduan', $request->aduan);

        $search_arr = ['pengaduan_isactive', 'pengaduan_user_id', 'pengaduan_aduan'];

        $users = User::orderBy('name')->pluck('name', 'id');
        $datas = Pengaduan::query();

        for ($i = 0; $i < count($search_arr); $i++) {
            $field = substr($search_arr[$i], strlen('pengaduan_'));

            if ($search_arr[$i] == 'pengaduan_isactive' || $search_arr[$i] == 'pengaduan_user_id') {
                if (session($search_arr[$i]) != 'all') {
                    $datas = $datas->where([$field => session($search_arr[$i])]);
                }
            } else {
                if (session($search_arr[$i]) == '_' or session($search_arr[$i]) == '') {
                } else {
                    $like = '%' . session($search_arr[$i]) . '%';
                    $datas = $datas->where($field, 'LIKE', $like);
                }
            }
        }

        $datas = $datas->where('user_id', auth()->user()->id);
        $datas = $datas->latest()->paginate(session('pengaduan_pp'));

        $datas->withPath('/service/complaint'); // pagination url to

        $view = view('pengaduan.partials.table', compact(['datas', 'users']))->with('i', (request()->input('page', 1) - 1) * session('pengaduan_pp'))->render();

        if ($view) {
            return response()->json($view, 200);
        } else {
            return response()->json(null, 400);
        }
    }

    public function create(): View
    {
        $branch_id = auth()->user()->profile->branch_id;
        $user_id = auth()->user()->id;
        $user_name = auth()->user()->name;
        $users = User::where('approved', 1)->orderBy('name')->pluck('name', 'id');

        return view('pengaduan.create', compact(['user_id', 'user_name', 'branch_id']));
    }

    public function store(PengaduanRequest $request): RedirectResponse
    {
        $product_id = 1;
        $image = $request->file('gambar');

        if ($request->validated()) {
            $lokasi = $this->GetLokasiUpload();
            $pathym = $lokasi['path'] . '/' . $lokasi['ym'];
            $imageName = NULL;

            if ($image) {
                $imageName = $image->hashName();
            }

            $pengaduan = Pengaduan::create([
                'branch_id' => $request->branch_id,
                'product_id' => $product_id,
                'user_id' => $request->user_id,
                'aduan' => $request->aduan,
                'tanggal' => $request->tanggal,
                'lokasi' => is_null($image) ? NULL : $pathym,
                'gambar' => is_null($image) ? NULL : $imageName,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'created_by' => auth()->user()->email,
                'updated_by' => auth()->user()->email,
            ]);

            if (!is_null($image)) {
                $dest = $this->compress_image($image, $image->path(), public_path($pathym), $imageName, 70);
            }

            if ($pengaduan) {
                return redirect()->back()->with('success', __('messages.successadded') . ' 👉 ' . $pengaduan->user->name);
            }
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while saving!');
    }

    public function show(Request $request): View
    {
        $datas = Pengaduan::find(Crypt::decrypt($request->complaint));

        return view('pengaduan.show', compact(['datas']));
    }

    public function edit(Request $request): View
    {
        $datas = Pengaduan::find(Crypt::decrypt($request->complaint));

        return view('pengaduan.edit', compact(['datas']));
    }

    public function update(PengaduanRequest $request): RedirectResponse
    {
        $pengaduan = Pengaduan::find(Crypt::decrypt($request->complaint));
        $image = $request->file('gambar');

        if ($request->validated()) {
            $imageName = $pengaduan->gambar;
            $deleteName = $pengaduan->gambar;
            $deletePath = $pengaduan->lokasi;

            $lokasi = $this->GetLokasiUpload();
            $pathym = $lokasi['path'] . '/' . $lokasi['ym'];

            if (!is_null($image)) {
                $imageName = $image->hashName();
                File::delete(public_path($deletePath) . '/' . $deleteName);
            }

            $pengaduan->update([
                'aduan' => $request->aduan,
                'tanggal' => $request->tanggal,
                'isactive' => ($request->isactive == 'on' ? 1 : 0),
                'lokasi' => is_null($image) ? $pengaduan->lokasi : $pathym,
                'gambar' => is_null($image) ? $pengaduan->gambar : $imageName,
                'updated_by' => auth()->user()->email,
            ]);

            if (!is_null($image)) {
                $dest = $this->compress_image($image, $image->path(), public_path($pathym), $imageName, 70);
            }

            return redirect()->back()->with('success', __('messages.successupdated') . ' 👉 ' . $pengaduan->user->name);
        } else {
            return redirect()->back()->withInput()->with('error', 'Error occured while updating!');
        }
    }

    public function forwardAction(Request $request): RedirectResponse
    {
        $pengaduan = Pengaduan::find(Crypt::decrypt($request->complaint));

        $profile = Profile::where('user_id', $pengaduan->user_id)->first();
        $product_id = 1;
        $branch_id = auth()->user()->profile->branch_id;
        $customer_id = Customer::where('branch_link_id', $profile->branch_id)->value('id');
        $jenis_pelayanan_id = JenisPelayanan::where('nama', 'Inspeksi')->value('id');
        $petugas_id = Pegawai::where('email', auth()->user()->email)->value('id');
        $hke = KalenderHke::where('tanggal', date('Y-m-d'))->value('hke');

        if ($pengaduan && $customer_id && $petugas_id) {
            $sro = ServiceOrder::create([
                'branch_id' => $branch_id,
                'customer_id' => $customer_id,
                'jenis_pelayanan_id' => $jenis_pelayanan_id,
                'petugas_id' => $petugas_id,
                'product_id' => $product_id,
                'hke' => $hke,
                'tanggal' => date('Y-m-d'),
                'keterangan' => $pengaduan->aduan,
                'isactive' => 1,
                'created_by' => auth()->user()->email,
                'updated_by' => auth()->user()->email,
                'approved' => (config('custom.sale_approval') == false) ? 1 : 0,
                'approved_by' => (config('custom.sale_approval') == false) ? 'system' : NULL,
                'approved_at' => (config('custom.sale_approval') == false) ? date('Y-m-d H:i:s') : NULL,
            ]);

            $pengaduan->update([
                'isactive' => 0
            ]);

            return redirect()->route('inspect.edit', Crypt::encrypt($sro->id));
        }

        return redirect()->back()->withInput()->with('error', 'Error occured while saving!');
    }

    public function delete(Request $request): View
    {
        $pengaduan = Pengaduan::find(Crypt::decrypt($request->complaint));

        $datas = $pengaduan;

        return view('pengaduan.delete', compact(['datas']));
    }

    public function destroy(Request $request): RedirectResponse
    {
        $pengaduan = Pengaduan::find(Crypt::decrypt($request->complaint));

        $deleteName = $pengaduan->gambar ? $pengaduan->gambar : NULL;
        $deletePath = $pengaduan->lokasi ? $pengaduan->lokasi : NULL;

        try {
            $pengaduan->delete();
            if ($deleteName && $deletePath) {
                File::delete(public_path($deletePath) . '/' . $deleteName);
            }
        } catch (\Illuminate\Database\QueryException $e) {
            if (str_contains($e->getMessage(), 'Integrity constraint violation')) {
                return redirect()->route('complaint.index')->with('error', 'Integrity constraint violation');
            }
            return redirect()->route('complaint.index')->with('error', $e->getMessage());
        }

        return redirect()->route('complaint.index')
            ->with('success', __('messages.successdeleted') . ' 👉 ' . $pengaduan->user->name);
    }

    public function compress_image($image, $src, $dest, $filename, $quality)
    {
        $info = getimagesize($src);
        $targetWidth = 360; // 540, 720
        $targetHeight = 640; // 960, 1280

        if ($info['mime'] == 'image/jpeg' || $info['mime'] == 'image/jpg') {
            $image = imagecreatefromjpeg($src);

            $srcWidth = imagesx($image);
            $srcHeight = imagesy($image);

            $srcRatio = $srcWidth / $srcHeight;
            $targetRatio = $targetWidth / $targetHeight;

            if ($srcRatio > $targetRatio) {
                // crop kiri kanan
                $newHeight = $srcHeight;
                $newWidth = $srcHeight * $targetRatio;
                $srcX = ($srcWidth - $newWidth) / 2;
                $srcY = 0;
            } else {
                // crop atas bawah
                $newWidth = $srcWidth;
                $newHeight = $srcWidth / $targetRatio;
                $srcX = 0;
                $srcY = ($srcHeight - $newHeight) / 2;
            }

            $newImage = imagecreatetruecolor($targetWidth, $targetHeight);
            imagecopyresampled(
                $newImage,
                $image,
                0,
                0,
                $srcX,
                $srcY,
                $targetWidth,
                $targetHeight,
                $newWidth,
                $newHeight
            );

            $pathfile = $dest . '/' . $filename;
            imagejpeg($newImage, $pathfile, $quality);
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
        // $compressed = compress_image('boy.jpg', 'destination.jpg', 70);
        //return destination file
        return $dest;
    }

    public function GetLokasiUpload()
    {
        $path = 'storage/uploads/pengaduan';
        $ym = date('Ym');
        $dir = $path . '/' . $ym;
        $is_dir = is_dir($dir);

        if (!$is_dir) {
            mkdir($dir, 0755);
        }

        return ['path' => $path, 'ym' => $ym];
    }
}
