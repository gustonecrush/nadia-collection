<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelMekah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_hotel_mekah'];

    public function paketUmrahs()
    {
        return $this->hasMany(PaketUmrah::class, 'id_hotel_mekah');
    }
}
