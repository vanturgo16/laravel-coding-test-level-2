<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Str;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $password = Hash::make('12345');
        $uuid=Str::orderedUuid();

        $data = [
            'id' => $uuid,
            'name' => 'User Test 1',
            'username' => 'usertest1',
            'password' => $password,
            'role' => 'PRODUCT_OWNER',
            'type' => 'PRODUCT_OWNER'
        ];
        $this->post(route('addUser'), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
}
