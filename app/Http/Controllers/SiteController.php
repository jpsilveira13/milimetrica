<?php

namespace milimetrica\Http\Controllers;

use Illuminate\Http\Request;

use milimetrica\BannerImage;
use milimetrica\Http\Requests;
use milimetrica\Http\Controllers\Controller;
use milimetrica\Product;
use milimetrica\Category;
use milimetrica\ProviderImage;
use milimetrica\Texto;

class SiteController extends Controller
{

    public function home(){
        $providerImages = ProviderImage::get();
        $bannerImages = BannerImage::get();
        $products  = Product::where('featured','=', '1')->where('enabled_product', '=', '1')->take(9)->get();
        return view('layout',[
            'products' => $products,
            'bannerImages' => $bannerImages,
            'providerImages' => $providerImages
        ]);

    }


    public function categories($name){
        $providerImages = ProviderImage::get();
        $categories = Category::find($name);
        removeAcentos();
        return view('site/produtos',[
            'title' => 'Pechinchador.com.br | Venha ser um Pechinchador!',
            'description' =>  'Os melhores produtos do mercado.',
            'categories' => $categories,
            'providerImages' => $providerImages

        ]);

    }
    // Init products controllers
    public function constructMaterial(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '1')->where('enabled_product','=','1')->paginate(15);

        return view('site/materiais-para-construcao',[
            'title' => "Comercialmilimetrica.com.br | Materiais para construção",
            'products' => $products,
            'providerImages' => $providerImages
        ]);


    }

    public function  hidraulic(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '2')->where('enabled_product','=','1')->paginate(15);

        return view('site/hidraulica',[
            'title' => "Comercialmilimetrica.com.br | Hidráulica",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    public function  eletric(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '3')->where('enabled_product','=','1')->paginate(15);

        return view('site/eletrica',[
            'title' => "Comercialmilimetrica.com.br | Elétrica",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    public function  epis(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '4')->where('enabled_product','=','1')->paginate(15);

        return view('site/epis',[
            'title' => "Comercialmilimetrica.com.br | EPI'S",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    public function  tintas(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '5')->where('enabled_product','=','1')->paginate(15);

        return view('site/tintas',[
            'title' => "Comercialmilimetrica.com.br | Tintas",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    public function  ferramentas(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '6')->where('enabled_product','=','1')->paginate(15);

        return view('site/ferramentas',[
            'title' => "Comercialmilimetrica.com.br | Ferramentas",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    public function  maquinas(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '7')->where('enabled_product','=','1')->paginate(15);

        return view('site/maquinas',[
            'title' => "Comercialmilimetrica.com.br | Máquinas",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    public function  abrasivos(){
        $providerImages = ProviderImage::get();
        $products  = Product::where('category_id','=', '8')->where('enabled_product','=','1')->paginate(15);

        return view('site/abrasivos',[
            'title' => "Comercialmilimetrica.com.br | Abrasivos",
            'products' => $products,
            'providerImages' => $providerImages
        ]);

    }

    //end products controllers

    public function productInternal($id){
        $providerImages = ProviderImage::get();
        $products = Product::find($id);

        return view('site/produto',[
            'title' => 'Comercialmilimetrica.com.br | Os melhores produtos do mercado de Maceió - Alagoas!',
            'description' =>  'Os melhores produtos do mercado de Maceió - Alagoas.',
            'product' => $products,
            'providerImages' => $providerImages
        ]);

    }


    public function categoryInternal($id){
        $providerImages = ProviderImage::get();
        $categories = Category::find($id)->with('products');

        return view('site/categoria',[
            'title' => 'Comercialmilimetrica.com.br | Os melhores produtos do mercado de Maceió - Alagoas!',
            'description' =>  'Os melhores produtos do mercado de Maceió - Alagoas.',
            'categories' => $categories,
            'providerImages' => $providerImages

        ]);

    }
    public function localStore(){

        $providerImages = ProviderImage::get();
        return view('site/nossa-loja', [
            'title' => 'ComercialMilimetrica.com.br | Nossa missão',
            'description' => 'O mais moderno e completa loja física e online do Brasil',
            'providerImages' => $providerImages
        ]);

    }

    public function whereUs(){
        $providerImages = ProviderImage::get();
        $quem_somos = Texto::first();
        return view('site/quem-somos', [
            'title' => 'ComercialMilimetrica.com.br | Quem somos',
            'description' => 'O mais moderno e completa loja física e online do Brasil',
            'quem_somos' => $quem_somos,
            'providerImages' => $providerImages
        ]);

    }

    public  function tradeDevolution(){
        $providerImages = ProviderImage::get();
        return view('site/trocas-e-devolucoes', [
            'title' => 'ComercialMilimetrica.com.br | Trocas e Devoluções',
            'description' => 'O mais moderno e completa loja física e online do Brasil',
            'providerImages' => $providerImages
        ]);

    }

    public function budget(){
        $providerImages = ProviderImage::get();
        return view('site/pedido-orcamento', [
            'title' => 'ComercialMilimetrica.com.br | Pedido Orçamento',
            'description' => 'O mais moderno e completa loja física e online do Brasil',
            'providerImages' => $providerImages
        ]);

    }

    public function searchProduct(){
        $query = \Input::get('pesquisa');
        $results = null;
        $results = Product::select('id','name')->where('name','LIKE',$query.'%')->with('images')->get();
        return \Response::json($results);
    }



    //Depois eu volto a arrumar isso :D

    /*public function budgetForm(){
        $nome = \Input::get('fullname');
        $tel = \Input::get('tel');
        $email = \Input::get('email');
        $citystate = \Input::get('citystate');
        $bairro = \Input::get('bairro');
        $adress = \Input::get('adress');
        $formship = \Input::get('formship');
        $materials = \Input::get('materials');
        date_default_timezone_set('America/Sao_Paulo');
        $data = date("d/m/Y");
        $hora = date("H:i");
        $assunto = "Formulário Pedido de Orçamento";
        $destinatario = "samotinho@gmail.com";
        $assunto = mb_strtoupper($assunto . ' [Milimetrica] [' . \Input::ip() . ']');
        $dataSend = [
            'nome' => $nome,
            'idade' => $idade,
            'cidade' => $cidade,
            'estado' => $estado,
            'email' => $email,
            'telCelular' => $telCelular,
            'telFixo' => $telFixo,
            'cidadeInteresse' => $cidadeInteresse,
            'nivelInteresse' => $nivelInteresse,
            'horarioContato' => $horarioContato,
            'data' => $data,
            'hora' => $hora,
            'assunto' => $assunto,
            'destinatario' => $destinatario

        ];
        print_r($dataSend);
        \Mail::send('emails.contatoAfiliado', $dataSend, function ($message) use ($dataSend) {

            $message->from('naoresponda@pechinchador.com.br', 'Pechinchador');

            $message->to($dataSend['destinatario']);
            $message->subject($dataSend['assunto']);
            $message->replyTo($dataSend['email'], $dataSend['nome']);

        });

        return 'ok';

    } */

}
