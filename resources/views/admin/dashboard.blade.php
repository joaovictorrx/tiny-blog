@extends('adminlte::page')

@section('title', '')

@section('content_header')
<h1>Posts</h1>
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
        <div class="box box-default">
            <div class="box-header with-border">
                <a href="{{ route('new.post') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Novo Post</a>
            </div>

            <div class="box-body">
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Status</th>
                            <th>Data</th>
                            <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td>{{ ($post->published == 1)?'Publicado':'Não Publicado' }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <form class="form-inline" action="{{ route('destroy.post', $post) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <a href="{{ route('edit.post', $post) }}" class="btn btn-primary"><i class="fa fa-edit" aria-hidden="true"></i></a>
                                    <button type="submit" class="btn btn-danger btn-destroy"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@stop

@section('js')

<script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/date-de.js"></script>
<script>
    $(document).ready( function () {   
        $('#table').DataTable({
            order: [],
            language: {
                url: '//cdn.datatables.net/plug-ins/1.10.19/i18n/Portuguese-Brasil.json'
            },
        });
    });
</script>

@endsection