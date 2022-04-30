<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function checkout()
    {
        return view('Subscriptions.checkout',[
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        $request->user()
            ->newSubscription('default', 'price_1Kt0lhC4z7yx5elfjLr0XzYE')
            ->create($request->token);

        return redirect()->route('subscription.premium');
    }

    public function premium()
    {
        if(!auth()->user()->subscribed('default'))
            return redirect()->route('subscription.checkout');

        return view('Subscriptions.premium');
    }
}
