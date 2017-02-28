@extends('app')

@section('titlepage')
  Elenco Eventi
@endsection

@section('head')

@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Elenco Eventi</h1>
	</div>
</div>
<div class="row">
  <div class="form-group col-lg-12">
    @include('flash::message')
  </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<table class="table table-striped table-hover">
				<thead>
					<tr>
            <th>Titolo</th>
            <th>DataEvento</th>
            <th>OraEvento</th>
            <th>Locandina</th>
            <th colspan="2"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($eventi as $evento)
					<tr>
            <td>{{ $evento->titoloEvento }} <div style="width: 60px; height: 10px;background-color:#{{ $evento->colorEvento }}"> </div></td>
            <td>{{ $evento->dataEvento }} <div style="width: 60px; height: 10px;background-color:#{{ $evento->colorData }}"> </div></td>
            <td>{{ $evento->oraEvento }}</td>
            <td><img width="200px" src="/uploads/{{ $evento->locandina }}"></td>
            <td>
              <a href="/events/{{ $evento->id }}/edit"  class="btn btn-primary btn-sm">MODIFICA</a>
            </td>
            <td>
              {!! Form::open(['method' => 'DELETE', 'url' => 'events/'.$evento->id, 'id' => 'frm_'.$evento->id, 'class' => 'pull-left']) !!}
              {!! Form::button('Cancella', ['class' => 'btn btn-danger btn-sm linkdestroy']) !!}
              {!! Form::close() !!}
            </td>
					</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/bootbox.min.js') }}"></script>
<script>
$( document ).ready(function() {

    $('button.linkdestroy').on("click", function(e) {
      e.preventDefault();
      var usrnm =  $('td:first', $(this).parents('tr')).text();
      var thisbtn = $(this);
      bootbox.confirm("<h3>Cancellare evento: " +usrnm+ "? </h3>", function(result) {
        if(result){
            var sbtfrm = thisbtn.closest('form').attr('id');
            $('form#'+sbtfrm).submit();
        }
      });
    });


});
</script>
@endsection
