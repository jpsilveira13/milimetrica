@extends('site.header')

@section('content')
    <!-- Area  Slider -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ asset('site/images/banner1.jpg') }}" alt="Chania">
            </div>

            <div class="item">
                <img src="{{ asset('site/images/banner2.jpg') }}" alt="Loja">
            </div>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- products -->
    <div class="container">
        <div class="title-page">
            <h2>Ofertas <span class="red">milimétrica</span></h2>
        </div
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

    </div>
@endsection
