<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class DepositTicketDetail
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $ticket_id
 * @property foreignId $user_id
 * @property string $datetime
 * @property string $text
 * @property string $status
 * @property string $confirmation_evidence
 */
class DepositTicketDetail extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'deposit_ticket_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'deposit_ticket_id',
        'user_id',
        'datetime',
        'text',
        'status',
        'confirmation_evidence'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'text' => 'string',
        'status' => 'string',
        'confirmation_evidence' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'deposit_ticket_id' => 'required|exists:deposit_tickets,id',
        'user_id' => 'required|exists:users,id',
        'datetime' => 'required|date',
        'text' => 'required',
        'status' => 'required|min:3|max:20',
        'confirmation_evidence' => 'nullable|min:3|max:255'
    ];

    
    public function deposit_ticket()
    {
        return $this->belongsTo(\App\Models\DepositTicket::class, 'deposit_ticket_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
