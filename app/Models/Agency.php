<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agency
 *
 * @property $id
 * @property $name
 *
 * @property Account[] $accounts
 * @property Statement[] $statements
 * @property Statement[] $statements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Agency extends Model
{
    
    
    public $timestamps = false;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];


    public function __toString(){
        return $this->id . ' - ' . $this->name;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accounts()
    {
        return $this->hasMany(\App\Models\Account::class, 'id', 'agency_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statements()
    {
        return $this->hasMany(\App\Models\Statement::class, 'id', 'agency_id');
    }


        
}
