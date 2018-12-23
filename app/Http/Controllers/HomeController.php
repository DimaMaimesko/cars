<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Order;
use App\User;
use App\Currency;
use Illuminate\Support\Facades\Auth;
use Swap;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $cities = City::get()->toArray();
        $currencies = Currency::get()->toArray();
        return view('home',[
            'cities' => $cities,
            'currencies' => $currencies,
        ]);
    }

    public function updateCurrencyRate()
    {
        // Get the latest USD/UAH rate
        $rate = Swap::latest('USD/UAH');
        $rate->getValue();
        $uahCurrency = Currency::find(2);
        $uahCurrency->update(['conversion' => doubleval($rate->getValue())]);
        return [$rate->getValue()];
    }

    public function saveForm(Request $request)
    {
        $params = json_decode($request->get('params'));
        date_default_timezone_set('Europe/Kiev') ;
        $dateStartLocal  = date("Y-m-d H:i:s", (int)($params->dateStart/1000));
        $dateFinishLocal = date("Y-m-d H:i:s", (int)($params->dateFinish/1000));
        Order::create([
            'date_start'     => $dateStartLocal,
            'date_finish'    => $dateFinishLocal,
            'city_start_id'  => $params->cityStart,
            'city_finish_id' => $params->cityFinish,
            'sum'            => $params->sum,
            'user_id'        => Auth::id(),
        ]);
        $order = Order::latest()->first();
        return ['order' => $order->id];
    }

    public function getOrders()
    {
        $orders = Order::with(['user','cityStart','cityFinish'])->get()->toArray();
        return [$orders];
    }

    public function delOrder(Request $request)
    {
        $orderId = $request->get('orderId');
        Order::where('id', $orderId)->delete();
        $orders = Order::with(['user','cityStart','cityFinish'])->get()->toArray();
        return [$orders];
    }
}
