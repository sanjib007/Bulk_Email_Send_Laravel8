<?php

namespace App\Http\Controllers;

use App\Imports\ClientImport;
use App\Models\Client;
use App\Models\Group;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return view('pages.client', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allGroup = Group::all();
        return view('pages.clientCreate', ['allGroup' => $allGroup]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'clientName' => 'required',
            'clientEmail' => 'required',
            'groupName' => 'required',
        ]);
        $input = $request->all();
        Client::create($input);
        return redirect()->route('client')->with('success','Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::where('id', $id)->first();
        $allGroup = Group::all();
        return view('pages.clientEdit', ['client' => $client, 'allGroup'=> $allGroup]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'clientName' => 'required',
            'clientEmail' => 'required',
            'groupName' => 'required',
        ]);
        $client = Client::where('id', $id)->first();
        $client->clientName = $request->clientName;
        $client->clientEmail = $request->clientEmail;
        $client->groupName = $request->groupName;
        $client->update();

        return redirect()->route('client')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::where('id', $id)->first();
        $client->delete();

        return redirect()->route('client')
            ->with('success','Deleted successfully');
    }

    public function fileImport(Request $request)
    {
        //dd($request);
        Excel::import(new ClientImport, $request->file);
        return back();
    }
}
