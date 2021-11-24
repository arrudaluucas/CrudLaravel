<?php

namespace App\Repositories;

use App\Models\Client;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ClientRepository;
use App\Validators\ClientValidator;

/**
 * Class ClientRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ClientRepositoryEloquent extends BaseRepository implements ClientRepository
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

    public function getClients(array $request)
    {
        return $this->model
            ->where(function ($where) use ($request) {
                if (isset($request['searchName']) && $request['searchName']) {
                    $where->where('name', 'like', '%' . $request['searchName'] . '%');
                }
                if (isset($request['city']) && $request['city']) {
                    $where->where('city', 'like', '%' . $request['city'] . '%');
                }
                if (isset($request['state']) && $request['state']) {
                    $where->where('state', 'like', '%' . $request['state'] . '%');
                }
                if (isset($request['searchOrigin']) && $request['searchOrigin']) {
                    $where->where($request['searchOrigin'], 1);
                }
                if (isset($request['searchSituation'])) {
                    $where->where('situation', '=', $request['searchSituation']);
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
