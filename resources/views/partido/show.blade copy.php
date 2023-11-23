@extends('admin-torneo.layouts.master')

@section('template_title')
    {{ $partido->name ?? "{{ __('Show') Partido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title"><h4>Adminitrar Partidos</h4></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('partido.index', $torneo->id) }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Torneo Id:</strong>
                            {{ $partido->torneo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Titular:</strong>
                            {{ $partido->titular }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $partido->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Local Id:</strong>
                            {{ $partido->equipo1->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Visitante Id:</strong>
                            {{ $partido->equipo2->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $partido->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $partido->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Estado Id:</strong>
                            {{ $partido->estado_id }}
                        </div>
                        <div class="form-group">
                            <strong>Goles Local:</strong>
                            {{ $partido->goles_local }}
                        </div>
                        <div class="form-group">
                            <strong>Goles Visitante:</strong>
                            {{ $partido->goles_visitante }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
