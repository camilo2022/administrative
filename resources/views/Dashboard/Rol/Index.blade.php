@extends('Templates.Dashboard')
@section('content')

    <section class="content">
        <div class="body_scroll">

            @if (session('success'))
                <div class="text-center dur" id="dur"
                    style="border:1px;border-radius:4px;background-color:rgb(21, 199, 21);color: white;position: relative;width:100%;height:60px;">
                    <p style="position: relative;top:18px;font-size:14px;font-weight:bold;">{{ session('success') }}</p>
                </div>
            @endif

            @if ($errors->any())
                <div class="text-center dur" id="dur"
                    style="border:1px;border-radius:4px;background-color:rgb(199, 21, 21);color: white;position: relative;width:100%;height:60px;">
                    <p style="position: relative;top:18px;font-size:14px;font-weight:bold;">{{ $errors->first() }}</p>
                </div>
            @endif

            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Roles</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-settings"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                                class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                                class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>


            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    <a type="button" class="btn btn-primary text-white" data-toggle="modal"
                                        data-target="#modal_rol">Crear Rol
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nombre</th>
                                            <th>Permisos</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Asignar</th>
                                            <th>Quitar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rol as $role)
                                            <tr>
                                                <th>{{ $role->id }}</th>
                                                <td>{{ $role->name }}</td>
                                                <td>
                                                    @foreach ($role->permissions as $permission)
                                                        <span class="badge badge-info">
                                                            {{ $permission->name ?? '' }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit('{{$role->id}}','{{$role->name}}')"
                                                    data-toggle="modal" data-target="#modal_rol_editar"><i class="fas fa-pen text-white"></i></a>
                                                </td> 
                                                <td>
                                                    <form action="{{ route('Dashboard.Rol.Destroy', $role->id) }}" 
                                                        method="POST" onsubmit="deleteData(event, this)">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm text-white">
                                                            <i class="fas fa-trash text-red"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-success text-white btn-sm" href="{{ route('Dashboard.Rol.Show', $role->id) }}">
                                                        <i class="fas fa-plus-circle"></i></a>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning text-white btn-sm" href="{{ route('Dashboard.Rol.Hide', $role->id) }}">
                                                        <i class="fas fa-minus-circle"></i></a>
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
            </div>


        </div>
    </section>

    @include('Dashboard.Rol.Create')
    @include('Dashboard.Rol.Edit')
@endsection
@section('script')
    <script>
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        $("#save_rol").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de rol es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            }
            Swal.fire({
                title: '¿Desea guardar el rol?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#DD6B55',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, guardar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    document.form_rol.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_rol_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de rol es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            }
            Swal.fire({
                title: '¿Desea editar el rol?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#DD6B55',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, guardar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    document.form_rol_e.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        function edit(id, name){
            $("#name_e").val(name);
            let updateUrl = "{{ route('Dashboard.Rol.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', id);
            document.form_rol_e.action = url;
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar el rol?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#DD6B55',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, guardar!',
                cancelButtonText: 'No, cancelar!',
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((result) => {
                if (result.value) {
                    form.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        }
    </script>
@endsection