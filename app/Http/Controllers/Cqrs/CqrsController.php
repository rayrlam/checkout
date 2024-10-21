<?php
namespace App\Http\Controllers\Cqrs;

use App\CQRS\Queries\GetProductQuery;
use App\Http\Controllers\Controller as BaseController;
use App\Models\Cqrs\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CqrsController extends BaseController
{  
    private $links;
    private $title = 'Cqrs';
    protected $queryBus;

    public function __construct() {
        $this->links =  [
            'index' => '/tasks/cqrs/index',
            'products' => '/tasks/cqrs/list',
        ];
    }

    public function index()
    {
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.cqrs.index', compact(['title']));
    }
   
    public function list(){
        $products = Product::all();
        $title = $this->title;
        View::share('links', $this->links);
        return view('tasks.cqrs.list', compact(['title','products']));
    }
}