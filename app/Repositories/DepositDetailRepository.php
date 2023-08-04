<?php

namespace App\Repositories;

use App\Models\DepositDetail;
use App\Repositories\BaseRepository;

/**
 * Class DepositDetailRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class DepositDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'deposit_id',
        'datetime',
        'user_id',
        'value',
        'tokens',
        'status'
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
        return DepositDetail::class;
    }
}
