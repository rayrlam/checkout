<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Rss\Rss;
use App\Models\Rss\Feed;
use Illuminate\Foundation\Testing\DatabaseTransactions;
 
class RssTest extends TestCase
{
    use DatabaseTransactions;
    
    public function test_welcome_page_can_be_rendered()
    {
        $response = $this->get('/tasks/rss/index');
        $response->assertStatus(200);
    }

    public function test_rss_page_can_be_rendered()
    {
        $response = $this->get('/tasks/rss/rss');
        $response->assertStatus(200);
    }

    public function test_can_follow()
    {
        Rss::query()->update(['subscribed' => 0]);
        $response = $this->post('/tasks/rss/rss',[
            'id' => 1,
            'subscribed' => 1
        ]);

        $rss = Rss::find(1);
        $data = Feed::latest()->first();
            
        $response = $this->get('/tasks/rss/feed/' .  $rss->channel);
        $response->assertStatus(200);
        $this->assertEquals($data->rss_id , 1);
    }

    public function test_can_unfollow()
    {
        Rss::query()->update(['subscribed' => 1]);
        $response = $this->post('/tasks/rss/rss',[
            'id' => 2,
            'subscribed' => 0
        ]);

        $rss = Rss::find(2);

        $response = $this->get('/tasks/rss/feed/' .  $rss->channel);
        $response->assertStatus(404);
        $this->assertEquals($rss->subscribed , 0);
    }

    public function test_subscribed_count_equals_3(){
        Rss::query()->update(['subscribed' => 0]);

        $this->post('/tasks/rss/rss',[
            'id' => 1,
            'subscribed' => 1
        ]);
        $this->post('/tasks/rss/rss',[
            'id' => 3,
            'subscribed' => 1
        ]);
        $this->post('/tasks/rss/rss',[
            'id' => 5,
            'subscribed' => 1
        ]);

        $count = Rss::where('subscribed', 1)->count();
        $this->assertEquals($count , 3);
    }
}