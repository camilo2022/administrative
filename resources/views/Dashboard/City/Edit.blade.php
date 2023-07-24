<!-- Modal Rol -->
<div class="modal" id="modal_ciudad_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header w-100">
                <div class="card-header text-center w-100" style="background: white;">
                    <label style="font-size:20px;font-weight:bold;">Editar Ciudad</label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" method="POST"
                    name="form_ciudad_e">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre de la ciudad</label>
                        <input type="text" class="form-control" name="name" placeholder=""
                            autocomplete="off" id="name_e">
                    </div>
                    <div class="form-group" id="resultquery">
                        <label for="user_rol">Departamento</label>
                        <select class="form-control show-tick ms select2 choices-remove-button id_departament_e" 
                        placeholder="Seleccione el pais del departamento"
                        id="id_departament_e" name="id_departament">
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($departaments as $departament)
                                <option value="{{ $departament->id }}">{{ $departament->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save_ciudad_e">Guardar</button>
            </div>
        </div>
    </div>
</div>
