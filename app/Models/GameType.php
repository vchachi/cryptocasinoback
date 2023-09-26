<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class GameType
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property string $name
 * @property string $status
 * @property string $details
 */
class GameType extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'game_types';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',
        'details',
        'schema',
        'settings'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'status' => 'string',
        'details' => 'string',
        //'schema' => 'array',
        //'settings' => 'array'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:30',
        'status' => 'required|min:3|max:20',
        'details' => 'required|min:3|max:255',
        'schema' => 'nullable|json',
        'settings' => 'nullable|json'
    ];

    
}
