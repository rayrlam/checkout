<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Http;
use App\Models\Rss\Rss;
use App\Models\Rss\Feed;
use Carbon\Carbon;

class RssHelper {
    static public $url = 'https://www.youtube.com/feeds/videos.xml?channel_id=';
    static public $lifetime = 60;

    static public function storeFeed(string $url)
    {
        return json_encode(simplexml_load_string(Http::get($url)));  
    }

    static public function handleRss(int $id, bool $subscribed){
        $rss = Rss::find($id);
        if(!$rss){
            abort(404);
        }
        $rss->update(['subscribed' => $subscribed]);
        $url = self::$url . $rss->channel;
     
        if($subscribed){
            $feed = new Feed(); 
            $feed->rss_id = $id;
            $feed->xml = self::storeFeed($url);
            $feed->expirydate = date("Y-m-d H:i:s", strtotime('+'. self::$lifetime. ' minute'));
            if(!$feed->save()){
                abort(500);
            }    
        }else{
            self::rss_id($id)->delete();
        }
    }

    static private function rss_id(int $id){
        return Feed::where('rss_id', $id)->first() ?: abort(404);
    }

    static public function updateFeed(string $channel){
        $rss = Rss::where('channel', $channel)->first();

        if(!$rss){
            abort(404);
        }

        $feed = self::rss_id($rss->id);

        if($feed->expirydate < Carbon::now()){
            $url = self::$url . $rss->channel;
            $feed->update(['xml'=>self::storeFeed($url), 'expirydate'=>date("Y-m-d H:i:s", strtotime('+'. self::$lifetime. ' minute'))]);
        } 
 
        return [$rss->name, $feed];
    }
}