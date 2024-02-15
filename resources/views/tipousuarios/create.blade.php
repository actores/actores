@extends('layouts.master')
@section('title')
    Starter Page
@endsection
@section('css')
    <!-- gridjs css -->
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
@endsection
@section('page-title')
    Tipo usuarios
@endsection
@section('body')

    <body data-layout="horizontal" data-layout-size="boxed">
    @endsection
    @section('content')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Auto Sizing</h5>
                    </div>
                    <div class="card-body">

                        <form action="{{ url('/tipousuarios') }}" method="POST" class="row gy-2 gx-3 align-items-center">
                             @csrf
                            <div class="col-sm-auto">
                                <label class="visually-hidden" for="tipousuario_nombre">Name</label>
                                <input type="text" class="form-control" id="tipousuario_nombre" name="tipousuario_nombre" placeholder="Nombre Usuario">
                            </div>
                            <div class="col-sm-auto">
                                <button type="submit" class="btn btn-primary w-md">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- gridjs js -->
        {{-- <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script> --}}

        {{-- <script src="{{ URL::asset('build/js/pages/gridjs.init.js') }}"></script> --}}
        <!-- App js -->
        {{-- <script src="{{ URL::asset('build/js/app.js') }}"></script> --}}
    @endsection
