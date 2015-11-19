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
use milimetrica\ProviderImage;

class ProviderImageController extends Controller
{

    private $providerModel;



    public function __construct(ProviderImage $providerModel){
        $this->providerModel = $providerModel;
    }

    public function index(){
        $providerImages = $this->providerModel->paginate(10);

        return view('provider.index',compact('providerImages'));

    }

    public function storeImage(Request $request, ProviderImage $providerImage){
        $image = $request->file('extension');
        $renamed = md5(date('Ymdhms').$image->getClientOriginalName()).'.'.$image->getClientOriginalExtension();
        $image->move(public_path().'/provider/', $renamed);
        $providerImage::create(['extension' => $renamed]);
        return redirect()->route('provider')->with('message','Upload de imagem sucesso!');
    }

    public function destroy($id){


    }

    public function createImage(){

        return view('provider.create',compact('provider'));

    }


}
