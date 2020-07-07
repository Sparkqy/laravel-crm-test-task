<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Http\Resources\Client as ClientResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClientController extends Controller
{
    /**
     * @var \App\Models\Client
     */
    protected Client $clientModel;

    /**
     * ClientController constructor.
     * @param \App\Models\Client $client
     */
    public function __construct(Client $client)
    {
        $this->clientModel = $client;
    }

    /**
     * Get companies list by client id.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function companies(Client $client): AnonymousResourceCollection
    {
        $companies = $this->clientModel::where('id', $client->id)->first()->companies;

        return ClientResource::collection($companies);
    }
}
