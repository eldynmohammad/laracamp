<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Checkout\Store;
use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Camp;
use Auth;
use Mail;
use App\Mail\Checkout\AfterCheckout;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camp $camp, Request $request)
    {
		if($camp->isRegistered) {
			$request->session()->flash('error', "You already registered on {$camp->title} camp.");
			return redirect(route('dashboard'));
		}
		return view('checkout.create', compact('camp'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request, Camp $camp)
    {
        // Mapping request data
        // return $request->all();
	    $data = $request->all();
        $data['user_id'] = Auth::id();
        $data['camp_id'] = $camp->id;

        // Update user data
        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->occupation = $data['occupation'];
        $user->save();

        // Save data
        $checkout = Checkout::create($data);

        // Sending email
        Mail::to(Auth::user()->email)->send(new AfterCheckout($checkout));

        return redirect(route('checkout.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }

    public function success() {
        return view('checkout.success');
    }
}
