<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\Autor;

class Llibre extends Model
{
    use HasFactory;

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
