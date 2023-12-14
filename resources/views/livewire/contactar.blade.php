<div>
<x-card>
    <form wire:submit.prevent="enviar">
        <label>Correo</label>
        <input wire:model='correo' type="email" class="form-control">
        <label>Nombre</label>
        <input wire:model='nombre' type="text" class="form-control">
        <label>Telefono</label>
        <input wire:model='telefono' type="tel"  class="form-control">
        <label>Mensaje</label>
        <textarea wire:model='mensaje' class="form-control" name="mensaje" id="mensaje" cols="30" rows="10"></textarea>

        <button type="submit" class="btn btn-primary">
            Enviar
        </button>
    </form>
</x-card>
</div>
