<?php

namespace App\Http\Controllers;


use App\Models\OrderDetail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $orders = Order::with('customer')->get();
        $title = "Data Transaction";
        return view('order.index', compact('orders', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Transaction';
        $order = Order::get()->last();
        $id_order = $order->id ?? '';
        $id_order++;
        $order_code = "L" . date('dnY') . sprintf('%03s', $id_order);
        $customers = Customer::get();
        $services = Service::get();
        return view('order.create', compact('title', 'order_code', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::create($request->all());

        foreach ($request->id_paket as $key => $val) {
            OrderDetail::create([
                'id_order' => $order->id,
                'id_service' => $request->id_paket[$key],
                'price_service' => $request->price_service[$key],
                'qty' => $request->qty[$key],
                'subtotal' => $request->subtotal[$key]
            ]);
        }

        Alert::success('Done', 'Your new data has been recorded. sir!');
        return redirect()->to('trans_order');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Customer';
        $customer = Customer::find($id);
        return view('customer.edit', compact('title', 'customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // cara 1
        $customer = Customer::find($id);

        // cara 2
        // $customer->customer_name = $request->customer_name;
        // $customer->phone = $request->phone;
        // $customer->address = $request->address;
        // $customer->save();


        Alert::success('Done', 'Your selected data has been changed. sir!');
        return redirect()->to('customer');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::find($id)->delete();
        Alert::success('Done', 'Your selected data has been disposed. sir!');

        return redirect()->to('customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id)->delete();

        Alert::success('Done', 'Your selected data has been disposed. sir!');
        return redirect()->to('customer');
    }

    public function getPaket($id_paket)
    {
        // $paket = Service::where('id', $id_paket)->first();
        $paket = Service::find($id_paket);
        return response()->json($paket);
    }
}
