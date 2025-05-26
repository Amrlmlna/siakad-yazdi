<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KHS extends Model
{
    protected $table = 'khs'; 
    protected $fillable = ['krs_id', 'nilai'];

    public function krs() {
        return $this->belongsTo(KRS::class);
    }
}

