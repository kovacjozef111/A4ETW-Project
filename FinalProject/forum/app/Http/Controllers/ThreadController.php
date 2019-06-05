<?php

namespace App\Http\Controllers;

use Auth;
use App\Thread as Thread;
use App\Reply as Reply;
use Illuminate\Http\Request;


class ThreadController extends Controller
{

    public function __construct()
    {
        $this->middleware('authAdmin')->only(['create', 'delete']);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allThreads = Thread::paginate(10);
        return view('threads.index', [ 'allThreads' => $allThreads ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // server side validation
        $validatedData = $request->validate([
            'title' => 'required|max:256|min:4|unique:threads,title',
            'threadText' => 'required|min:16',
        ]);

        $newThread = new Thread();
        $newThread->title = $request->title;
        $newThread->body = $request->threadText;
        $newThread->created_at = date("Y-m-d H:i:s");
        $newThread->updated_at = date("Y-m-d H:i:s");
        $newThread->save();

        return redirect(route('threads.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $foundThread = Thread::find($id);
      $allReplies = Reply::where('thread_id', '=', $id)->paginate(20);
      return view('threads.show', ['thread' => $foundThread, 'allReplies' => $allReplies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thread::where('id', '=', $id)->delete();
        Reply::where('thread_id','=', $id)->delete();
 
        return redirect(route('threads.index'));
    }

}
