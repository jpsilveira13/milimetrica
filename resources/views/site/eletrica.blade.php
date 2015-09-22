@extends('site.header')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <nav class="breadcrumb">
                        <a href="/">INÍCIO</a>
                        <a class="disabled">CATEGORIA</a>
                        <a class="current">Elétrica</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrumb -->
    <section class="title-page container">
        <div class="col-lg-12">
            <h2>Elétrica</h2>
        </div>
    </section>
    <div class="container">

        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-4 col-sm-6 product">
                    <div class="box">
                        <div class="crop">
                            <a href="#">
                                <img src="{{asset('site/images/produtos/'.$product->url_image)}}" alt="{{$product->name}}" />

                        </div>
                        <h3>{{$product->name}}</h3>
                        </a>
                        <a href="#">
                            <p class="text-center">
                                @if($product->featured != 1)

                                    De <s class="avista"><b>{{$product->price_old}}</b></s> por <b><strong>R${{$product->price}}</strong>/unidade</b><br /> à vista
                                @else
                                    <b>R${{$product->price}}/unidade</b><br /> à vista
                                @endif
                            </p>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
        {!! $products->render()!!}
    </div>


@endsection