<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Role;
use App\Permission;

class ProfileController extends Controller
{
   	public function dar_permiso(){
   		$user = Auth::user();
   		if(!$user->hasRole(['usuario', 'administrador'])){
   			$user->roles()->attach(2);
   		}
   		return redirect('/');

   	}
}
