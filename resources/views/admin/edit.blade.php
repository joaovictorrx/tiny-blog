@extends('adminlte::page')

@section('title', 'Editar Post')

@section('content_header')
<h1>Editar Post</h1>
@stop

@section('content')
<div class="row">
  <div class="col-12">
    <!-- alerts -->
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
  <div class="col-12 col-lg-6">
    <!-- general form elements -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Dados</h3>
      </div>
      <form action="{{ route('update.post', $post) }}" method="post">
        {!! csrf_field() !!}
        <div class="box-body">
          @include('admin.form')
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- /.box -->
@stop