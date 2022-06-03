<?php

namespace App\Http\Controllers;

use Auth;
use App\Guru;
use App\Siswa;
use App\Kelas;
use App\Jadwal;
use App\Nilai;
use App\Ulangan;
use App\Pemasukan;
use App\Rapot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PemasukanController extends Controller
{
    public function index()
    {
        $guru = Guru::where('id_card', Auth::user()->id_card)->first();
        $jadwal = Jadwal::where('guru_id', $guru->id)->orderBy('kelas_id')->get();
        $kelas = $jadwal->groupBy('kelas_id');
        return view('guru.ulangan.kelas', compact('kelas', 'guru'));
    }
    public function siswa()
    {
        $siswa = Siswa::where('no_induk', Auth::user()->no_induk)->first();
        $kelas = Kelas::findorfail($siswa->kelas_id);
        $jadwal = Jadwal::where('kelas_id', $kelas->id)->orderBy('mapel_id')->get();
        $mapel = $jadwal->groupBy('mapel_id');
        $Pemasukan = Pemasukan::all();
        return view('siswa.pemasukan', compact('siswa', 'kelas', 'mapel','Pemasukan'));
    }
}
