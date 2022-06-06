<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    protected $fillable = ['id','siswa_id', 'kelas_id', 'guru_id', 'mapel_id', 'jumlah', 'keterangan', 'tanggal'];

    protected $table = 'pemasukan';
}
