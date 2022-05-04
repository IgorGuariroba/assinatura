<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function checkout()
    {
        return view('Subscriptions.checkout',[
            'intent' => auth()->user()->createSetupIntent(),
            'plan' => session('plan')
        ]);
    }

    public function store(Request $request)
    {
        $plan = session('plan');
        $request->user()
            ->newSubscription('default', $plan->stripe_id)
            ->create($request->token);

        return redirect()->route('subscription.premium');
    }

    public function premium()
    {
        if(!auth()->user()->subscribed('default'))
            return redirect()->route('subscription.checkout');

        return view('Subscriptions.premium');
    }

    public function account()
    {
        $invoices = auth()->user()->invoices();
        $subscription = auth()->user()->subscription('default');
        $user = auth()->user();
        return view('Subscriptions.account',compact('invoices','subscription','user'));
    }

    public function invoiceDownload($invoiceId)
    {
        return Auth::user()->downloadInvoice($invoiceId,[
            'vendor' => "Blackboard",
            'product' => "Assinatura Vip"
        ]);
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();
        return redirect()->route('subscription.account');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();
        return redirect()->route('subscription.account');
    }
}
