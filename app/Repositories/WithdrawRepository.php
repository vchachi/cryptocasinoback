<?php

namespace App\Repositories;

use App\Models\Withdraw;
use App\Repositories\BaseRepository;

/**
 * Class WithdrawRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class WithdrawRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'datetime',
        'crypto_id',
        'value',
        'tokens',
        'status',
        'confirmed_id',
        'withdraw_address',
        'customer_name'
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
        return Withdraw::class;
    }
}
