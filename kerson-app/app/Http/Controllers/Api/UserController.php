<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){


        $users = User::all();

        return response()->json($users);
        
        }


        public function show(Product $product){
        //
        }


        public function store(){
        //
        }


        public function edit(Product $product){
        //
        }


        public function update(Product $product, Request $request){
        //
        }


        public function destroy(Product $product){
        //
        }



        }
