<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Company as CompanyResource;
use App\Http\Resources\Client as ClientResource;
use App\Models\Company;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CompanyController extends Controller
{
    /**
     * @var \App\Models\Company
     */
    protected Company $companyModel;

    /**
     * CompanyController constructor.
     * @param \App\Models\Company $company
     */
    public function __construct(Company $company)
    {
        $this->companyModel = $company;
    }

    /**
     * Get companies list.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return CompanyResource::collection($this->companyModel::paginate());
    }

    /**
     * Get clients list by company id.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function clients(Company $company): AnonymousResourceCollection
    {
        $clients = $this->companyModel::where('id', $company->id)->first()->clients;

        return ClientResource::collection($clients);
    }
}
