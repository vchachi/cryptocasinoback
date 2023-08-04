<?php

namespace App\Repositories;

use App\Models\GameDetail;
use App\Repositories\BaseRepository;

/**
 * Class GameDetailRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class GameDetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'game_type_id',
        'customer_id',
        'user_id',
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
        return GameDetail::class;
    }
}
