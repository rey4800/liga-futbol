@extends('admin-torneo.layouts.master')

@section('template_title')
    {{ __('Create') }} Partido
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear un Partido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('partido.store',$torneo->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group" style="display: none">
                                        {{ Form::label('torneo_id') }}
                                        {{ Form::text('torneo_id',$torneo->id, $partido->torneo_id, ['class' => 'form-control' . ($errors->has('torneo_id') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Torneo Id']) }}
                                        {!! $errors->first('torneo_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('titular') }}
                                        {{ Form::text('titular', $partido->titular, ['class' => 'form-control' . ($errors->has('titular') ? ' is-invalid' : ''), 'placeholder' => 'Titular']) }}
                                        {!! $errors->first('titular', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('direccion') }}
                                        {{ Form::text('direccion', $partido->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('equipo_local_') }}
                                        {{ Form::select('equipo_local_id',$equipos,$partido->equipo_local_id, ['class' => 'form-control' . ($errors->has('equipo_local_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo Local']) }}
                                        {!! $errors->first('equipo_local_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('equipo_visitante_') }}
                                        {{ Form::select('equipo_visitante_id', $equipos,$partido->equipo_visitante_id, ['class' => 'form-control' . ($errors->has('equipo_visitante_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo Visitante']) }}
                                        {!! $errors->first('equipo_visitante_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('fecha') }}
                                        {{ Form::date('fecha', $partido->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
                                        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('hora') }}
                                        {{ Form::time('hora', $partido->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
                                        {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('estado') }}
                                        {{ Form::select('estado_id', $estado,$partido->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                        {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
