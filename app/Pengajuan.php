<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $fillable = ['siswa_id', 'kelas_id', 'guru_id', 'mapel_id', 'jumlah', 'keterangan', 'tanggal','program','kategori'];

    protected $table = 'pengajuan';
}
