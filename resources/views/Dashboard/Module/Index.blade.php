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
                        <h2>Modulos</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-settings"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item active">Modulos</li>
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
                                        data-target="#modal_module">Crear Modulo
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
                                            <th>Icon</th>
                                            <th>SubModulos</th>
                                            <th>Roles</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Asignar</th>
                                            <th>Quitar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($moduless as $module)
                                            <tr>
                                                <th>{{ $module->id }}</th>
                                                <td>{{ $module->name_modules }}</td>
                                                <td> <i class="{{ $module->icon_modules }}"></i> </td>
                                                <td>
                                                    @foreach ($module->submodules as $submodule)
                                                        <span class="badge badge-info">
                                                            {{ $submodule->name_submodules ?? '' }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($module->roles as $rol)
                                                        <span class="badge badge-info">
                                                            {{ $rol->name ?? '' }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit('{{$module->id}}','{{$module->name_modules}}','{{$module->icon_modules}}')"
                                                    data-toggle="modal" data-target="#modal_module_editar"><i class="fas fa-pen text-white"></i></a>
                                                </td> 
                                                <td>
                                                    <form action="{{ route('Dashboard.Module.Destroy', $module->id) }}" 
                                                        method="POST" onsubmit="deleteData(event, this)">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm text-white">
                                                            <i class="fas fa-trash text-red"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-success text-white btn-sm" href="{{ route('Dashboard.Module.Show', $module->id) }}">
                                                        <i class="fas fa-plus-circle"></i></a>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning text-white btn-sm" href="{{ route('Dashboard.Module.Hide', $module->id) }}">
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

    @include('Dashboard.Module.Create')
    @include('Dashboard.Module.Edit')
@endsection
@section('script')
    <script>
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        $("#icon").keyup(function() {
            let class_icon = $.trim($(this).val());
            $("#icon_view").removeClass().addClass(class_icon);
        });

        $("#icon_e").keyup(function() {
            let class_icon = $.trim($(this).val());
            $("#icon_view_e").removeClass().addClass(class_icon);
        });

        $("#save_module").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            let icon = $.trim($("#icon").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de modulo es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (icon.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Icono de modulo es requerido.',
                        type: 'warning'
                    })
                $("#icon").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea guardar el modulo?',
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
                    document.form_module.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_module_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            let icon = $.trim($("#icon_e").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de modulo es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (icon.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Icono de modulo es requerido.',
                        type: 'warning'
                    })
                $("#icon").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea editar el modulo?',
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
                    document.form_module_e.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        function edit(id, name, icon){
            $("#icon_e").val(icon);
            $("#icon_view_e").removeClass().addClass(icon);
            $("#name_e").val(name);
            console.log(id, name, icon);
            let updateUrl = "{{ route('Dashboard.Module.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', id);
            document.form_module_e.action = url;
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar el modulo?',
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