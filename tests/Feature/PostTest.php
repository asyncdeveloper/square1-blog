<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * @return void
     */
    public function guestUserCanViewAllPosts()
    {
        $posts = Post::factory()->for(User::factory())->count(5)->create();

        $response = $this->get(route('homepage'));

        $response->assertStatus(200);

        $posts->each(function ($post) use ($response) {
            $response->assertSeeText($post->title);
        });
    }

    /**
     * @test
     * @return void
     */
    public function guestUserWillSeeFallBackTextIfNoPost()
    {
        $response = $this->get(route('homepage'));

        $response->assertStatus(200)
            ->assertSeeText('No Posts found');
    }
}
