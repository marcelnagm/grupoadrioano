<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeOperation
 *
 * @property $id
 * @property $name
 *
 * @property Statement[] $statements
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TypeOperation extends Model
{
    public $timestamps = false;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statements()
    {
        return $this->hasMany(\App\Models\Statement::class, 'id', 'type_operation_id');
    }
    
}
