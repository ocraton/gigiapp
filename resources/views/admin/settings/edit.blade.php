@extends('app')

@section('titlepage')
  Edit Settings
@endsection

@section('head')

@endsection

@section('content')

                <div class="row">
                    <h1 style="font-family: 'Lato';">Impostazioni Globali</h1>
                    <hr>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12">
                    @include('flash::message')
                  </div>
                </div>
                <div class="row">
                      <div class="form-group col-lg-2">
                        {!! Form::model($settings, ['method' => 'PATCH', 'id' => 'globalsettings', 'action' => ['SettingsController@update']]) !!}

                          <div class="form-group">
                              <label>Dimensione caratteri</label>
                              {!! Form::text('dimensione_caratteri', null, ['class' => 'form-control']) !!}
                              <p class="pull-right">in pixel</p>
                          </div>
                          <div class="form-group">
                              <label>Indentazione</label>
                              {!! Form::text('indentazione', null, ['class' => 'form-control']) !!}
                              <p class="pull-right">in pixel</p>
                          </div>
                          <div class="form-group">
                              <label>Spaziatura tra eventi</label>
                              {!! Form::text('spaziatura_eventi', null, ['class' => 'form-control']) !!}
                              <p class="pull-right">in pixel</p>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Salva</button>
                          </div>

                        {!! Form::close() !!}
                      </div>

                </div>
@endsection


@section('scripts')

<script>
$(function(){



});
</script>
@endsection
