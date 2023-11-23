@extends('admin-torneo.layouts.master')

@section('template_title')
    {{ __('Update') }} Partido
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Administrar Partido</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('goles', ['torneo' => $torneo->id]) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('POST') }}
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group" style="display: none;">
                                        {{ Form::label('torneo_id') }}
                                        {{ Form::text('torneo_id', $partido->torneo_id, ['class' => 'form-control' . ($errors->has('torneo_id') ? ' is-invalid' : ''), 'placeholder' => 'Torneo Id']) }}
                                        {!! $errors->first('torneo_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        {{ Form::label('partido') }}
                                        {{ Form::text('id', $partido->id, ['class' => 'form-control' . ($errors->has('torneo_id') ? ' is-invalid' : ''), 'placeholder' => 'Torneo Id']) }}
                                        {!! $errors->first('torneo_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('titular') }}
                                        {{ Form::text('titular', $partido->titular, ['class' => 'form-control' . ($errors->has('titular') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Titular']) }}
                                        {!! $errors->first('titular', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('direccion') }}
                                        {{ Form::text('direccion', $partido->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Direccion']) }}
                                        {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('equipo_local_') }}
                                        {{ Form::select('equipo_local_id',$equipos,$partido->equipo_local_id, ['class' => 'form-control' . ($errors->has('equipo_local_id') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Equipo Local']) }}
                                        {!! $errors->first('equipo_local_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('equipo_visitante_') }}
                                        {{ Form::select('equipo_visitante_id', $equipos,$partido->equipo_visitante_id, ['class' => 'form-control' . ($errors->has('equipo_visitante_id') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Equipo Visitante']) }}
                                        {!! $errors->first('equipo_visitante_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('fecha') }}
                                        {{ Form::date('fecha', $partido->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Fecha']) }}
                                        {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('hora') }}
                                        {{ Form::time('hora', $partido->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Hora']) }}
                                        {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('estado') }}
                                        {{ Form::select('estado_id', $estado,$partido->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
                                        {!! $errors->first('estado_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('goles_local') }}
                                        {{ Form::number('goles_local', $partido->goles_local, ['class' => 'form-control' . ($errors->has('goles_local') ? ' is-invalid' : ''), 'placeholder' => 'Goles Local']) }}
                                        {!! $errors->first('goles_local', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('goles_visitante') }}
                                        {{ Form::number('goles_visitante', $partido->goles_visitante, ['class' => 'form-control' . ($errors->has('goles_visitante') ? ' is-invalid' : ''), 'placeholder' => 'Goles Visitante']) }}
                                        {!! $errors->first('goles_visitante', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                            
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Guardar Estado del Partido</button>
                                </div>

    
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

