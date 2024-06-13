<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedecinPatient extends Model
{
    use HasFactory;
    protected $fillable = [
        'medecin_id',
        'patient_id',
    ];
    public function medecin(): BelongsTo
    {
        return $this->belongsTo(Medecin::class);
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
