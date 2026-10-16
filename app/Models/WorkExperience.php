<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    //
    protected $table = 'work_experiences';
    protected $primaryKey = 'id';

    protected $fillable = [
        'portfolio_id', 'company', 'position',
        'start_date', 'end_date', 'description',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
    }
}
