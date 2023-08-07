<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Customer
 * @package App\Models
 * @version August 4, 2023, 7:16 am UTC
 *
 * @property string $name
 * @property string $email
 * @property string $status
 * @property boolean $muted
 * @property integer $tokens
 */
class Customer extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'status',
        'muted',
        'tokens'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'email' => 'string',
        'status' => 'string',
        'muted' => 'boolean',
        'tokens' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:30',
        'email' => 'required|min:3|max:100',
        'status' => 'required|min:3|max:20',
        'muted' => 'required',
        'tokens' => 'required'
    ];

    
    public function user()
    {
        return $this->hasOne(\App\Models\User::class);
    }
}
