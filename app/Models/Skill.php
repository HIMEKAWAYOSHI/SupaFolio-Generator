<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{   
    protected $table = 'skills';
    protected $primaryKey = 'id';

    protected $fillable = ['portfolio_id', 'skill_name'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
    }
}
