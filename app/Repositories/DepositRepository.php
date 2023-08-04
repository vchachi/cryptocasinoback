<?php

namespace App\Repositories;

use App\Models\Deposit;
use App\Repositories\BaseRepository;

/**
 * Class DepositRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class DepositRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'datetime',
        'crypto_id',
        'value',
        'status',
        'verified_id'
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
        return Deposit::class;
    }
}
