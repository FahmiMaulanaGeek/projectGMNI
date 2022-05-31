<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Dpk;
use App\Models\Universitas;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegisterAdmin()
    {
        return view('admin.registerAdmin');
    }
    public function registerAdmin(Request $request)
    {
        $username = $request->input('username');
        $nama = $request->input('nama');
        $password = $request->input('password');
        $role = $request->input('role');

        $admin = User::where('username', $username)->get()->toArray();

        if(count($admin) > 0)
        {
            return back()->with('failed', 'Username already exists')->withInput();
        }

        if(empty($role))
        {
            $role = 'admin';
        }

        $hashPassword = Hash::make($password);

        $users = new User();
        $users->username = $username;
        $users->nama = $nama;
        $users->password = $hashPassword;
        $users->angkatan = "";
        $users->tahun_ktd = "";
        $users->universitas_id = 1;
        $users->role = $role;
        $users->dpk_id = 1;
        $users->jabatan = "admin";
        $users->isActive = true;
        $users->save();

        return back()->with('success', 'Data succesfully saved');

        
    }

    public function showRegisterKetua()
    {
        $data = Dpk::where('id', '!=' , 1)->get()->toArray();
        $univ = Universitas::where('id', '!=' , 1)->get()->toArray();
        return view('admin.registerKetua', compact('data', 'univ'));
    }
    public function registerKetua(Request $request)
    {
        $username = $request->input('username');
        $nama = $request->input('nama');
        $password = $request->input('password');
        $angkatan = $request->input('angkatan');
        $tahunKtd = $request->input('tahun_ktd');
        $tanggal_lahir=$request->input('tanggal_lahir');
        $jenis_kelamin=$request->input('jenis_kelamin');
        $universitas = $request->input('universitas');
        $role = $request->input('role');
        $dpkId = $request->input('dpk_id');
        $jabatan = $request->input('jabatan');
        
        $admin = User::where('username', $username)->get()->toArray();

        if(count($admin) > 0)
        {
            return back()->with('failed', 'Username already exists')->withInput();
        }

        if(empty($role))
        {
            $role = 'ketua';
        }

        $hashPassword = Hash::make($password);

        $users = new User();
        $users->username = $username;
        $users->nama = $nama;
        $users->password = $hashPassword;
        $users->angkatan = $angkatan;
        $users->tanggal_lahir=$tanggal_lahir;
        $users->jenis_kelamin=$jenis_kelamin;
        $users->tahun_ktd = $tahunKtd;
        $users->universitas_id = $universitas;
        $users->role = $role;
        $users->dpk_id = $dpkId;
        $users->jabatan = $jabatan;
        $users->isActive = true;
        $users->save();

        return back()->with('success', 'Data succesfully saved');

        
    }

    public function showRegisterKader()
    {
        $data = Dpk::where('id', '!=' , 1)->get()->toArray();
        $univ = Universitas::where('id', '!=' , 1)->get()->toArray();
        return view('admin.registerKader', compact('data', 'univ'));
    }
    public function registerKader(Request $request)
    {
        $username = $request->input('username');
        $nama = $request->input('nama');
        $password = $request->input('password');
        $angkatan= $request->input('angkatan');
        $jabatan= $request->input('jabatan');
        $tahunktd= $request->input('tahun_ktd');
        $tanggal_lahir=$request->input('tanggal_lahir');
        $jenis_kelamin=$request->input('jenis_kelamin');
        $universitas= $request->input('universitas');
        $dpkID= $request->input('dpkid');
        $role = $request->input('role');

        

        $kader = User::where('username', $username)->get()->toArray();

        if(count($kader) > 0)
        {
            return back()->with('failed', 'Username already exists')->withInput();
        }

        if(empty($role))
        {
            $role = 'kader';
        }

        $hashPassword = Hash::make($password);

        $users = new User();
        $users->username = $username;
        $users->nama = $nama;
        $users->password = $hashPassword;
        $users->angkatan = $angkatan;
        $users->tahun_ktd = $tahunktd;
        $users->tanggal_lahir=$tanggal_lahir;
        $users->jenis_kelamin=$jenis_kelamin;
        $users->universitas_id = $universitas;
        $users->role = $role;
        $users->dpk_id = $dpkID;
        $users->jabatan = $jabatan;
        $users->isActive = true;
        $users->save();

        return back()->with('success', 'Data succesfully saved');

        
    }

}
