@extends('admin.layouts.master')
@section('template_title')
    {{ $equipo->name ?? "{{ __('Show') Equipo" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><h4>Ver Equipos</h4> </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equipo.index') }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $equipo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $equipo->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $equipo->categoria->categoria }}
                        </div>
                        <div class="form-group">
                            <strong>Ubicacion Id:</strong>
                            {{ $equipo->ubicacione->ubicacion }}
                        </div>
                        <div class="form-group">
                            <strong>Genero Id:</strong>
                            {{ $equipo->genero->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $equipo->imagen }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
