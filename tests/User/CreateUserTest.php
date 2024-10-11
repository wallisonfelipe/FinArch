<?php

namespace Tests\User;

use App\Core\Application\Dtos\CreateUserDTO;
use App\Core\Application\Services\User\CreateUser;
use App\Core\Infra\Repositories\User\UserRepositoryMemory;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    public UserRepositoryMemory $userRepository;
    
    public function setUp(): void
    {
        parent::setUp();
        $this->userRepository = new UserRepositoryMemory();
    }

    public function test_deve_criar_um_usuario()
    {
        $userDTO = new CreateUserDTO("Wallison Felipe", "wallisonfelipe99@gmail.com", "123123123");

        $user = (new CreateUser($this->userRepository))->execute($userDTO);
        $this->assertEquals("Wallison Felipe", $user->name);
        $this->assertEquals("wallisonfelipe99@gmail.com", $user->email);
    }

    public function test_nao_deve_criar_usuario_por_email_duplicado()
    {
        $this->expectException(\Exception::class);
        $userDTO = new CreateUserDTO("Wallison Felipe", "wallisonfelipe99@gmail.com", "123123123");

        $user = (new CreateUser($this->userRepository))->execute($userDTO);
        $this->assertEquals("Wallison Felipe", $user->name);
        $this->assertEquals("wallisonfelipe99@gmail.com", $user->email);

        $userDTO = new CreateUserDTO("Felipe Silva", "wallisonfelipe99@gmail.com", "123123123");

        $user = (new CreateUser($this->userRepository))->execute($userDTO);
        
        $this->expectExceptionMessage("E-mail already exists");

    }

    public function test_nao_deve_criar_usuario_por_nome_vazio()
    {
        $this->expectException(\Exception::class);
        $userDTO = new CreateUserDTO("", "wallisonfelipe99@gmail.com", "123123123");
        
        (new CreateUser($this->userRepository))->execute($userDTO);
        
        $this->expectExceptionMessage("Name is required");
    }


    public function test_nao_deve_criar_usuario_por_email_vazio()
    {
        $this->expectException(\Exception::class);
        $userDTO = new CreateUserDTO("Wallison", "", "123123123");
        
        (new CreateUser($this->userRepository))->execute($userDTO);
        
        $this->expectExceptionMessage("E-mail is required");
    }

    public function test_nao_deve_criar_usuario_por_senha_vazia()
    {
        $this->expectException(\Exception::class);
        $userDTO = new CreateUserDTO("Wallison", "wallisonfelipe99@gmail.com", "");
        
        (new CreateUser($this->userRepository))->execute($userDTO);
        
        $this->expectExceptionMessage("Password is required");
    }

    public function test_nao_deve_criar_usuario_por_email_invalido()
    {
        $this->expectException(\Exception::class);
        $userDTO = new CreateUserDTO("Wallison", "wallisonfelipe99gmail.com", "123123123");
        
        (new CreateUser($this->userRepository))->execute($userDTO);
        
        $this->expectExceptionMessage("Invalid e-mail");
    }
}
