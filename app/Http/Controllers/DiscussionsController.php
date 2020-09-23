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
        $discussions= Discussion::orderBy('created_at','desc')->paginate(5);
        
        return view('discussions\index')->with('discussions',$discussions);

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
            'title' =>$data['title'],
            'user_id' =>Auth()->user()->id,
            'subject' => $data['subject'],
            'content' => $data['content'],
            'channel_id' => $data['channel'],
            'slug'=> Str::slug($data['title']),
        ]);
        session()->flash('success','Discussion Posted Successfully');
        return redirect()->route('discussions.index');
    }
    public function upload(Request $request)
 {
     if($request->hasFile('upload')) {
         $originName = $request->file('upload')->getClientOriginalName();
         $fileName = pathinfo($originName, PATHINFO_FILENAME);
         $extension = $request->file('upload')->getClientOriginalExtension();
         $fileName = $fileName.'_'.time().'.'.$extension;
        
         $request->file('upload')->move(public_path('images'), $fileName);
   
         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
         $url = asset('images/'.$fileName); 
         $msg = 'Image uploaded successfully'; 
         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
               
         @header('Content-type: text/html; charset=utf-8'); 
         echo $response;
     }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        return view('discussions.show',['discussion'=>$discussion]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Discussion $discussion)
    {
        $singleDiscussion=Discussion::where('slug', $discussion->slug)->first();
        if(Auth()->user()->id!=$singleDiscussion->user_id){
            return redirect('/discussions')->with('error','Unauthorized Page');
        }
        
        return view('discussions.edit',['discussion'=>$singleDiscussion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $data, Discussion $discussion)
    {  
        $singleDiscussion=Discussion::where('slug', $discussion->slug)->first();
        
        $singleDiscussion->title =$data['title'];
        $singleDiscussion->subject = $data['subject'];
        $singleDiscussion->content = $data['content'];
        $singleDiscussion->channel_id = $data['channel'];
        $singleDiscussion->slug= Str::slug($data['title']);
        $singleDiscussion->save();

        return view('discussions.show',['discussion'=>$discussion]);
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
