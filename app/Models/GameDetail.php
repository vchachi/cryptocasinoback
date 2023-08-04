<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GameDetail
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $game_type_id
 * @property foreignId $customer_id
 * @property foreignId $user_id
 * @property string $status
 */
class GameDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'game_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'game_type_id',
        'customer_id',
        'user_id',
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
        'game_type_id' => 'required|exists:game_types,id',
        'customer_id' => 'required|exists:customers,id',
        'user_id' => 'required|exists:users,id',
        'status' => 'required|min:3|max:20'
    ];

    
    public function game_type()
    {
        return $this->belongsTo(\App\Models\GameType::class, 'game_type_id');
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class, 'customer_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
