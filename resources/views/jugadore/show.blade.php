@extends('admin.layouts.master')

@section('template_title')
    {{ $jugadore->name ?? __("Show Jugadore") }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><h4>Información del Jugador</h4></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('jugadore.index') }}">
                                <i class="fas fa-arrow-left"></i> Regresar
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><i class="fas fa-user"></i> Nombre:</strong>
                                    {{ $jugadore->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-user"></i> Apellido:</strong>
                                    {{ $jugadore->apellido }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-birthday-cake"></i> Edad:</strong>
                                    {{ $jugadore->edad }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-venus-mars"></i> Género:</strong>
                                    {{ $jugadore->genero->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-id-card"></i> DNI:</strong>
                                    {{ $jugadore->dni }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-user"></i> Nombre Responsable:</strong>
                                    {{ $jugadore->nombre_responsable }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-id-card"></i> DNI Responsable:</strong>
                                    {{ $jugadore->dni_responsable }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><i class="fas fa-futbol"></i> Equipo:</strong>
                                    {{ $jugadore->equipo->nombre }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-user-tag"></i> Posición:</strong>
                                    {{ $jugadore->posicione->posicion }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-sort-numeric-up"></i> Número de Jugador:</strong>
                                    {{ $jugadore->numero_jugador }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-phone"></i> Teléfono:</strong>
                                    {{ $jugadore->telefono }}
                                </div>
                                <div class="form-group">
                                    <strong><i class="fas fa-map-marker-alt"></i> Dirección:</strong>
                                    {{ $jugadore->direccion }}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <strong><i class="fas fa-image"></i> Imagen:</strong>
                                    <img src="{{ asset('storage/fotos/'.$jugadore->imagen) }}" class="img-fluid img-thumbnail" alt="JugadorImage">
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

