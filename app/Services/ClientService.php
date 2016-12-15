<?php

namespace CodeDelivery\Services;

use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Repositories\UserRepository;

class ClientService
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * ClientService constructor.
     *
     * @param ClientRepository $clientRepository
     * @param UserRepository $userRepository
     */
    public function __construct(ClientRepository $clientRepository, UserRepository $userRepository)
    {
        $this->clientRepository = $clientRepository;
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {
        $data['user']['password'] = bcrypt(123456);
        $user = $this->userRepository->create($data['user']);

        $data['user_id'] = $user->id;
        $this->clientRepository->create($data);
    }
    
    public function update(array $data, $id)
    {
        // Update Clients table
        $this->clientRepository->update($data, $id);

        // Get Client ID
        $userId = $this->clientRepository->find($id, ['user_id'])->user_id;

        // Update Users table using '$userId'
        $this->userRepository->update($data['user'], $userId);
    }
}


