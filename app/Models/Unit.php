<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['fantasy_name', 'corporate_name', 'cnpj', 'flag_id'];

    public function flag()
    {
        return $this->belongsTo(Flag::class);
    }
}
