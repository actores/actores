<x-app-layout>
    <style>
        .avatar_socio {
            display: block;
            width: 7rem;
            height: 7rem;
            border-radius: 50%;
            padding: 0;
            object-fit: cover;
            filter: grayscale(100%);
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

        input.error,
        select.error {
            border: solid 1px #ff000096;
        }

        label.error {
            color: #ff000096;

        }
    </style>

    <section class="section_data">
        <div class="container">

            @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "{{ session('success') }}",
                    text: "{{ session('success') }}"
                });
            </script>
            @endif

            @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "{{ session('error') }}",
                    text: "{{ session('error') }}"
                });
            </script>
            @endif
            <!-- Recorrido - Menú -->
            <div class="d-flex justify-content-between align-items-center">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/menu/distribucion') }}">Distribución</a></li>
                        <li class="breadcrumb-item"><a href="{{ url('/proveedores') }}">Proveedores</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $proveedor->nombre }}</li>
                    </ol>
                </nav>

                <div class="">
                    <div class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPago">Nuevo pago</div>
                    <div class="btn btn-secondary btn-sm">Exportar</div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="profile d-flex justify-content-between align-items-center gap-4">
                        <span class="d-flex gap-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/2202/2202942.png" alt="" class="avatar_socio">
                            <div class="d-flex flex-column justify-content-center">
                                <h4 class="mb-0">{{ $proveedor->nombre }}</h4>
                                <span>{{ $proveedor->nit }}</span>
                            </div>
                        </span>
                        <span class="d-flex flex-column ml-5">
                            <span class="mb-0">Tipo</span>
                            <span>{{ $proveedor->tipo_proveedor }}</span>
                        </span>
                        <span class="d-flex flex-column ml-5">
                            <span class="mb-0">Dirección</span>
                            <span>{{ $proveedor->direccion }}</span>
                        </span>
                        <span class="d-flex flex-column ml-5">
                            <span class="mb-0">Ciudad</span>
                            <span>{{ $proveedor->ciudad }}</span>
                        </span>

                    </div>
                </div>
            </div>


            <div class="row mt-5">
                <div class="col-md-12">
                    <table class="table" id="data-table-proveedores-pagos-detalle">
                        <thead>
                            <tr>
                                <th>AÑO EXPLOTACIÓN</th>
                                <th>IMPORTE</th>
                                <th>FACTURA</th>
                                <th>TOTAl ABONOS</th>
                                <th>PROCENTAJE</th>
                                <th>ESTADO PAGO</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pagos as $pago)
                            @php
                            $rutaArchivo = 'facturas/' . $pago->factura;
                            $urlDescarga = asset(Storage::url($rutaArchivo));
                            @endphp

                            <tr>
                                <td>{{$pago->anio_explotacion}}</td>
                                <td>${{ number_format($pago->importe, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{$urlDescarga}}" target="_blank">Ver factura aquí</a>
                                </td>
                                <td>${{ number_format($pago->total_abonos, 0, ',', '.')}}</td>
                                <td class="{{number_format($pago->porcentaje_pago, 0) > 51 ? 'text-success' : 'text-danger'}} fw-bold">{{number_format($pago->porcentaje_pago, 0)}}%</td>
                                <td>{{$pago->estadoPago}}</td>
                                <td>
                                    <a href="/pagos/detalle/abonos/{{$proveedor->id}}/{{$pago->id}}">Ver abonos</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="modalPago" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo pago</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pago/nuevo" method="POST" enctype="multipart/form-data" class="px-4 py-2" id="form_nuevo_pago">
                        @csrf

                        <input type="hidden" name="InputProveedorId" value="{{ $proveedor->id }}">
                        <div class="mb-3">
                            <label for="inputAnioExplotacion" class="form-label">Año explotación</label>
                            <input type="number" class="form-control" name="inputAnioExplotacion" id="inputAnioExplotacion" placeholder="Ingresa el año de explotación">
                        </div>
                        <div class="mb-3">
                            <label for="inputImporte" class="form-label">Importe</label>
                            <input type="number" class="form-control" name="inputImporte" id="inputImporte" placeholder="Ingresa valor de importe">
                        </div>
                        <div class="mb-3">
                            <label for="inputFactura" class="form-label">Factura</label>
                            <input type="file" class="form-control" name="inputFactura" id="inputFactura" placeholder="Seleccionar factura">
                        </div>
                      
                        <div class="modal-footer mt-4">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        new DataTable('#data-table-proveedores-pagos-detalle', {
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


        $(document).ready(function() {
            $('#form_nuevo_pago').validate({
                rules: {
                    inputAnioExplotacion: {
                        required: true,
                        digits: true
                    },
                    inputImporte: {
                        required: true,
                        digits: true
                    },
                    inputFactura: {
                        required: true,
                    },
                    inputEstadoPago: {
                        required: true,
                    }
                },
                messages: {
                    inputAnioExplotacion: {
                        required: "Por favor, ingresa el nombre",
                        digits: "El número de nit debe contener solo dígitos"
                    },
                    inputImporte: {
                        required: "Por favor, selecciona un tipo",
                        digits: "El número de nit debe contener solo dígitos"
                    },
                    inputFactura: {
                        required: "Por favor, ingresa el número de nit"

                    },
                    inputEstadoPago: {
                        required: "Por favor, ingresa el dirección",
                    }
                },
                submitHandler: function(form) {
                    form.submit();
                }
            });
        });
    </script>
    @endpush

</x-app-layout>