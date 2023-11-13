@props(['modalTitle' => '', 'modalId' => '', 'modalSize' => ''])

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog {{$modalSize}}" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $modalTitle }}</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div> --}}
        </div>
    </div>
</div>
