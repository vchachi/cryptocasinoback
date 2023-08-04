<?php

namespace App\Repositories;

use App\Models\CryptoPrice;
use App\Repositories\BaseRepository;

/**
 * Class CryptoPriceRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class CryptoPriceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'crypto_id',
        'datetime',
        'value'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CryptoPrice::class;
    }
}
