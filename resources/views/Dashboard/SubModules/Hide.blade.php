@extends('Templates.Dashboard')

@section('content')
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>SubModulo</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-settings"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">SubModulo</a></li>
                            <li class="breadcrumb-item active">Remover</li>
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
                            <div class="body">
                                <form action="{{ route('Dashboard.SubModule.Unssign_rol', $submodule->id) }}" method="post" name="submodules">
                                    @csrf
                                    <div class="col-md-12">
                                        <h5>Modulo: <b><label>{{$submodule->name_submodules}}</label></b></h5>
                                    </div>

                                        <div class="col-md-12">
                                            <label for="modal_rol">Seleccione los roles a remover</label>
                                            <select id="choices-multiple-remove-button" class="form-control show-tick ms select2" name="roles[]" id="roles" placeholder="Seleccione los roles que desea removerle al modulo" multiple>
                                                @foreach ($roles->roles as $rol)
                                                    <option value="{{ $rol->id }}">{{ $rol->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>


                                    <div class="col-12 mt-4">
                                        <a href="{{ route('Dashboard.SubModule.Index') }}" type="button" class="btn btn-secondary">Devolver</a>
                                        <button type="button" id="guardar" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            let multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
            });
        });

        $("#guardar").click(function(e) {
            e.preventDefault();
            let roles = $("#choices-multiple-remove-button").val();
            if (roles.length == 0) {
                Swal.fire({
                        title: 'Seleccione Roles',
                        text: 'Debe seleccionar los roles que desea quitar al modulo.',
                        type: 'warning'
                    })
                $("#roles").focus();
                return false;
            }
            swal.fire({
                title: '¿Desea remover los roles?',
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
                    document.submodules.submit();
                } else {
                    Swal.fire({
                        title: 'Cancelado',
                        type: 'error'
                    });
                }
            });
        });
    </script>
@endsection


