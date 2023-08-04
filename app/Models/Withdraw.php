<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Withdraw
 * @package App\Models
 * @version August 4, 2023, 7:16 am UTC
 *
 * @property foreignId $customer_id
 * @property string $datetime
 * @property foreignId $crypto_id
 * @property number $value
 * @property integer $tokens
 * @property string $status
 * @property foreignId $confirmed_id
 * @property string $withdraw_address
 * @property string $customer_name
 */
class Withdraw extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'withdraws';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer_id',
        'datetime',
        'crypto_id',
        'value',
        'tokens',
        'status',
        'confirmed_id',
        'withdraw_address',
        'customer_name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'float',
        'tokens' => 'integer',
        'status' => 'string',
        'withdraw_address' => 'string',
        'customer_name' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required|exists:customers,id',
        'datetime' => 'required|date',
        'crypto_id' => 'required|exists:cryptos,id',
        'value' => 'required|min:0|max:99999.99',
        'tokens' => 'required',
        'status' => 'required|min:3|max:20',
        'confirmed_id' => 'exists:users,id',
        'withdraw_address' => 'required|min:3|max:200',
        'customer_name' => 'required|min:3|max:30'
    ];

    
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function crypto()
    {
        return $this->belongsTo(\App\Models\Crypto::class, 'crypto_id');
    }

    public function confirmed()
    {
        return $this->belongsTo(\App\Models\User::class, 'confirmed_id');
    }
}
