<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Repositories\ClientRepository;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    protected $clientRepository;
    protected $clientService;

    public function __construct(ClientRepository $clientRepository, ClientService $clientService)
    {
        $this->middleware('auth');
        $this->clientRepository = $clientRepository;
        $this->clientService = $clientService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.index');
    }

    public function getClients(Request $request)
    {
        $request = $request->all();
        echo json_encode($this->clientService->getClients($request));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $create = $this->clientService->create($data);
        if ($create['error']) {
            return redirect()->back()->withErrors($create['message']);
        }

        return redirect()
            ->route('clients.index')
            ->with('success', $create['message']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = $this->clientRepository->find($id);
        return view('client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $data = $request->all();
        $update = $this->clientService->update($data, $id);
        if ($update['error']) {
            return redirect()->back()->withErrors($update['message']);
        }

        return redirect()
            ->route('clients.index')
            ->with('success', $update['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = $this->clientService->destroy($id);
        $key = $destroy['error'] ? 'error' : 'success';

        return redirect()
            ->route('clients.index')
            ->with($key, $destroy['message']);
    }
}
