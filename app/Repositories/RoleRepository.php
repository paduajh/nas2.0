<?php

namespace App\Repositories;

use App\Models\Acl\Role;
use App\Repositories\BaseRepository;

/**
 * Class RoleRepository
 * @package App\Repositories
 * @version March 27, 2022, 8:36 pm UTC
*/

class RoleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'guard_name'
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
        return Role::class;
    }
}
