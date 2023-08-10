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
                    <h2>Empleados</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="zmdi zmdi-male-female"></i>
                                <a href="javascript:void(0);">Talento Humano</a>
                            </li>
                            <li class="breadcrumb-item active">Empleados</li>
                            <li class="breadcrumb-item active">Crear</li>
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
                <!-- Color Pickers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">

                                <form method="POST" id="formularioemploye" name="formularioemploye" onsubmit="validateForm(this, event)"
                                    action="{{route('Dashboard.Employee.Store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-lg-12">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Nombres</label>
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombres"
                                                        onkeyup="mayuslet(this);" maxlength="30">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Apellidos</label>
                                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Apellidos"
                                                        onkeyup="mayuslet(this);" maxlength="30">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Tipo de Documento</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        name="document_type_id" id="document_type_id">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($document_types as $document_type)
                                                            <option value="{{$document_type->id}}">{{$document_type->name.' - '.$document_type->description}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Numero de Documento</label>
                                                    <input type="text"
                                                        class="form-control" minlength="5"  maxlength="11" placeholder="Numero de Documento"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                        onpaste="return false;" name="document_number" id="document_number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Numero de Telefono</label>
                                                    <input type="text" class="form-control" minlength="5" maxlength="11" placeholder="Numero de Telefono"
                                                        onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;"
                                                        onpaste="return false;" name="telephone" id="telephone">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label for="">Correo Eletronico</label>
                                                    <input type="text" class="form-control" onkeyup="mayuslet(this);"
                                                        placeholder="Correo Electronico" name="email" id="email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label for="">Barrio</label>
                                                    <input type="text" class="form-control" placeholder="Barrio"
                                                        name="neighborhood" id="neighborhood" onkeyup="mayuslet(this);"
                                                        maxlength="30">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label for="">Direccion de Residencia</label>
                                                    <input type="text" class="form-control" onkeyup="mayuslet(this);"
                                                        placeholder="Direccion de Residencia" name="address" id="address">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Fecha de Expedicion</label>
                                                    <input type="date" class="form-control" placeholder="Fecha de Expedicion"
                                                        name="date_of_expedition" id="date_of_expedition">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label>Fecha de Nacimiento</label>
                                                    <input type="date" class="form-control" aria-placeholder="Fecha de Nacimiento"
                                                        name="date_of_birth" id="date_of_birth">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label for="">Eps</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" id="eps_id" name="eps_id">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($epss as $eps)
                                                            <option value="{{$eps->id}}">{{$eps->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group form-float">
                                                    <label for="">Arl</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" id="arl_id" name="arl_id">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($arls as $arl)
                                                            <option value="{{$arl->id}}">{{$arl->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label>Pais</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button" data-placeholder="Select"
                                                        onchange="select_departament(this)" id="country" name="country">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($countrys as $country)
                                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group form-float" id="select_departament">
                                                    <label for="">Departamento</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" id="departament" name="departament">
                                                        <option value="">Seleccionar</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group form-float" id="select_city">
                                                    <label for="">Ciudad</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" id="city_id" name="city_id">
                                                        <option value="">Seleccionar</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label for="">Tipo de Sangre</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        name="type_blood" id="type_blood" data-placeholder="Select">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        <option value="A +">A positivo (A +)</option>
                                                        <option value="A-">A negativo (A-)</option>
                                                        <option value="B +">B positivo (B +)</option>
                                                        <option value="B -">B negativo (B -)</option>
                                                        <option value="AB +">AB positivo (AB +)</option>
                                                        <option value="AB -">AB negativo (AB -)</option>
                                                        <option value="O +">O positivo (O +)</option>
                                                        <option value="O-">O negativo (O-)</option>
                                                        <option value="-">N/A</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label>Tarifa arl</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" name="arl_rate" id="arl_rate">
                                                        <option value="arlslect">Seleccionar</option>
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label>Genero</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button" data-placeholder="Select"
                                                        name="sex" id="sex">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        <option value="MASCULINO">MASCULINO</option>
                                                        <option value="FEMENINO">FEMENINO</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label>Fecha de afiliacion de la eps</label>
                                                    <input type="date" class="form-control" name="affiliation_date_eps"
                                                        id="affiliation_date_eps">
                                                </div>
                                                <div class="form-group form-float">
                                                    <label>Estado civil</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" name="civil_state" id="civil_state">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        <option value="SOLTERO">SOLTERO</option>
                                                        <option value="CASADO">CASADO</option>
                                                        <option value="DIVORCIADO">DIVORCIADO</option>
                                                        <option value="UNION LIBRE">UNION LIBRE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group form-float">
                                                    <label>Pension</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" name="pension_id"
                                                        id="pension_id">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($pensions as $pension)
                                                            <option value="{{$pension->id}}">{{$pension->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label>Fecha de afiliacion de la arl</label>
                                                    <input type="date" class="form-control" name="affiliation_date_arl"
                                                        id="affiliation_date_arl">
                                                </div>
                                                <div class="form-group form-float">
                                                    <label>Rango</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" name="rank_id" id="rank_id">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($ranks as $rank)
                                                            <option value="{{$rank->id}}">{{$rank->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group form-float">
                                                    <label>Cargo</label>
                                                    <select class="form-control show-tick ms select2 choices-remove-button"
                                                        data-placeholder="Select" name="post_id" id="post_id">
                                                        <option value="" selected disabled>Seleccionar</option>
                                                        @foreach($posts as $post)
                                                            <option value="{{$post->id}}">{{$post->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group form-float">
                                                    <label>Foto</label>
                                                    <input type="file" class="form-control dropify" onchange="validarFoto()"
                                                    accept=".jpeg,.jpg,.png" name="photography" id="photography">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('Dashboard.Employee.Index') }}" class="btn btn-secondary">Devolver</a>
                                    <button class="btn btn-primary" type="submit">Guardar</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="body_scroll">
        <div class="block-header">
            <div class="container-fluid">
                <!-- Color Pickers -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="card">

                            <div class="body">

                                <form method="POST" id="formularioemploye" action="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group form-float">
                                                <input type="file" class="form-control dropify"
                                                name="photography" id="photography">
                                            </div>
                                        </div>
                                    </div>
                                    <button id="save_m" class="btn btn-success" type="button">Cargar Archivo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        function mayuslet(e) {
            e.value = e.value.toUpperCase();
        }

        $('.dur').not('.alert-important').delay(3000).fadeOut(350);

        new Choices('.choices-remove-button', {
            removeItemButton: false,
        });

        function select_departament(thiss) {
            let departaments = @json($departaments);
            let options = `<option value="">Seleccionar</option>`;
            let country_id = thiss.value;
            for (let index = 0; index < departaments.length; index++) {
                if(country_id == departaments[index].id_country){
                    options += `<option value="${departaments[index].id}">${departaments[index].name}</option>`;
                }
            }
            $("#select_departament").html(`<label for="">Departamento</label>
            <select class="form-control show-tick ms select2 choices-remove-button" onchange="select_city(this)"
                data-placeholder="Select" id="departament" name="departament">${options}
            </select>`);
            new Choices('#departament', {
                removeItemButton: false,
            });
        };

        function select_city(thiss){
            let citys = @json($citys);
            let options = `<option value="">Seleccionar</option>`;
            let departament_id = thiss.value;
            for (let index = 0; index < citys.length; index++) {
                if(departament_id == citys[index].id_departament){
                    options += `<option value="${citys[index].id}">${citys[index].name}</option>`;
                }
            }
            $("#select_city").html(`<label for="">Ciudad</label>
            <select class="form-control show-tick ms select2 choices-remove-button"
                data-placeholder="Select" id="city_id" name="city_id">${options}
            </select>`);
            new Choices('#city_id', {
                removeItemButton: false,
            });
        };

        function validateForm(formularioemploye, event) {
            event.preventDefault();
console.log(1)
            let name = $.trim($("#name").val());
            let lastname = $.trim($("#lastname").val());
            let document_type_id = $.trim($("#document_type_id").val());
            let document_number = $.trim($("#document_number").val());
            let telephone = $.trim($("#telephone").val());
            let email = $.trim($("#email").val());
            let neighborhood = $.trim($("#neighborhood").val());
            let address = $.trim($("#address").val());
            let date_of_expedition = $.trim($("#date_of_expedition").val());
            let date_of_birth = $.trim($("#date_of_birth").val());
            let country = $.trim($("#country").val());
            let departament = $.trim($("#departament").val());
            let city_id = $.trim($("#city_id").val());
            let eps_id = $.trim($("#eps_id").val());
            let arl_id = $.trim($("#arl_id").val());
            let sex = $.trim($("#sex").val());
            let civil_state = $.trim($("#civil_state").val());
            let type_blood = $.trim($("#type_blood").val());
            let arl_rate = $.trim($("#arl_rate").val());
            let affiliation_date_eps = $.trim($("#affiliation_date_eps").val());
            let affiliation_date_arl = $.trim($("#affiliation_date_arl").val());
            let pension_id = $.trim($("#pension_id").val());
            let rank_id = $.trim($("#rank_id").val());
            let post_id = $.trim($("#post_id").val());

            if (name.length == "") {
                Swal.fire({
                    title: 'Campo Vacio ',
                    text: 'El Campo Nombre no puede estar vacio',
                    type: 'warning'
                })
                $("#name").focus();
                return false;
            } else if (lastname.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Apellido no puede estar vacio',
                    type: 'warning'
                })
                $("#lastname").focus();
                return false;
            } else if (document_type_id == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Tipo de documento no puede estar vacio',
                    footer: 'Debe seleccionar un tipo de documento',
                    type: 'warning'
                })
                return false;
            } else if (document_number.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Numero de documento no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (telephone.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Telefono no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (email.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Correo electronico no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (neighborhood.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Barrio no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (address.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Direccion no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (date_of_expedition.length == "") {

                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Fecha de expedicion no puede estar vacio',
                    type: 'warning'
                })

                return false;
            } else if (date_of_birth.length == "") {

                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Fecha de nacimiento no puede estar vacio',
                    type: 'warning'
                })

                return false;
            } else if (country == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Pais no puede estar vacio',
                    footer: 'Debe seleccionar un pais',
                    type: 'warning'
                })
                return false;
            } else if (departament == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Departamento no puede estar vacio',
                    footer: 'Debe seleccionar un departamento',
                    type: 'warning'
                })
                return false;
            } else if (city_id == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Ciudad no puede estar vacio',
                    footer: 'Debe seleccionar una ciudad',
                    type: 'warning'
                })
                return false;
            } else if (eps_id == "") {

                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Eps no puede estar vacio',
                    footer: 'Debe seleccionar una eps',
                    type: 'warning'
                })
                return false;
            } else if (arl_id == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Arl no puede estar vacio',
                    footer: 'Debe seleccionar una arl',
                    type: 'warning'
                })
                return false;
            } else if (sex == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Genero no puede estar vacio',
                    footer: 'Debe seleccionar un genero',
                    type: 'warning'
                })
                return false;
            } else if (civil_state == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo estado civil no puede estar vacio',
                    footer: 'Debe seleccionar el estado civil',
                    type: 'warning'
                })
                return false;
            } else if (type_blood == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Tipo de sangre no puede estar vacio',
                    footer: 'Debe seleccionar el Tipo de sangre',
                    type: 'warning'
                })
                return false;
            } else if (arl_rate == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Tarifa Arl no puede estar vacio',
                    footer: 'Debe seleccionar un tarifa',
                    type: 'warning'
                })
                return false;
            } else if (affiliation_date_eps.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Fecha de afiliacion de la Eps no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (affiliation_date_arl.length == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Fecha de afiliacion de la arl no puede estar vacio',
                    type: 'warning'
                })
                return false;
            } else if (pension_id == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Seleccione Pension no puede estar vacio',
                    footer: 'Debe seleccionar un fondo de pension',
                    type: 'warning'
                })
                return false;
            } else if (rank_id == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Seleccione Rango no puede estar vacio',
                    footer: 'Debe seleccionar un rango de autoridad',
                    type: 'warning'
                })
                return false;
            } else if (post_id == "") {
                Swal.fire({
                    title: 'Campo Vacio',
                    text: 'El Campo Seleccione Cargo no puede estar vacio',
                    footer: 'Debe seleccionar un cargo',
                    type: 'warning'
                })
                return false;
            }else{
                swal.fire({
                    title: '¿Desea agregar el Empleado?',
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
                        formularioemploye.submit();
                    } else {
                        Swal.fire({
                            title: 'Cancelado',
                            type: 'error'
                        });
                    }
                });
            }
        };

        function validarFoto() {
            let archivo = document.getElementById('archivo').value,
            extension = archivo.substring(archivo.lastIndexOf('.'),archivo.length);
            if(document.getElementById('archivo').getAttribute('accept').split(',').indexOf(extension) < 0) {
                Swal.fire({
                    title: 'Archivo Inválido',
                    text: 'No se permite la extensión ' + extension,
                    footer: 'Permitidas: JPG, PNG, JPEG',
                    type: 'warning'
                })
            }
        }


    </script>
@endsection
