<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function getCreate(){
        return view(('Manager.create'));    }
}
