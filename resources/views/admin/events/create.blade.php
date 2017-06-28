@extends('app')

@section('titlepage')
  Crea
@endsection

@section('head')
<link href="{{ asset('/js/jquery-upload-file-master/css/uploadfile.css') }}" rel="stylesheet">
<meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')

                <div class="row">
                    <h1 style="font-family: 'Lato';">Input Data</h1>
                    <hr>
                </div>
                <div class="row">

                      <form id="eventsvalidator" method="post" action="/events" class="form-horizontal" >
                            {{ csrf_field() }}
                            <fieldset class="col-md-12" style="border: 1px solid #6b6b6b; padding: 10px" id="fieldsetp_1">
                              <div class="col-md-8">
                              <div class="row">
                                  <div class="col-md-4">
                                    <label class="control-label" >Data </label>
                                    <div class="form-group input-group">
                                    <input style="margin-left: 15px" id="dataEvento_1" name="dataEvento_1" type="text" placeholder="gg-mm-yyyy" class="form-control data_evento_c" >
                                    <span style="padding: 0" class="input-group-addon">
                                      <input class="form-control jscolor pull-right" id="colorData_1" type="text" name="colorData_1" value="{{ $settings[0]->dataora_colore }}" style="width: 80px">
                                    </span>
                                    </div>
                                  </div>
                                  <div class="col-md-2">
                                    <label class="control-label" >Ora </label>
                                    <input id="oraEvento_1" name="oraEvento_1" type="text" placeholder="h:m" class="form-control forceashour" >
                                  </div>
                                  <div class="col-md-2">
                                    <br>
                                    <span style="font-size: 1.4rem; font-weight: bold">Data/Ora Visibile</span>
                                    <input class="pull-right" name="dataOraVisibile_1" id="dataOraVisibile_1" type="checkbox" value="1" style="width: 20px;height: 17px; ">
                                  </div>
                                  <div class="col-md-2">
                                        <label style="margin-top: 7px;margin-bottom: 0;" class="indentazioneDataEvento_1" >Indentazione </label>
                                        <input name="indentazioneDataEvento_1" type="text" class="form-control forceasnumber" id="indentazioneDataEvento_1" value="{{ $settings[0]->dataora_indentazione }}">
                                  </div>
                                  <div class="col-md-2">
                                        <label  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontDataEvento_1" >FontSize </label>
                                        <input name="sizefontDataEvento_1" type="text" class="form-control forceasnumber" id="sizefontDataEvento_1" value="{{ $settings[0]->dataora_dimensione_caratteri }}">
                                  </div>
                                </div>
                                <div class="row tempidistop">
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -1 ) </label>
                                    <input id="tempoStopMenouno_1" name="tempoStopMenouno_1" type="text" class="form-control forceasnumber" >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -2 ) </label>
                                    <input id="tempoStopMenodue_1" name="tempoStopMenodue_1" type="text" class="form-control forceasnumber" >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -3 ) </label>
                                    <input id="tempoStopMenotre_1" name="tempoStopMenotre_1" type="text" class="form-control forceasnumber" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-8">
                                      <label class="control-label" >Titolo Evento (riga 1) </label>
                                      <div class="form-group input-group">
                                        <input style="margin-left: 15px" name="titoloEvento_1" type="text" class="form-control" id="titoloEvento_1" >
                                        <span style="padding: 0" class="input-group-addon">
                                          <input class="form-control jscolor pull-right" id="colorEvento_1" name="colorEvento_1" value="{{ $settings[0]->titolo_colore }}" style="width: 80px">
                                        </span>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                        <label style="margin-top: 7px;margin-bottom: 0;" class="indentazioneTitolo_1" >Indentazione </label>
                                        <input name="indentazioneTitolo_1" type="text" class="form-control forceasnumber" id="indentazioneTitolo_1" value="{{ $settings[0]->titolo_indentazione }}">
                                  </div>
                                  <div class="col-md-2">
                                        <label  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontTitolo_1" >FontSize </label>
                                        <input name="sizefontTitolo_1" type="text" class="form-control forceasnumber" id="sizefontTitolo_1" value="{{ $settings[0]->titolo_dimensione_caratteri }}">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <label class="control-label" >Titolo Evento (riga 2) </label>
                                      <input  name="titoloEventoRigadue_1" type="text" class="form-control" id="titoloEventoRigadue_1" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-8">
                                      <label class="control-label" >Commento 1 </label>
                                      <div class="form-group input-group">
                                      <input style="margin-left: 15px" name="commentoUno_1" type="text" class="form-control" id="commentoUno_1" >
                                      <span style="padding: 0" class="input-group-addon">
                                        <input class="form-control jscolor pull-right" id="colorCommenti_1" name="colorCommenti_1" value="{{ $settings[0]->commentouno_colore }}" style="width: 80px">
                                      </span>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                        <label style="margin-top: 7px;margin-bottom: 0;"  class="indentazioneCommentoUno_1" >Indentazione </label>
                                        <input name="indentazioneCommentoUno_1" type="text" class="form-control forceasnumber" id="indentazioneCommentoUno_1" value="{{ $settings[0]->commentouno_indentazione }}" >
                                  </div>
                                  <div class="col-md-2">
                                        <label style="margin-top: 7px;margin-bottom: 0;"  class="sizefontCommentoUno_1" >FontSize </label>
                                        <input name="sizefontCommentoUno_1" type="text" class="form-control forceasnumber" id="sizefontCommentoUno_1" value="{{ $settings[0]->commentouno_dimensione_caratteri }}" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-8">
                                      <label class="control-label" >Commento 2 </label>
                                      <div class="form-group input-group">
                                      <input style="margin-left: 15px" name="commentoDue_1" type="text" class="form-control" id="commentoDue_1" >
                                      <span style="padding: 0" class="input-group-addon">
                                        <input class="form-control jscolor pull-right" id="colorCommentiDue_1" name="colorCommentiDue_1" value="{{ $settings[0]->commentodue_colore }}" style="width: 80px">
                                      </span>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                        <label style="margin-top: 7px;margin-bottom: 0;"  class="indentazioneCommentoDue_1" >Indentazione </label>
                                        <input name="indentazioneCommentoDue_1" type="text" class="form-control forceasnumber" id="indentazioneCommentoDue_1" value="{{ $settings[0]->commentodue_indentazione }}" >
                                  </div>
                                  <div class="col-md-2">
                                        <label  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontCommentoDue_1" >FontSize </label>
                                        <input name="sizefontCommentoDue_1" type="text" class="form-control forceasnumber" id="sizefontCommentoDue_1" value="{{ $settings[0]->commentodue_dimensione_caratteri }}" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-8">
                                      <label class="control-label" >Commento 3 (non visibile in full screen) </label>
                                      <div class="form-group input-group">
                                      <input style="margin-left: 15px" name="commentoTre_1" type="text" class="form-control" id="commentoTre_1" >
                                      <span style="padding: 0" class="input-group-addon">
                                        <input class="form-control jscolor pull-right" id="colorCommentiTre_1" name="colorCommentiTre_1" value="{{ $settings[0]->commentotre_colore }}" style="width: 80px">
                                      </span>
                                      </div>
                                  </div>
                                  <div class="col-md-2">
                                        <label style="margin-top: 7px;margin-bottom: 0;"  class="indentazioneCommentoTre_1" >Indentazione </label>
                                        <input name="indentazioneCommentoTre_1" type="text" class="form-control forceasnumber" id="indentazioneCommentoTre_1" value="{{ $settings[0]->commentotre_indentazione }}">
                                  </div>
                                  <div class="col-md-2">
                                        <label  style="margin-top: 7px;margin-bottom: 0;"  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontCommentoTre_1" >FontSize </label>
                                        <input name="sizefontCommentoTre_1" type="text" class="form-control forceasnumber" id="sizefontCommentoTre_1" value="{{ $settings[0]->commentotre_dimensione_caratteri }}" >
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-4">
                                    <h4>Evento del giorno</h4>
                                      <span style="font-size: 2rem;">Full screen</span>
                                      <input name="fullScreen_1" id="fullScreen_1" type="checkbox" value="1" style="width: 20px;height: 17px; ">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop </label>
                                    <input name="tempoStopDef_1" type="text" class="form-control forceasnumber" id="tempoStopDef_1" >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Visualizza ogni </label>
                                    <input name="visualizzaOgni_1" type="text" class="form-control forceasnumber" id="visualizzaOgni_1" >
                                  </div>
                              </div>
                              </div>

                              <div class="col-md-4">
                                <label class="control-label" >Locandina </label>
                                <div id="fileuploader_1" class="uploadzone">Upload</div>
                                <div id="previewLocandina_1"></div>
                                <input type="hidden" name="locandina_1" id="locandina_1">
                              </div>

                            </fieldset>

                          <div class="form-group col-lg-12">
                            <br><br>
                            <button type="button" id="addfieldsetbtn" class="btn btn-success btn-lg"><i class="fa fa-plus-circle" aria-hidden="true"></i> Aggiungi </button>
                            <button type="submit" id="btnSubmit" class="btn btn-primary btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Salva</button>
                          </div>
                      </form>
                </div>

                @include('admin.partials.saveloading')


