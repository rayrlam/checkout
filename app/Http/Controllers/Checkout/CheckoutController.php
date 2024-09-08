<?php
namespace App\Http\Controllers\Checkout;

use App\Helpers\CheckoutHelper;
use App\Http\Controllers\Controller as BaseController;
use App\Models\Checkout\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CheckoutController extends BaseController
{  
    private $links;

    public function __construct() {
        $this->links =  [
            'index' => '/tasks/checkout/index',
            'calculator' => '/tasks/checkout/calculator',
            'dashboard' => '/dashboard',
        ];
    }

    public function index()
    {
        $rules = [
            [
                'A',
                50,
                '3 for 130'
            ],
            [
                'B',
                30,
                '2 for 45'
            ],
            [
                'C',
                20,
                '2 for 38::3 for 50'
            ],
            [
                'D',
                15,
                '5 if purchased with an ‘A’'
            ],
            [
                'E',
                5,
                null
            ]
        ];
        View::share('links', $this->links);
        return view('tasks.checkout.index', compact(['rules']));
    }

    public function calculator()
    {
        $rules = [
            ['A','3 for 130'],
            ['B','2 for 45'],
            ['C','2 for 38<br/>3 for 50'],
            ['D','5 if purchased with an ‘A’'],
        ];
        $items = Item::all();
        $total = 0;
        View::share('links', $this->links);

        return view('tasks.checkout.calculator',compact(['items', 'total', 'rules']));
    }

    public function cal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'items.*' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    if ($value !== null && !is_numeric($value)) {
                        $fail("The $attribute must be a number.");
                    }
                    if (is_numeric($value) && $value <= 0) {
                        $fail("The $attribute must be greater than 0.");
                    }
                },
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $arr = [];
        foreach($request->input('items') as $id=>$val)
        {
            $arr[] = ['item_id'=>$id, 'qty'=>$val];
        }

        return back()->with(['items'=>Item::all(), 'total'=>CheckoutHelper::checkout($arr)]);
    }    
}