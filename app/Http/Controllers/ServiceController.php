<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $services = Service::get();
        $title = "Data Laundry Package";
        return view('service.index', compact('services', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Laundry Package';
        return view('service.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Service::create($request->all());
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        Alert::success('Done', 'Your new data has been recorded. sir!');
        return redirect()->to('service');
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
        $title = 'Edit Laundry Package';
        $service = Service::find($id);
        return view('service.edit', compact('title', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // cara 1
        $service = Service::find($id);

        // cara 2
        // $service->service_name = $request->service_name;
        // $service->price = $request->price;
        // $service->description = $request->description;
        // $service->save();


        Alert::success('Done', 'Your selected data has been changed. sir!');
        return redirect()->to('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::find($id)->delete();
        Alert::success('Done', 'Your selected data has been disposed. sir!');

        return redirect()->to('service');
    }

    public function delete($id)
    {
        $service = Service::find($id)->delete();

        Alert::success('Done', 'Your selected data has been disposed. sir!');
        return redirect()->to('service');
    }
}
