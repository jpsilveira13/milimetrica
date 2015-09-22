@extends('site.header')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <nav class="breadcrumb">
                        <a href="/">INÍCIO</a>
                        <a class="disabled">Produto</a>
                        <a class="current">{{$product->name}}</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrumb -->
    <section class="title-page container">
        <div class="col-md-4 col-lg-4 col-sm-12 productInterno ">
            @if(count($product->images))
                <img class="imgProduct img-responsive center-block" alt="{{$product->name}}" src="{{url('uploads/'.$product->images()->first()->id.'.'.$product->images()->first()->extension)}}"title="{{$product->name}}" />
            @else
                <img src="{{url('uploads/no-img.jpg')}}" alt="{{$product->name}}" />
            @endif
            <p class="textoIlustrativo">Imagem ilustrativa </p>
        </div>
        <div class="col-md-8 col-sm-12">
            <h2>Produto: <span class="red">{{$product->name}}</span></h2>
            <h4>{{$product->description}}</h4>
            <h4 class="textoPreco">De <b>{{$product->price_old}}</b> em até {{$product->division_product}}x sem juros nos cartões de crédito<br /> ou <b class="red">R${{$product->price}}/unidade</b> à vista.</h4>
            <a href="javascript:history.back(-1);">
                <button class="btn btn-primary btnVoltar">Voltar</button>
            </a>
        </div>
    </section>
    <div class="row">
        <div class="container">

        </div>
    </div>



@endsection