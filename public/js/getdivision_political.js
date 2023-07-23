
        $(function() {
            $('#country').on('change', onSelectDepartamentChange);
           
        });
/* 
        "contry_id=" +  */

        function onSelectDepartamentChange() {
            var contry_id = $(this).val();
           
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('/Dashboard.Person.create.depart.getdepartament') }}",

                method: 'post',
                dataType: 'json',
                data: contry_id,

                success: function(data) {
                    console.log(data);
                }

            })

        }

      /*   function onSelectDepartamentChange() {
            var contry_id = "contry_id=" + $(this).val();

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{ route('Dashboard.Person.create.depart.getdepartament') }}",

                method: 'post',
                dataType: 'json',
                data: contry_id,

                success: function(data) {
                    if (data) {

                        var html_select =
                            '<option value="">Seleccione departamento</option>';

                        for (var i = 0; i < data.length; ++i)
                            html_select += '<option value="' + data[i].id + '">' + data[i]
                            .name + '</option>';

                        $('#departament').html(html_select);
                    }
                }
            });
        }
 */