<div>
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-user"></i> Cliente: name client</h3>
            <div class="card-tools">
                <button wire:click="openModal" class="btn bg-purple btn-sm">Crear cliente</button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Seleccionar cliente:</label>

                <!--input group -->
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>

                    <select class="form-control">

                        <option value=""></option>

                    </select>

                </div>
                <!-- /.input group -->
            </div>
        </div>
    </div>
    <!-- Modal Cliente -->
    @include('clients.form')
    {{-- End Modal --}}

</div>
