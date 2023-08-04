<?php

namespace App\Repositories;

use App\Models\DepositTicketDetail;
use App\Repositories\BaseRepository;

/**
 * Class DepositTicketDetailRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class DepositTicketDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ticket_id',
        'user_id',
        'datetime',
        'text',
        'status',
        'confirmation_evidence'
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
        return DepositTicketDetail::class;
    }
}
