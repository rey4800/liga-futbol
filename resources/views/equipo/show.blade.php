@extends('admin.layouts.master')
@section('template_title')
    {{ $equipo->name ?? __("Show Equipo") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><h4>Detalles del Equipo</h4></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipo.index') }}">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <img src="{{ asset('storage/escudos/'.$equipo->imagen) }}" class="img-fluid img-thumbnail" alt="Equipo Image">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <strong><i class="fas fa-futbol"></i> Nombre:</strong>
                                    {{ $equipo->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-info-circle"></i> Descripción:</strong>
                                    {{ $equipo->descripcion }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-trophy"></i> Categoría:</strong>
                                    {{ $equipo->categoria->categoria }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-map-marker-alt"></i> Ubicación:</strong>
                                    {{ $equipo->ubicacione->ubicacion }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-venus-mars"></i> Género:</strong>
                                    {{ $equipo->genero->nombre }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

