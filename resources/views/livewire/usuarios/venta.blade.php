<div>
    <x-card cardTitle="Crear compra">
        <x-slot:cardTools>

            <a href="" class="btn btn-danger" wire:click='clear'>
                <i class="fas fa-trash"></i> Cancelar Compra
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
