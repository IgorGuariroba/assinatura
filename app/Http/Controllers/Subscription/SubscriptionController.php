<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('subscriptions.index');
    }

    public function store(Request $request)
    {
        $request->user()
            ->newSubscription('default', 'price_1Kt0lhC4z7yx5elfjLr0XzYE')
            ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }

    public function premium()
    {
        return view('subscriptions.premium');
    }
}
