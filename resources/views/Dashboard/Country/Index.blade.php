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
                        <h2>Pais</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-apps"></i>
                                <a href="javascript:void(0);">Division Politica</a>
                            </li>
                            <li class="breadcrumb-item active">Pais</li>
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
                                        data-target="#modal_pais">Agregar Pais
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Prefijo</th>
                                            <th>Pais</th>
                                            <th>Codigo</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($countrys as $country)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $country->country_code }}</td>
                                                <td>{{ $country->name }}</td>
                                                <td>{{ $country->tourism_code }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit({{$country}})"
                                                    data-toggle="modal" data-target="#modal_pais_editar"><i class="fas fa-pen text-white"></i></a>
                                                </td>

                                               <td>
                                                    <form action="{{ route('Dashboard.Country.Destroy', $country->id) }}" 
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

    @include('Dashboard.Country.Create')
    @include('Dashboard.Country.Edit')
@endsection
@section('script')
    <script>
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        $("#save_pais").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            let country_code = $.trim($("#country_code").val());
            let tourism_code = $.trim($("#tourism_code").val());
            if (country_code == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Prefijo telefonico es requerido.',
                        type: 'warning'
                    })
                $("#country_code").focus();
                return false;
            } else if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de pais es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (tourism_code == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Codigo de turismo es requerido.',
                        type: 'warning'
                    })
                $("#tourism_code").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea agregar el pais?',
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
                    document.form_pais.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_pais_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            let country_code = $.trim($("#country_code_e").val());
            let tourism_code = $.trim($("#tourism_code_e").val());
            if (country_code == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Prefijo telefonico es requerido.',
                        type: 'warning'
                    })
                $("#country_code").focus();
                return false;
            } else if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Nombre de pais es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (tourism_code == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Codigo de turismo es requerido.',
                        type: 'warning'
                    })
                $("#tourism_code").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea editar el pais?',
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
                    document.form_pais_e.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        function edit(data){
            $("#country_code_e").val(data.country_code);
            $("#name_e").val(data.name);
            $("#tourism_code_e").val(data.tourism_code);
            let updateUrl = "{{ route('Dashboard.Country.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', data.id);
            document.form_pais_e.action = url;
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar el pais?',
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
