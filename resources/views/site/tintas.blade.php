@extends('site.header')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <nav class="breadcrumb">
                        <a href="/">INÍCIO</a>
                        <a class="disabled">CATEGORIA</a>
                        <a class="current">Tintas</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrumb -->
    <section class="title-page container">
        <div class="col-lg-12">
            <h2>Tintas</h2>
        </div>
    </section>
    <div class="container">

        <div class="row">
            @foreach($products as $product)
                <div class="col-lg-4 col-md-4 col-sm-6 product">
                    <div class="box">
                        <div class="crop">
                            <a href="{{url('produto')}}/{{$product->id}}/{{str_slug($product->name)}}">
                                @if(count($product->images))
                                    <img src="{{url('uploads/'.$product->images()->first()->id.'.'.$product->images()->first()->extension)}}" alt="{{$product->name}}" />
                                @else
                                    <img src="{{url('uploads/no-img.jpg')}}" alt="{{$product->name}}" />
                            @endif
                        </div>
                        <h3>{{$product->name}}</h3>
                        </a>
                        <a href="#">
                            <p class="text-center">
                                De <s class="avista"><b>{{$product->price_old}}</b></s> por <b>R${{$product->price}}/unidade</b><br /> à vista
                            </p>
                        </a>
                    </div>

                </div>
            @endforeach
        </div>
        {!! $products->render()!!}
    </div>


@endsection