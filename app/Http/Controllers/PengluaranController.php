<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Guru;
use App\Mapel;
use App\Jadwal;
use App\Absen;
use App\Hari;
use App\Siswa;
use App\Kelas;
use App\Kehadiran;
use App\Pemasukan;
use App\Pengluaran;
use App\Pengajuan;
use App\DataPengluaran;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class PengluaranController extends Controller
{
    public function index()
    {
        $tahun=date('Y');
        $hari = Hari::all();
        $datapengluaran = DataPengluaran::all();
        return view ('admin.kas.pengluaran.index', compact('datapengluaran','hari','tahun'));
    }
    public function input()
    {
        $datapengluaran = DataPengluaran::all();
        return view ('admin.kas.pengluaran.input', compact('datapengluaran'));
    }
    public function show($nama)
    {
        $nama = Crypt::decrypt($nama);
        $pengluaran =Pengluaran::where('nama',$nama)->orderBy('nama', 'asc')->get();
        // $siswa = Siswa::all();
        // $pemasukan =Pengluaran::groupBy('tanggal');
        return view ('admin.kas.pengluaran.show', compact('siswa','pemasukan','pengluaran'));
    }
    public function store(Request $request)
    {
        $tahun=date('M');
        $this->validate($request, [
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
            'program' => 'required'
        ]);

       Pengluaran::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'kelas_id' => '3',
                'mapel_id' => '3',
                'guru_id' => '3',
                'siswa_id' => '0',
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'program' => $request->program,
            ]
        );

        return redirect()->back()->with('success', 'Data mapel berhasil diperbarui!');
    }
    public function pinjam (){
        $pinjam = Pengluaran::where('program','Dana Pinjam')->latest()->get();
        return view( 'admin.kas.pengluaran.pinjam',compact('pinjam'));
    }
    
    public function darurat (){
        $darurat = Pengluaran::where('program','Dana Darurat')->latest()->get();
        return view( 'admin.kas.pengluaran.darurat',compact('darurat'));
    }
    
    public function amal (){
        $amal = Pengluaran::where('program','Dana Amal')->latest()->get();
        return view( 'admin.kas.pengluaran.amal',compact('amal'));
    }
    
    public function kas (){
        $kas = Pengluaran::where('program','Dana Kas')->latest()->get();
        return view( 'admin.kas.pengluaran.kas',compact('kas'));
    }
    
    public function lain (){
        $lain = Pengluaran::where('program','Dana Lain-Lain')->latest()->get();
        return view( 'admin.kas.pengluaran.lain',compact('lain'));
    }
    public function acara (){
        $acara = Pengluaran::where('program','Dana Acara')->latest()->get();
        return view( 'admin.kas.pengluaran.acara',compact('acara'));
    }

    public function peminjaman()
    {
        $anggota = User::all();
        $peminjaman = Pengluaran::all();
        return view('siswa.kas.pinjam', compact('peminjaman','anggota'));
    }
    public function peminjaman_store(Request $request)
    {
        $tahun=date('M');
        $this->validate($request, [
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required',
        ]);

       Pengajuan::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'kelas_id' => '3',
                'mapel_id' => '3',
                'guru_id' => '3',
                'siswa_id' => $request->anggota_id,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'program' => 'Dana Pinjam',
                'kategori' => 'Pengeluaran',
            ]
        );

        return redirect('pengajuan/pinjaman/detail')->with('success', 'Data pengajuan atos ka kirim ! Kantun ngantosan persetujuan');
    }
    
    public function pengluaran_pinjaman (Request $request)
    {
        $tahun=date('M');
        $this->validate($request, [
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        Pengluaran::updateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'kelas_id' => '3',
                'mapel_id' => '3',
                'guru_id' => '3',
                'siswa_id' => $request->anggota_id,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
                'program' => $request->program,
            ]
        );
        $pengajuan = Pengajuan::find($request->id_pengajuan);
        $pengajuan->delete();

        return redirect('pengajuan/peminjaman')->with('success', 'Data anu tos di tarima bakal lebet kana database !');
    }


    // siswa
    public function peminjaman_detail()
    {
        $anggota = Siswa::where('id', Auth::user()->id)->first();
        $pinjam = Pengluaran::where('siswa_id', $anggota->id)->orderBy('siswa_id')->get();
        return view('siswa.kas.datapinjaman', compact('anggota','pinjam'));
 
    }
}
