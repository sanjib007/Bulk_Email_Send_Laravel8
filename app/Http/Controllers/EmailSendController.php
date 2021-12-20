<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Group;
use App\Models\SendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $clientInfo = Client::where('id', $id)->first();
        $groupInfo = Group::where('groupname', $clientInfo->groupName)->first();

        $details = [
            'templete'=> $groupInfo->templete,
            'mailSubject'=> $groupInfo->mailSubject,
            'fromMail'=> $groupInfo->fromMail,
            'fromName'=> $groupInfo->fromName,
            'clientName'=> $clientInfo->clientName,
        ];

        Mail::to($clientInfo->clientEmail)->send(new \App\Mail\ClientMail($details));
        return redirect()->route('client')->with('success','Mail sent.');
    }

        public function bulk_email($id) {
            $groupInfo = Group::where('id', $id)->first();
            $clientsInfo = Client::where('groupName', $groupInfo->groupname)->get();
            foreach ($clientsInfo as $aClient){
                $send_mail = new SendEmail;
                $send_mail->clientName = $aClient->clientName;
                $send_mail->clientEmail = $aClient->clientEmail;
                $send_mail->groupName = $groupInfo->groupname;
                $send_mail->mailSubject = $groupInfo->mailSubject;
                $send_mail->fromMail = $groupInfo->fromMail;
                $send_mail->fromName = $groupInfo->fromName;
                $send_mail->templete = $groupInfo->templete;
                $send_mail->confirmedSend = false;
                $send_mail->save();
            }

            return redirect()->route('dashboard')->with('success','Mail sent by job.');
    }

    public function sentEmail(){
        $mailInfo = SendEmail::where('confirmedSend', 0)->get();
        foreach ($mailInfo as $aMail){
            $details = [
                'templete'=> $aMail->templete,
                'mailSubject'=> $aMail->mailSubject,
                'fromMail'=> $aMail->fromMail,
                'fromName'=> $aMail->fromName,
                'clientName'=> $aMail->clientName,
            ];

            Mail::to($aMail->clientEmail)->send(new \App\Mail\ClientMail($details));
            $aMail->confirmedSend = true;
            $aMail->update();
        }

        return redirect()->route('dashboard')->with('success','Mail sent by job.');
    }

    public function sentEmailCron(){
        $mailInfo = SendEmail::where('confirmedSend', 0)->limit(2)->get();
        foreach ($mailInfo as $aMail){
            $details = [
                'templete'=> $aMail->templete,
                'mailSubject'=> $aMail->mailSubject,
                'fromMail'=> $aMail->fromMail,
                'fromName'=> $aMail->fromName,
                'clientName'=> $aMail->clientName,
            ];

            Mail::to($aMail->clientEmail)->send(new \App\Mail\ClientMail($details));
            $aMail->confirmedSend = true;
            $aMail->update();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
