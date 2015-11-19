<?php

namespace milimetrica\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use milimetrica\BannerImage;
use milimetrica\Http\Requests;
use milimetrica\Http\Controllers\Controller;

class BannerImageController extends Controller
{

    private $bannerModel;



    public function __construct(BannerImage $bannerModel){
        $this->bannerModel = $bannerModel;
    }

    public function index(){
        $bannerImages = $this->bannerModel->paginate(10);

        return view('banner.index',compact('bannerImages'));

    }

    public function storeImage(Request $request, BannerImage $bannerImage){
        $image = $request->file('extension');
        $renamed = md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path().'/banner/', $renamed);
        $bannerImage::create(['extension' => $renamed]);
        return redirect()->route('banner');
    }

    public function destroy($id){

        $filename = DB::table('banner_images')->where('id', $id)->get();
        $filname =  $filename[0]->extension;
        $file_path = public_path("/banner/{$filname}");
        if(\File::exists($file_path)){

            \File::delete($file_path);

            return redirect()->route('banner');
        }else{
            return redirect()->route('banner');

        }

    }

    public function createImage(){

        return view('banner.create',compact('banner'));

    }


}
