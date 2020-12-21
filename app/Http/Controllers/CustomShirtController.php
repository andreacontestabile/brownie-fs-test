<?php

namespace App\Http\Controllers;

use App\BlankShirt;
use App\Graphic;
use App\CustomShirt;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CustomShirtController extends Controller
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
        $blank_shirts = BlankShirt::all();
        $graphics = Graphic::all();

        return view("customize", compact("blank_shirts", "graphics"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "name" => "required|min:6"
        ]);
        $newCustomShirt = new CustomShirt;
        $newCustomShirt->name = $request->name;
        $newCustomShirt->save();
        
        
        
        $path = public_path()."/images/" . $newCustomShirt->id . "" ;
        
        // Full Size

        $fullPath = $path . "/full/";
        $filename = $newCustomShirt->name . "-full.png";

        if (!file_exists($fullPath)) {
            mkdir($fullPath, 666, true);
        }

        $newImage = Image::make(file_get_contents($request->image_base64));
        $watermark = Image::make(public_path('/storage/images/watermark.png'));
        $newImage->insert($watermark, 'bottom-right');
        $newImage->save($fullPath . $filename);

        // Mid Size
        $newMidImage = $newImage->resize(400, 400);
        $midPath = $path . "/mid/";

        if (!file_exists($midPath)) {
            mkdir($midPath, 666, true);
        }

        $midFilename = $newCustomShirt->name . "-mid.png";
        $newMidImage->save($midPath . $midFilename);

        // Thumbnail Size
        $newThumbImage = $newImage->resize(200, 200);
        $thumbPath = $path . "/thumbnail/";

        if (!file_exists($thumbPath)) {
            mkdir($thumbPath, 666, true);
        }
        $thumbFilename = $newCustomShirt->name . "-thumbnail.png";
        $newThumbImage->save($thumbPath . $thumbFilename);


        return redirect()->route("custom_shirts.create");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customShirt = CustomShirt::find($id);
        return view("show", compact("customShirt"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $customShirt = CustomShirt::find($id);
        return view("edit", compact("customShirt"));
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
        $customShirt = CustomShirt::find($id);
        $request->validate([
            "name" => "required|min:6"
        ]);

        $customShirt->name = $request->name;

        $customShirt->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customShirt = CustomShirt::find($id);
        File::deleteDirectory(public_path('images/'. $customShirt->id));
        $customShirt->delete();
    }
}
