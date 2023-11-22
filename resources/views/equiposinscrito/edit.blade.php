@extends('admin-torneo.layouts.master')

@section('template_title')
    {{ __('Update') }} Equiposinscrito
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Update') }} Equiposinscrito</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('equiposinscrito.update', ['torneo' => $torneo->id, 'equiposinscrito' => $equiposinscrito->id]) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('equiposinscrito.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
