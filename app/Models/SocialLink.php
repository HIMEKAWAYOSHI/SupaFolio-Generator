<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialLink extends Model
{
    //
    protected $table = 'social_links';
    protected $primaryKey = 'id';
    protected $fillable = ['portfolio_id', 'platform', 'url'];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class, 'portfolio_id', 'id');
    }
}
