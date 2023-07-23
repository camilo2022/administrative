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
                        <h2>SubModulos</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-settings"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item active">SubModulos</li>
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
                                        data-target="#modal_submodule">Crear SubModulos
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
                                            <th>Ruta</th>
                                            <th>Modulo</th>
                                            <th>Roles</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                            <th>Asignar</th>
                                            <th>Quitar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($submodules as $submodule)
                                            <tr>
                                                <th>{{ $submodule->id }}</th>

                                                <td>{{ $submodule->name_submodules }}</td>

                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ $submodule->route }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ $submodule->module->name_modules }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @foreach ($submodule->roles as $rol)
                                                        <span class="badge badge-info">
                                                            {{ $rol->name ?? '' }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit('{{$submodule->id}}','{{$submodule->name_submodules}}','{{$submodule->route}}','{{$submodule->id_module}}')"
                                                    data-toggle="modal" data-target="#modal_submodule_editar"><i class="fas fa-pen"></i></a>
                                                </td>
                                               <td>
                                                    <form action="{{ route('Dashboard.SubModule.Destroy', $submodule->id) }}" 
                                                        method="POST" onsubmit="deleteData(event, this)">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-success text-white btn-sm" href="{{ route('Dashboard.SubModule.Show', $submodule->id) }}">
                                                        <i class="fas fa-plus-circle"></i></a>
                                                </td>
                                                <td>
                                                    <a type="button" class="btn btn-warning text-white btn-sm" href="{{ route('Dashboard.SubModule.Hide', $submodule->id) }}">
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

    @include('Dashboard.SubModules.Create')
    @include('Dashboard.SubModules.Edit')
@endsection
@section('script')
    <script>
        
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        choices = new Choices('.choices-remove-button', {
            removeItemButton: false,
        });

        $("#save_submodule").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            let route = $.trim($("#route").val());
            let modulo = $.trim($("#modulo").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de submodulo es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (route.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Ruta de submodulo es requerido.',
                        type: 'warning'
                    })
                $("#route").focus();
                return false;
            } else if (modulo.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Modulo de submodulo es requerido.',
                        type: 'warning'
                    })
                $("#modulo").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea guardar el submodulo?',
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
                    document.form_submodule.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_submodule_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            let route = $.trim($("#route_e").val());
            let modulo = $.trim($("#modulo_e").val());
            if (name.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de permiso es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (route.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Ruta de submodulo es requerido.',
                        type: 'warning'
                    })
                $("#route").focus();
                return false;
            } else if (modulo.length == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Modulo de submodulo es requerido.',
                        type: 'warning'
                    })
                $("#modulo").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea editar el submodulo?',
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
                    document.form_submodule_e.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        function edit(id, name, route, modulo){
            $("#name_e").val(name);
            $("#route_e").val(route);
            let updateUrl = "{{ route('Dashboard.SubModule.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', id);
            document.form_submodule_e.action = url;
            let options = '';
            let modules = @json($moduless);
            for (let i = 0; i < modules.length; i++) {
                if(modules[i].id == modulo){
                    options+=`<option value="${modules[i].id}" selected>${modules[i].name_modules}</option>`;
                }else{
                    options+=`<option value="${modules[i].id}" >${modules[i].name_modules}</option>`;
                }
            }
            $("#select-modulo").html(
                `<label for="user_rol">Modulo</label>
                    <select class="form-control show-tick ms select2 choices-remove-button" id="modulo_e" name="modulo">
                    <option value="" selected disabled>Seleccionar</option>${options}
                </select>`
            );
            choices = new Choices('.choices-remove-button', {
                removeItemButton: false,
            });
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar el submodulo?',
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
