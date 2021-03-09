<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyController extends Controller
{
    //
    public function buy(Request  $request)
    {
            $this->validate($request, [
                'fullname' => 'required',
                'email' => 'email',
                'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                'location' => 'required'
            ]);

            $currentURL = url()->previous();
            //  Sending mail
                \Mail::send('buymail', array(
                        'fullname' => $request->get('fullname'),
                        'email' => $request->get('email'),
                        'phone' => $request->get('phone'),
                        'location' => $request->get('location'),
                        'link' => $currentURL,
                    ), function($message) use ($request){
                        $message->from('njorku@cars.cm');
                        $message->to('elfridsonfack@gmail.com', $request->get('fullname'))->subject('New Command');
                    });

            //  Sending mail
            \Mail::send('clientbuymail', array(
                'fullname' => $request->get('fullname'),
                'email' => $request->get('email'),
                'phone' => $request->get('phone'),
                'location' => $request->get('location'),
            ), function($message) use ($request){
                $message->from('njorku@cars.cm');
                $message->to($request->get('email'), $request->get('fullname'))->subject('New Command');
            });

            return back()->with('success', 'We have received your command and we will get in touch with you very soon.');
    }
}
