<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
      protected $table = 'projects';
    protected $primaryKey = 'id';
    protected $fillable = [
        'portfolio_id', 
        'project_name', 
        'description', 
        'project_link', 
        'project_img'

    ];

    public function portfolio(){
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
    }
    //
}
