<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class WithdrawTicket
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $ticket_id
 * @property foreignId $withdraw_id
 * @property foreignId $user_id
 * @property string $datetime
 * @property string $status
 */
class WithdrawTicket extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'withdraw_tickets';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'ticket_id',
        'withdraw_id',
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
        'withdraw_id' => 'required|exists:withdraws,id',
        'user_id' => 'required|exists:users,id',
        'datetime' => 'required|date',
        'status' => 'required|min:3|max:20'
    ];

    
    public function ticket()
    {
        return $this->belongsTo(\App\Models\Ticket::class, 'ticket_id');
    }

    public function withdraw()
    {
        return $this->belongsTo(\App\Models\Withdraw::class, 'withdraw_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
