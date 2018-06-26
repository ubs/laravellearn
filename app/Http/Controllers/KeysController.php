<?php

namespace App\Http\Controllers;

use App\Models\Key;

class KeysController extends Controller
{
    public function index(){
        $keys = Key::allKeys();
        
        //Experimenting on Query Scopes (return Eloquent builder which can be further exercised)
        //$soon2Expire = Key::soonToExpireKeys()->get();
        //dd($soon2Expire);
        
        return view('keys.index', ['keys' => $keys]);
    }
    
    public function show(Key $key){
        //Using Route Model Binding (RMB
        //No query needed, Laravel auto-figures-out what to do based on route & action parameter
        return view('keys.show', ['key' => $key]);
    }
    
}
