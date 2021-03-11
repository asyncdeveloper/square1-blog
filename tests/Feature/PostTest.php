<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class PostTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

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

    /**
     * @test
     * @return void
     */
    public function loggedInUserCanCreateAPostWithValidData()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('posts.store'), $attributes =  [
                'title' => 'My Title Goes Thus',
                'description' => 'Description is here',
                'publication_date' => now()->toDateString()
            ])->assertSessionHasNoErrors()
            ->assertRedirect(route('posts.index'));

        $this->assertDatabaseHas('posts', $attributes);
    }

    /**
     * @test
     * @return void
     */
    public function loggedInUserCanNotCreateAPostWithInvalidBody()
    {
        $this->actingAs(User::factory()->create())
            ->post(route('posts.store'), $attributes =  [
                'title' => 'Ms',
                'description' => 'Description is here'
            ])->assertSessionHasErrors();

        $this->assertDatabaseMissing('posts', $attributes);
    }
}
