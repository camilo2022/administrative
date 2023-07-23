$("#save_dat10").click(function(e) {
    e.preventDefault();

    let name = $.trim($("#name").val());
    let lastname = $.trim($("#lastname").val());
    let id_document_type = $.trim($("#id_document_type").val());
    let document_number = $.trim($("#document_number").val());
    let telephone = $.trim($("#telephone").val());
    let sex = $.trim($("#sex").val());
    let id_city = $.trim($("#id_city").val());
    let address = $.trim($("#address").val());
    let email = $.trim($("#email").val());
    let post_id = $.trim($("#post_id").val());

    if (name.length == "") {

        Swal.fire({
            title: 'Campo Vacio ',
            text: 'El Campo Nombre no puede estar vacio',
            type: 'warning'
        })

        return false;
    } else if (lastname.length == "") {

        Swal.fire({
            title: 'Campo Vacio',
            text: 'El Campo Apellido no puede estar vacio',
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
    } else if (id_city.length == "") {

        Swal.fire({
            title: 'Campo Vacio',
            text: 'El Campo Ciudad no puede estar vacio',
            footer: 'Debe seleccionar el pais',
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
    } else if (email.length == "") {

        Swal.fire({
            title: 'Campo Vacio',
            text: 'El Campo Correo Eletronico no puede estar vacio',
            type: 'warning'
        })

        return false;
    }


    var form_data;
    var form_data = new FormData();

    form_data.append('name', name);
    form_data.append('lastname', lastname);
    form_data.append('id_document_type', id_document_type);
    form_data.append('document_number', document_number);
    form_data.append('telephone', telephone);
    form_data.append('sex', sex);
    form_data.append('id_city', id_city);
    form_data.append('address', address);
    form_data.append('email', email);
    form_data.append('post_id', post_id);



    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        url: "{{ route('Dashboard.Employee.create.storeemployee') }}",
        method: 'post',
        cache: false,
        contentType: false,
        processData: false,
        dataType: 'json',
        data: form_data,

        success: function(data) {

            Swal.fire({
                title: 'DATOS GUARDADOS',
                timer: 2500,
                type: 'success'
            });

            limpiar_formulario();

        },

        error: function(data) {
            Swal.fire({
                title: 'Error',
                text: 'Numero de documento ya existe',
                type: 'error'
            })
        },

    })

});

function limpiar_formulario() {
    $("#formulario10")[0].reset();
}