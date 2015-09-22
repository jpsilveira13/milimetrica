@extends('app')
@section('content')
    <div class="container">
        @if($errors->any())
            <ul class="">
                @foreach($errors->all() as $error)
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <li class="alert alert-danger alert-dismissable">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Editar Produto
                </h1>
            </div>
        </div>
        <div class="row">
            <fieldset>
                {!! Form::open(['route'=>['products.update',$product->id],'method'=>'put']) !!}
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group ">
                            {!! Form::label('name', 'Nome:', ['class' => '']) !!}

                            {!! Form::text('name', $product->name, ['class' => 'form-control', 'placeholder' => 'name']) !!}
                        </div>
                    </div>
                    <!-- Category -->
                    <div class="col-sm-12 col-lg-4">
                        <div class="form-group ">
                            {!! Form::label('category', 'Categorias:', ['class' => '']) !!}

                            {!! Form::select('category_id', $categories, $product->category->id, ['class' => 'form-control', 'placeholder' => '']) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <div class="form-group ">
                            {!! Form::label('price_old', 'Preço Normal: R$', ['class' => '']) !!}

                            {!! Form::text('price_old', $product->price_old, ['class' => 'form-control', 'placeholder' => '']) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <div class="form-group ">
                            {!! Form::label('price', 'Preço Promocional: R$', ['class' => '']) !!}

                            {!! Form::text('price', $product->price, ['class' => 'form-control', 'placeholder' => '']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-4">

                        <div class="form-group ">
                            {!! Form::label('Featured', 'Destaque', ['class' => ''] )  !!}

                            {!!  Form::select('featured', ['1' => 'Sim', '0' => 'Não'], $value  = $product->featured, ['class' => 'form-control' ]) !!}
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">

                        <div class="form-group ">
                            {!! Form::label('enabled_product', 'Ativar Produto', ['class' => ''] )  !!}

                            {!!  Form::select('enabled_product', ['1' => 'Sim', '0' => 'Não'], $value  = $product->enabled_product, ['class' => 'form-control' ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">

                        <div class="form-group ">
                            {!! Form::label('division_product', 'Número de Parcelamento Produto', ['class' => ''] )  !!}

                            {!!  Form::select('division_product', ['1' => '1', '2' => '2','3' => '3', '4' => '4'], $value  = $product->division_product, ['class' => 'form-control' ]) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group ">
                            {!! Form::label('description', 'Descrição do Produto:', ['class' => '']) !!}

                            {!! Form::textarea('description', $product->description, ['class' => 'form-control', 'rows' => 5]) !!}

                        </div>
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group"  style="text-align: center">

                            {!! Form::submit('Editar Produto', ['class' => 'btn btn-lg btn-primary'] ) !!}

                        </div>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>

@endsection

