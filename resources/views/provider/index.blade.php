@extends('app')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header adminFontTitulo">
                Cadastro Imagem fornecedores
            </h1>

            <ol class="breadcrumbProduct">
                <li class="activeProduct">
                    <i class="fa fa-dashboard"></i> Painel administrativo > Imagens Cadastradas
                </li>
            </ol>

        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 alturaTabela">
            <a href="{{route('provider.create')}}" class="btn btn-primary">Cadastrar Imagem</a>
            <br />
            <br />
            <div class="input-group"> <span class="input-group-addon">Filtro</span>

                <input id="tbBusca" type="text" class="form-control" placeholder="Pesquise o produto com qualquer parâmetro...">
            </div>


            <table id="tbItens" class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagem</th>
                    <th>Extensão da Imagem</th>
                    <th>Opções</th>
                </tr>
                </thead>
                <tbody class="searchable">
                @foreach($providerImages as $providerImage )
                    <tr>
                        <td>{{$providerImage->id}}</td>
                        <td>
                            <img src="{{url('provider/'.$providerImage->extension)}}" width="80"/>
                        </td>
                        <td>{{$providerImage->extension}}</td>
                        <td  width="5%" class="text-center">
                            <div class="dropdown">
                                <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a class="remover" href="{{route('provider.destroy',['id'=>$providerImage->id])}}"><i class="fa fa-trash-o"></i> Remover Imagem</a>
                                    </li>
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

