<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $is_role_exists = DB::select("SELECT COUNT(*) as cnt FROM `model_has_roles` WHERE model_id = ".auth()->id());
        $agents = Agent::all()->count();
        $transactions = Client::whereDay('created_at',now()->format('d'))->paginate(5);
        if ($is_role_exists[0]->cnt) {
            return view('home',compact('transactions','agents'));
        }
        else{
            return view('welcome');
        }

    }

}
