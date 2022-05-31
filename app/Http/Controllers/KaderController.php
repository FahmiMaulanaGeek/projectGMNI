<?php

namespace App\Http\Controllers;
use App\Models\Aktivitas;
use App\Models\Dpk;
use App\Models\User;
use Illuminate\Http\Request;

class KaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('kader.index');
    }

    public function showDatabase()
    {
        
        $data = User::select('users.nama','users.angkatan','users.tahun_ktd','users.jenis_kelamin','users.tanggal_lahir','users.jabatan','universitas.nama as nama_universitas','dpk.nama as nama_dpk')->join('dpk','users.dpk_id','=','dpk.id')->join('universitas','users.universitas_id',"=",'universitas.id')->get()->toArray(); 
        return view('kader.database',compact('data'));
    }
    public function showSchedule()
    {
        $data = Aktivitas::select('aktivitas.id', 'judul', 'durasi_kegiatan', 
                        'peminjaman_alat', 'estimasi_peserta', 'keterangan', 
                        'tgl_kegiatan', 'validasi', 'users.nama')
                        ->where('validasi', 1)->
                        join('users', 'aktivitas.users_id', '=', 'users.id')
                        ->get()->toArray();
            return view('kader.schedule', compact('data'));
    }

    public function showAktivitas()
    {
        return view('kader.aktivitas');
    }

    public function showLibrary()
    {
        return view('kader.library');
    }

    public function downloadLibrary($id)
    {
        $file = public_path('assets/library/'). $id;
        return response()->download($file);
    }
    public function showExplore()
    {
        $data = Dpk::get()->toArray();
        return view('kader.explore', compact('data'));
    }

    public function showAnggotaDpk($id)
    {
        $data = Dpk::join('users', 'dpk_id', '=', 'dpk.id')->where('users.dpk_id', $id)->get()->toArray();
        return view('kader.anggotaDpk', compact('data'));
    }

    public function showDpk()
    {
        return view('kader.dpk');
    }
    public function showDetailDpk($id)
    {
        $data = Dpk::where('id', $id)->get()->toArray();
        return view('kader.detailDpk', compact('data'));
    }
   
}
