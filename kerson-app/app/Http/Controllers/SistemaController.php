<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemaController extends Controller
{
    public function ping (){
        return response()->json([
            'message'   => 'Server OK',
            'errors'    => [],
        ], 200);


            }

}
