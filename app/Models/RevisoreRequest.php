<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevisoreRequest extends Model
{
    use HasFactory;

    /**
     * Gli attributi assegnabili in massa.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'status', // 'in attesa', 'approvato', 'rifiutato'
    ];

    /**
     * Relazione con l'utente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
