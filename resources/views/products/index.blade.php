@extends('app')
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header adminFontTitulo">
                    Produtos Cadastrados
                </h1>

                <ol class="breadcrumbProduct">
                    <li class="activeProduct">
                        <i class="fa fa-dashboard"></i> Painel administrativo > Produtos cadastrados
                    </li>
                </ol>

            </div>

        </div>
        <div class="row">
            <div class="col-lg-12 alturaTabela">
                <a href="{{route('products.create')}}" class="btn btn-primary">Novo Produto</a>
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
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categorias</th>
                        <th>Destaque</th>
                        <th>Opções</th>
                    </tr>

                    </thead>
                    <tbody class="searchable">
                    @if(count($products) < 0)
                        <tr>
                            <td id="notFoundProduct" colspan="7"><h2>Nenhum Produto Cadastrado...</h2></td>
                            <br />

                        </tr>
                    @else
                        @foreach($products as $product)
                            <tr class="">
                                <td>{{$product->id}}</td>
                                <td>
                                    @if(count($product->images))
                                        <img width="80" height="80" src="{{url('uploads/'.$product->images()->first()->id.'.'.$product->images()->first()->extension)}}"/>
                                    @else
                                        <img src="{{url('uploads/no-img.jpg')}}" alt="" width="80" height="80" />
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{str_limit($product->description,$limit = 75, $end="...")}}</td>
                                <td>{{$product->price}}</td>

                                <td>{{$product->category->name}}</td>
                                @if($product->featured == 1)
                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                @else
                                    <td><span class="glyphicon glyphicon-remove"></span></td>
                                @endif


                                <td  width="5%" class="text-center">
                                    <div class="dropdown">
                                        <a href="javascript:;" class="btn btn-xs btn-primary" data-toggle="dropdown"><i class="fa fa-plus"></i></a>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="{{route('products.edit',['id'=>$product->id])}}"><i class="fa fa-fw fa-gear"></i>Visualizar/Editar</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="{{route('products.images',['id'=>$product->id])}}"><i class="fa fa-camera-retro"></i> Cadastrar\Visualizar</a>
                                            </li>

                                            <li class="divider"></li>
                                            <li>
                                                <a class="remover" href="{{route('products.destroy',['id'=>$product->id])}}"><i class="fa fa-trash-o"></i> Remover Produto</a>
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
                    @endif
                    </tbody>
                </table>
                {!! $products->render()!!}
            </div>
        </div>
    </div>
@endsection

