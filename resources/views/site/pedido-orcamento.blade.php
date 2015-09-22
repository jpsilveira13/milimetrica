@extends('site.header')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <nav class="breadcrumb">
                        <a href="/">INÍCIO</a>
                        <a class="disabled">SERVIÇOS</a>
                        <a class="current">Pedido de Orçamento</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrumb -->
    <div class="container">
        <section class="title-page">
            <div class="col-lg-12 no-padding-left">
                <h2>Pedido de orçamento</h2>
            </div>
        </section>

        <form class="form-group" method="post" id="budget-form">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Nome Completo: *</label>
                        <input type="text" name="fullname" id="fullname" placeholder="Ex.: João da Silva." class="form-control input-large">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Telefone: *</label>
                        <input type="tel" name="tel" id="tel" placeholder="Ex.: (82) 3375.3087" class="form-control input-large">
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="form-group">
                        <label>Email: *</label>
                        <input type="email" name="email" id="email" placeholder="Digite seu e-mail." autocomplete="off" class="form-control input-large">
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Cidade / Estado: *</label>
                        <input type="text" name="citystate" id="citystate" placeholder="Ex.: Maceió, Alagoas" autocomplete="off" class="form-control input-large">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Bairro: *</label>
                        <input type="text" name="bairro" id="bairro" placeholder="Nome do bairro para entrega." class="form-control input-large">
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Endereço: *</label>
                        <input type="text" name="adress" id="adrress" placeholder="Informe seu endereço" class="form-control input-large">
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="form-group">
                        <label>Forma de envio: *</label>
                        <select class="form-control input-large" name="formship" id="formship">
                            <option value="">Selecione uma forma de envio</option>
                            <option value="Entregue pela Empresa">Entregue pela empresa</option>
                            <option value="Irei Retirar">Irei Retirar</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Quais são os materiais?</label>
                        <textarea rows="16" class="form-control" id="materials" name="materials" placeholder="Escreva linha por linha os materiais desejados para o orçamemto."></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-primary btn-lg"> Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection