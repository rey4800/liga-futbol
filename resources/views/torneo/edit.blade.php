@extends('admin.layouts.master')

@section('template_title')
    {{ __('Update') }} Torneo
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Editar Torneo</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('torneo.update', $torneo->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('torneo.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
