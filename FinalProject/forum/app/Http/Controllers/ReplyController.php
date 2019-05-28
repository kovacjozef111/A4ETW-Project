<?php

namespace App\Http\Controllers;

use Auth;
use App\Reply as Reply;
use App\Thread as Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

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
    public function store(Request $request, $threadID)
    {
        $validatedData = $request->validate([
            'replyText' => 'required|min:16',
        ]);

        $newReply = new Reply();
        $newReply->body = $request->replyText;
        $newReply->thread_id = $threadID;

        if (Auth::check()) {
            $newReply->creator_id = Auth::user()->id;
        }

        $newReply->created_at = date("Y-m-d H:i:s");
        $newReply->updated_at = date("Y-m-d H:i:s");
        $newReply->save();

        
        Thread::where('id', '=', $threadID)->updated_at = date("Y-m-d H:i:s");

        return redirect(route('threads.show', ['id'=>$threadID]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Reply $reply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function edit(Reply $reply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reply = Reply::find($id);
        $threadID = $reply->thread_id;

        Thread::where('id', '=', $threadID)->updated_at = date("Y-m-d H:i:s");
        Reply::where('id','=', $id)->delete();

        return redirect(route('threads.show', ['id'=>$threadID]));
    }
}
