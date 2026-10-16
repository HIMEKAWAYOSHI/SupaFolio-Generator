<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Account extends Authenticatable
{
    protected $table = 'account';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'username', 
        'email_address', 
        'password_hash'
        
    ];
    protected $hidden = [
        'password_hash'
    ];

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    public function getRememberTokenName()
    {
        return '';
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class, 'account_id', 'account_id');
    }
    //
}
