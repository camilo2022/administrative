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
                        <h2>Tipo de Documento</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-folder"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item active">Tipo de Documento</li>
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
                                        data-target="#modal_tdocumento">Agrear Tipo de Documento
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Tipo de Documento</th>
                                            <th>Descripcion</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($type_documents as $type_document)
                                            <tr>
                                                <th>{{ $loop->iteration }}</th>
                                                <td>{{ $type_document->name }}</td>
                                                <td>{{ $type_document->description }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-primary text-white btn-sm" onclick="edit({{$type_document}})"
                                                    data-toggle="modal" data-target="#modal_tdocumento_editar"><i class="fas fa-pen text-white"></i></a>
                                                </td>

                                               <td>
                                                    <form action="{{ route('Dashboard.TypeDocument.Destroy', $type_document->id) }}"
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

    @include('Dashboard.TypeDocument.Create')
    @include('Dashboard.TypeDocument.Edit')
@endsection
@section('script')
    <script>
        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        $("#save_tdocumento").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name").val());
            let description = $.trim($("#description").val());
            if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo nombre de documento es requerido.',
                        type: 'warning'
                    })
                $("#name").focus();
                return false;
            } else if (description == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo descripcion del documento es requerido.',
                        type: 'warning'
                    })
                $("#description").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea crear el tipo de documento?',
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
                    document.form_tdocumento.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });

        $("#save_tdocumento_e").click(function(e) {
            e.preventDefault();
            let name = $.trim($("#name_e").val());
            let description = $.trim($("#description_e").val());
            if (name == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo nombre de documento es requerido.',
                        type: 'warning'
                    })
                $("#name_e").focus();
                return false;
            } else if (description == "") {
                Swal.fire({
                        title: 'Campo Vacio',
                        text: 'El campo Descripcion de cargo es requerido.',
                        type: 'warning'
                    })
                $("#description").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea editar el tipo de documento?',
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
                    document.form_tdocumento_e.submit();
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
            $("#description_e").html(data.description);
            let updateUrl = "{{ route('Dashboard.TypeDocument.Update', ':id' ) }}";
            let url = updateUrl.replace(':id', data.id);
            document.form_tdocumento_e.action = url;
        }

        function deleteData(event, form){
            event.preventDefault();
            swal.fire({
                title: '¿Desea eliminar el tipo de documento?',
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
