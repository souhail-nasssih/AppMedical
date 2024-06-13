<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Medecin extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'tel',
        'adress',
        'N_professionel',
        'user_id',
        'specialite'
    ];
    /**
     * The roles that belong to the medecin
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(patient::class, 'medecin_patients');
    }
    public function ordonance_medicaments(): HasMany
    {
        return $this->hasMany(OrdMedicament::class);
    }
    public function ordonance_analyse_radios(): HasMany
    {
        return $this->hasMany(OrdAnalyseRadio::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($medecin) {
            // Supprime l'utilisateur associé
            $medecin->user()->delete();
        });
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
