/**
 * Created by Joao Paulo on 28/07/2015.
 */

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function makeslug(val, replaceBy) {
        replaceBy = replaceBy || '-';
        var mapaAcentosHex 	= {
            a : /[\xE0-\xE6]/g,
            A : /[\xC0-\xC6]/g,
            e : /[\xE8-\xEB]/g, // if you're gonna echo this
            E : /[\xC8-\xCB]/g, // JS code through PHP, do
            i : /[\xEC-\xEF]/g, // not forget to escape these
            I : /[\xCC-\xCF]/g, // backslashes (\), by repeating
            o : /[\xF2-\xF6]/g, // them (\\)
            O : /[\xD2-\xD6]/g,
            u : /[\xF9-\xFC]/g,
            U : /[\xD9-\xDC]/g,
            c : /\xE7/g,
            C : /\xC7/g,
            n : /\xF1/g,
            N : /\xD1/g,
        };

        for ( var letra in mapaAcentosHex ) {
            var expressaoRegular = mapaAcentosHex[letra];
            val = val.replace( expressaoRegular, letra );
        }

        val = val.toLowerCase();
        val = val.replace(/[^a-z0-9\-]/g, " ");

        do {
            val = val.replace('  ', ' ');
        } while (val.indexOf('  ')>-1);

        val = val.trim();
        val = val.replace(/\s/g, replaceBy);

        return val;
    }

    $( window ).scroll(function() {
        var topo = $('#toTop');
        if($(window).scrollTop() > 700){
            topo.removeClass('hide');
        } else {
            topo.addClass('hide');
        }

    });

    $('#toTop').click(function(e){
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 1000);
    });
    //Buscador produtos

    $('#search-input').keyup(function(){

        var minLetras = 4;
        var textoPesquisa = $('#search-input').val();
        var productsList = $("#listaProdutos");

        if(textoPesquisa.length >= minLetras ){

            productsList.fadeIn();
            productsList.html('<img src="site/images/loading.gif" width="34" alt="Pesquisando..."> Pesquisando...');

            $.ajax({
                url:'site/search-product',
                type:'POST',
                data:{pesquisa:textoPesquisa},
                dataType:"json",
                cache:true,
                success:function(data){
                    var html = '<ul class="listaPesquisa no-padding-left">';
                    for(var i = 0, len = data.length; i < len; i++) {
                        name= makeslug(data[i].name,'-');

                        html += '<li><a href="/produto/'+data[i].id+'/'+name+'"><img class="listaImagem" width="54" src="../../uploads/'+data[i].images[0].id+'.'+data[i].images[0].extension +'" /><span> ' + data[i].name + '</span></a></li>';


                    }
                    html+='</ul>';
                    productsList.html(html);
                    name = null;
                },
                error: function () {
                    productsList.html("Nada foi encontrado!");
                }
            });

            if(productsList.is(":visible")){
                $('body').on('click',function(){
                    productsList.fadeOut().html('');
                    $('#pesquisarInput').val('');
                });
            }
        } else{
            productsList.hide();
            productsList.html('');
        }

    });
    $('#tbBusca').keyup(function () {

        var rex = new RegExp($(this).val(), 'i');
        $('.searchable tr').hide();
        $('.searchable tr').filter(function () {
            return rex.test($(this).text());
        }).show();

    })
});

