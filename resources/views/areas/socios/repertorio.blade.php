<x-app-layout>
    <style>
        .avatar_socio {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }


        .dt-layout-row:first-child .dt-end {
            width: 100% !important;
        }

        .dt-layout-row:first-child {
            display: flex !important;
            flex-direction: column !important;
            flex-grow: 1;
            align-items: flex-start;
            width: 100%;
        }

        .dt-layout-row:first-child .dt-search {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .dt-layout-row:first-child .dt-search .dt-input {
            width: 100%;
            background: none !important;
        }

        select.dt-input {
            width: 5rem;
            background-position: right;
        }
    </style>

    <section class="section_data">
        <div class="container">
            <!-- Recorrido - Menú -->
            <div class=" d-flex justify-content-between align-items-center">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/menu/socios') }}">Socios</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Repertorio</li>
                    </ol>
                </nav>
                <div class="">
                    <div class="btn btn-secondary btn-sm">Nuevo socio</div>
                    <div class="btn btn-secondary btn-sm">Exportar</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="" id="data-table-socios-repertorio">
                        <thead>
                            <tr>
                                <th scope="col">SOCIO</th>
                                <th scope="col">IDENTIFICACIÓN</th>
                                <th scope="col">NÚMERO DE SOCIO</th>
                                <th scope="col">NÚMERO DE ARTISTA</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socios as $socio)
                                <tr>
                                    <td scope="row">
                                        <div class="d-flex gap-3">
                                            <img src="{{ $socio->imagen }}" alt="" class="avatar_socio">
                                            <span class="d-flex flex-column">
                                                <span>{{ $socio->nombre }}</span>
                                                @if ($socio->tipoSocio == 1)
                                                    <span>Pleno Derecho</span>
                                                @elseif($socio->tipoSocio == 2)
                                                    <span>Adherido</span>
                                                @endif
                                            </span>
                                        </div>
                                    </td>
                                    <td>{{ $socio->identificacion }}</td>
                                    <td>{{ $socio->numeroSocio }}</td>
                                    <td>{{ $socio->numeroArtista }}</td>
                                    <td>
                                        <a href="/menu/socios/repertorio/socio/{{ $socio->id }}">Detalles</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            new DataTable('#data-table-socios-repertorio', {
                responsive: true,
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                paging: false,
                language: {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sSearch": "Buscar:",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                },
                info: false,
                columnDefs: [{
                    targets: "_all",
                    sortable: false
                }],
                paging: true,
            });
        </script>
    @endpush

</x-app-layout>
