<?php

namespace App\Http\Controllers\Rss;

use App\Helpers\RssHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Models\Rss\Rss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RssController extends BaseController
{
    private $links;
    private $title = 'Rss';

    public function __construct() {
        $this->links =  [
            'index' => '/tasks/rss/index',
            'rss' => '/tasks/rss/rss',
        ];
    }

    public function index()
    {
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.rss.index', compact(['title']));
    }

    public function rss(Request $request)
    {   
        if ($request->isMethod('post')) {
 
            $request->validate([
                'id' => 'required|integer',
                'subscribed' => 'required|boolean',
            ]);
 
            RssHelper::handleRss($request->input('id'), $request->input('subscribed'));
        }

        $rsses = Rss::all();
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.rss.rss', compact(['rsses','title']));
    }

    public function feed($channel)
    {
        $feed = RssHelper::updateFeed($channel);
       
        if($feed && $feed[1]){
            $feeds = json_decode($feed[1]->xml, TRUE)['entry'];
            $name = $feed[0];  
        }else{
            $feeds = [];
            $name = '';
        }
    
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.rss.feed', compact(['feeds','name','title']));
    }
}