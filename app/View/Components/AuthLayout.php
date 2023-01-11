<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AuthLayout extends Component
{
    /**
     *  Get the view / contets that represents the component.
     */
    public function render(): View
    {
        return view('layouts.auth');
    }
}
