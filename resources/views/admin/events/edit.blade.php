@extends('app')

@section('titlepage')
  Crea
@endsection

@section('head')

@endsection

@section('content')

                <div class="row">
                    <h1 style="font-family: 'Lato';">Input Data</h1>
                    <hr>
                </div>
                <div class="row">

                      <form id="validatore" class="form-horizontal dropzone" enctype="multipart/form-data">

                            <fieldset class="col-md-12" style="border: 1px solid #6b6b6b; padding: 10px" id="fieldsetp_1">
                              <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-4">
                                    <label class="control-label" >Data </label>
                                    <div class="form-group input-group">
                                    <input style="margin-left: 15px" id="dataEvento_1" name="dataEvento_1" type="text" placeholder="gg-mm-yyyy" class="form-control " >
                                    <span style="padding: 0" class="input-group-addon"><input class="form-control jscolor pull-right" id="colorData_1" type="text" name="colorData_1" value="b0f221" style="width: 20px"></span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Ora </label>
                                    <input id="oraEvento_1" name="oraEvento_1" type="text" placeholder="h:m" class="form-control " >
                                  </div>
                                  <div class="col-md-4">
                                    <br>
                                    <span style="font-size: 1.9rem;">Data/Ora Visibile</span>
                                    <input name="dataOraVisibile_1" id="dataOraVisibile_1" type="checkbox" value="" style="width: 20px;height: 17px; ">
                                  </div>
                                </div>
                                <div class="row tempidistop">
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -1 ) </label>
                                    <input id="tempoStopMenouno_1" name="tempoStopMenouno_1" type="text" class="form-control " >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -2 ) </label>
                                    <input id="tempoStopMenodue_1" name="tempoStopMenodue_1" type="text" class="form-control " >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -3 ) </label>
                                    <input id="tempoStopMenotre_1" name="tempoStopMenotre_1" type="text" class="form-control " >
                                  </div>
                                </div>
                              <div class="row">
                                <div class="col-md-12">
                                  <label class="control-label" >Evento </label>
                                  <div class="form-group input-group">
                                  <input style="margin-left: 15px" name="titoloEvento_1" type="text" class="form-control" id="titoloEvento_1" >
                                  <span style="padding: 0" class="input-group-addon">
                                    <input class="form-control jscolor pull-right" id="colorEvento_1" value="dd0404" style="width: 20px">
                                  </span>
                                  </div>
                                  <label class="control-label" >Commento 1 </label>
                                  <div class="form-group input-group">
                                  <input style="margin-left: 15px" name="commentoUno_1" type="text" class="form-control" id="commentoUno_1" >
                                  <span style="padding: 0" class="input-group-addon">
                                    <input class="form-control jscolor pull-right" id="colorCommenti_1" name="colorCommenti_1" value="337ab7" style="width: 20px">
                                  </span>
                                  </div>
                                  <label class="control-label" >Commento 2 </label>
                                  <input name="commentoDue_1" type="text" class="form-control" id="commentoDue_1" >
                                  <label class="control-label" >Commento 3 </label>
                                  <input name="commentoTre_1" type="text" class="form-control" id="commentoTre_1" >
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                    <h4>Evento del giorno</h4>
                                      <span style="font-size: 2rem;">Full screen</span>
                                      <input name="fullScreen_1" id="fullScreen_1" type="checkbox" value="" style="width: 20px;height: 17px; ">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop </label>
                                    <input name="tempoStopDef_1" type="text" class="form-control" id="tempoStopDef_1" >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Visualizza ogni </label>
                                    <input name="visualizzaOgni_1" type="text" class="form-control" id="visualizzaOgni_1" >
                                  </div>
                              </div>
                              </div>
                              <div class="col-md-6">
                                <label class="control-label" >Locandina </label>
                                <div class="dropzone-previews" id="locandina_1" name="locandina_1"></div>
                              </div>

                            </fieldset>

                          <div class="form-group col-lg-12">
                            <br><br>
                            <button type="button" id="addfieldsetbtn" class="btn btn-success btn-lg"><i class="fa fa-plus-circle" aria-hidden="true"></i> Aggiungi </button>
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Salva</button>
                          </div>

                      </form>


                </div>


@endsection


@section('scripts')

