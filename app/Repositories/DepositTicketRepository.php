<?php

namespace App\Repositories;

use App\Models\DepositTicket;
use App\Repositories\BaseRepository;

/**
 * Class DepositTicketRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class DepositTicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ticket_id',
        'deposit_id',
        'user_id',
        'datetime',
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
        return DepositTicket::class;
    }
}
