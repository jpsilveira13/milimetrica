<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/',[
    'uses' => "SiteController@home"
]);

Route::get('institucional/nossa-loja',[
    'uses' => "SiteController@localStore"
]);


Route::get('institucional/quem-somos',[
    'uses' => "SiteController@whereUs"
]);

Route::get('servicos/pedido-de-orcamento',[
    'uses' => "SiteController@budget"
]);

Route::get('/materiais-para-construcao',[
    'uses' => "SiteController@constructMaterial"
]);

Route::get('/hidraulica',[
    'uses' => "SiteController@hidraulic"
]);

Route::get('/eletrica',[
    'uses' => 'SiteController@eletric'
]);

Route::get('/tintas',[
    'uses' => 'SiteController@tintas'
]);


Route::get('/ferramentas',[
    'uses' => 'SiteController@ferramentas'
]);


Route::get('/epis',[
    'uses' => 'SiteController@epis'
]);


Route::get('/tintas',[
    'uses' => 'SiteController@tintas'
]);


Route::get('/maquinas',[
    'uses' => 'SiteController@maquinas'
]);


Route::get('/abrasivos',[
    'uses' => 'SiteController@abrasivos'
]);


Route::get('ajuda/trocas-e-devolucoes',[
    'uses' => "SiteController@tradeDevolution"
]);

Route::get('produto/{id}/{name}',[
    'uses'=> 'SiteController@productInternal'
]);

Route::get('categoria/{id}/{name}',[
    'uses'=> 'SiteController@categoryInternal'

]);

Route::post('site/search-product',[
    'uses'=> 'SiteController@searchProduct'
]);

// Rotas para a parte do administrativo

Route::group(['prefix'=> 'admin', 'middleware' => 'auth', 'where'=>['id'=>'[0-9]+']],function(){

    Route::group(['prefix' => 'categories'],function(){

        Route::get('/',['as'=>'categories', 'uses' => 'CategoriesController@index']);
        Route::post('/',['as'=>'categories.store','uses'=> 'CategoriesController@store']);
        Route::get('create',['as'=>'categories.create','uses'=>'CategoriesController@create']);
        Route::get('{id}/destroy',['as'=>'categories.destroy','uses'=>'CategoriesController@destroy']);
        Route::get('{id}/edit',['as'=>'categories.edit','uses'=>'CategoriesController@edit']);
        Route::put('{id}/update',['as'=>'categories.update','uses'=>'CategoriesController@update']);
    });

    Route::group(['prefix'=> 'products'],function(){

        Route::get('/',['as'=>'products', 'uses' => 'ProductsController@index']);
        Route::post('/',['as'=>'products.store','uses'=> 'ProductsController@store']);
        Route::get('create',['as'=>'products.create','uses'=>'ProductsController@create']);
        Route::get('{id}/destroy',['as'=>'products.destroy','uses'=>'ProductsController@destroy']);
        Route::get('{id}/edit',['as'=>'products.edit','uses'=>'ProductsController@edit']);
        Route::put('{id}/update',['as'=>'products.update','uses'=>'ProductsController@update']);

        Route::group(['prefix'=>'images'],function(){
            Route::get('{id}/product',['as'=>'products.images', 'uses' => 'ProductsController@images']);
            Route::get('create/{id}/product',['as'=>'products.images.create', 'uses' => 'ProductsController@createImage']);
            Route::post('store/{id}/product',['as'=>'products.images.store', 'uses' => 'ProductsController@storeImage']);
            Route::get('destroy/{id}/image',['as'=>'products.images.destroy', 'uses' => 'ProductsController@destroyImage']);
        });
    });

    Route::group(['prefix' => 'quemsomos'],function(){

        Route::get('/',['as'=>'quemsomos', 'uses' => 'TextoController@index']);
        Route::post('/',['as'=>'quemsomos.store','uses'=> 'TextoController@store']);
        Route::get('create',['as'=>'quemsomos.create','uses'=>'TextoController@create']);
        Route::get('{id}/destroy',['as'=>'quemsomos.destroy','uses'=>'TextoController@destroy']);
        Route::get('{id}/edit',['as'=>'quemsomos.edit','uses'=>'TextoController@edit']);
        Route::put('{id}/update',['as'=>'quemsomos.update','uses'=>'TextoController@update']);
    });
    Route::group(['prefix'=>'banner'],function(){
        Route::get('/',['as'=>'banner', 'uses' => 'BannerImageController@index']);
        Route::post('/',['as'=>'banner.store','uses'=> 'BannerImageController@storeImage']);
        Route::get('create',['as'=>'banner.create','uses'=>'BannerImageController@createImage']);
        Route::get('{id}/destroy',['as'=>'banner.destroy','uses'=>'BannerImageController@destroy']);
        Route::get('{id}/edit',['as'=>'banner.edit','uses'=>'BannerImageController@edit']);
        Route::put('{id}/update',['as'=>'banner.update','uses'=>'BannerImageController@update']);
    });

    Route::group(['prefix'=>'provider'],function(){
        Route::get('/',['as'=>'provider', 'uses' => 'ProviderImageController@index']);
        Route::post('/',['as'=>'provider.store','uses'=> 'ProviderImageController@storeImage']);
        Route::get('create',['as'=>'provider.create','uses'=>'ProviderImageController@createImage']);
        Route::get('{id}/destroy',['as'=>'provider.destroy','uses'=>'ProviderImageController@destroy']);
        Route::get('{id}/edit',['as'=>'provider.edit','uses'=>'ProviderImageController@edit']);
        Route::put('{id}/update',['as'=>'provider.update','uses'=>'ProviderImageController@update']);
    });


});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',

]);


/*Route::get('servicos/pedido-de-orcamento',[
   'uses' => "SiteController@budgetForm"
]); */

