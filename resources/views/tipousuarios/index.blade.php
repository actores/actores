@if (session('success'))
    <script>
        alert()
    </script>
@endif


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
                        <h5 class="card-title mb-0">Agregar nuevo tipo de usuario</h5>
                    </div>
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ url('/tipousuarios') }}" method="POST"
                            class="d-flex justify-content-between gap-3">
                            @csrf
                            <div class="col-sm-auto flex-grow-1">
                                <label class="visually-hidden" for="tipousuario_nombre">Name</label>
                                <input type="text" class="form-control" id="tipousuario_nombre" name="tipousuario_nombre"
                                    placeholder="Ingrese el nombre tipo de usuario">
                            </div>
                            <div class="col-sm-auto w-15">
                                <button type="submit" class="btn btn-primary w-xl">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Listado tipo de usuarios</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        {{-- <div id="table-gridjs"></div> --}}
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tiposUsuario as $tipoUsuario)
                                    <tr>
                                        <th scope="row">{{ $tipoUsuario->id }}</th>
                                        <td scope="row">{{ $tipoUsuario->nombre }}</td>
                                        <td scope="row" style="width: 33%">
                                            <a href="" class="btn btn-secondary btn-sm mb-1">Editar</a>
                                            <a href="" class="btn btn-secondary btn-sm mb-1">Eliminar</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    @endsection
    @section('scripts')
        <!-- gridjs js -->
        <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>

        <script src="{{ URL::asset('build/js/pages/gridjs.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
