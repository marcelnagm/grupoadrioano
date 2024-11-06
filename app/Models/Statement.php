<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Statement
 *
 * @property $id
 * @property $user_id
 * @property $account_id
 * @property $agency_id
 * @property $value
 * @property $deposit_account_id
 * @property $deposit_agency_id
 * @property $date
 * @property $type_operation_id
 * @property $deleted_at
 * @property $created_at
 * @property $updated_at
 *
 * @property Account $account
 * @property Agency $agency
 * @property Account $account
 * @property Agency $agency
 * @property TypeOperation $typeOperation
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Statement extends Model
{
    use SoftDeletes;


    const TYPE_OPERATION_DEPOSIT = 1;
    const TYPE_OPERATION_TRANSFER = 2;
    const TYPE_OPERATION_REFUND = 3;
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'account_id', 'agency_id', 'value', 'deposit_account_id', 'deposit_agency_id', 'date', 'type_operation_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class, 'account_id', 'id');
    }

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
    public function depositAccount()
    {
        return $this->belongsTo(\App\Models\Account::class, 'deposit_account_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function depositAgency()
    {
        return $this->belongsTo(\App\Models\Agency::class, 'deposit_agency_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function typeOperation()
    {
        return $this->belongsTo(\App\Models\TypeOperation::class, 'type_operation_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function transfer(): bool
    {

        if ($this->account()->first()->hasFunds($this->value)) {
            $this->date = "" . Date('Y-m-d');
            $this->depositAccount()->first()->addFunds($this->value)->save();
            $this->account()->first()->addFunds(-$this->value)->save();
            $this->type_operation_id = self::TYPE_OPERATION_TRANSFER;
            $this->save();
            return true;
        } else
            return false;
    }

    public function canRefund(): bool
    {
        if ($this->type_operation_id == self::TYPE_OPERATION_TRANSFER) {
            if ($this->depositAccount()->first()->hasFunds($this->value)) {
                return true;
            }
        }
        return false;
    }

    public function whoRefund(): bool
    {
        if ($this->depositAccount()->first()->user_id == Auth::user()->id) {                     
        if ($this->type_operation_id == self::TYPE_OPERATION_TRANSFER) {                     
            return true;
        }
        }
        return false;
    }

    public function refund(): bool
    {
        if ($this->depositAccount()->first()->hasFunds($this->value)) {
            $this->depositAccount()->first()->addFunds(-$this->value)->save();
            $this->account()->first()->addFunds($this->value)->save();
            $this->type_operation_id = self::TYPE_OPERATION_REFUND;
            $this->save();
            return true;
        } else
            return false;
    }
    public function deposit(): bool
    {
        $this->deposit_account_id = $this->account_id;
        $this->deposit_agency_id = $this->agency_id;
        $this->date = "" . Date('Y-m-d');
        $this->type_operation_id = Statement::TYPE_OPERATION_DEPOSIT;
        $this->account()->first()->addFunds($this->value)->save();
        $this->save();
        return true;
    }

    public function operation(): string
    {
        switch ($this->type_operation_id) {
            case self::TYPE_OPERATION_DEPOSIT:
                return 'Deposito';
            case self::TYPE_OPERATION_TRANSFER:
                return 'Transferencia';
            case self::TYPE_OPERATION_REFUND:
                return 'Reembolso';
            default:
                return 'Desconhecido';
        }



    }


}

