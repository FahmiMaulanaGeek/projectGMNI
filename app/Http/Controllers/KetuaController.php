<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Dpk;
use App\Models\Library;
use App\Helper\Storage;
use App\Models\Administration;
use App\Models\User;

class KetuaController extends Controller
{
    public function index()
    {
        return view('ketua.index');
    }

    public function showAdministration()
    {
        return view('ketua.administration');
    }

    public function addAdministration(Request $request)
    {
        // $judul = $request->input('judul');
        $tipe = $request->input('tipe');
        $dokumen = $request->file('dokumen');
        
        $uploadDokumen = Storage::uploadLibrary($dokumen);

        $data = new Administration();
        // $data->judul = $judul;
        $data->tipe = $tipe;
        $data->image =  $uploadDokumen;
        $data->validasi = 0;
        $data->users_id = Auth::user()->id;
        $data->save();

        return back()->with('success', 'Dokumen berhasil di tambahkan !');
    }

    public function showSchedule()
    {
        $data = Aktivitas::select('aktivitas.id', 'judul', 'durasi_kegiatan', 
                        'peminjaman_alat', 'estimasi_peserta', 'keterangan', 
                        'tgl_kegiatan', 'validasi', 'users.nama')
                        ->where('validasi', 1)->
                        join('users', 'aktivitas.users_id', '=', 'users.id')
                        ->get()->toArray();
            return view('ketua.schedule', compact('data'));
    }

    public function showDatabase()
    {
        
        $data = User::select('users.nama','users.angkatan','users.tahun_ktd','users.jenis_kelamin','users.tanggal_lahir','users.jabatan','universitas.nama as nama_universitas','dpk.nama as nama_dpk')->join('dpk','users.dpk_id','=','dpk.id')->join('universitas','users.universitas_id',"=",'universitas.id')->get()->toArray(); 
        return view('kader.database',compact('data'));
    }
    public function showAktivitas()
    {
        return view('ketua.aktivitas');
    }

    public function showLibrary()
    {
        return view('ketua.library');
    }

    public function downloadLibrary($id)
    {
        $file = public_path('assets/library/'). $id;
        return response()->download($file);
    }
    public function showExplore()
    {
        $data = Dpk::get()->toArray();
        return view('ketua.explore', compact('data'));
    }


    public function addAktivitas(Request $request)
    {
        $judul = $request->input('judul');
        $durasiKegiatan = $request->input('durasi_kegiatan');
        $papantulis = $request->input('papan_tulis');
        $almamater = $request->input('almamater');
        $lcd = $request->input('lcd');
        $proyektor= $request->input('proyektor');
        $estimasiPeserta = $request->input('estimasi_peserta');
        $keterangan = $request->input('keterangan');
        $tglKegiatan = $request->input('tgl_kegiatan');

        $peminjaman_alat = [];

        $peminjaman_alat = "";

        if($papantulis)
        {
            $peminjaman_alat = $papantulis . ", ";
        }
        if($almamater)
        {
            $peminjaman_alat = $peminjaman_alat . $almamater . ", ";
        }
        if($lcd)
        {
            $peminjaman_alat = $peminjaman_alat . $lcd . ", ";
        }
        if($proyektor)
        {
            $peminjaman_alat = $peminjaman_alat . $proyektor;
        }

        //  dd($peminjaman_alat);

        $aktivitas = new Aktivitas();
        $aktivitas->judul = $judul;
        $aktivitas->durasi_kegiatan = $durasiKegiatan;
        $aktivitas->peminjaman_alat = $peminjaman_alat ;
        $aktivitas->estimasi_peserta = $estimasiPeserta;
        $aktivitas->keterangan = $keterangan;
        $aktivitas->tgl_kegiatan = $tglKegiatan;
        $aktivitas->validasi = false;
        $aktivitas->users_id = Auth::user()->id;
        $aktivitas->save();

        return back()->with('success','Succes Add Data, Waiting Admin To Approv');

        
    }

    public function showAnggotaDpk($id)
    {
        $data = Dpk::join('users', 'dpk_id', '=', 'dpk.id')->where('users.dpk_id', $id)->get()->toArray();
        return view('ketua.anggotaDpk', compact('data'));
    }

    public function showDpk()
    {
        return view('ketua.dpk');
    }
    public function showDetailDpk($id)
    {
        $data = Dpk::where('id', $id)->get()->toArray();
        return view('ketua.detailDpk', compact('data'));
    }
    
}
