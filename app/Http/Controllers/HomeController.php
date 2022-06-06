<?php

namespace App\Http\Controllers;

use App\Jadwal;
use App\Guru;
use App\Kehadiran;
use App\Kelas;
use App\Siswa;
use App\Mapel;
use App\User;
use App\Paket;
use App\Pengumuman;
use App\Pemasukan;
use App\Pengluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jadwal = Jadwal::count();
        $guru = Guru::count();
        $gurulk = Guru::where('jk', 'L')->count();
        $gurupr = Guru::where('jk', 'P')->count();
        $siswa = Siswa::count();
        $siswalk = Siswa::where('jk', 'L')->count();
        $siswapr = Siswa::where('jk', 'P')->count();
        $mapel = Mapel::count();
        $user = User::count();
        $paket = Paket::all();
        $kelas = Kelas::all();

        $pemasukan = Pemasukan::all();
        $jumlah_pemasukan = 0;
        foreach ($pemasukan as $item) {
            $jumlah_pemasukan += $item->jumlah;
        }

        $peminjaman = Pemasukan::whereBetween('tanggal',[date('Y-m-01'), date('Y-m-31')])->get();;
        $jumlah_pinjam = 0;
        foreach ($peminjaman as $item) {
            $jumlah_pinjam += $item->jumlah;
            $pinjam = (20/100)*$jumlah_pinjam;
        }

        $pengluaran = Pengluaran::all();
        $jumlah_pengluaran = 0;
        foreach ($pengluaran as $data) {
            $jumlah_pengluaran += $data->jumlah;
        }

        $hari = date('w');
        $jam = date('H:i');
        $jadwal = Jadwal::OrderBy('jam_mulai')->OrderBy('jam_selesai')->OrderBy('kelas_id')->where('hari_id', $hari)->where('jam_mulai', '<=', $jam)->where('jam_selesai', '>=', $jam)->get();
        $pengumuman = Pengumuman::first();
        $kehadiran = Kehadiran::all();
        return view('home', compact('jadwal',
                            'pengumuman',
                            'jadwal',
                            'guru',
                            'gurulk',
                            'gurupr',
                            'mapel',
                            'siswa',
                            'siswalk',
                            'siswapr',
                            'kelas',
                            'user',
                            'paket',
                            'pemasukan',
                            'jumlah_pemasukan',
                            'jumlah_pengluaran',
                            'pinjam',
                            'kehadiran'));
    }

    public function admin()
    {
        $jadwal = Jadwal::count();
        $guru = Guru::count();
        $gurulk = Guru::where('jk', 'L')->count();
        $gurupr = Guru::where('jk', 'P')->count();
        $siswa = Siswa::count();
        $siswalk = Siswa::where('jk', 'L')->count();
        $siswapr = Siswa::where('jk', 'P')->count();
        $kelas = Kelas::count();
        $bkp = Kelas::where('paket_id', '1')->count();
        $dpib = Kelas::where('paket_id', '2')->count();
        $ei = Kelas::where('paket_id', '3')->count();
        $oi = Kelas::where('paket_id', '4')->count();
        $tbsm = Kelas::where('paket_id', '6')->count();
        $rpl = Kelas::where('paket_id', '7')->count();
        $tpm = Kelas::where('paket_id', '5')->count();
        $las = Kelas::where('paket_id', '8')->count();
        $mapel = Mapel::count();
        $user = User::count();
        $paket = Paket::all();
        return view('admin.index', compact(
            'jadwal',
            'guru',
            'gurulk',
            'gurupr',
            'siswalk',
            'siswapr',
            'siswa',
            'kelas',
            'bkp',
            'dpib',
            'ei',
            'oi',
            'tbsm',
            'rpl',
            'tpm',
            'las',
            'mapel',
            'user',
            'paket'
        ));
    }
}
