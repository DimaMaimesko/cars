<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cities = City::get()->toArray();
        return view('home',[
            'cities' => $cities,
        ]);
    }

    public function saveForm(Request $request)
    {
        $params = json_decode($request->get('params'));
        date_default_timezone_set('Europe/Kiev') ;
        $dateStartLocal  = date("Y-m-d H:i:s", (int)($params->dateStart/1000));
        $dateFinishLocal = date("Y-m-d H:i:s", (int)($params->dateFinish/1000));
        Order::firstOrCreate([
            'date_start'     => $dateStartLocal,
            'date_finish'    => $dateFinishLocal,
            'city_start_id'  => $params->cityStart,
            'city_finish_id' => $params->cityFinish,
            'sum'            => $params->sum,
            'user_id'        => Auth::id(),
        ]);
        return ['sum' => $params->sum];
    }
}
