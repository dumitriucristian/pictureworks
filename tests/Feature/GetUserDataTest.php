<?php

namespace Tests\Feature;

use Database\Factories\CommentFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Comment;

class GetUserDataTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_we_have_users()
    {
        User::factory(10)->create();
        $users = User::all();
        $this->assertCount(10,$users);
    }

    public function test_user_can_have_comments()
    {

        $user = User::factory()
            ->has(Comment::factory()->count(3), 'comments')
            ->create();

        $this->assertCount(3,$user->comments);
    }
}
