<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AnalyseRadio extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'date',
        'resultat',
        'rapport',
        'laboratoire_id',
        'patient_id',
    ];
    /**
     * Get the user that owns the analyse_radio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function laboratoire(): BelongsTo
    {
        return $this->belongsTo(laboratoire::class);
    }
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}
