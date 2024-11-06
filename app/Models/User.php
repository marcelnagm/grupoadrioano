<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;  
/**
 * Class User
 *
 * @property $id
 * @property $name
 * @property $email
 * @property $email_verified_at
 * @property $password
 * @property $remember_token
 * @property $created_at
 * @property $updated_at
 * @property $CPF
 * @property $RG
 * @property $RG_emissor
 * @property $RG_emissao
 *
 * @property Account[] $accounts
 * @property Statement[] $statements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends  Authenticatable
{
    
    public const ADMIN_ID = 1;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'email', 'password','CPF', 'RG', 'RG_emissor', 'RG_emissao', 'profile_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(\App\Models\Account::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statements()
    {
        return $this->hasMany(\App\Models\Statement::class, 'user_id', 'id');
    }
    
    public function isAdmin(){
        return $this->profile_id == self::ADMIN_ID;
    }

    public function __toString(){
        return $this->name . ' - ' . $this->CPF;
    }



}   

