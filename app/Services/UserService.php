<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers(array $request) 
    {
        $data = [];
        $users = $this->userRepository->getUsers($request);

        foreach($users as $user) {
            $tdDelete = '';
            if(Auth::user()->id !== $user->id) {
                $tdDelete = '<a class="btn btn-danger button-delete" data-id="'.$user->id.'" data-link="users">'.
                    '<i class="fas fa-trash-alt"></i>'.
                '</a>';
            }

            $data[] = [
                $user->name,
                $user->email,
                $user->situation ? 'Ativo' : 'Inativo',
                '<td>'.
                    '<a class="btn btn-primary" href="'.route("users.edit", $user->id).'">'.
                        '<i class="fas fa-user-edit"></i>'.
                    '</a>&nbsp'.
                    $tdDelete .
                '</td>'
            ];
        }

        $total_employees = $this->userRepository->count();
        $output = [
            "draw" => intval($request['draw']),
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        ];

        return $output;
    }

    public function create(array $data)
    {
        try {
            $this->userRepository->create($data);
            return [
                'error' => false,
                'message' => 'Usuário criado com sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th);
            return [
                'error' => true,
                'message' => 'Não foi possivel salvar as informações do usuário!'
            ];
        }
    }

    public function update(array $data, int $id)
    {
        try {
            if (!isset($data['editPassword'])) {
                unset($data['password']);
            }
            $this->userRepository->update($data, $id);
            return [
                'error' => false,
                'message' => 'Usuário atualizado com sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th);
            return [
                'error' => true,
                'message' => 'Não foi possivel atualizar as informações do c!'
            ];
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->userRepository->delete($id);
            return [
                'error' => false,
                'message' => 'Usuário excluído com sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th);
            return [
                'error' => true,
                'message' => 'Não foi possível excluir o Usuário!'
            ];
        }
    }
}