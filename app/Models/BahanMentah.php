<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanMentah extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
    public function bahanMentahProduksi()
    {
        return $this->hasMany(BahanMentahProduksi::class, 'id_bahan_mentah');
    }
}
