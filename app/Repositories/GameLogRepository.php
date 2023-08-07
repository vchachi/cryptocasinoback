<?php

namespace App\Repositories;

use App\Models\GameLog;
use App\Repositories\BaseRepository;

/**
 * Class GameLogRepository
 * @package App\Repositories
 * @version August 7, 2023, 7:43 pm UTC
*/

class GameLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'game_detail_id',
        'status',
        'datetime',
        'log'
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
        return GameLog::class;
    }
}
