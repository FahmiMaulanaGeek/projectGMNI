<?php

namespace App\Http\Controllers;

use App\Models\Administration;
use App\Models\Berita;
use App\Models\Dpk;
use App\Models\Library;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data= Berita::get()->toArray();
        
        return view('home',compact('data'));
    }

    public function tentangGmni()
    {
        
        return view('tentanggmni');
    }

    public function showLibrary()
    {
        $dataEbook = Library::where('tipe', 'e-book')->get()->toArray();
        $dataMateri = Library::where('tipe', 'materi')->get()->toArray();
        return view('library', compact('dataEbook', 'dataMateri'));
    }

    public function showAdministration()
    {
        $data = Administration::select('administration.tipe','administration.image','administration.validasi','users.nama as namanama')->join('users', 'users_id', '=', 'users.id')->get()->toArray();
       
        return view('admin.daftarAdministration', compact('data'));
    }

}
