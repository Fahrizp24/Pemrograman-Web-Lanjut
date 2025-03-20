<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class SupplierModel extends Model
{
    use HasFactory;

    protected $table = 'm_supplier'; // Nama tabel di database
    protected $primaryKey = 'supplier_id'; // Primary key tabel

    protected $fillable = ['supplier_id', 'supplier_kode', 'supplier_nama'];

    public function barang()
    {
        return $this->hasMany(BarangModel::class, 'supplier_id', 'supplier_id');
    }
}