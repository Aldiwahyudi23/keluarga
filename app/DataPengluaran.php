<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPengluaran extends Model
{
    protected $fillable = ['kelas_id','nama'];

    protected $table = 'data_pengluaran';
}
