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
                    <h1 style="font-family: 'Lato';">Modfica Evento</h1>
                    <hr>
                </div>
                <div class="row">

                    @include('flash::message')

                </div>
                <div class="row">
                      <form id="eventsvalidator" method="post" action="/events/{{ $evento->id }}" class="form-horizontal" >
                            {{ csrf_field() }}
                            <fieldset class="col-md-12" style="border: 1px solid #6b6b6b; padding: 10px" id="fieldsetp_1">
                              <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                      <label class="control-label" >Data </label>
                                      <div class="form-group input-group">
                                      <input style="margin-left: 15px" value="{{ $evento->dataEvento }}" id="dataEvento_1" name="dataEvento_1" type="text" placeholder="gg-mm-yyyy" class="form-control data_evento_c" >
                                      <span style="padding: 0" class="input-group-addon">
                                        <input class="form-control jscolor pull-right" id="colorData_1" type="text" name="colorData_1" value="{{ $evento->colorData }}" style="width: 80px">
                                      </span>
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <label class="control-label" >Ora </label>
                                      <input id="oraEvento_1" name="oraEvento_1" value="{{ $evento->oraEvento }}" type="text" placeholder="h:m" class="form-control " >
                                    </div>
                                    <div class="col-md-2">
                                      <br>
                                      <span style="font-size: 1.4rem; font-weight: bold">Data/Ora Visibile</span>
                                      <input name="dataOraVisibile_1" id="dataOraVisibile_1" type="checkbox" value="1" style="width: 20px;height: 17px; " @if($evento->dataOraVisibile == 1 ) checked @endif>
                                    </div>
                                    <div class="col-md-2">
                                          <label style="margin-top: 7px;margin-bottom: 0;" class="indentazioneDataEvento_1" >Indentazione </label>
                                          <input name="indentazioneDataEvento_1" type="text" class="form-control" id="indentazioneDataEvento_1" value="{{ $evento->indentazioneDataEvento }}">
                                    </div>
                                    <div class="col-md-2">
                                          <label  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontDataEvento_1" >FontSize </label>
                                          <input name="sizefontDataEvento_1" type="text" class="form-control" id="sizefontDataEvento_1" value="{{ $evento->sizefontDataEvento }}">
                                    </div>
                                  </div>
                                <div class="row tempidistop">
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -1 ) </label>
                                    <input id="tempoStopMenouno_1" name="tempoStopMenouno_1" type="text" class="form-control" value="{{ $evento->tempoStopMenouno }}" >
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -2 ) </label>
                                    <input id="tempoStopMenodue_1" name="tempoStopMenodue_1" type="text" class="form-control " value="{{ $evento->tempoStopMenodue }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop ( -3 ) </label>
                                    <input id="tempoStopMenotre_1" name="tempoStopMenotre_1" type="text" class="form-control " value="{{ $evento->tempoStopMenotre }}">
                                  </div>
                                </div>
                              <div class="row">
                                <div class="col-md-8">
                                    <label class="control-label" >Titolo Evento (riga 1) </label>
                                    <div class="form-group input-group">
                                      <input style="margin-left: 15px" name="titoloEvento_1" type="text" class="form-control" id="titoloEvento_1" value="{{ $evento->titoloEvento }}" >
                                      <span style="padding: 0" class="input-group-addon">
                                        <input class="form-control jscolor pull-right" id="colorEvento_1" value="{{ $evento->colorEvento }}"  name="colorEvento_1" value="dd0404" style="width: 80px">
                                      </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                      <label style="margin-top: 7px;margin-bottom: 0;" class="indentazioneTitolo_1" >Indentazione </label>
                                      <input name="indentazioneTitolo_1" type="text" class="form-control" id="indentazioneTitolo_1" value="{{ $evento->indentazioneTitolo }}">
                                </div>
                                <div class="col-md-2">
                                      <label  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontTitolo_1" >FontSize </label>
                                      <input name="sizefontTitolo_1" type="text" class="form-control" id="sizefontTitolo_1" value="{{ $evento->sizefontTitolo }}">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-12">
                                    <label class="control-label" >Titolo Evento (riga 2) </label>
                                    <input  name="titoloEventoRigadue_1" type="text" class="form-control" id="titoloEventoRigadue_1" value="{{ $evento->titoloEventoRigadue }}" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8">
                                    <label class="control-label" >Commento 1 </label>
                                    <div class="form-group input-group">
                                    <input style="margin-left: 15px" name="commentoUno_1" type="text" class="form-control" id="commentoUno_1" value="{{ $evento->commentoUno }}">
                                    <span style="padding: 0" class="input-group-addon">
                                      <input class="form-control jscolor pull-right" id="colorCommenti_1" value="{{ $evento->colorCommenti }}" name="colorCommenti_1" value="337ab7" style="width: 80px">
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                      <label style="margin-top: 7px;margin-bottom: 0;"  class="indentazioneCommentoUno_1" >Indentazione </label>
                                      <input name="indentazioneCommentoUno_1" type="text" class="form-control" id="indentazioneCommentoUno_1" value="{{ $evento->indentazioneCommentoUno }}" >
                                </div>
                                <div class="col-md-2">
                                      <label style="margin-top: 7px;margin-bottom: 0;"  class="sizefontCommentoUno_1" >FontSize </label>
                                      <input name="sizefontCommentoUno_1" type="text" class="form-control" id="sizefontCommentoUno_1" value="{{ $evento->sizefontCommentoUno }}" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8">
                                    <label class="control-label" >Commento 2 </label>
                                    <div class="form-group input-group">
                                    <input style="margin-left: 15px" name="commentoDue_1" type="text" class="form-control" id="commentoDue_1" value="{{ $evento->commentoDue }}">
                                    <span style="padding: 0" class="input-group-addon">
                                      <input class="form-control jscolor pull-right" id="colorCommentiDue_1" name="colorCommentiDue_1" value="{{ $evento->colorCommentiDue }}" style="width: 80px">
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                      <label style="margin-top: 7px;margin-bottom: 0;"  class="indentazioneCommentoDue_1" >Indentazione </label>
                                      <input name="indentazioneCommentoDue_1" type="text" class="form-control" id="indentazioneCommentoDue_1" value="{{ $evento->indentazioneCommentoDue }}" >
                                </div>
                                <div class="col-md-2">
                                      <label  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontCommentoDue_1" >FontSize </label>
                                      <input name="sizefontCommentoDue_1" type="text" class="form-control" id="sizefontCommentoDue_1" value="{{ $evento->sizefontCommentoDue }}" >
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-md-8">
                                    <label class="control-label" >Commento 3 (non visibile in full screen) </label>
                                    <div class="form-group input-group">
                                    <input style="margin-left: 15px" name="commentoTre_1" type="text" class="form-control" id="commentoTre_1" value="{{ $evento->commentoTre }}">
                                    <span style="padding: 0" class="input-group-addon">
                                      <input class="form-control jscolor pull-right" id="colorCommentiTre_1" name="colorCommentiTre_1" value="{{ $evento->colorCommentiTre }}" style="width: 80px">
                                    </span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                      <label style="margin-top: 7px;margin-bottom: 0;"  class="indentazioneCommentoTre_1" >Indentazione </label>
                                      <input name="indentazioneCommentoTre_1" type="text" class="form-control" id="indentazioneCommentoTre_1" value="{{ $evento->indentazioneCommentoTre }}">
                                </div>
                                <div class="col-md-2">
                                      <label  style="margin-top: 7px;margin-bottom: 0;"  style="margin-top: 7px;margin-bottom: 0;"  class="sizefontCommentoTre_1" >FontSize </label>
                                      <input name="sizefontCommentoTre_1" type="text" class="form-control" id="sizefontCommentoTre_1" value="{{ $evento->sizefontCommentoTre }}" >
                                </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-4">
                                    <h4>Evento del giorno</h4>
                                      <span style="font-size: 2rem;">Full screen</span>
                                      <input name="fullScreen_1" id="fullScreen_1" type="checkbox" value="1" style="width: 20px;height: 17px; " @if($evento->fullScreen == 1 ) checked @endif>
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Tempo di stop </label>
                                    <input name="tempoStopDef_1" type="text" class="form-control" id="tempoStopDef_1" value="{{ $evento->tempoStopDef }}">
                                  </div>
                                  <div class="col-md-4">
                                    <label class="control-label" >Visualizza ogni </label>
                                    <input name="visualizzaOgni_1" type="text" class="form-control" id="visualizzaOgni_1" value="{{ $evento->visualizzaOgni }}">
                                  </div>
                              </div>
                              </div>
                              <div class="col-md-6">
                                <label class="control-label" >Locandina </label>
                                <div id="fileuploader_1" class="uploadzone">Upload</div>
                                <div id="previewLocandina_1">
                                  <img width="200px" src="/uploads/{{ $evento->locandina }}">
                                </div>
                                <input type="hidden" name="locandina_1" value="{{ $evento->locandina }}" id="locandina_1">
                              </div>

                            </fieldset>

                          <div class="form-group col-lg-12">
                            <br><br>
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
          $('#previewLocandina_'+data['locandina_id']+' img').remove();
          $('#previewLocandina_'+data['locandina_id']).append('<img width="200px" src="/uploads/'+data['data']+'">').hide().fadeIn('slow');
          $('input[name=locandina_'+data['locandina_id']+']').val(data['data']);
      },
      afterUploadAll:function(obj)
      {
        if($("div[class='ajax-file-upload-statusbar']").length > 1) {
          $(this).last().remove();
        }
      }
  });

  $( "input.data_evento_c" ).datepicker({
      dateFormat: "dd-mm-yy"
  });



});
</script>
@endsection
