@extends('layouts.datatables')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Administración de usuarios</div>
                <div class="card-body">
                    <table id="user_table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo Electronico</th>
                                <th>Roles</th>
                                <th>Fecha de creacion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(' | ', $user->roles()->get()->pluck('nombre')->toArray()) }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left"><button type="button" class="btn btn-primary" >Editar</button></a>
                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-warning" >Borrar</button>
                                        </form>
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
