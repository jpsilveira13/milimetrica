@extends('app')
@section('content')
    <div class="container">

        @if($errors->any())
            <ul class="">
                @foreach($errors->all() as $error)
                    <li class="alert alert-danger alert-dismissable">{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Cadastro do produto
                </h1>
            </div>

        </div>
        <div class="row">
            <fieldset>

                {!! Form::open(['route'=>'products.store']) !!}
                <!-- Name -->
                <div class="row">
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group ">
                            {!! Form::label('name', 'Nome:', ['class' => '']) !!}

                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <!-- Category -->
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group ">
                            {!! Form::label('category', 'Seleciona uma Categoria:', ['class' => '']) !!}

                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => '']) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group ">
                            {!! Form::label('price_old', 'Preço Normal: R$', ['class' => '']) !!}

                            {!! Form::text('price_old', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3">
                        <div class="form-group ">
                            {!! Form::label('price', 'Preço Promocional: R$', ['class' => '']) !!}

                            {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => '']) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Description Area -->


                    <!-- Select With One Default -->
                    <div class="col-sm-12 col-lg-4">

                        <div class="form-group ">
                            {!! Form::label('Featured', 'Destaque', ['class' => ''] )  !!}

                            {!!  Form::select('featured', ['1' => 'Sim', '0' => 'Não'], $value  = null, ['class' => 'form-control' ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">

                        <div class="form-group ">
                            {!! Form::label('enabled_product', 'Ativar Produto', ['class' => ''] )  !!}

                            {!!  Form::select('enabled_product', ['1' => 'Sim', '0' => 'Não'], $value  = null, ['class' => 'form-control' ]) !!}

                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-4">

                        <div class="form-group ">
                            {!! Form::label('division_product', 'Número de Parcelamento Produto', ['class' => ''] )  !!}

                            {!!  Form::select('division_product', ['1' => '1', '2' => '2','3' => '3', '4' => '4'], $value  = null, ['class' => 'form-control' ]) !!}

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group ">
                            {!! Form::label('description', 'Descrição do Produto:', ['class' => '']) !!}

                            {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 5]) !!}

                        </div>
                    </div>
                </div>


                <!-- Submit Button -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group"  style="text-align: center">

                                {!! Form::submit('Salvar', ['class' => 'btn btn-lg btn-primary'] ) !!}

                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div><!-- fim row -->
    </div>

@endsection

