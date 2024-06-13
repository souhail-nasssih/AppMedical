<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrdMedicament extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'medecin_id',
        'patient_id'
    ];

    public function medecin(): BelongsTo
    {
        return $this->belongsTo(Medecin::class);
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
    //la relation entre ordonanace et detail ordanance chaque ordnance contient plusiers details plusieurs detail retourn a une seul ordannace 
    /**
     * Get all of the comments for the OrdMedicament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOrdMeds(): HasMany
    {
        return $this->hasMany(DetailOrdMed::class, 'ordMedicament_id');
    }

}
