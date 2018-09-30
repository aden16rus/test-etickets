<?php

namespace App\Services;

use App\{User, Company};

class UserService
{
    /**
     * @var User
     */
    private $userModel;
    /**
     * @var Company
     */
    private $company;

    /**
     * @var int
     */
    private $perPage = 10;

    /**
     * UserService constructor
     * @param User $userModel
     * @param Company $company
     */
    public function __construct(User $userModel, Company $company)
    {
        $this->userModel = $userModel;
        $this->company = $company;
    }

    /**
     * Creates new user
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $attributes['password'] = bcrypt($attributes['password']);
        $user = $this->userModel->create($attributes);
        $user->saveOrFail();

        if (isset($attributes['company'])) {
            $company = $this->company->find($attributes['company']);
            $user->companies()->save($company);
        }

        return $user;
    }

    /**
     * @param $id
     * @return User
     */
    public function getById($id)
    {
        return $this->userModel->with('companies')->find($id);
    }

    /**
     * Get users
     * @return mixed
     */
    public function getPage()
    {
        return $this->userModel->with('companies')->paginate($this->perPage);
    }

    public function updateById($attributes, $id)
    {
        $attributes['password'] = bcrypt($attributes['password']);
        $user = $this->userModel->find($id);
        $user->fill($attributes);
        $user->saveOrFail();
        return $user;
    }

    public function destroyById($id)
    {
        return $this->userModel->destroy($id);
    }
}
        