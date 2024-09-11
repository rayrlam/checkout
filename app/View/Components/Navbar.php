<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $dropdown = [
            'invoice' => [
                'index' => 'tasks.invoice.index',
                'location' => 'tasks.invoice.location',
                'headers' => 'tasks.invoice.headers',
                'total' => 'tasks.invoice.total',
            ],
            'category' => [
                'index' => 'tasks.category.index',
                'breadcrumb' => 'tasks.category.breadcrumb',
                'breadcrumbs' => 'tasks.category.breadcrumbs',
                'categories' => 'tasks.category.categories',
            ],
            'quotation' => 'tasks.quotation.index',
            'checkout' => [
                'index' => 'tasks.checkout.index',
                'calculator' => 'tasks.checkout.calculator',
                'register' => 'register',
                'login' => 'login',
            ]
        ];

        return view('components.navbar', compact('dropdown'));
    }
}
