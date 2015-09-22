@extends('site.header')

@section('content')
    <section id="breadcrumb">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <nav class="breadcrumb">
                        <a href="/">INÍCIO</a>
                        <a class="disabled">INSTITUCIONAL</a>
                        <a class="current">Nossa Loja</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- end breadcrumb -->
    <section class="title-page container">
        <div class="col-lg-12">
            <h2>Nossa Loja</h2>
        </div>
    </section>
    <div class="row">
        <div class="container">
            <div class="col-lg-12" style="margin-bottom: 2rem">
                <div class="box-end">
                    <p class="red">MILIMÉTRICA</p>
                    <p>
                        Av. Governador Lamenha Filho, 62, Feitosa,
                        Maceió - Alagoas
                    </p>
                    <a href="#" class="btn btn-primary">Quem Somos</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div id="maps">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3933.4179258809577!2d-35.72833440000001!3d-9.645285199999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x70145925d6df589%3A0x2b4b2a75d76ddfef!2sAv.+Gov.+Lamenha+Filho%2C+62+-+Feitosa%2C+Macei%C3%B3+-+AL!5e0!3m2!1spt-BR!2sbr!4v1436404026221" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
    </div>


@endsection