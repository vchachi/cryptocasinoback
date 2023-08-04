<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Deposit
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $customer_id
 * @property string $datetime
 * @property foreignId $crypto_id
 * @property number $value
 * @property string $status
 * @property foreignId $verified_id
 */
class Deposit extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'deposits';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer_id',
        'datetime',
        'crypto_id',
        'value',
        'status',
        'verified_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'float',
        'status' => 'string'
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
        'status' => 'required|min:3|max:20',
        'verified_id' => 'exists:users,id'
    ];

    
    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function crypto()
    {
        return $this->belongsTo(\App\Models\Crypto::class, 'crypto_id');
    }

    public function verified()
    {
        return $this->belongsTo(\App\Models\User::class, 'verified_id');
    }
}
