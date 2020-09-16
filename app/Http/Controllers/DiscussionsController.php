<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateDiscussionRequest;
use App\Models\Discussion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create','store']);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('discussions\index',[
            'discussions'=> Discussion::paginate(5)
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string',],
            'channel' => ['required', 'string', 'max:255'],
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
       
         Discussion::create([
            'title' => $data['title'],
            'user_id' =>auth()->user()->id,
            'subject' => $data['subject'],
            'content' => $data['content'],
            'channel_id' => $data['channel'],
            'slug'=> Str::slug($data['title']),
        ]);
        session()->flash('success','Discussion Posted Successfully');
        return redirect()->route('discussion.index');
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
