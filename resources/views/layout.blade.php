@extends('site.header')

@section('content')
        <!-- Area  Slider -->

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    @if($bannerImages->count() > 1)
            <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php
        $j = 0;
        ?>
        @foreach($bannerImages as $bannerImage)
            <li data-target="#myCarousel" data-slide-to="{{$j}}" class="<?php if($j==0){echo 'active';}?>"></li>
            <?php $j++ ?>
        @endforeach
        @endif
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
        <?php $i =0 ?>
        @foreach($bannerImages as $bannerImage)
            <div class="item <?php if($i==0){echo 'active';} ?>">
                <img src="{{url('banner/'.$bannerImage->extension)}}" alt="">
            </div>
            <?php $i++?>
        @endforeach

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
