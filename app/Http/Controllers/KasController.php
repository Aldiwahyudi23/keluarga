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
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

class KasController extends Controller
{
    // admin

    public function index()
    {
        $tahun=date('Y');
        $hari = Hari::all();
        $siswa = Siswa::all();
        return view ('admin.kas.index', compact('siswa','hari','tahun'));
    }
    public function input()
    {
        $pemasukan = Pemasukan::all();
        $anggota = User::all();
        return view ('admin.kas.input', compact('anggota','pemasukan'));
    }
    public function show($nama_hari)
    {
        $nama_hari = Crypt::decrypt($nama_hari);
        $siswa = Siswa::all();
        $pemasukan = Pemasukan::where('tanggal',$nama_hari)->orderBy('tanggal', 'asc')->get();
        // $siswa = Siswa::all();
        // $pemasukan = Pemasukan::groupBy('tanggal');
        return view ('admin.kas.show', compact('siswa','pemasukan'));
    }
    public function store(Request $request)
    {
        $tahun=date('M');
        $this->validate($request, [
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        Pemasukan::updateOrCreate(
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
            ]
        );

        return redirect()->back()->with('success', 'Data mapel berhasil diperbarui!');
    }
    // siswa

    public function anggota_index()
    {
        // $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        // $kelas = Kelas::findorfail($siswa->kelas_id);
        // $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        // $mapel = $jadwal->groupBy('mapel_id');

        $anggota = User::where('id');
        $pemasukan = Pemasukan::where('siswa_id',$anggota->id)->groupBy('skswa_id')->get();
        return view ('siswa.kas.index', compact('siswa','pemasukan'));
    }
    public function anggota_input()
    {
        $pemasukan = Pemasukan::all();
        $anggota = User::all();
        return view ('siswa.kas.input', compact('anggota','pemasukan'));
    }
    public function anggota_show()
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $kelas = Kelas::findorfail($siswa->kelas_id);
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');

        $anggota = Siswa::where('id', Auth::user()->id)->first();
        $pemasukan = Pemasukan::where('siswa_id', $anggota->id)->orderBy('siswa_id')->get();
        return view('siswa.kas.show', compact('siswa', 'kelas', 'mapel','pemasukan'));
 
    }
    public function anggota_store(Request $request)
    {
        $anggota = Siswa::where('id', Auth::user()->id)->first();
        $this->validate($request, [
            'jumlah' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        Pemasukan::UpdateOrCreate(
            [
                'id' => $request->id
            ],
            [
                'kelas_id' => '3',
                'mapel_id' => '3',
                'guru_id' => '3',
                'siswa_id' =>$anggota->id,
                'jumlah' => $request->jumlah,
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]
        );

        return redirect('pemasukan/anggota/detail')->with('success', 'Data mapel berhasil ditambah!');
    }
}
