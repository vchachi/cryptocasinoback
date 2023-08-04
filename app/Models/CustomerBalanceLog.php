<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CustomerBalanceLog
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $customer_id
 * @property foreignId $user_id
 * @property string $datetime
 * @property integer $awarded_tokens
 * @property integer $taken_tokens
 * @property string $reason
 */
class CustomerBalanceLog extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customer_balance_logs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer_id',
        'user_id',
        'datetime',
        'awarded_tokens',
        'taken_tokens',
        'reason'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'awarded_tokens' => 'integer',
        'taken_tokens' => 'integer',
        'reason' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customer_id' => 'required|exists:customers,id',
        'user_id' => 'required|exists:users,id',
        'datetime' => 'required|date',
        'awarded_tokens' => 'required',
        'taken_tokens' => 'required',
        'reason' => 'required|min:3|max:255'
    ];


    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
