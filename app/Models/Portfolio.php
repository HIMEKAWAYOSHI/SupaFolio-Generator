<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
     protected $fillable = [
        'account_id',
        'title',
        'full_name',
        'email', 
        'contact_number',
        'address',
        'about_me',
        'profile_picture',
        'template'
        
    ];
    
   public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }

    public function educations()
    {
        return $this->hasMany(Education::class, 'portfolio_id', 'id');
    }                                                                                                                                                                       

    public function projects()
    {
        return $this->hasMany(Project::class, 'portfolio_id', 'id');
    }

    public function skills()
    {
        return $this->hasMany(Skill::class, 'portfolio_id', 'id');
    }

    public function socialLinks()
    {
        return $this->hasMany(SocialLink::class, 'portfolio_id', 'id');
    }

    public function workExperiences()
    {
        return $this->hasMany(WorkExperience::class, 'portfolio_id', 'id');
    }
}