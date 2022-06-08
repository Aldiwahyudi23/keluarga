<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengluaran extends Model
{
    protected $fillable = ['siswa_id', 'kelas_id', 'guru_id', 'mapel_id', 'jumlah', 'keterangan', 'tanggal','program'];

    protected $table = 'pengluaran';
}
