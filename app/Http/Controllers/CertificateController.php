<?php

namespace App\Http\Controllers;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $certificates= certificate::orderBy('created_at','DESC')->paginate(12);
        return view('certificate.index')->with('certificates',$certificates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('certificate.upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $data)
    {
        if($data->hasFile('certificate_image')){
            //file name with extension
            $fileNameWithExt=$data->file('certificate_image')->getClientOriginalName();
            //Get file name
            $fileName=pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // Get the extension
            $extension=$data->file('certificate_image')->getClientOriginalExtension();
            // get filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //upload images
            $data->file('certificate_image')->move(public_path('certificate_images'), $fileNameToStore);
           

        }else{
            $fileNameToStore='noimage.jpg';
        }
        Certificate::create([
            'stud_id' =>$data['stud-id'],
            'full_name' => $data['full-name'],
            'certificate_image'=> $fileNameToStore,
          
        ]);
        session()->flash('success','Discussion Posted Successfully');
        return redirect()->route('certificates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($studId)
    {
       $certificate=Certificate::where('stud_id','=',$studId)->first();
       return view('certificate.single-certificate',['certificate'=>$certificate]);
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
