<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DepositTicket
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $ticket_id
 * @property foreignId $deposit_id
 * @property foreignId $user_id
 * @property string $datetime
 * @property string $status
 */
class DepositTicket extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'deposit_tickets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ticket_id',
        'deposit_id',
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
        'ticket_id' => 'required|exists:tickets,id',
        'deposit_id' => 'required|exists:deposits,id',
        'user_id' => 'required|exists:users,id',
        'datetime' => 'required|date',
        'status' => 'required|min:3|max:20'
    ];

    
    public function ticket()
    {
        return $this->belongsTo(\App\Models\Ticket::class, 'ticket_id');
    }

    public function deposit()
    {
        return $this->belongsTo(\App\Models\Deposit::class, 'deposit_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
