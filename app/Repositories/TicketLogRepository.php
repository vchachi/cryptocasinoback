<?php

namespace App\Repositories;

use App\Models\TicketLog;
use App\Repositories\BaseRepository;

/**
 * Class TicketLogRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class TicketLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ticket_id',
        'user_id',
        'origin',
        'datetime',
        'text'
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
        return TicketLog::class;
    }
}
