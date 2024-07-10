<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketUmrah extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function hotelMekah()
    {
        return $this->belongsTo(HotelMekah::class, 'id_hotel_mekah');
    }

    public function hotelMadinah()
    {
        return $this->belongsTo(HotelMadinah::class, 'id_hotel_madinah');
    }

    public function pesawat()
    {
        return $this->belongsTo(Pesawat::class, 'id_jenis_pesawat');
    }
}
