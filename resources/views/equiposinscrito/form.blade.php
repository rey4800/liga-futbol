<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="display: none;">
            {{ Form::label('torneo_id') }}
            {{ Form::text('torneo_id', $equiposinscrito->torneo_id, ['class' => 'form-control' . ($errors->has('torneo_id') ? ' is-invalid' : ''), 'placeholder' => 'Torneo Id']) }}
            {!! $errors->first('torneo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('equipo') }}
            {{ Form::text('equipo_id', $equiposinscrito->equipo->nombre, ['class' => 'form-control' . ($errors->has('equipo_id') ? ' is-invalid' : ''), 'disabled' => 'disabled','placeholder' => 'Equipo']) }}
            {!! $errors->first('equipo_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partidos_ganados') }}
            {{ Form::text('partidos_ganados', $equiposinscrito->partidos_ganados, ['class' => 'form-control' . ($errors->has('partidos_ganados') ? ' is-invalid' : ''), 'placeholder' => 'Partidos Ganados']) }}
            {!! $errors->first('partidos_ganados', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partidos_empatados') }}
            {{ Form::text('partidos_empatados', $equiposinscrito->partidos_empatados, ['class' => 'form-control' . ($errors->has('partidos_empatados') ? ' is-invalid' : ''), 'placeholder' => 'Partidos Empatados']) }}
            {!! $errors->first('partidos_empatados', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('partidos_perdidos') }}
            {{ Form::text('partidos_perdidos', $equiposinscrito->partidos_perdidos, ['class' => 'form-control' . ($errors->has('partidos_perdidos') ? ' is-invalid' : ''), 'placeholder' => 'Partidos Perdidos']) }}
            {!! $errors->first('partidos_perdidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('goles_favor') }}
            {{ Form::text('goles_favor', $equiposinscrito->goles_favor, ['class' => 'form-control' . ($errors->has('goles_favor') ? ' is-invalid' : ''), 'placeholder' => 'Goles Favor']) }}
            {!! $errors->first('goles_favor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('goles_contra') }}
            {{ Form::text('goles_contra', $equiposinscrito->goles_contra, ['class' => 'form-control' . ($errors->has('goles_contra') ? ' is-invalid' : ''), 'placeholder' => 'Goles Contra']) }}
            {!! $errors->first('goles_contra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('diferencia') }}
            {{ Form::text('diferencia', $equiposinscrito->diferencia, ['class' => 'form-control' . ($errors->has('diferencia') ? ' is-invalid' : ''), 'placeholder' => 'Diferencia']) }}
            {!! $errors->first('diferencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('puntos') }}
            {{ Form::text('puntos', $equiposinscrito->puntos, ['class' => 'form-control' . ($errors->has('puntos') ? ' is-invalid' : ''), 'placeholder' => 'Puntos']) }}
            {!! $errors->first('puntos', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Aceptar</button>
    </div>
</div>