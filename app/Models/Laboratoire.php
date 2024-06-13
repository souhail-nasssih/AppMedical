<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laboratoire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'tel',
        'adress',
        'N_professionel',
        'user_id'

    ];
    public function analyse_radios(): HasMany
    {
        return $this->hasMany(AnalyseRadio::class);
    }

}
