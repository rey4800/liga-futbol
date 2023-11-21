@extends('admin.layouts.master')

@section('template_title')
    {{ __('Update') }} Equipo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Equipo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equipo.update', $equipo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('equipo.form')

                            <div class="form-group">
                                {{ Form::label('imagen') }}
                                {{ Form::file('imagen', ['class' => 'form-control-file', 'id' => 'imagenInput']) }}
                                <img id="imagenPreview" src="{{ isset($equipo->imagen) ? $equipo->imagen : '#' }}" alt="Vista previa de la imagen" style="max-width: 200px; max-height: 200px; margin-top: 10px;">
                                {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
                            </div>

                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('Myjavascript')

<script>
    document.getElementById('imagenInput').addEventListener('change', function (event) {
        var imagenPreview = document.getElementById('imagenPreview');
        var fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                imagenPreview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        } else {
            imagenPreview.src = '#'; // Si no se selecciona ninguna imagen
        }
    });
</script>

@endsection