@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            @if( Session::has('message') )
                <div class="alert alert-success" role="alert" align="center">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if( Session::has('errors') )
                <div class="alert alert-danger" role="alert" align="center">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header adminFontTitulo">
                    Cadastro do Banners
                </h1>

                <ol class="breadcrumbProduct">
                    <li class="activeProduct">
                        <i class="fa fa-dashboard"></i> Painel administrativo > Banners Cadastrados
                    </li>
                </ol>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 alturaTabela">
                <a href="{{route('banner.create')}}" class="btn btn-primary">Cadastrar Banner</a>
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
                    @foreach($bannerImages as $bannerImage )
                        <tr>
                            <td>{{$bannerImage->id}}</td>
                            <td>
                                <img src="{{url('banner/'.$bannerImage->extension)}}" width="80"/>
                            </td>
                            <td>{{$bannerImage->extension}}</td>
                            <td  width="5%" class="text-center">
                                <div class="dropdown">
                                    <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a class="remover" href="{{route('banner.destroy',['id'=>$bannerImage->id])}}"><i class="fa fa-trash-o"></i> Remover Imagem</a>
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
                <a href="{{route('banner')}}" class="btn btn-primary">Voltar</a>
            </div>
        </div>

@endsection

