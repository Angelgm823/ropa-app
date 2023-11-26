<x-modal modalId="modalClient" modalTitle="Clientes">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">
            {{-- Input nombre --}}
            <div class="form-group col-6">
                <label for="nombre">Nombre:</label>
                <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre" id="nombre">
                @error('nombre')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input identificacion --}}
            <div class="form-group col-6">
                <label for="identificacion">Identificacion:</label>
                <input wire:model='identificacion' type="text" class="form-control" placeholder="Identificacion"
                    id="identificacion">
                @error('identificacion')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input correo --}}
            <div class="form-group col-6">
                <label for="correo">Correo:</label>
                <input wire:model='correo' type="email" class="form-control" placeholder="Correo" id="correo">
                @error('correo')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input telefono --}}
            <div class="form-group col-6">
                <label for="telefono">Telefono:</label>
                <input wire:model='telefono' type="text" class="form-control" placeholder="Telefono" id="telefono">
                @error('telefono')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input empresa --}}
            <div class="form-group col-6">
                <label for="empresa">Empresa:</label>
                <input wire:model='empresa' type="text" class="form-control" placeholder="Empresa" id="empresa">
                @error('empresa')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>

            {{-- Input nit --}}
            <div class="form-group col-6">
                <label for="nit">Nit:</label>
                <input wire:model='nit' type="text" class="form-control" placeholder="Nit" id="nit">
                @error('nit')
                    <div class="alert alert-danger w-100 mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <hr>
        <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
    </form>
</x-modal>
