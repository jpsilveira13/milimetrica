@extends('app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header adminFontTitulo">
                    Texto Quem somos
                </h1>

                <ol class="breadcrumbProduct">
                    <li class="activeProduct">
                        <i class="fa fa-dashboard"></i> Painel administrativo > Texto Cadastrado
                    </li>
                </ol>

            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 alturaTabela">
                @if($quemsomos->count() > 0)
                    <a href="{{route('quemsomos.create')}}" class="btn btn-primary <?='hide'?>">Cadastrar Texto</a>
                @else
                    <a href="{{route('quemsomos.create')}}" class="btn btn-primary">Cadastrar Texto</a>
                    <br />
                    <br />
                @endif
                <div class="input-group"> <span class="input-group-addon">Filtro</span>

                    <input id="tbBusca" type="text" class="form-control" placeholder="Pesquise o produto com qualquer parâmetro...">
                </div>


                <table id="tbItens" class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Quem Somos</th>
                        <th>Valores</th>
                        <th>Missão</th>
                        <th>Visão</th>
                    </tr>
                    </thead>
                    <tbody class="searchable">
                    @foreach($quemsomos as $teste)
                        <tr>

                            <td>{{$teste->id}}</td>

                            <td>{{str_limit($teste->quem_somos,$limit = 75, $end="...")}}</td>

                            <td>{{str_limit($teste->valores,$limit = 75, $end="...")}}</td>
                            <td>{{str_limit($teste->missao,$limit = 75, $end="...")}}</td>
                            <td>{{str_limit($teste->visao,$limit = 75, $end="...")}}</td>
                            <td  width="5%" class="text-center">
                                <div class="dropdown">
                                    <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{route('quemsomos.edit',['id'=>$teste->id])}}"><i class="fa fa-fw fa-gear"></i>Visualizar/Editar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="remover" href="{{route('quemsomos.destroy',['id'=>$teste->id])}}"><i class="fa fa-trash-o"></i> Remover Produto</a></li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="fechar" href="javascript:void(0)"><i class="fa fa-fw fa-power-off"></i> Fechar</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="{{route('products')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>

@endsection

