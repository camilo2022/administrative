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
                        <h2>Empresas</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-settings"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item active">Empresas</li>
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
                                        data-target="#modal_enterprise">Crear Empresa
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th rowspan="2">#</th>
                                                <th rowspan="2">Empresa</th>
                                                <th rowspan="2">Acceso Usuarios</th>
                                                <th rowspan="2">Acceso Modulos</th>
                                                <th rowspan="2">Acceso Sub Modulos</th>
                                                <th rowspan="2">Editar</th>
                                                <th rowspan="2">Eliminar</th>
                                                <th colspan="2">Usuarios</th>
                                                <th colspan="2">Módulos</th>
                                                <th colspan="2">Submódulos</th>
                                            </tr>
                                            <tr>
                                                <th>Asignar</th>
                                                <th>Quitar</th>
                                                <th>Asignar</th>
                                                <th>Quitar</th>
                                                <th>Asignar</th>
                                                <th>Quitar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                            @foreach ($enterprises as $enterprise)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $enterprise->name_enterprise }}</td>
                                                    <td>
                                                        @foreach ($enterprise->users as $user)
                                                            <span class="badge badge-info">
                                                                {{ $user->name ?? '' }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($enterprise->modules as $module)
                                                            <span class="badge badge-info">
                                                                {{ $module->name_modules ?? '' }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach ($enterprise->submodules as $submodule)
                                                            <span class="badge badge-info">
                                                                {{ $submodule->name_submodules ?? '' }}
                                                            </span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                            <a href="" onclick="edit('{{$enterprise->id}}','{{$enterprise->name_enterprise}}')"
                                                                data-toggle="modal" data-target="#modal_enterprise_e"
                                                                class="btn btn-primary btn-sm">
                                                                <i class="fas fa-pen text-white"></i>
                                                            </a>
                                                    </td>
                                                    <td>
                                                        <form method="post" action="{{ route('Dashboard.Enterprises.Destroy',$enterprise->id ) }}" onsubmit="deleteData(event,this)">
                                                            @csrf                                                            
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash text-red"></i>
                                                            </button>
                                                        </form>                                                                
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('Dashboard.Enterprises.Show.Users',$enterprise->id ) }}"
                                                            class="btn btn-sm" style="background: cornflowerblue"><i class="fas fa-user-plus"></i></a>
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('Dashboard.Enterprises.Hide.Users',$enterprise->id ) }}"
                                                            class="btn btn-sm" style="background: slategray"><i class="fas fa-user-minus"></i></a>
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('Dashboard.Enterprises.Show.Modules',$enterprise->id ) }}"
                                                            class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i></a>
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('Dashboard.Enterprises.Hide.Modules',$enterprise->id ) }}"
                                                            class="btn btn-warning btn-sm"><i class="fas fa-minus-circle"></i></a>
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('Dashboard.Enterprises.Show.SubModules',$enterprise->id ) }}"
                                                            class="btn btn-info btn-sm"><i class="fas fa-check-circle"></i></a>
                                                    </td>
                                                    <td>
                                                         <a href="{{ route('Dashboard.Enterprises.Hide.SubModules',$enterprise->id ) }}"
                                                            class="btn btn-sm" style="background: #F44336;"><i class="fas fa-times-circle"></i></a>
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

                @include('Dashboard.Enterprises.Create')
                @include('Dashboard.Enterprises.Edit')
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#dur').not('.alert-important').delay(3000).fadeOut(350);

        function edit(id, name){
            $("#name_e").val(name);
            let updateUrl = "{{ route('Dashboard.Enterprises.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', id);
            document.form_enterprise_e.action = url;
        }

        $("#save_enterprise_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de la empresa es requerido.',
                        type: 'warning'
                    })
                $("#name_e").focus();
                return false;
            }
            Swal.fire({
                title: '¿Desea editar la empresa?',
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
                    document.form_enterprise_e.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_enterprise").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de la empresa es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            }
            Swal.fire({
                title: '¿Desea crear la empresa?',
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
                    document.form_enterprise.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar la empresa?',
                type: 'warning',
                showCancelButton: true,
                cancelButtonColor: '#DD6B55',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Si, eliminar!',
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
