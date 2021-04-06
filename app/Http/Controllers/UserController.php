<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
        public function getUsers()
    {
    	$user = User::get();
    	return response()->json($user);
    }
    public function addUser(Request $hme)
    {
    	$user = new User();
    	$user->name = $hme->name;
    	$user->last_name = $hme->last_name;
    	$user->age = $hme->age;
    	$dap = $user->save();
    	if($dap)
    	return "ALL OK";
    return "ALL NOT OK";
    }
    public function apdateUser(Request $hme)
    {
    	$user = User::where("id", $hme->id)->first();
    	$user->name = $hme->name;
    	$user->last_name = $hme->last_name;
    	$user->age = $hme->age;
    	$dap = $user->save();

    	return response()->json($user);
    }

    public function registrUser(Request $hme)
    {
    	$fff= false;
        $jk ="";
        if($hme->name == null)
        {
            $fff = true;
            $jk .='поле name не заполнено ';
        }
        if($hme->last_name == null)
        {
            $fff = true;
            $jk .='поле last_name не заполнено ';
        }
        if($hme->age == null)
        {
           $fff = true;
            $jk .='поле age не заполнено ';
        }
        if($hme->password == null)
        {
            $fff = true;
            $jk .='поле password не заполнено ';
        }
        if($hme->number == null)
        {
            $fff = true;
            $jk .='поле number не заполнено ';
        }
        if($fff == false)
        {
            $student = new User();
            $student -> create($hme->all());
            $jk = 'ALL OK';
        }
        return response()->json($jk);
    }
}
