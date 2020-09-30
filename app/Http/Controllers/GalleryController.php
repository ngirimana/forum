<?php

namespace App\Http\Controllers;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('discussions.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        //handle file upload
        if($data->hasFile('image')){
            
            //file name with extension
            $fileNameWithExts=$data->file('image');
            foreach($fileNameWithExts as $fileNameWithExt){
            //Get file name
            $fileNameWithExt1=$fileNameWithExt->getClientOriginalName();
            $fileName=pathinfo($fileNameWithExt1,PATHINFO_FILENAME);
            // Get the extension
            $extension=$fileNameWithExt->getClientOriginalExtension();
            // get filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload images
            $fileNameWithExt->move(public_path('gallery_images'), $fileNameToStore);
            //$path=$data->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
            Image::create([
            
                'image'=> $fileNameToStore,
                'slug'=>Str::slug($fileNameToStore),
            ]);
            }
        }else{
            $fileNameToStore='noimage.jpg';
        }
        
        // return $path;
        session()->flash('success','Photo added Successfully');
        return redirect()->route('discussions.index');
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
