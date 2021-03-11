<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchBlogPosts implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data =  Http::get('https://sq1-api-test.herokuapp.com/posts')->json();
        $adminUser = User::firstOrCreate([ 'name' => 'admin', 'email' => 'admin@example.com' ]);
        foreach($data['data'] ?? [] as $post ) {
            $adminUser->posts()->create($post);
        }
    }
}
