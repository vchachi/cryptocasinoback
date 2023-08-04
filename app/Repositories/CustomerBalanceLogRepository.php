<?php

namespace App\Repositories;

use App\Models\CustomerBalanceLog;
use App\Repositories\BaseRepository;

/**
 * Class CustomerBalanceLogRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class CustomerBalanceLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customer_id',
        'user_id',
        'datetime',
        'awarded_tokens',
        'taken_tokens',
        'reason'
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
        return CustomerBalanceLog::class;
    }
}
