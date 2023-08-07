<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GameLog
 * @package App\Models
 * @version August 7, 2023, 7:43 pm UTC
 *
 * @property foreignId $game_detail_id
 * @property string $status
 * @property string $datetime
 * @property json $log
 */
class GameLog extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'game_logs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'game_detail_id',
        'status',
        'datetime',
        'log'
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
        'game_detail_id' => 'required|exists:game_details,id',
        'status' => 'required|min:3|max:20',
        'datetime' => 'required|date',
        'log' => 'required'
    ];

    
}
