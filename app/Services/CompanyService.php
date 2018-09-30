<?php
/**
 * Created by PhpStorm.
 * User: aden
 * Date: 30.09.2018
 * Time: 17:35
 */

namespace App\Services;


use App\Company;

class CompanyService
{
    /**
     * @var Company
     */
    private $companyModel;

    public function __construct(Company $companyModel)
    {
        $this->companyModel = $companyModel;
    }

    /**
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        $company = $this->companyModel->create($attributes);
        $company->saveOrFail();

        return $company;
    }

    /**
     * @param $id
     * @return Company
     */
    public function getById($id)
    {
        return $this->companyModel->with('users')->find($id);
    }

    /**
     * Get users
     * @return mixed
     */
    public function getPage()
    {
        return $this->companyModel->with('users')->paginate($this->perPage);
    }

    public function updateById($attributes, $id)
    {
        $company = $this->companyModel->find($id);
        $company->fill($attributes);
        $company->saveOrFail();
        return $company;
    }

    /**
     * @param $id
     * @return int
     */
    public function destroyById($id)
    {
        return $this->companyModel->destroy($id);
    }
}