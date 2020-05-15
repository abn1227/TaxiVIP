<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;
class Order extends Controller
{
    public function init(){
        $neighborhood=  App\Neighborhood::All();
        
        return view('Address/order',compact('neighborhood'));
    }
    public function save(Request $request)
    {
        $date=Carbon::now();
        $Person= new App\Person;
        $Person->mobile=$request->phone;
        $Person->name=$request->name;
        $Person->status='1';
        $Person->save();
        $client= new App\Client;
        $client->persons_id=$Person->id;
        $client->status='1';
        $client->save();
        $order= new App\Order;
        $order->price= $request->price;
        $order->distance=$request->distance;
        $order->url_map=$request->url;
        $order->date=$date;
        $order->canceled='0';
        $order->taxi_drivers_id=$request->taxiDriver;
        $order->clients_id=$client->id;
        $order->save();
        $request->session()->flash('mensaje','Guardado');
        $neighborhood=  App\Neighborhood::All();
        return view('Address/order',compact('neighborhood'));
    }
}
