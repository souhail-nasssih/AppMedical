<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'date_naissance',
        'tel',
        'adress',
        'groupes_sanguins',
        'CIN',
        'user_id'

    ];
    /**
     * The roles that belong to the patient
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function medecins(): BelongsToMany
    {
        return $this->belongsToMany(Medecin::class,'medecin_patients');
    }
    
        /**
     * Get all of the comments for the medecin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function info_medicals(): HasMany
    {
        return $this->hasMany(InfoMedical::class);
    }
    public function analyse_radios(): HasMany
    {
        return $this->hasMany(AnalyseRadio::class);
    }
    /**
     * Get all of the comments for the medecin
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
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

        static::deleting(function ($patient) {
            // Supprime l'utilisateur associé
            $patient->user()->delete();
        });
}

public function user()
{
    return $this->belongsTo(User::class);
}

}