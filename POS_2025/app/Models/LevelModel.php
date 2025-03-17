<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'm_level'; //mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'level_id'; //Mendefinisikan primary key dari tabel
    protected $fillable = ['level_id','level_kode',];

}
