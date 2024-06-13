<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailOrdAnalyseRadio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'type',
        'detail',
        'ordAnalyseRadio_id'
    ];

    public function ordAnalyseRadio(): BelongsTo
    {
        return $this->belongsTo(OrdAnalyseRadio::class);
    }
}
