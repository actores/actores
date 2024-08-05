@extends('layouts.master')
@section('title')
    Dashboard
@endsection
@section('css')
    <!-- jsvectormap css -->
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-title')
    Dashboard
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
        <section class="alert alert-info">
            <h4 class="alert-heading">Bienvenido al Dashboard de Actores 360</h4>
            Estamos en proceso de actualizar y mejorar este dashboard para ofrecerte una visión más completa y eficiente de
            los procesos internos de la Sociedad. En esta sección, encontrarás información
            clave sobre los distintos procesos y métricas esenciales para la gestión de actores.

            Agradecemos tu comprensión mientras trabajamos en estas mejoras. Si tienes alguna pregunta o necesitas
            asistencia, no dudes en contactarnos.

            ¡Gracias por tu apoyo y paciencia!
        </section>
    @endsection
    @section('scripts')
        <!-- App js -->
        <script src="{{ URL::asset('build/js/app.js') }}"></script>
    @endsection
