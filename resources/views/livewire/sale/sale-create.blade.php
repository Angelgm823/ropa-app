<div>
    <x-card cardTitle="Crear venta">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary mr-2" >
                <i class="fas fa-plus-circle"></i> Crear
            </a>

            <a href="#" class="btn btn-danger" wire:click='clear'>
                <i class="fas fa-trash"></i> Cancelar venta
            </a>

            </x-slot>

            {{--Content--}}
            <div class="row">
                {{--detalles de venta--}}
                <div class="col-md-6">
                    @include('sales.card-details')
                </div>

                {{--detalles de producto--}}
                <div class="col-md-6">

                    @include('sales.list-products')
                </div>
            </div>


            <x-slot:cardFooter>

                </x-slot>
    </x-card>



</div>
