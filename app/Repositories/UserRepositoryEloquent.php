<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\UserRepository;
use App\Validators\UserValidator;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getUsers(array $request)
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
                if (isset($request['searchSituation']) && $request['searchSituation']) {
                    $where->where($request['searchSituation'], 1);
                }
            })
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
