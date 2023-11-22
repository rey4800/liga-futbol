@extends('admin-torneo.layouts.master')

@section('template_title')
    {{ __('Create') }} Equiposinscrito
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><h4>Inscribir un Equipo a: {{ $torneo->nombre }}</h4></span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equiposinscrito.store',$torneo->id) }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            <div class="box box-info padding-1">
                                <div class="box-body">
                                    
                                    <div class="form-group" >
                                        {{ Form::label('torneo') }}
                                        {{ Form::text('torneo_id', $torneo->id, $equiposinscrito->torneo_id, ['class' => 'form-control' . ($errors->has('torneo_id') ? ' is-invalid' : ''),'disabled' => 'disabled', 'placeholder' => 'Torneo Id']) }}
                                        {!! $errors->first('torneo_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('equipo') }}
                                        {{ Form::select('equipo_id',$equipos, $equiposinscrito->equipo_id, ['class' => 'form-control' . ($errors->has('equipo_id') ? ' is-invalid' : ''), 'placeholder' => 'Equipo']) }}
                                        {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    
                                    
                                </div>
                                <div class="box-footer mt20">
                                    <button type="submit" class="btn btn-primary">Inscribir Equipo</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
