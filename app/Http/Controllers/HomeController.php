<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Informants;
use App\Models\Samples;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    //Auth middleware
    public function __construct()
    {
        $this->middleware('auth');
    }

    //Get Statistics Samples , Informants ,Classes , Users
    public function index()
    {
        $data['User'] = User::all()->count();
        $data['Informants']= Informants::all()->count();
        $data['Samples'] = Samples::all()->count();
        $data['Classes'] = Classes::all()->count();
        return view('dashboard' , compact('data'));
    }
}
