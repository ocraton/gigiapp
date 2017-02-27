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
                              <div class="col-md-6">
                              <div class="row">
                                  <div class="col-md-5">
                                    <label class="control-label" >Data </label>
                                    <div class="form-group input-group">
                                    <input style="margin-left: 15px" id="dataEvento_1" name="dataEvento_1" type="text" placeholder="gg-mm-yyyy" class="form-control data_evento_c" >
                                    <span style="padding: 0" class="input-group-addon">
                                      <input class="form-control jscolor pull-right" id="colorData_1" type="text" name="colorData_1" value="b0f221" style="width: 80px">
                                    </span>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Ora </label>
                                    <input id="oraEvento_1" name="oraEvento_1" type="text" placeholder="h:m" class="form-control " >
                                  </div>
                                  <div class="col-md-3">
                                    <br>
                                    <span style="font-size: 1.9rem;">Data/Ora Visibile</span>
                                    <input name="dataOraVisibile_1" id="dataOraVisibile_1" type="checkbox" value="1" style="width: 20px;height: 17px; ">
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
                                    <input class="form-control jscolor pull-right" id="colorEvento_1" name="colorEvento_1" value="dd0404" style="width: 80px">
                                  </span>
                                  </div>
                                  <label class="control-label" >Commento 1 </label>
                                  <div class="form-group input-group">
                                  <input style="margin-left: 15px" name="commentoUno_1" type="text" class="form-control" id="commentoUno_1" >
                                  <span style="padding: 0" class="input-group-addon">
                                    <input class="form-control jscolor pull-right" id="colorCommenti_1" name="colorCommenti_1" value="337ab7" style="width: 80px">
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
                                      <input name="fullScreen_1" id="fullScreen_1" type="checkbox" value="1" style="width: 20px;height: 17px; ">
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
                                <div id="fileuploader_1" class="uploadzone">Upload</div>
                                <div id="previewLocandina_1"></div>
                                <input type="hidden" name="locandina_1" id="locandina_1">
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
<script src="{{ asset('/js/jquery-upload-file-master/js/jquery.uploadfile.min.js') }} "></script>
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


  //clona il pannello di input riaggiornando gli id e i name
  $('button#addfieldsetbtn').on('click', function(e) {

        e.preventDefault();
        var fieldset_last = $('fieldset:last');
        var fieldset_id = $('fieldset:last').attr("id");
        var curr_fieldset_index = parseInt(fieldset_id.split('_')[1]) + 1;
        var remove_btn = '<div class="form-group col-md-12 "><button type="button" class="btn btn-lg btn-danger pull-right removepanelbtn"><i class="fa fa-minus-circle" aria-hidden="true"></i> rimuovi </button></div>';

        // id fieldset
        var clonefield = fieldset_last.clone().prop('id', 'fieldsetp_'+curr_fieldset_index );

        // id data evento
        clonefield.find("input[id^='dataEvento_']").prop('id', 'dataEvento_'+curr_fieldset_index ).prop('name', 'dataEvento_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorData_']").prop('id', 'colorData_'+curr_fieldset_index ).prop('name', 'colorData_'+curr_fieldset_index ).val('B0F221');
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
        clonefield.find("input[id^='colorEvento_']").prop('id', 'colorEvento_'+curr_fieldset_index ).prop('name', 'colorEvento_'+curr_fieldset_index ).val('DD0404');
        clonefield.find("input[id^='commentoUno_']").prop('id', 'commentoUno_'+curr_fieldset_index ).prop('name', 'commentoUno_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='colorCommenti_']").prop('id', 'colorCommenti_'+curr_fieldset_index ).prop('name', 'colorCommenti_'+curr_fieldset_index ).val('337AB7');
        clonefield.find("input[id^='commentoDue_']").prop('id', 'commentoDue_'+curr_fieldset_index ).prop('name', 'commentoDue_'+curr_fieldset_index ).val('');
        clonefield.find("input[id^='commentoTre_']").prop('id', 'commentoTre_'+curr_fieldset_index ).prop('name', 'commentoTre_'+curr_fieldset_index ).val('');
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


  });

  $( "input.data_evento_c" ).datepicker({
      dateFormat: "dd-mm-yy"
  });


});
</script>
@endsection
