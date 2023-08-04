<?php

namespace App\Repositories;

use App\Models\Crypto;
use App\Repositories\BaseRepository;

/**
 * Class CryptoRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class CryptoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'current_price',
        'active',
        'type'
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
        return Crypto::class;
    }
}
