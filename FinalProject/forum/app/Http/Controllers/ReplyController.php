<?php

namespace App\Http\Controllers;

use DB;
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
    public function __construct()
    {
        $this->middleware('auth');
    }

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
    public function store(Request $request, $id)
    {
        $validatedData = $request->validate([
            'replyText' => 'required|min:16',
        ]);

        dd($id);

        $data = [
            'body' => $request->replyText,
        ];

        // na relationship 'replies' vytvor Reply s predpripravenymi datami
        $thread->replies()->create($data);

        // touch() model Thread co sposobi automaticku zmenu 'updated_at'
        $thread->touch();

        return redirect(route('threads.show', ['id' => $thread->id]));
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

        DB::table('threads')
            ->where('id', $threadID)
            ->update(['updated_at' => date("Y-m-d H:i:s")]);

        return redirect(route('threads.show', ['id'=>$threadID]));
    }
}
