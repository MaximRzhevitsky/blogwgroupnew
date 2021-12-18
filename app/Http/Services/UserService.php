<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Collection;

class UserService
{
    function __construct()
    {
        $this->userModel = new User();
    }


    public function getUserById($id): object
    {
        return $this->userModel->getUserById($id);
    }


    public function updateUser($params): bool
    {
        return $this->userModel->edit($params);
    }


    public function deleteUser($id): bool
    {
        return $this->userModel->deleteUser($id);
    }


    public function getStatus($id): ?string
    {
        return $this->userModel->getStatus($id);
    }


    public function setStatus($id,$status): bool
    {
        return $this->userModel->setStatus($id,$status);
    }


    public function getUsers(): Collection
    {
        return $this->userModel->getUsers();
    }



}
