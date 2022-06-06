<?php

namespace App\Http\Controllers;
use Auth;
use App\Mapel;
use App\Guru;
use App\Siswa;
use App\Kelas;
use App\Jadwal;
use App\Sikap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use DB;

class BayarController extends Controller
{
    public function index()
    {
        return view('siswa.bayar');
    }
}