@endsection


@section('scripts')
<script src="{{ asset('/js/jquery-upload-file-master/js/jquery.uploadfile.min.js') }} "></script>
<script src="{{ asset('/js/inputmask/inputmask.js') }} "></script>
<script src="{{ asset('/js/inputmask/inputmask.date.extensions.js') }} "></script>
<script src="{{ asset('/js/inputmask/inputmask.extensions.js') }} "></script>
<script src="{{ asset('/js/inputmask/inputmask.numeric.extensions.js') }} "></script>
<script src="{{ asset('/js/inputmask/jquery.inputmask.js') }} "></script>

<script>

$(function(){

  var token = $('meta[name="_token"]').attr('content');
  iduploader = 'fileuploader_1';
  $( '#'+iduploader ).uploadFile({
      url: '/locandina-upload',
      multiple:false,
      fileName:'myfile',
      formData: {"_token": token, locandina_id: iduploader.split('_')[1]},
      allowedTypes: "jpg,png,gif",
      extErrorStr: "file non consentito.",
      onSuccess:function(files,data,xhr)
      {
          $('#previewLocandina_'+data['locandina_id']).append('<img width="200px" src="/uploads/'+data['data']+'">').hide().fadeIn('slow');
          $('input[name=locandina_'+data['locandina_id']+']').val(data['data']);
      }
  });

  // forza i caratteri a numerici
  $("input.forceasnumber").on("input", function(evt) {
     var self = $(this);
     self.val(self.val().replace(/[^0-9]/g, ''));
     if (evt.which != 46 && (evt.which < 48 || evt.which > 57))
     {
       evt.preventDefault();
     }
   });
  //  forza formato orario
  $("input.forceashour").inputmask("99:99", {
        placeholder: "HH:MM",
        hourFormat: 24
  });


  $('button#btnSubmit').on('click', function(e) {
      // e.preventDefault();
      $('#myModal').modal();
      // $(this).submit();
  });

  $( "input.data_evento_c" ).datepicker({
      dateFormat: "dd-mm-yy",
      closeText: "Chiudi",
    	prevText: "&#x3C;Prec",
    	nextText: "Succ&#x3E;",
    	currentText: "Oggi",
    	monthNames: [ "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
    		"Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre" ],
    	monthNamesShort: [ "Gen","Feb","Mar","Apr","Mag","Giu",
    		"Lug","Ago","Set","Ott","Nov","Dic" ],
    	dayNames: [ "Domenica","Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato" ],
    	dayNamesShort: [ "Dom","Lun","Mar","Mer","Gio","Ven","Sab" ],
    	dayNamesMin: [ "Do","Lu","Ma","Me","Gi","Ve","Sa" ]
  });


  //clona il pannello di input riaggiornando gli id e i name
  $('button#addfieldsetbtn').on('click', function(e) {

        $( "input.data_evento_c" ).datepicker('destroy');
        e.preventDefault();
        var fieldset_last = $('fieldset:last');
        var fieldset_id = $('fieldset:last').attr("id");
        var curr_fieldset_index = parseInt(fieldset_id.split('_')[1]) + 1;
        var remove_btn = '<div class="form-group col-md-12 "><button type="button" class="btn btn-lg btn-danger pull-right removepanelbtn"><i class="fa fa-minus-circle" aria-hidden="true"></i> rimuovi </button></div>';

        // id fieldset
        var clonefield = fieldset_last.clone().prop('id', 'fieldsetp_'+curr_fieldset_index );

        // id data evento
        clonefield.find("input[id^='dataEvento_']").prop('id', 'dataEvento_'+curr_fieldset_index ).prop('name', 'dataEvento_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='indentazioneDataEvento_']").prop('id', 'indentazioneDataEvento_'+curr_fieldset_index ).prop('name', 'indentazioneDataEvento_'+curr_fieldset_index ).val('{{ $settings[0]->dataora_indentazione }}');
        clonefield.find("input[id^='sizefontDataEvento_']").prop('id', 'sizefontDataEvento_'+curr_fieldset_index ).prop('name', 'sizefontDataEvento_'+curr_fieldset_index ).val('{{ $settings[0]->dataora_dimensione_caratteri }}');
        clonefield.find("input[id^='colorData_']").prop('id', 'colorData_'+curr_fieldset_index ).prop('name', 'colorData_'+curr_fieldset_index ).val('{{ $settings[0]->dataora_colore }}');
        // ora evento
        clonefield.find("input[id^='oraEvento_']").prop('id', 'oraEvento_'+curr_fieldset_index ).prop('name', 'oraEvento_'+curr_fieldset_index ).val('');
        // data/ora visibile
        clonefield.find("input[id^='dataOraVisibile_']").prop('id', 'dataOraVisibile_'+curr_fieldset_index ).prop('name', 'dataOraVisibile_'+curr_fieldset_index ).val('1');
        // tempo di stop -1 -2 -3
        clonefield.find("input[id^='tempoStopMenouno_']").prop('id', 'tempoStopMenouno_'+curr_fieldset_index ).prop('name', 'tempoStopMenouno_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='tempoStopMenodue_']").prop('id', 'tempoStopMenodue_'+curr_fieldset_index ).prop('name', 'tempoStopMenodue_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='tempoStopMenotre_']").prop('id', 'tempoStopMenotre_'+curr_fieldset_index ).prop('name', 'tempoStopMenotre_'+curr_fieldset_index ).val('');
        // titolo e commenti
        clonefield.find("input[id^='titoloEvento_']").prop('id', 'titoloEvento_'+curr_fieldset_index ).prop('name', 'titoloEvento_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='titoloEventoRigadue_']").prop('id', 'titoloEventoRigadue_'+curr_fieldset_index ).prop('name', 'titoloEventoRigadue_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorEvento_']").prop('id', 'colorEvento_'+curr_fieldset_index ).prop('name', 'colorEvento_'+curr_fieldset_index ).val('{{ $settings[0]->titolo_colore }}');
        clonefield.find("input[id^='indentazioneTitolo_']").prop('id', 'indentazioneTitolo_'+curr_fieldset_index ).prop('name', 'indentazioneTitolo_'+curr_fieldset_index ).val('{{ $settings[0]->titolo_indentazione }}');
        clonefield.find("input[id^='sizefontTitolo_']").prop('id', 'sizefontTitolo_'+curr_fieldset_index ).prop('name', 'sizefontTitolo_'+curr_fieldset_index ).val('{{ $settings[0]->titolo_dimensione_caratteri }}');

        clonefield.find("input[id^='commentoUno_']").prop('id', 'commentoUno_'+curr_fieldset_index ).prop('name', 'commentoUno_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorCommenti_']").prop('id', 'colorCommenti_'+curr_fieldset_index ).prop('name', 'colorCommenti_'+curr_fieldset_index ).val('{{ $settings[0]->commentouno_colore }}');
        clonefield.find("input[id^='indentazioneCommentoUno_']").prop('id', 'indentazioneCommentoUno_'+curr_fieldset_index ).prop('name', 'indentazioneCommentoUno_'+curr_fieldset_index ).val('{{ $settings[0]->commentouno_indentazione }}');
        clonefield.find("input[id^='sizefontCommentoUno_']").prop('id', 'sizefontCommentoUno_'+curr_fieldset_index ).prop('name', 'sizefontCommentoUno_'+curr_fieldset_index ).val('{{ $settings[0]->commentouno_dimensione_caratteri }}');

        clonefield.find("input[id^='commentoDue_']").prop('id', 'commentoDue_'+curr_fieldset_index ).prop('name', 'commentoDue_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorCommentiDue_']").prop('id', 'colorCommentiDue_'+curr_fieldset_index ).prop('name', 'colorCommentiDue_'+curr_fieldset_index ).val('{{ $settings[0]->commentodue_colore }}');
        clonefield.find("input[id^='indentazioneCommentoDue_']").prop('id', 'indentazioneCommentoDue_'+curr_fieldset_index ).prop('name', 'indentazioneCommentoDue_'+curr_fieldset_index ).val('{{ $settings[0]->commentodue_indentazione }}');
        clonefield.find("input[id^='sizefontCommentoDue_']").prop('id', 'sizefontCommentoDue_'+curr_fieldset_index ).prop('name', 'sizefontCommentoDue_'+curr_fieldset_index ).val('{{ $settings[0]->commentodue_dimensione_caratteri }}');

        clonefield.find("input[id^='commentoTre_']").prop('id', 'commentoTre_'+curr_fieldset_index ).prop('name', 'commentoTre_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorCommentiTre_']").prop('id', 'colorCommentiTre_'+curr_fieldset_index ).prop('name', 'colorCommentiTre_'+curr_fieldset_index ).val('{{ $settings[0]->commentotre_colore }}');
        clonefield.find("input[id^='indentazioneCommentoTre_']").prop('id', 'indentazioneCommentoTre_'+curr_fieldset_index ).prop('name', 'indentazioneCommentoTre_'+curr_fieldset_index ).val('{{ $settings[0]->commentotre_indentazione }}');
        clonefield.find("input[id^='sizefontCommentoTre_']").prop('id', 'sizefontCommentoTre_'+curr_fieldset_index ).prop('name', 'sizefontCommentoTre_'+curr_fieldset_index ).val('{{ $settings[0]->commentotre_dimensione_caratteri }}');

        clonefield.find("input[id^='fullScreen_']").prop('id', 'fullScreen_'+curr_fieldset_index ).prop('name', 'fullScreen_'+curr_fieldset_index ).val('1');
        clonefield.find("input[id^='tempoStopDef_']").prop('id', 'tempoStopDef_'+curr_fieldset_index ).prop('name', 'tempoStopDef_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='visualizzaOgni_']").prop('id', 'visualizzaOgni_'+curr_fieldset_index ).prop('name', 'visualizzaOgni_'+curr_fieldset_index ).val('');
        // locandina
        clonefield.find("div[id^='fileuploader_']").prop('id', 'fileuploader_'+curr_fieldset_index );
        clonefield.find("input[id^='locandina_']").prop('id', 'locandina_'+curr_fieldset_index ).prop('name', 'locandina_'+curr_fieldset_index ).val('');;
        clonefield.find("div[id^='previewLocandina_']").prop('id', 'previewLocandina_'+curr_fieldset_index );
        clonefield.find("div[id^='previewLocandina_'] img").remove();
        clonefield.find("div[class='ajax-file-upload-container']").remove();


        clonefield.find('button.removepanelbtn').remove();

        clonefield.append(remove_btn);

        clonefield.insertAfter(fieldset_last);

        $('button.removepanelbtn').on('click', function(e) {
            $(this).parent('div.form-group').parent('fieldset').remove();
        });

        // reinitialize jscolor
        jscolor.installByClassName("jscolor");

        $('#fileuploader_'+curr_fieldset_index).uploadFile({
            url: '/locandina-upload',
            multiple:false,
            fileName:'myfile',
            formData: {"_token": token, locandina_id: curr_fieldset_index},
            allowedTypes: "jpg,png,gif",
            extErrorStr: "file non consentito.",
            onSuccess:function(files,data,xhr)
            {
                $('#previewLocandina_'+data['locandina_id']).append('<img width="200px" src="/uploads/'+data['data']+'">').hide().fadeIn('slow');
                $('input[name=locandina_'+data['locandina_id']+']').val(data['data']);
            }
        });

        $( "input.data_evento_c" ).datepicker({
            dateFormat: "dd-mm-yy",
            closeText: "Chiudi",
          	prevText: "&#x3C;Prec",
          	nextText: "Succ&#x3E;",
          	currentText: "Oggi",
          	monthNames: [ "Gennaio","Febbraio","Marzo","Aprile","Maggio","Giugno",
          		"Luglio","Agosto","Settembre","Ottobre","Novembre","Dicembre" ],
          	monthNamesShort: [ "Gen","Feb","Mar","Apr","Mag","Giu",
          		"Lug","Ago","Set","Ott","Nov","Dic" ],
          	dayNames: [ "Domenica","Lunedì","Martedì","Mercoledì","Giovedì","Venerdì","Sabato" ],
          	dayNamesShort: [ "Dom","Lun","Mar","Mer","Gio","Ven","Sab" ],
          	dayNamesMin: [ "Do","Lu","Ma","Me","Gi","Ve","Sa" ]
        });


        // forza i caratteri a numerici
        $("input.forceasnumber").on("input", function(evt) {
           var self = $(this);
           self.val(self.val().replace(/[^0-9]/g, ''));
           if (evt.which != 46 && (evt.which < 48 || evt.which > 57))
           {
             evt.preventDefault();
           }
         });

         //  forza formato orario
         $("input.forceashour").inputmask("99:99", {
               placeholder: "HH:MM",
               hourFormat: 24
         });


  });




});
</script>
@endsection
