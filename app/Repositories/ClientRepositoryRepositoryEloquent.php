<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClientRepositoryRepository;
use App\Entities\ClientRepository;
use App\Models\Client;
use App\Validators\ClientRepositoryValidator;

/**
 * Class ClientRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClientRepositoryRepositoryEloquent extends BaseRepository implements ClientRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Client::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
