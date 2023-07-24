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
                        <h2>Ciudad</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-apps"></i>
                                <a href="javascript:void(0);">Division Politica</a>
                            </li>
                            <li class="breadcrumb-item active">Ciudad</li>
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
                                        data-target="#modal_ciudad">Agregar Ciudad
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Ciudad</th>
                                            <th>Departamento</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($citys as $city)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $city->name }}</td>
                                                <td>{{ $city->departament->name }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit({{$city}})"
                                                    data-toggle="modal" data-target="#modal_ciudad_editar"><i class="fas fa-pen text-white"></i></a>
                                                </td>

                                               <td>
                                                    <form action="{{ route('Dashboard.City.Destroy', $city->id) }}" 
                                                        method="POST" onsubmit="deleteData(event, this)">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm text-white"><i class="fas fa-trash text-red"></i>
                                                        </button>
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
            </div>
        </div>
    </section>

    @include('Dashboard.City.Create')
    @include('Dashboard.City.Edit')
@endsection
@section('script')
    <script>
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        $("#save_ciudad").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            let id_departament = $.trim($(".id_departament").val());
            if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de la ciudad es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (id_departament == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo departamento es requerido.',
                        type: 'warning'
                    })
                $("#id_departament").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea agregar la ciudad?',
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
                    document.form_ciudad.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_ciudad_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            let id_departament = $.trim($(".id_departament_e").val());
            if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de la ciudad es requerido.',
                        type: 'warning'
                    })
                $("#name_e").focus();
                return false;
            } else if (id_departament == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo departamento es requerido.',
                        type: 'warning'
                    })
                $("#id_departament").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea editar la ciudad?',
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
                    document.form_ciudad_e.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        function edit(data){
            $("#name_e").val(data.name);
            let departaments = @json($departaments);
            let options_add = "";
            for (var i = 0; i < departaments.length; i++) {
                if(data.id == departaments[i].id){
                    options_add += "<option value='"+departaments[i].id+"' selected>"+departaments[i].name+"</option>";
                }else{
                    options_add += "<option value='"+departaments[i].id+"'>"+departaments[i].name+"</option>";
                }
            }
            $("#resultquery").html(``);
            $("#resultquery").html(`<label for="user_rol">Departamento</label>
            <select class="form-control show-tick ms select2 choices-remove-button id_departament_e" 
            placeholder="Seleccione el pais del departamento" id="id_departament_e" name="id_departament">
            `+options_add+`</select>`);
            $(document).ready(function() {
                let multipleCancelButton = new Choices('.id_departament_e', {
                    removeItemButton: false,
                });
            });
            let updateUrl = "{{ route('Dashboard.City.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', data.id);
            document.form_ciudad_e.action = url;
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar la ciudad?',
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

        $(document).ready(function() {
            new Choices('.id_departament', {
                removeItemButton: false,
            });
        });
    </script>
@endsection
