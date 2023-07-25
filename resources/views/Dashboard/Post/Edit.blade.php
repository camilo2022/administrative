<!-- Modal Rol -->
<div class="modal" id="modal_cargo_editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header w-100">
                <div class="card-header text-center w-100" style="background: white;">
                    <label style="font-size:20px;font-weight:bold;">Editar Cargo</label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" enctype="multipart/form-data" method="POST"
                    name="form_cargo_e">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre del cargo</label>
                        <input type="text" class="form-control" name="name" placeholder=""
                            autocomplete="off" id="name_e">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Descripcion del cargo</label>
                        <textarea name="description" id="description_e" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group" id="resultquery">
                        <label for="user_rol">Area</label>
                        <select class="form-control show-tick ms select2 choices-remove-button id_cargo_e" 
                        placeholder="Seleccione el area del cargo"
                        id="id_cargo_e" name="id_cargo">
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}">{{ $area->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save_cargo_e">Guardar</button>
            </div>
        </div>
    </div>
</div>
