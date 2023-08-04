<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Crypto
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property string $name
 * @property number $current_price
 * @property boolean $active
 * @property string $type
 */
class Crypto extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cryptos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'current_price',
        'active',
        'type'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'current_price' => 'float',
        'active' => 'boolean',
        'type' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|min:3|max:30',
        'current_price' => 'required|min:0|max:99999.99',
        'active' => 'required',
        'type' => 'required|min:3|max:20'
    ];

    
}
