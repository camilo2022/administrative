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
                        <h2>Usuarios</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-settings"></i>
                                <a href="javascript:void(0);">Administracion</a>
                            </li>
                            <li class="breadcrumb-item active">Usuarios</li>
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
                                    <a href=" {{ route('Dashboard.User.Create') }} "
                                        class="btn btn-primary">Registrar usuario
                                    </a>
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped display nowrap table-hover js-basic-example dataTable">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th rowspan="2">#</th>
                                                <th rowspan="2">Usuario</th>
                                                <th rowspan="2">Email</th>
                                                <th colspan="3">Gestión</th>
                                                <th colspan="2">Módulos</th>
                                                <th colspan="2">Submódulos</th>
                                            </tr>
                                            <tr>
                                                <th>Password</th>
                                                <th>Editar</th>
                                                <th>Eliminar</th>
                                                <th>Asignar</th>
                                                <th>Quitar</th>
                                                <th>Asignar</th>
                                                <th>Quitar</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                            @foreach ($users as $user)
                                                <tr>

                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $user->name.' '.$user->lastname }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    @if(empty($user->username))
                                                        <td style="display: none;"></td>
                                                        <td style="display: none;"></td>
                                                        <td style="display: none;"></td>
                                                        <td colspan="7" class="text-center">
                                                            <a href="" class="btn btn-sm" 
                                                                style="background: slategray">
                                                                <i class="fas fa-user-plus"></i>    
                                                            </a>
                                                        </td>
                                                        <td style="display: none;"></td>
                                                        <td style="display: none;"></td>
                                                        <td style="display: none;"></td>
                                                    @else
                                                        <td>
                                                            <a class="btn btn-sm text-white" data-toggle='modal'
                                                                data-target='#modalUser' style="background:#000;"
                                                                onclick="userinfo({{ $user }})"><i
                                                                    class="fas fa-key text-white"></i></a>
                                                        </td>
                                                        <td>
                                                                    <a href="{{ route('Dashboard.User.Edit', $user->id) }}"
                                                                class="btn btn-primary btn-sm"><i
                                                                    class="fas fa-pen text-white"></i></a>
                                                        </td>
                                                        <td>
                                                            <form method="post" action="{{ route('Dashboard.User.Destroy', $user->id) }}" onsubmit="deleteData(event,this)">
                                                                @csrf                                                            
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm"><i
                                                                    class="fas fa-trash text-red"></i></button>
                                                            </form>                                                                
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('Dashboard.User.Show.Module', $user->id) }}"
                                                                class="btn btn-success btn-sm"><i class="fas fa-plus-circle"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('Dashboard.User.Hide.Module', $user->id) }}"
                                                                class="btn btn-warning btn-sm"><i class="fas fa-minus-circle"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('Dashboard.User.Show.SubModule', $user->id) }}"
                                                                class="btn btn-info btn-sm"><i class="fas fa-check-circle"></i></a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('Dashboard.User.Hide.SubModule', $user->id) }}"
                                                                class="btn btn-sm" style="background: #F44336;"><i class="fas fa-times-circle"></i></a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('Dashboard.User.Modal_change_password')

            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#dur').not('.alert-important').delay(3000).fadeOut(350);

        function userinfo(data) {
            let id_user = $("#id_user").val(data.id);
            let name_user = $("#username").val(data.name);
        }

        $("#save_password").click(function() {
            let password = $("#password").val();
            if (password.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'Debe diligenciar la contraseña',
                    type: 'warning'
                })
                return false;
            } else if (password.length < 8) {
                Swal.fire({
                    title: 'Opss...',
                    text: 'La contraseña debe ser mayor a 8 caracteres',
                    type: 'warning'
                })
                return false;
            }
            swal.fire({
                title: '¿Desea actualizar la contraseña?',
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
                    document.formuserupdate.submit();
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
                title: '¿Desea inactivar el usuario?',
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
