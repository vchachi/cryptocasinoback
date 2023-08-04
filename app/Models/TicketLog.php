<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class TicketLog
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $ticket_id
 * @property foreignId $user_id
 * @property string $origin
 * @property string $datetime
 * @property string $text
 */
class TicketLog extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'ticket_logs';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ticket_id',
        'user_id',
        'origin',
        'datetime',
        'text'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'origin' => 'string',
        'text' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ticket_id' => 'required|exists:tickets,id',
        'user_id' => 'required|exists:users,id',
        'origin' => 'required|min:3|max:20',
        'datetime' => 'required|date',
        'text' => 'required'
    ];

    
    public function ticket()
    {
        return $this->belongsTo(\App\Models\Ticket::class, 'ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
