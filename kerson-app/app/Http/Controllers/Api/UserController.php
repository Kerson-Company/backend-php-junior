<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{

    public function index(){


        $users = User::all();

        return response()->json($users);

        }


        public function add(Request $request){


                try {
                    $user = new User();

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->cpf = $request->cpf;
                    $user->password = Hash::make($request->password);

                    $user->save();

                    return ['retorna'=>'Cadastro realizado'];

                }catch(\Exception $error) {


                        return ['retorno'=>'error', 'details'=>$error];
                }



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
