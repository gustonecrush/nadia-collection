<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesawat extends Model
{
    use HasFactory;

    protected $fillable = ['nama_pesawat'];

    public function paketUmrahs()
    {
        return $this->hasMany(PaketUmrah::class, 'id_jenis_pesawat');
    }
}
