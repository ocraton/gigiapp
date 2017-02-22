@extends('app')

@section('titlepage')
  Web Services
@endsection

@section('head')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Elenco Risposte Test</h1>
		<form method="get" action="{{ Request::url() }}" class="form-inline">
        <div class="form-group">
            <select id="filtroterm" class="form-control" name="filtroterm">
                <option value="laboratorio">laboratorio</option>
                <option value="nome">nome</option>
                <option value="cognome">cognome</option>
            </select>
        </div>
			   <div class="form-group input-group">
              <input id="token" type="hidden" name="token" value="{{ $token }}">
              <input id="searchid" type="hidden" name="searchid" value="">
              <div class="form-group">
	               <input id="quickSearch" class="form-control " placeholder="Ricerca Veloce" name="quickSearch" type="text" value="">
                 <span class="input-group-btn">
                     <button class="btn btn-default" type="submit" value="Search"><i class="fa fa-search"></i></button>
                 </span>
              </div>
	        </div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="pull-right">
        {{ $risposte->appends(['token' => ''.$token])->links() }}
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table class="table table-striped table-hover">
				<thead>
					<tr>
            <th>Laboratorio</th>
						<th>Cognome</th>
            <th>Nome</th>
            <th>Stringa Dati</th>
            <th>Inserito il</th>
						<th>Cancella</th>
					</tr>
				</thead>
				<tbody>
					@foreach($risposte as $risposta)
					<tr>
            <td>
              @if($quicks)
                {{ $risposta->id }} - {{ $risposta->ragione_sociale }}
              @else
                {{ $risposta->user->id }} - {{ $risposta->user->ragione_sociale }}
              @endif
            </td>
            <td>{{ $risposta->cognome }} </td>
            <td>{{ $risposta->nome }} </td>
            <td>
            <?php
              $stringone = '';
              $dollarexp = explode("$$", $risposta->stringone_dati);
              for($i=0;$i<count($dollarexp) -1;$i++) {
                $subpan = explode("||", $dollarexp[$i]);
                if(trim($subpan[0]) > 0) {
                    $foglio = DB::select('select * from fogli where id = ?', [trim($subpan[0])]);
                    $stringone .= 'Foglio: <b>'.$foglio[0]->nome.'</b>'.trim(nl2br($subpan[2])).'<br><br>';
                } else {
                    $sottopannello = DB::select('select * from sottopannelli where id = ?', [trim($subpan[1])]);
                    $stringone .= 'Sottopannello: <b>'.$sottopannello[0]->nome.'</b>'.trim(nl2br($subpan[2])).'<br><br>';
                }

              }
              echo substr($stringone, 0, 80).'...';
            ?>
              <button  type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal_{{ $risposta->id }}">
                  vedi tutto
              </button>
              <!-- Modal -->
              <div class="modal fade" id="myModal_{{ $risposta->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                      <?php echo $stringone; ?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
                    </div>
                  </div>
                </div>
              </div>
            </td>
            <td>{{ \Carbon\Carbon::parse($risposta->created_at)->format('d/m/Y H:i:s') }} </td>
						<td>
              	<button class="btn btn-danger btn-sm linkdestroy" id="frm_{{ $risposta->id }}" type="button">Cancella</button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
$( document ).ready(function() {

      $('button.linkdestroy').on("click", function(e) {
        e.preventDefault();
        var usrnm =  $('td:first', $(this).parents('tr')).text();
        var thisbtn = $(this);
        bootbox.confirm("<h3>Sicuro di voler cancellare la risposta per: " +usrnm+ "? </h3>", function(result) {
          if(result){
              var sbtfrm = thisbtn.attr('id').split('_')[1];

              $.ajax({
                  url: baseUrl+'/api/test/elenco/cancella?token={{ $token }}&id=' + sbtfrm,
                  type: "delete",
                  dataType: "json",
                  success: function(data){

                    alert(data.result);

                  }
              });

          }
        });
      });

});
</script>
@endsection
