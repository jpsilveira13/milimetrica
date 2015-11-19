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
                    Cadastro de Imagem
                </h1>
            </div>
        </div>
        <div class="row">
            <fieldset>
                {!! Form::open(['route'=>['banner.store'], 'method' => 'post', 'enctype'=>"multipart/form-data"]) !!}

                <div class="form-group ">
                    {!! Form::label('extension', 'Imagem:', ['class' => 'col-lg-2 control-label']) !!}
                    <div class="col-lg-10 paddingFormProduct">
                        {!! Form::file('extension', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <!-- Submit Button -->
                <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        {!! Form::submit('Carregar Imagem', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
                        <a href="{{route('banner')}}" class="btn btn-default">Voltar</a>
                    </div>
                </div>

            </fieldset>
        </div>
    </div>

@endsection

