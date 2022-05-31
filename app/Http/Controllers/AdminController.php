<?php

namespace App\Http\Controllers;

use App\Models\Aktivitas;
use App\Models\Dpk;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helper\Storage;
use App\Models\Administration;
use App\Models\Berita;
use App\Models\Universitas;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin.index');
    }


    public function showBerita()
    {
        
        $data= Berita::join('users','berita.users_id','=','users.id')->get()->toArray();
        return view('admin.showBerita',compact('data'));
    }
    public function addBerita(Request $request)
    {
        $judul = $request->input('judul');
        $isiberita = $request->input('isiberita');
        $image = $request->input('image');
        $tanggal=$request->input('tanggal');

        $judul = $request->input('judul');
        $isiberita = $request->input('isiberita');
        $image = $request->file('image');
        $tanggal=$request->input('tanggal');
        

        // $uploadDokumen = Storage::uploadLibrary($image);

        $data = new Berita();
        $data->judul = $judul;
        $data->isi_berita = $isiberita;
        // $data->image =  $uploadDokumen;
        $data->image = "data:".$image->getMimeType().";base64, ".base64_encode(file_get_contents($image));
        $data->tanggal=$tanggal;
        $data->users_id = Auth::user()->id;
        $data->save();

        return back()->with('success', 'Berita berhasil di tambahkan !');
    }
    
    public function showRequestAdministration()
    {
        $data = Administration::select('administration.id','administration.tipe','administration.image','administration.validasi','users.nama as namanama')
        ->join('users', 'users_id', '=', 'users.id')
        ->where('validasi', 0)->get()->toArray();
            // dd($data);
        return view('admin.daftarAdministration', compact('data'));
    }

    public function accAdministration(Request $request)
    {
        $id = $request->input('id');
        $data = Administration::where('id', $id)->first();
        $data->validasi = 1;
        $data->save();
        return back()->with('success', 'Dokumen selesai di izinkan');
        
    }
    public function showDatabase()
    {
        
        $data = User::select('users.nama','users.angkatan','users.tahun_ktd','users.jenis_kelamin','users.tanggal_lahir','users.jabatan','universitas.nama as nama_universitas','dpk.nama as nama_dpk')->join('dpk','users.dpk_id','=','dpk.id')->join('universitas','users.universitas_id',"=",'universitas.id')->get()->toArray(); 
        if(request('search')){
            $data->where('users.nama','like','%'. request('serach').'%');
        }
        return view('admin.database',compact('data'));
    }


    public function showSchedule()
    {
        $data = Aktivitas::select('aktivitas.id', 'judul', 'durasi_kegiatan', 
                        'peminjaman_alat', 'estimasi_peserta', 'keterangan', 
                        'tgl_kegiatan', 'validasi', 'users.nama')
                        ->where('validasi', 1)->
                        join('users', 'aktivitas.users_id', '=', 'users.id')
                        ->get()->toArray();
            return view('admin.schedule', compact('data'));
    }

    public function showDetailSchedule($id)
    {
        $data = Aktivitas::select('aktivitas.id', 'aktivitas.judul', 'aktivitas.durasi_kegiatan',
                            'aktivitas.estimasi_peserta', 'aktivitas.keterangan', 'aktivitas.tgl_kegiatan',
                            'users.nama', 'dpk.nama as nama_dpk')->where('aktivitas.id', $id)
                            ->join('users', 'aktivitas.users_id', '=', 'users.id')
                            ->join('dpk', 'users.dpk_id', '=', 'dpk.id')
                            ->get()->toArray();
        // dd($data);
        return view('admin.detail-schedule', compact('data'));
    }

    public function komencoba()
    {
        $data = Aktivitas::select('aktivitas.id', 'aktivitas.judul', 'aktivitas.durasi_kegiatan',
        'aktivitas.estimasi_peserta', 'aktivitas.keterangan', 'aktivitas.tgl_kegiatan',
        'users.nama', 'dpk.nama as nama_dpk')
        // ->where('aktivitas.id', $id)
        ->join('users', 'aktivitas.users_id', '=', 'users.id')
        ->join('dpk', 'users.dpk_id', '=', 'dpk.id')
        ->get()->toArray();
         
        // return view('admin.detail-schedule', compact('data'));
        return view('admin.komencoba',compact('data'));
    }

    public function showDpk()
    {
        $data = Dpk::where('id', '!=' , 1)->get()->toArray();
        $univ = Universitas::where('id', '!=' , 1)->get()->toArray();
        return view('admin.dpk', compact('data', 'univ'));
        
    }
    public function addDpk(Request $request)
    {
        $nama = $request->input('nama');
        $universitas = $request->input('universitas');
        $tipe = $request->input('tipe');
        $bio = $request->input('bio');
        $image = $request->file('image');
        
        $data = Dpk::where('nama', $nama)->where('universitas', $universitas)->get()->toArray();
        if(!empty($data))
        {
            return back()->with('failed', 'Dpk already exist');
        }

        $dpk = new Dpk();
        $dpk->nama = $nama;
        $dpk->universitas = $universitas;
        $dpk->tipe = $tipe;
        $dpk->bio = $bio;
        $dpk->image = "data:".$image->getMimeType().";base64, ".base64_encode(file_get_contents($image));
        $dpk->save();

        return back()->with('success','Data Succesfully Added');
    }
    
    
    public function showAktivitas()
    {
        return view('admin.aktivitas');
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

        // dd($peminjaman_alat);

        $aktivitas = new Aktivitas();
        $aktivitas->judul = $judul;
        $aktivitas->durasi_kegiatan = $durasiKegiatan;
        $aktivitas->peminjaman_alat = $peminjaman_alat ;
        $aktivitas->estimasi_peserta = $estimasiPeserta;
        $aktivitas->keterangan = $keterangan;
        $aktivitas->tgl_kegiatan = $tglKegiatan;
        $aktivitas->validasi = true;
        $aktivitas->users_id = Auth::user()->id;
        $aktivitas->save();
        
        return back()->with('success', 'Data Succesfully Added');
    }
    public function showExplore()
    {
        $data = Dpk::get()->toArray();
        return view('admin.explore', compact('data'));
    }
    public function showDetailDpk($id)
    {
        $data = Dpk::where('id', $id)->get()->toArray();
        // $sk=Administration::where('tipe','Surat Keputusan')
        //                     ->where('id',$id)->get()->toArray();
        // dd($sk);
        return view('admin.detailDpk', compact('data'));
    }
    public function showAnggotaDpk($id)
    {
        $data = Dpk::join('users', 'dpk_id', '=', 'dpk.id')->where('users.dpk_id', $id)->get()->toArray();
        return view('admin.anggotaDpk', compact('data'));
    }
    public function showRequest()
    {
        $data = Aktivitas::where('validasi', 0)->get()->toArray();
        return view('admin.request', compact('data'));
    }
    public function accRequest(Request $request)
    {
        $id = $request->input('id');
        $data = Aktivitas::where('id', $id)->first();
        $data->validasi = true;
        $data->save();
        return back()->with('success', 'Aktivitas selesai di izinkan');
        
    }

    public function showLibrary()
    {
        return view('admin.library');
    }

    public function addLibrary(Request $request)
    {
        $judul = $request->input('judul');
        $tipe = $request->input('tipe');
        $dokumen = $request->file('dokumen');

        $uploadDokumen = Storage::uploadLibrary($dokumen);

        $data = new Library();
        $data->judul = $judul;
        $data->tipe = $tipe;
        $data->dokumen =  $uploadDokumen;
        $data->users_id = Auth::user()->id;
        $data->save();

        return back()->with('success', 'Library berhasil di tambahkan !');
    }

    public function downloadLibrary($id)
    {
        $file = public_path('assets/library/'). $id;
        return response()->download($file);
    }

    public function downloadAdministration($id)
    {
        $file = public_path('assets/library/'). $id;
        return response()->download($file);
    }

    public function skDPK($id)
    {
        $file = public_path('assets/library/'). $id;
        return response()->download($file);
    }
}