<script>
$(function(){

  //clona il pannello di input riaggiornando gli id e i name
  $('button#addfieldsetbtn').on('click', function(e) {

        //$('div#foglipan_1').fadeOut();

        // e.preventDefault();
        var fieldset_last = $('fieldset:last');
        var fieldset_id = $('fieldset:last').attr("id");
        var prev_fieldset_index = parseInt(fieldset_id.split('_')[1]);
        var curr_fieldset_index = parseInt(fieldset_id.split('_')[1]) + 1;
        var remove_btn = '<div class="form-group col-md-12 "><button type="button" class="btn btn-lg btn-danger pull-right removepanelbtn"><i class="fa fa-minus-circle" aria-hidden="true"></i> rimuovi </button></div>';

        //id fieldset
        var clonefield = fieldset_last.clone().prop('id', 'fieldsetp_'+curr_fieldset_index );

        //id data evento
        // clonefield.find("label[id^='labelDataEvento_']").prop('id', 'labelDataEvento_'+curr_fieldset_index).prop('for', 'dataEvento_'+curr_fieldset_index );
        clonefield.find("input[id^='dataEvento_']").prop('id', 'dataEvento_'+curr_fieldset_index ).prop('name', 'dataEvento_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorData_']").prop('id', 'colorData_'+curr_fieldset_index ).prop('name', 'colorData_'+curr_fieldset_index ).val('');
        //ora evento
        // clonefield.find("label[id^='labelOraEvento_']").prop('id', 'labelOraEvento_'+curr_fieldset_index).prop('for', 'oraEvento_'+curr_fieldset_index );
        clonefield.find("input[id^='oraEvento_']").prop('id', 'oraEvento_'+curr_fieldset_index ).prop('name', 'oraEvento_'+curr_fieldset_index ).val('');
        //data/ora visibile
        clonefield.find("input[id^='dataOraVisibile_']").prop('id', 'dataOraVisibile_'+curr_fieldset_index ).prop('name', 'dataOraVisibile_'+curr_fieldset_index ).val('');
        //tempo di stop -1 -2 -3
        // clonefield.find("label[id^='labelTempoStopMenouno_']").prop('for', 'tempoStopMenouno_'+curr_fieldset_index );
        clonefield.find("input[id^='tempoStopMenouno_']").prop('id', 'tempoStopMenouno_'+curr_fieldset_index ).prop('name', 'tempoStopMenouno_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelTempoStopMenodue_']").prop('for', 'tempoStopMenodue_'+curr_fieldset_index );
        clonefield.find("input[id^='tempoStopMenodue_']").prop('id', 'tempoStopMenodue_'+curr_fieldset_index ).prop('name', 'tempoStopMenodue_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelTempoStopMenotre_']").prop('for', 'tempoStopMenotre_'+curr_fieldset_index );
        clonefield.find("input[id^='tempoStopMenotre_']").prop('id', 'tempoStopMenotre_'+curr_fieldset_index ).prop('name', 'tempoStopMenotre_'+curr_fieldset_index ).val('');
        // titolo e commenti
        // clonefield.find("label[id^='labelTitoloEvento_']").prop('for', 'titoloEvento_'+curr_fieldset_index );
        clonefield.find("input[id^='titoloEvento_']").prop('id', 'titoloEvento_'+curr_fieldset_index ).prop('name', 'titoloEvento_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorEvento_']").prop('id', 'colorEvento_'+curr_fieldset_index ).prop('name', 'colorEvento_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelCommentoUno_']").prop('for', 'commentoUno_'+curr_fieldset_index );
        clonefield.find("input[id^='commentoUno_']").prop('id', 'commentoUno_'+curr_fieldset_index ).prop('name', 'commentoUno_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorCommenti_']").prop('id', 'colorCommenti_'+curr_fieldset_index ).prop('name', 'colorCommenti_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelCommentoDue_']").prop('for', 'commentoDue_'+curr_fieldset_index );
        clonefield.find("input[id^='commentoDue_']").prop('id', 'commentoDue_'+curr_fieldset_index ).prop('name', 'commentoDue_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelCommentoTre_']").prop('for', 'commentoTre_'+curr_fieldset_index );
        clonefield.find("input[id^='commentoTre_']").prop('id', 'commentoTre_'+curr_fieldset_index ).prop('name', 'commentoTre_'+curr_fieldset_index ).val('');
        // fullScreen e tempoStop, visualizza ogni
        clonefield.find("input[id^='fullScreen_']").prop('id', 'fullScreen_'+curr_fieldset_index ).prop('name', 'fullScreen_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelTempoStopDef_']").prop('for', 'tempoStopDef_'+curr_fieldset_index );
        clonefield.find("input[id^='tempoStopDef_']").prop('id', 'tempoStopDef_'+curr_fieldset_index ).prop('name', 'tempoStopDef_'+curr_fieldset_index ).val('');
        // clonefield.find("label[id^='labelVisualizzaOgni_']").prop('for', 'visualizzaOgni_'+curr_fieldset_index );
        clonefield.find("input[id^='visualizzaOgni_']").prop('id', 'visualizzaOgni_'+curr_fieldset_index ).prop('name', 'visualizzaOgni_'+curr_fieldset_index ).val('');
        // locandina
        // clonefield.find("label[id^='labelLocandina_']").prop('for', 'labelLocandina_'+curr_fieldset_index );
        clonefield.find("input[id^='locandina_']").prop('id', 'locandina_'+curr_fieldset_index ).prop('name', 'locandina_'+curr_fieldset_index ).val('');

        clonefield.find('button.removepanelbtn').remove();

        clonefield.append(remove_btn);

        clonefield.insertAfter(fieldset_last);

        $('button.removepanelbtn').on('click', function(e) {
            $(this).parent('div.form-group').parent('fieldset').remove();
            var panelfieldset_n = $('fieldset').length;
            if(panelfieldset_n === 1){
              $('div#foglipan_1').fadeIn();
            }
        });
  });

  $( "#data_evento" ).datepicker({
      dateFormat: "dd-mm-yy"
  });

