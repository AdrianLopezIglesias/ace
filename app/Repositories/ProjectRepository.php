<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\BaseRepository;

/**
 * Class ProjectRepository
 * @package App\Repositories
 * @version August 29, 2021, 1:48 am UTC
*/

class ProjectRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'title',
        'description',
        'tecnologias'
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
        return Project::class;
    }
}
