<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailOrdMed extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_medicament',
        'utilisation',
        'periode',
        'remarque',
        'ordMedicament_id',
    ];

    public function ordonnance(): BelongsTo
    {
        return $this->belongsTo(OrdMedicament::class);
    }
}
