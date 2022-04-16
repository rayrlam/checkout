<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Rule;

use Illuminate\Http\Request;

class CrudController extends Controller
{   

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storerule(Request $request)
    {   
 
        $request->validate([
            'itemid' => 'required',
            'method' => 'required',
            'qtyorid' => 'required',
            'price' => 'required',
        ]);

        $id =  trim($request->input('itemid'));
        $method =  trim($request->input('method'));
        $qtyorid = trim($request->input('qtyorid'));
        $price =  trim($request->input('price'));

        $rule = new Rule;
        $rule->item_id = $id;
        $rule->method = $method;
        $rule->qtyorid = $qtyorid;
        $rule->sprice = $price;

        $rule->eprice = $method == 0 ? round($price/$qtyorid,6) : $price;

        if(!$rule->save()){
            abort(500);
        }

        $success = 'New Rule Was Created!';
        return back()->with(compact(['success']));  
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard');
    }

    // For typeahead search
    public function itemsearch(Request $request)
    {
         
        $search = $request->input('search');
        $data = Item::select(['id','name','unitprice'])
                    ->where('name', 'like', "%{$search}%")->get();
        
        return response()->json($data);

    }

    /**
     * Show the form for creating a Rule.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRule()
    {   
        return view('crud.createRule');
    }


    /**
     * Show the form for creating a new Item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unitprice' => 'required|numeric',
        ]);

        $name =  trim($request->input('name'));

        $unitprice =  trim($request->input('unitprice'));

        $item = new Item;
        $item->name = $name;
        $item->unitprice = $unitprice;

        if(!$item->save()){
            abort(500);
        }

        $success = 'New Item Was Created!';
        return back()->with(compact(['success']));  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
