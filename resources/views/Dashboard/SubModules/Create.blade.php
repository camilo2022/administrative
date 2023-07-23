<!-- Modal Rol -->
<div class="modal" id="modal_submodule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header w-100">
                <div class="card-header text-center w-100" style="background: white;">
                    <label style="font-size:20px;font-weight:bold;">Crear SubModulo</label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Dashboard.SubModule.Store') }}" enctype="multipart/form-data" method="POST"
                    name="form_submodule">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre del SubModulo</label>
                        <input type="text" class="form-control" name="name_submodules" placeholder=""
                            autocomplete="off" id="name">
                    </div>
                    <div class="form-group">
                        <label for="formGroupExampleInput">Ruta del SubModulo</label>
                        <input type="text" class="form-control" name="route" placeholder=""
                            autocomplete="off" id="route">
                    </div>
                    <div class="form-group">
                        <label for="user_rol">Modulo</label>
                        <select class="form-control show-tick ms select2 choices-remove-button" id="modulo" name="modulo">
                            <option value="" selected disabled>Seleccionar</option>
                            @forelse ($moduless as $module)
                                <option value="{{ $module->id }}" >{{ $module->name_modules }}</option>
                            @empty
                            @endforelse
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save_submodule">Guardar</button>
            </div>
        </div>
    </div>
</div>
