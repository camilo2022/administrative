<!-- Modal Rol -->
<div class="modal" id="modal_departamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header w-100">
                <div class="card-header text-center w-100" style="background: white;">
                    <label style="font-size:20px;font-weight:bold;">Agregar Departamento</label>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Dashboard.Departament.Store') }}" enctype="multipart/form-data" method="POST"
                    name="form_departamento">
                    @csrf
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nombre del departamento</label>
                        <input type="text" class="form-control" name="name" placeholder=""
                            autocomplete="off" id="name">
                    </div>
                    <div class="form-group">
                        <label for="user_rol">Pais</label>
                        <select class="form-control show-tick ms select2 choices-remove-button id_country" 
                        placeholder="Seleccione el pais del departamento"
                        id="id_country" name="id_country">
                            <option value="" selected disabled>Seleccione</option>
                            @foreach ($countrys as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="save_departamento">Guardar</button>
            </div>
        </div>
    </div>
</div>
