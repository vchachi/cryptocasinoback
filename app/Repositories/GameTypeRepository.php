<?php

namespace App\Repositories;

use App\Models\GameType;
use App\Repositories\BaseRepository;

/**
 * Class GameTypeRepository
 * @package App\Repositories
 * @version August 4, 2023, 7:17 am UTC
*/

class GameTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'status',
        'details',
        'schema',
        'settings'
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
        return GameType::class;
    }
}
