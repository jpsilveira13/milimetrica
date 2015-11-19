@extends('app')
@section('content')
    <div class="container">
        <h1>Criar Textos Quem somos</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=>'quemsomos.store']) !!}
        <div class="form-group">

                {!! Form::label('quem_somos','Quem Somos:')!!}
                {!! Form::textarea('quem_somos', null,['class'=>'form-control','rows' => 3])!!}

        </div>
        <div class="form-group">

            {!! Form::label('missao','Missão:')!!}
            {!! Form::textarea('missao', null,['class'=>'form-control','rows' => 3])!!}

        </div>
        <div class="form-group">

            {!! Form::label('visao','Visão:')!!}
            {!! Form::textarea('visao', null,['class'=>'form-control','rows' => 3])!!}

        </div>
        <div class="form-group">

            {!! Form::label('valores','Valores:')!!}
            {!! Form::textarea('valores', null,['class'=>'form-control','rows' => 3])!!}

        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar Textos',['class'=>'btn btn-primary form-control'])!!}
        </div>
        {!! !Form::close() !!}
    </div>

@endsection

