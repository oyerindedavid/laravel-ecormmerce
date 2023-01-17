<?php

namespace App\View\Composers;

use Illuminate\View\View;
use Illuminate\Http\Request;

class DataComposer
{
    protected $cart;

    public function __construct(Request $request)
    {
        // Dependencies are automatically resolved by the service container...
        $this->cart = 'Hello Cart';
    }

    public function compose(View $view)
    {
        $view->with('cart', $this->cart);
    }
}