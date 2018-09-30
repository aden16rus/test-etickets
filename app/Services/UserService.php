<?php

namespace App\Services;

use App\{
    Exceptions\JsonException, User, Company
};
use Illuminate\Database\Connection;

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
     * @var Connection
     */
    private $dbManager;

    /**
     * UserService constructor
     * @param User $userModel
     * @param Company $company
     * @param Connection $dbManager
     */
    public function __construct(User $userModel, Company $company, Connection $dbManager)
    {
        $this->userModel = $userModel;
        $this->company = $company;
        $this->dbManager = $dbManager;
    }

    /**
     * Creates new user
     * @param array $attributes
     * @return mixed
     * @throws JsonException
     */
    public function create(array $attributes)
    {
        try {
            $this->dbManager->beginTransaction();

            $attributes['password'] = bcrypt($attributes['password']);
            $user = $this->userModel->create($attributes);
            $user->saveOrFail();

            if (isset($attributes['company'])) {
                $company = $this->company->find($attributes['company']);
                $user->companies()->save($company);
            }

            return $user;
        } catch(\Exception $e) {
            $this->dbManager->rollBack();
            throw new JsonException('error on db query');
        }
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
        