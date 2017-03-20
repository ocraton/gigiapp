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
                {!! Form::model($settings, ['method' => 'put', 'id' => 'globalsettings', 'action' => ['SettingsController@update']]) !!}
                <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                        <label>Spaziatura tra eventi</label>
                        {!! Form::text('spaziatura_eventi', null, ['class' => 'form-control']) !!}
                        <p class="pull-right">in pixel</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Data/Ora</h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>Colore</label>
                                        <span style="padding: 0" class="input-group-addon">
                                          {!! Form::text('dataora_colore', null, ['class' => 'form-control jscolor {position:\'right\'}']) !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                          <label>Indentazione</label>
                                          {!! Form::text('dataora_indentazione', null, ['class' => 'form-control']) !!}
                                          <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>FontSize</label>
                                        {!! Form::text('dataora_dimensione_caratteri', null, ['class' => 'form-control']) !!}
                                        <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Titolo</h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>Colore</label>
                                        <span style="padding: 0" class="input-group-addon">
                                          {!! Form::text('titolo_colore', null, ['class' => 'form-control jscolor {position:\'right\'}']) !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                          <label>Indentazione</label>
                                          {!! Form::text('titolo_indentazione', null, ['class' => 'form-control']) !!}
                                          <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>FontSize</label>
                                        {!! Form::text('titolo_dimensione_caratteri', null, ['class' => 'form-control']) !!}
                                        <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Commento 1</h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>Colore</label>
                                        <span style="padding: 0" class="input-group-addon">
                                          {!! Form::text('commentouno_colore', null, ['class' => 'form-control jscolor {position:\'right\'}']) !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                          <label>Indentazione</label>
                                          {!! Form::text('commentouno_indentazione', null, ['class' => 'form-control']) !!}
                                          <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>FontSize</label>
                                        {!! Form::text('commentouno_dimensione_caratteri', null, ['class' => 'form-control']) !!}
                                        <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Commento 2</h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>Colore</label>
                                        <span style="padding: 0" class="input-group-addon">
                                          {!! Form::text('commentodue_colore', null, ['class' => 'form-control jscolor {position:\'right\'}']) !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                          <label>Indentazione</label>
                                          {!! Form::text('commentodue_indentazione', null, ['class' => 'form-control']) !!}
                                          <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>FontSize</label>
                                        {!! Form::text('commentodue_dimensione_caratteri', null, ['class' => 'form-control']) !!}
                                        <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Commento 3</h4>
                            </div>
                            <div class="panel-body">
                              <div class="row">
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>Colore</label>
                                        <span style="padding: 0" class="input-group-addon">
                                          {!! Form::text('commentotre_colore', null, ['class' => 'form-control jscolor {position:\'right\'}']) !!}
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                          <label>Indentazione</label>
                                          {!! Form::text('commentotre_indentazione', null, ['class' => 'form-control']) !!}
                                          <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                                <div class="form-group col-lg-4">
                                    <div class="form-group">
                                        <label>FontSize</label>
                                        {!! Form::text('commentotre_dimensione_caratteri', null, ['class' => 'form-control']) !!}
                                        <p class="pull-right">in pixel</p>
                                    </div>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i> Salva</button>
                      </div>
                  </div>
                </div>
                {!! Form::close() !!}
@endsection


@section('scripts')

@endsection
