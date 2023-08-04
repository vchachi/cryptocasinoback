<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CryptoPrice
 * @package App\Models
 * @version August 4, 2023, 7:17 am UTC
 *
 * @property foreignId $crypto_id
 * @property string $datetime
 * @property number $value
 */
class CryptoPrice extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'crypto_prices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'crypto_id',
        'datetime',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'crypto_id' => 'required|exists:cryptos,id',
        'datetime' => 'required|date',
        'value' => 'required|min:0|max:99999.99'
    ];

    
    public function crypto()
    {
        return $this->belongsTo(\App\Models\Crypto::class, 'crypto_id');
    }
}
