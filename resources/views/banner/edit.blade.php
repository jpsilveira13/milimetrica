@extends('app')
@section('content')
    <div class="container">
        <h1>Editar textos</h1>
        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        {!! Form::open(['route'=>['quemsomos.update',$quemsomos->id],'method'=>'put']) !!}
        <div class="form-group">

                {!! Form::label('name','Name:')!!}
                {!! Form::textarea('quem_somos', $quemsomos->quem_somos,['class'=>'form-control'])!!}

        </div>
        <div class="form-group">

            {!! Form::label('description','Missão:')!!}
            {!! Form::textarea('missao', $quemsomos->missao,['class'=>'form-control'])!!}

        </div>
        <div class="form-group">

            {!! Form::label('visao','Visão:')!!}
            {!! Form::textarea('visao', $quemsomos->visao,['class'=>'form-control'])!!}

        </div>
        <div class="form-group">

            {!! Form::label('valores','Valores:')!!}
            {!! Form::textarea('valores', $quemsomos->valores,['class'=>'form-control'])!!}

        </div>

        <div class="form-group">
            {!! Form::submit('Editar Textos',['class'=>'btn btn-primary'])!!}
        </div>
        {!! !Form::close() !!}
    </div>

@endsection
