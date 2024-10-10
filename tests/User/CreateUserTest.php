<?php

namespace Tests\User;

use App\Core\Application\Dtos\CreateUserDTO;
use App\Core\Application\Services\User\CreateUserService;
use App\Core\Infra\Repositories\User\UserRepository;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    public UserRepository $userRepository;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepository();
    }

    public function test_deve_criar_um_usuario()
    {
        $userDTO = new CreateUserDTO("Wallison Felipe", "wallisonfelipe99@gmail.com", "123123123");

        $user = (new CreateUserService($this->userRepository))->execute($userDTO);
        $this->assertEquals("Wallison Felipe", $user->name);
        $this->assertEquals("wallisonfelipe99@gmail.com", $user->email);
    }
}
