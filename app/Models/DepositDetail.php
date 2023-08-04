<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DepositDetail
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $deposit_id
 * @property string $datetime
 * @property foreignId $user_id
 * @property number $value
 * @property integer $tokens
 * @property string $status
 */
class DepositDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'deposit_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'deposit_id',
        'datetime',
        'user_id',
        'value',
        'tokens',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'float',
        'tokens' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deposit_id' => 'required|exists:deposits,id',
        'datetime' => 'required|date',
        'user_id' => 'required|exists:users,id',
        'value' => 'required|min:0|max:99999.99',
        'tokens' => 'required',
        'status' => 'required|min:3|max:20'
    ];

    
    public function deposit()
    {
        return $this->belongsTo(\App\Models\Deposit::class, 'deposit_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
