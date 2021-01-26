<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operadora extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'status_id'];

    /**
     * coletando o Status relacionado à Operadora.
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
