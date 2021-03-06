<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Carbon\Carbon;
use App\Http\Requests\OrderRequest;
class Order extends Controller
{
    public function init(){
        $neighborhood=  App\Neighborhood::All();
        
        return view('address/order',compact('neighborhood'));
    }
    public function save(OrderRequest $request)
    {
        date_default_timezone_set('America/Tegucigalpa');
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
        $order->price= $request->total;
        $order->distance=$request->distance;
        $order->url_map=$request->url;
        $order->date=$date;
        $order->canceled='0';
        $order->taxi_drivers_id=$request->taxiDriver;
        $order->clients_id=$client->id;
        $order->senior_discount=$request->discount;
        $order->save();        
        $taxiDriver=App\Taxi_Driver::findOrFail($request->taxiDriver);
        $taxiDriver->status='0';
        $taxiDriver->save();
        $request->session()->flash('mensaje','Guardado');
        $neighborhood=  App\Neighborhood::All();
        return view('address/order',compact('neighborhood'));
    }
    //---------------------------------------------------------------------------------------------------
    //Muestra el listado de las ordenes que aun no se confirma sus estado como concluido o cancelado
    //---------------------------------------------------------------------------------------------------
    public function pendingOrders()
    {
       $orders=App\Order::where('canceled','0')->paginate(3); 
       return view('address/pendingOrders',compact('orders'));
    }
    //---------------------------------------------------------------------------------------------------
    //Actualiza el estado de la orden, ya sea concluido o cancelado 
    //---------------------------------------------------------------------------------------------------
    public function update(Request $request,$id)
    {
        $order=App\Order::findOrfail($id);
        if ($request->canceled=='2') {
            $order->canceled=$request->canceled;
            $order->save();
            $request->session()->flash('mensaje','Estado de la orden actualizado');
            return back();
        }
       else {
            $taxiDriver=App\Taxi_Driver::findOrFail($order->taxi_drivers_id);
            $mileage=$taxiDriver->mileage+$order->distance;
            $pay=$taxiDriver->accrued_payments=$taxiDriver->accrued_payments+$order->price;
            $taxiDriver->mileage=$mileage;
            $taxiDriver->status='1';
            $order->canceled=$request->canceled;
            $order->save();
            $taxiDriver->save();
            $request->session()->flash('mensaje','Estado de la orden actualizado');
            return back();
       }
       
    }
    //---------------------------------------------------------------------------------------------------
    //Actualiza el estado de un taxista como disponible
    //---------------------------------------------------------------------------------------------------
    public function status(Request $request,$id)
    {
        $orderPending=App\Order::where([['taxi_drivers_id',$id],['canceled','0']])->get();
        if (count($orderPending)>0) {
            $request->session()->flash('msj','El taxista tiene una carrera pendiente');
            return back();
        }
        else {
            $taxiDriver=App\Taxi_Driver::findOrFail($id);
            $taxiDriver->status=$request->status;
            $taxiDriver->save();
            $request->session()->flash('mensaje','Estado actualizado');
            return back();
        }
      
    }
    //---------------------------------------------------------------------------------------------------
    //Muestra el listado de taxistas activos que se pretende deshabilitar
    //---------------------------------------------------------------------------------------------------
    public function inactive()
    {
        $taxiDrivers=App\Taxi_Driver::paginate(3);
        return view('address.inactive',compact('taxiDrivers'));
    }
    //-------------------------------------------------------------------------------------------------------------
    //Muestra el historial de ordenes
    //-------------------------------------------------------------------------------------------------------------
    public function orders()
    {
        $orders= App\Order::orderby('id','desc')->paginate(6);
        return view('address.historyOrders',compact('orders'));
    }
    //-------------------------------------------------------------------------------------------------------------
    //Muestra el detalle de una orden en especifico 
    //-------------------------------------------------------------------------------------------------------------
    public function show($id)
    {
        $order= App\Order::findOrFail($id);
        return view('address.detailHistory', compact('order'));
    }
}
