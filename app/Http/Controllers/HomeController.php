<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \App\Mail\ContactMail;

use Mail;
use \Swift_Mailer;
use \Swift_SmtpTransport;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Index view
        return view('index');
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

    // Send mail from contact form
    public static function sendEmailContacts(Request $request )
    {
        // Backup your default mailer
        $backup = Mail::getSwiftMailer();

        $data = ['email'=>$request->email, 'name'=>$request->name, 'content'=>$request->content];

        Mail::send('emails.mail-contact', $data, function ($message) {
            $message->to('Thuydungkhl08@gmail.com');
            $message->subject("Mail Contact Project BDS La Partenza");
            $message->from('info.ftcjsc@gmail.com', 'FTCJSC');
        });
        

        // Restore your original mailer
        // Mail::setSwiftMailer($backup);

        // echo alert and redirect to Homepage
        echo "<script>";
        echo " alert('Cảm ơn quý khách đã liên hệ với với chúng tôi! Chúng tôi sẽ liên hệ với bạn ngây khi có thông tin mới nhất');      
            window.location.href='".url('/')."';
        </script>";
    }
}
