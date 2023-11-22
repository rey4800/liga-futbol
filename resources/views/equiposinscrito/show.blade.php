@extends('admin-torneo.layouts.master')

@section('template_title')
    {{ $equiposinscrito->name ?? "{{ __('Show') Equiposinscrito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">,<h4>Estadistica Equipo</h4></span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('equiposinscrito.index', $torneo->id) }}"> Regresar</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Torneo Id:</strong>
                            {{ $equiposinscrito->torneo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Equipo Id:</strong>
                            {{ $equiposinscrito->equipo->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Partidos Ganados:</strong>
                            {{ $equiposinscrito->partidos_ganados }}
                        </div>
                        <div class="form-group">
                            <strong>Partidos Empatados:</strong>
                            {{ $equiposinscrito->partidos_empatados }}
                        </div>
                        <div class="form-group">
                            <strong>Partidos Perdidos:</strong>
                            {{ $equiposinscrito->partidos_perdidos }}
                        </div>
                        <div class="form-group">
                            <strong>Goles Favor:</strong>
                            {{ $equiposinscrito->goles_favor }}
                        </div>
                        <div class="form-group">
                            <strong>Goles Contra:</strong>
                            {{ $equiposinscrito->goles_contra }}
                        </div>
                        <div class="form-group">
                            <strong>Diferencia:</strong>
                            {{ $equiposinscrito->diferencia }}
                        </div>
                        <div class="form-group">
                            <strong>Puntos:</strong>
                            {{ $equiposinscrito->puntos }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
