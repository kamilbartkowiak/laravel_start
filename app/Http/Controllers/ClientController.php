<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Clients/Index', [
            'clients' => Client::with([])->get(),
        ]);
    }
    public function store(Request $request): RedirectResponse
    {
        
        $client = new client;
        $client-> name = $request->name;
        $client-> email = $request->email;
        $client-> job = $request->job;

        $client->save();

        return redirect(route('clients.index'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  int $id ): RedirectResponse 
    {

    $clients = Client::with([])->find($id);
    
    if($clients instanceof Client ){
        $clients->fill($request->all());
        $clients->save();
    }
        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, int $id ):RedirectResponse 
    {
        $clients = Client::with([])->find($id);
        
        if($clients instanceof Client){
            
            $clients->delete();
        }
            return redirect(route('clients.index'));
    }
}
