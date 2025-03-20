<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori'; // Nama tabel di database
    protected $primaryKey = 'kategori_id'; // Primary key tabel

    protected $fillable = ['kategori_id', 'kategori_kode', 'kategori_nama'];

    public function barang()
    {
        return $this->hasMany(BarangModel::class, 'kategori_id', 'kategori_id');
    }
}