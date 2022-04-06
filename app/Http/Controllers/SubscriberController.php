<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
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
    public function store(Request $request, Website $site)
    {
        $request->validate([
            'name' => ['nullable', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                Rule::unique('subscribers', 'email')->where('website_id', $site->id),
            ],
        ]);

        $subscriber = Subscriber::create([
            'website_id' => $site->id,
            'name' => $request->name,
            'email' => $request->email
        ]);

        return response()->json([
            'status' => 'success',
            'msg' => 'Subscriber created',
            'data' => [
                'subscriber' => $subscriber
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Website $site, Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email'
            ]
        ]);
        DB::table('subscribers')->where('email', $request->email)->delete();

        return response()->json([
            'status' => 'success',
            'msg' => 'Subscriber deleted',
        ]);
    }
}