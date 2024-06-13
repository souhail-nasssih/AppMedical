<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrdAnalyseRadio extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
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
    //la relation hasmany avec la table detailOrdAnalyseRadio 

    /**
     * Get all of the comments for the OrdAnalyseRadio
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailOrdAnalyseRadios(): HasMany
    {
        return $this->hasMany(DetailOrdAnalyseRadio::class);
    }


}
