<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_be_created()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '123-456-7890',
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'johndoe@example.com',
        ]);
    }
}
