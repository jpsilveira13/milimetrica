<?php

namespace milimetrica\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use milimetrica\Http\Requests;
use milimetrica\Http\Controllers\Controller;

class TestController extends Controller
{
    public  function getLogin(){
        $data = [
            'email' => 'teste@gmail.com',
            'password' => 123456

        ];

        if(Auth::attempt($data)){
            return "logou";

        }
      /*  if(Auth::check()){
            return "tá logado";

        } */
        return "falhou";
    }

}

