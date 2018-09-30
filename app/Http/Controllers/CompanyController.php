<?php

namespace App\Http\Controllers;

use App\Company;
use App\Exceptions\JsonException;
use App\Http\Requests\CompanyCreateRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Services\CompanyService;
use Exception;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    /**
     * @var CompanyService
     */
    private $companyService;

    /**
     * UserController constructor.
     * @param CompanyService $companyService
     */
    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $companies = $this->companyService->getPage();

        return response()->json([
            'companies' => $companies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyCreateRequest $request
     * @return Company
     * @throws JsonException
     */
    public function store(CompanyCreateRequest $request)
    {
        $attributes = $request->only('name');

        try {
            $company = $this->companyService->create($attributes);

            return response()->json([
                'company' => $company
            ]);

        } catch (\Exception $e) {
            throw new JsonException('can not be saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Company
     */
    public function show($id)
    {
        $company = $this->companyService->getById($id);

        return response()->json([
            'company' => $company
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyUpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function update(CompanyUpdateRequest $request, $id)
    {
        $attributes = $request->only('name');

        try {
            $company = $this->companyService->updateById($attributes, $id);

            return response()->json([
                'company' => $company
            ]);
        } catch (\Exception $e) {
            throw new JsonException('can not be updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return int
     * @throws Exception
     */
    public function destroy($id)
    {
        $isDeleted = $this->companyService->destroyById($id);
        if ($isDeleted) {
            return response()->json([
                'deleted' => true
            ]);
        }
        throw new JsonException('can not be deleted');
    }
}
