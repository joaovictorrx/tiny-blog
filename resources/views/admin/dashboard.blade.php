@extends('adminlte::page')

@section('title', '')

@section('content_header')
<h1>Depoimentos</h1>
@stop


@section('content')

<div class="row">
    <div class="col-md-12">
        @if (\Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
            <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
    </div>
</div>

<div class="row">

    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
            </div>

            <div class="box-body">
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Telefone</th>
                            <th>Dt. Nascimento</th>
                            <th>Estado</th>
                            <th>Cidade</th>
                            <th>Unidade</th>
                            <th>Youtube URL</th>
                            <th>Data de Envio</th>
                            <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
  
            <div class="box-footer clearfix">
            </div>

        </div>
    </div>

</div>

@stop
@section('css')
    <style>
        #table .testimonial-option.approved{
            border: 2px solid #00a65a
        }
        #table .testimonial-option.reproved{
            border: 2px solid #d50000
        }
    </style>
@endsection
@section('js')

<script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-de.js"></script>
<script>


    $(document).ready( function () {
        $.fn.dataTableExt.ofnSearch['html-input'] = function(value) {
            //console.log($(value).children("option:selected").text())
            return $(value).children("option:selected").text();
        };

        var table = $('#table').DataTable({
            ajax: "{{ route('get-all-testimonials') }}",
            order: [],
            columns:[
                {"data": "name"},
                {"data": "email"},
                {"data": "phone"},
                {"data": "birthday"},
                {
                    "data": null,
                    "render": function ( data, type, row ) {
                        return data.unit.city.state.uf;
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row ) {
                        return data.unit.city.name;
                    }
                },
                {
                    "data": null,
                    "render": function ( data, type, row ) {
                        return data.unit.name;
                    }
                },
                {
                    "data": "video_url",
                    "render": function ( data, type, row ) {
                        return '<a target="_blank" href="'+ data +'" class="btn btn-primary">Ver Vídeo</button>';
                    }
                },
                {"data": "created_at"},
                {
                    "data": null,
                    "render": function ( data, type, row ) {
                        return `
                        <select class="form-control testimonial-option `+ ( (data.status == 1)?'approved':(data.status == 2)?'reproved':'' )+`" name="status" data-testimonial="`+ data.id +`">
                            <option `+ ( (data.status == 0)?'selected':'' ) +` value="0">Pendente</option>
                            <option `+ ( (data.status == 1)?'selected':'' ) +` value="1">Aprovado</option>
                            <option `+ ( (data.status == 2)?'selected':'' ) +` value="2">Reprovado</option>
                        </select>
                        `;
                    }
                },
            ],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
            },
            columnDefs: [
                {
                    type: "html-input",
                    targets: [9]
                }
            ]
            
        });

        $('#table').on('change', '.testimonial-option', function() {
    
            var select = $(this)
            var testimonial = $(this).data('testimonial')
            var status = $(this).val()
    
    
            $.ajax({
                url: "{{ route('testimonial-change-status') }}",
                method: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "testimonial": testimonial,
                    "status": status,
                }
            }).done(function(testimonial) {
                if(testimonial.status == 0){
                    select.removeClass('reproved').removeClass('approved')
                }else if(testimonial.status == 1){
                    select.removeClass('reproved').addClass('approved')
                }else if(testimonial.status == 2){
                    select.removeClass('approved').addClass('reproved')
                }
    
                
            });
        })
    });

</script>

@endsection