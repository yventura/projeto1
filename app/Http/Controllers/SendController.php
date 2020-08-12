<?php

namespace App\Http\Controllers;

use App\SendLaudo;
use Illuminate\Http\Request;

class SendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['envialaudo'] = SendLaudo::all();
        //dd($data);
        return view('envialaudo')->with($data);
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
     * @param  \App\SendLaudo  $sendLaudo
     * @return \Illuminate\Http\Response
     */
    public function show(SendLaudo $sendLaudo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SendLaudo  $sendLaudo
     * @return \Illuminate\Http\Response
     */
    public function edit(SendLaudo $sendLaudo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SendLaudo  $sendLaudo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SendLaudo $sendLaudo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SendLaudo  $sendLaudo
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendLaudo $sendLaudo)
    {
        //
    }
}
