<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hadiah extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function nasabah()
    {
        return $this->hasMany(Nasabah::class);
    }

    public function wilayah()
    {
        return $this->belongsTo(Wilayah::class);
    }
}
