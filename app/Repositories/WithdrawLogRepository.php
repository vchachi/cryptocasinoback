<?php

namespace App\Repositories;

use App\Models\WithdrawLog;
use App\Repositories\BaseRepository;

/**
 * Class WithdrawLogRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class WithdrawLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'withdraw_id',
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
        return WithdrawLog::class;
    }
}
