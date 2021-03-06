<?php

namespace App\Services;

use App\Repositories\ClientRepository;
use Illuminate\Support\Facades\Log;

class ClientService
{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function setOrigins(array $data)
    {
        $data['indication'] = isset($data['indication']) && $data['indication'] == 'on' ? 1 : 0;
        $data['site'] = isset($data['site']) && $data['site'] == 'on' ? 1 : 0;
        $data['facebook'] = isset($data['facebook']) && $data['facebook'] == 'on' ? 1 : 0;
        $data['faceToFace'] = isset($data['faceToFace']) && $data['faceToFace'] == 'on' ? 1 : 0;
        return $data;
    }

    public function getClients(array $request) 
    {
        $data = [];
        $clients = $this->clientRepository->getClients($request);

        foreach($clients as $client) {
            $data[] = [
                $client->name,
                $client->email,
                $client->document,
                $client->phone,
                $this->moutOriginTd($client),
                $client->situation ? 'Ativo' : 'Inativo',
                '<td>'.
                    '<a class="btn btn-primary" href="'.route("clients.edit", $client->id).'">'.
                        '<i class="fas fa-edit"></i>'.
                    '</a>&nbsp'.
                    '<a class="btn btn-danger button-delete" data-id="'.$client->id.'" data-link="clients">'.
                        '<i class="fas fa-trash-alt"></i>'.
                    '</a>'.
                '</td>'
            ];
        }

        $total_employees = $this->clientRepository->count();
        $output = [
            "draw" => intval($request['draw']),
            "recordsTotal" => $total_employees,
            "recordsFiltered" => $total_employees,
            "data" => $data
        ];

        return $output;
    }

    public function moutOriginTd(object $client)
    {
        $origin = [];
        if ($client->facebook) {
            $origin[] = 'Facebook';
        }
        if ($client->site) {
            $origin[] = 'Site';
        }
        if ($client->faceToFace) {
            $origin[] = 'Boa a boca';
        }
        if ($client->indication) {
            $origin[] = 'Indica??ao';
        }

        return implode(', ', $origin);
    }

    public function create(array $data)
    {
        $data = $this->setOrigins($data);
        try {
            $this->clientRepository->create($data);
            return [
                'error' => false,
                'message' => 'Cliente criado com sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th);
            return [
                'error' => true,
                'message' => 'N??o foi possivel salvar as informa????es do cliente!'
            ];
        }
    }

    public function update(array $data, int $id)
    {
        $data = $this->setOrigins($data);
        try {
            $this->clientRepository->update($data, $id);
            return [
                'error' => false,
                'message' => 'Cliente atualizado com sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th);
            return [
                'error' => true,
                'message' => 'N??o foi possivel atualizar as informa????es do cliente!'
            ];
        }
    }

    public function destroy(int $id)
    {
        try {
            $this->clientRepository->delete($id);
            return [
                'error' => false,
                'message' => 'Cliente exclu??do com sucesso!'
            ];
        } catch (\Throwable $th) {
            Log::error($th);
            return [
                'error' => true,
                'message' => 'N??o foi poss??vel excluir o cliente!'
            ];
        }
    }
}