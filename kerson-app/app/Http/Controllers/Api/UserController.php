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


        public function add(Request $request) {


                try {
                    $user = new User();

                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->cpf = $request->cpf;
                    $user->password = Hash::make($request->password);

                    $user->save();

                    return ['retorna'=>'Usuário Cadastrado'];

                } catch(\Exception $error) {


                        return ['retorno'=>'error', 'details'=>$error];
                }



            }

            public function list(){

                $user = User::all('name', 'email', 'cpf', 'created_at', 'updated_at');

                return $user;

            }

            public function selectUser($id){

                $user = User::find($id);


                return $user;

            }


            public function update(Request $request, $id){

                try {

                        $user = User::find($id);

                        $user->name = $request->name;
                        $user->email = $request->email;
                        $user->cpf = $request->cpf;

                        $user->save();

                        return ['retorna' => "Dados atualizados"];


                } catch(\Exception $error) {

                    return ['retorno'=>'error', 'details'=>$error];

                }



                }


        public function delete($id){


                try  {


                    $user = User::find($id);


                    $user->delete();

                    return ['retorna' => 'Usuário deletado'];

                } catch(\Exception $error) {


                    return ['retorno'=>'error', 'details'=>$error];

                }

        }



        }
