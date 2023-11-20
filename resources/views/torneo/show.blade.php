@extends('layouts.app')

@section('template_title')
    {{ $torneo->name ?? "{{ __('Show') Torneo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Torneo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('torneo.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $torneo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $torneo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $torneo->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Genero Id:</strong>
                            {{ $torneo->genero_id }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento Id:</strong>
                            {{ $torneo->departamento_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rango Horas:</strong>
                            {{ $torneo->rango_horas }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $torneo->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $torneo->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $torneo->estado_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
