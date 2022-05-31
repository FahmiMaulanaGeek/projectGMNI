<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Calculator extends Controller
{
    public function calculator(Request $request)
    {
        $shape=$request->input('shape');
        $scale=$request->input('scale');
        $time=$request->input('time');
        $result= exp((-1*pow($time/$scale,$shape)));

        
    }
}
