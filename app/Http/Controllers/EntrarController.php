<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class EntrarController extends Controller
{
    public function index(){
        return view('entrar.index');
    }

    public function entrar(Request $request){
        if(!Auth::attempt($request->only(['email','password']))){
            return redirect()
            ->back()
            ->withErrors('Usuario e/ou senha incorreta');
        }else {
            return redirect('/series');
        }
    }
}
