<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // branch_id = 73 = Semesta Alumunium
        $branch_id = 73;

        $profile = Profile::create([
            'user_id' => $user->id,
            'branch_id' => $branch_id,
            'jabatan_id' => 2,
            'site' => 'SAL',
            'tanggal_gabung' => date('Y-m-d'),
            'isactive' => 1,
            'app_version' => config('custom.product_name') . '-' . config('custom.version'),
            'created_by' => 'self-register',
            'updated_by' => 'self-register',
        ]);

        // $pegawai = Pegawai::create([
        //     'nama_lengkap' => $request->name,
        //     'nama_panggilan' => $request->name,
        //     'alamat_tinggal' => '-',
        //     'telpon' => '-',
        //     'kelamin' => 'L',
        //     'email' => $request->email,
        //     'isactive' => 0,
        //     'created_by' => 'self-register',
        //     'updated_by' => 'self-register',
        // ]);

        event(new Registered($user));

        // Auth::login($user);
        // return redirect(route('dashboard', absolute: false));

        return redirect()->route('login')->with('status', 'Registrasi berhasil. Silakan login.');
    }
}
