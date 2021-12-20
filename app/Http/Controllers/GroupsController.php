<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\SendEmail;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all();

        $mails = SendEmail::where('confirmedSend', '<=', false)->get();
        $mailsCount = $mails->count();

        return view('pages.admin', ['groups' => $groups, 'mailsCount' => $mailsCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.groupCreate');
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
            'groupname' => 'required',
            'templete' => 'required',
            'mailSubject' => 'required',
            'fromMail' => 'required',
            'fromName' => 'required',
        ]);
        $input = $request->all();
        Group::create($input);
        return redirect()->route('dashboard')->with('success','Created successfully.');
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
        $group = Group::where('id', $id)->first();
        return view('pages.groupEdit', ['group' => $group]);
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
            'groupname' => 'required',
            'templete' => 'required',
            'mailSubject' => 'required',
            'fromMail' => 'required',
            'fromName' => 'required',
        ]);
        $group = Group::where('id', $id)->first();
        $group->groupname = $request->groupname;
        $group->templete = $request->templete;
        $group->mailSubject = $request->mailSubject;
        $group->fromMail = $request->fromMail;
        $group->fromName = $request->fromName;
        $group->update();

        return redirect()->route('dashboard')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::where('id', $id)->first();
        $group->delete();

        return redirect()->route('dashboard')
                        ->with('success','Deleted successfully');
    }
}
