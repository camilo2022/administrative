<!-- Modal Rol -->
<div class="modal" id="modal_module" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header w-100">
                <div class="card-header text-center w-100" style="background: white;">
                    <label style="font-size:20px;font-weight:bold;">Crear Modulo</label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Dashboard.Module.Store') }}" enctype="multipart/form-data" method="POST"
                    name="form_module">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre del modulo</label>
                        <input type="text" class="form-control" name="name_modules" placeholder=""
                            autocomplete="off" id="name">
                    </div>

                    <div class="form-group">
                        <label for="formGroupExampleInput">Icono del modulo</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="icon_modules" placeholder="" autocomplete="off" id="icon">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="" id="icon_view"></i></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save_module">Guardar</button>
            </div>
        </div>
    </div>
</div>
