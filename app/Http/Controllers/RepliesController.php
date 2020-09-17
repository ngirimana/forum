<?php

namespace App\Http\Controllers;
use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'reply_owner' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string',],
            
            
        ]);
    }
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
    public function store(Request $data,Discussion $discussion)
    {
       
        Reply::create([
            
            'reply_owner' =>$data['full_name'],
            'discussion_id' =>$discussion->id,
            'contact' => $data['contact'],
            'content' => $data['content'],
             
        ]);
         return redirect()->route('discussions.show',$discussion->slug);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
