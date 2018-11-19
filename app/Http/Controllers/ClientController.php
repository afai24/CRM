<?php

namespace crm\Http\Controllers;

use crm\Client;
use Illuminate\Http\Request;

use crm\Http\Requests\StoreClientRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles('admin');
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
       /* $validatedData = $request->validate([
            
        ]); not necesary, i am using StoreClientRequest */
        $client = new Client();

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $imgname = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $imgname);
            //return $imgname;
        }
        
        $client->name = $request->input('name');
        $client->surname = $request->input('surname');
        $client->avatar = $imgname;
        $client->email = $request->input('email');
        $client->save();

        return redirect()->route('clients.index');
        // return $request->all(); para obtener todos los datos que recibo del usuario
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
       // $client = Client::find($id); not necesary, i am using implicit binding
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $client->fill($request->except('avatar')); //not all, instead except because we can have an avatar
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');
            $imgname = time().$file->getClientOriginalName();
            $client->avatar = $imgname;
            $file->move(public_path().'/images/', $imgname);
            //return $imgname;
        }
        $client->save();
        return redirect()->route('clients.show', [$client])->with('status','client updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        // search and delete the avatar of the client from the public folder
        $file_path = public_path().'/images/'.$client->avatar;
        \File::delete($file_path);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
