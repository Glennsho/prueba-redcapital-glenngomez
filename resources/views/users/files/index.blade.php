@extends('layouts.datatables')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Registro de archivos</div>
                <div class="card-body">
                    <table id="user_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre de archivo</th>
                                <th>Fecha de creacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($archivos as $archivo)
                                <tr>
                                    <td>{{ $archivo->nombre }}</td>
                                    <td>{{ $archivo->created_at }}</td>
                                    <td>
                                        <a href="{{ asset($archivo->ruta_acceso) }}" class="float-left btn btn-primary" download>Descargar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function()
        {
            $('#user_table').DataTable({
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "Todo"]],
                "ordering": true,
                "searching": true,
                "scrollX": '60vh',
                "scrollY": '50vh',
                "fixedHeader": true,
                "scrollCollapse": true,
                "fixedColumns": {
                    leftColumns: 1
                },
                "language": {
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "lengthMenu": "Mostrar _MENU_ elementos",
                    "info": "Mostrando _START_ de _END_, total _TOTAL_ registros",
                    "search": "Buscar"
                }
            });
        }
    );
</script>

@endsection