/*
  $('#validatore').on('submit', function(e) {

      e.preventDefault();

      var fieldsets = [];

      $('fieldset').each(function (index) {

        var indexc = index + 1;
        var risultatoEsame = {
            fogli: $('input[name=fogli_'+indexc+']:checked').val() === undefined ? -1 : $('input[name=fogli_'+indexc+']:checked').val(),
            sottopannelli: $('input[name=sottopannelli_'+indexc+']:checked').val() === undefined ? -1 : $('input[name=sottopannelli_'+indexc+']:checked').val(),
            stringone: $('#stringone_dati_'+indexc+'').val(),
            getStringConcat() {
              return this.fogli + '\n||\n' + this.sottopannelli + '\n||\n' + this.stringone + '\n$$\n'
            }
        }
        fieldsets.push(risultatoEsame);

      });

      var stringone_dati_complessivo = "";

      function getFieldFieldset(item, index) {
           stringone_dati_complessivo = stringone_dati_complessivo + item.getStringConcat();
      }

      fieldsets.forEach(getFieldFieldset);

      //console.log(stringone_dati_complessivo);


      $('#validatore').find('submit').hide();
      $('.loading').show();
      var data = {
          stringone_dati: stringone_dati_complessivo,
          id_lab: $('#id_lab').val(),
          nome: $('#nome').val(),
          cognome: $('#cognome').val(),
          sesso: $('#sesso').val(),
          data_evento: $('#data_evento').val()
      }
      var urlString = '';
      $.ajax({
          url: urlString,
          method:'POST',
          data: data,
          dataType:'json',
          success: function(data){
              // $('#risultato').append(data['result']);
              $('.loading').hide();
              $('#validatore').closest('.row').hide();
              $("#risultato>.panel-body").html(data.result_debug);
              if(data.error == true)
                  $("#risultato>.panel-heading").html("ERRORE: -- Alcuni campi non sono corretti  -- I dati non sono stati inseriti sul DB").css('background-color','red');
              else
                  $("#risultato>.panel-heading").html("Risultato -- Dati Salvati Correttamente -- ").css('background-color','green');
              $('#back').show();
          },
          error: function(xhr,status,error){
              var msg = "Si è verificato un errore: ";
              $('.loading').hide();
              $('#validatore').closest('.row').hide();
              $("#risultato>.panel-heading").html("ERRORE").css('background-color','red');
              $( "#risultato>.panel-body" ).html( msg + status.error + ' - ' + error);
              $('#back').show();
          }
      });
  });
*/

});
</script>
@endsection
