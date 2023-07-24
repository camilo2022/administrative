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
                        <h2>Departamento</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-apps"></i>
                                <a href="javascript:void(0);">Division Politica</a>
                            </li>
                            <li class="breadcrumb-item active">Departamento</li>
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
                                        data-target="#modal_departamento">Agregar Departamento
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Departamento</th>
                                            <th>Pais</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departaments as $departament)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $departament->name }}</td>
                                                <td>{{ $departament->country->name }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit({{$departament}})"
                                                    data-toggle="modal" data-target="#modal_departamento_editar"><i class="fas fa-pen text-white"></i></a>
                                                </td>

                                               <td>
                                                    <form action="{{ route('Dashboard.Departament.Destroy', $departament->id) }}" 
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

    @include('Dashboard.Departament.Create')
    @include('Dashboard.Departament.Edit')
@endsection
@section('script')
    <script>
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        $("#save_departamento").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            let id_country = $.trim($(".id_country").val());
            if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de departamento es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (id_country == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo pais es requerido.',
                        type: 'warning'
                    })
                $("#id_country").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea agregar el departamento?',
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
                    document.form_departamento.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_departamento_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            let id_country = $.trim($(".id_country_e").val());
            if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de departamento es requerido.',
                        type: 'warning'
                    })
                $("#name_e").focus();
                return false;
            } else if (id_country == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo pais es requerido.',
                        type: 'warning'
                    })
                $("#id_country_e").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea editar el departamento?',
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
                    document.form_departamento_e.submit();
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
            let countrys = @json($countrys);
            let options_add = "";
            for (var i = 0; i < countrys.length; i++) {
                if(data.id == countrys[i].id){
                    options_add += "<option value='"+countrys[i].id+"' selected>"+countrys[i].name+"</option>";
                }else{
                    options_add += "<option value='"+countrys[i].id+"'>"+countrys[i].name+"</option>";
                }
            }
            $("#resultquery").html(``);
            $("#resultquery").html(`<label for="user_rol">Pais</label>
            <select class="form-control show-tick ms select2 choices-remove-button id_country_e" 
            placeholder="Seleccione el pais del departamento" id="id_country_e" name="id_country">
            `+options_add+`</select>`);
            $(document).ready(function() {
                let multipleCancelButton = new Choices('.id_country_e', {
                    removeItemButton: false,
                });
            });
            let updateUrl = "{{ route('Dashboard.Departament.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', data.id);
            document.form_departamento_e.action = url;
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar el departamento?',
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
            new Choices('.id_country', {
                removeItemButton: false,
            });
        });
    </script>
@endsection
