<?php

namespace App\Repositories;

use App\Models\WithdrawTicket;
use App\Repositories\BaseRepository;

/**
 * Class WithdrawTicketRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class WithdrawTicketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'ticket_id',
        'withdraw_id',
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
        return WithdrawTicket::class;
    }
}
