<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';
    protected $primaryKey = 'id';
    protected $fillable = [

        'portfolio_id', 
        'education_level', 
        'school_name', 
        'degree', 
        'start_year', 
        'end_year'
        
        ];

        public function portfolio() { 
            return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
        }

}



