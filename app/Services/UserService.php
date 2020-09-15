<?php

namespace App\Services;


use App\Repositories\UserRepository;
use Dotenv\Repository\RepositoryBuilder;

class UserService
{

    /**
     * @Var userRepository
     *
     *
     */
    protected $userRepository;

    /**
     *  User Service Constructor
     * @param UserRepository $userRepository
     *
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($data)
    {
        return $this->userRepository->create($data);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function edit($id)
    {
        return $this->userRepository->edit($id);
    }

    public function show()
    {
        return $this->userRepository->show();
    }

    public function update($request, $id)
    {
        $this->userRepository->update($request, $id);
    }

    public function delete($id)
    {
        $this->userRepository->delete($id);
    }
}
