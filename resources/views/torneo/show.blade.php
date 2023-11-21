@extends('admin.layouts.master')

@section('template_title')
    {{ $torneo->name ?? __("Show Torneo") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><h4>Información del Torneo</h4></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('torneo.index') }}">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong><i class="fas fa-futbol"></i> Nombre:</strong>
                                    {{ $torneo->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-info-circle"></i> Descripción:</strong>
                                    {{ $torneo->descripcion }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-trophy"></i> Categoría:</strong>
                                    {{ $torneo->categoria->categoria }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-venus-mars"></i> Género:</strong>
                                    {{ $torneo->genero->nombre}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong><i class="fas fa-map-marker-alt"></i> Departamento:</strong>
                                    {{ $torneo->departamento->departamento }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-clock"></i> Rango Horas:</strong>
                                    {{ $torneo->rango_horas }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-calendar-alt"></i> Fecha Inicio:</strong>
                                    {{ $torneo->fecha_inicio }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-calendar-alt"></i> Fecha Fin:</strong>
                                    {{ $torneo->fecha_fin }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-toggle-on"></i> Estado:</strong>
                                    {{ $torneo->estado->estado }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
