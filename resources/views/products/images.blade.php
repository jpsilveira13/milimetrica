@extends('app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header adminFontTitulo">
                    Imagens  do produto <b class="red">{{$product->name}}</b>
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
                <a href="{{route('products.images.create',['id' =>$product->id])}}" class="btn btn-primary">Cadastrar Imagem</a>
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
                    @foreach($product->images as $image)
                        <tr>
                            <td>{{$image->id}}</td>
                            <td>
                                <img src="{{url('uploads/'.$image->id.'.'.$image->extension)}}" width="80"/>
                            </td>
                            <td>{{$image->extension}}</td>
                            <td  width="5%" class="text-center">
                                <div class="dropdown">
                                    <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="{{route('products.edit',['id'=>$image->product->id])}}"><i class="fa fa-fw fa-gear"></i>Visualizar/Editar</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a class="remover" href="{{route('products.images.destroy',['id'=>$image->id])}}"><i class="fa fa-trash-o"></i> Remover Imagem</a>
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

