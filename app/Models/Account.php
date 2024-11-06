<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Account
 *
 * @property $id
 * @property $user_id
 * @property $acconunt
 * @property $agency_id
 * @property $balance
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @property Agency $agency
 * @property User $user
 * @property Statement[] $statements
 * @property Statement[] $statements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Account extends Model
{
    use SoftDeletes;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'acconunt', 'agency_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function agency()
    {
        return $this->belongsTo(\App\Models\Agency::class, 'agency_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statements()
    {
        return $this->hasMany(\App\Models\Statement::class, 'account_id', 'id')
        ->orWhere('deposit_account_id', $this->id);
                    
    }
    


    public function hasFunds($value = 0){
        return $this->balance > $value;
    }

    public function addFunds($value){
        $this->balance += $value;        
        return $this;
    }

    public function isOwned():bool{
        return Auth::user()->id == $this->user_id;
    }


    public function __toString(){
        return $this->acconunt;
    }

}
