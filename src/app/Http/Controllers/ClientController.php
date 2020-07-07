<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * @var Client
     */
    protected Client $clientModel;

    /**
     * CompanyController constructor.
     * @param \App\Models\Client $client
     */
    public function __construct(Client $client)
    {
        $this->clientModel = $client;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $clients = $this->clientModel::paginate(150);

        return \view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return \view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Client\ClientStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientStoreRequest $request): RedirectResponse
    {
        $client = $this->clientModel::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone_number'),
            'address' => $request->input('address'),
        ]);

        return redirect()
            ->route('frontend.clients.create')
            ->with('success', sprintf('Client %s was created.', $client->name));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\View\View
     */
    public function edit(Client $client): View
    {
        return \view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Client\ClientUpdateRequest $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClientUpdateRequest $request, Client $client): RedirectResponse
    {
        $client->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
        ]);

        return redirect()
            ->route('frontend.clients.edit', $client)
            ->with('success', sprintf('Client %s was updated.', $client->name));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Client $client): RedirectResponse
    {
        $client->delete();

        return redirect()
            ->back()
            ->with('success', sprintf('Client %s was deleted.', $client->name));
    }
}
