<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ticket
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $customer_id
 * @property foreignId $user_id
 * @property string $datetime
 * @property string $status
 */
class Ticket extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tickets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'customer_id',
        'user_id',
        'datetime',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'string'
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
        'status' => 'required|min:3|max:20'
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
