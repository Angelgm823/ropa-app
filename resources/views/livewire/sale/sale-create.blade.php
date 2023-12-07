<div>
    <x-card cardTitle="Crear venta">
        <x-slot:cardTools>
            <a href="{{route('sales.list')}}" class="btn btn-primary mr-2">
                <i class="fas fa-shopping-cart"></i> Ir a ventas
            </a>

            <a href="" class="btn btn-danger" wire:click='clear'>
                <i class="fas fa-trash"></i> Cancelar venta
            </a>

            </x-slot>

            {{--Content--}}
            <div class="row">
                {{--detalles de venta--}}
                <div class="col-md-6">
                    @include('sales.card-details')
                    @include('sales.cart-pago')
                    @livewire('sale.client')
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
