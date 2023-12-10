<div>
    @if(auth()->user()->admin)
    <x-card cardTitle="Bienvenidos" cardFooter="">
        <x-slot:cardTools>
            <a href="{{route('sales.list')}}" class="btn btn-primary">
            <i class="fas fa-shopping-cart"></i>
                Ir a ventas
            </a>
            <a href="{{route('sales.create')}}" class="btn bg-purple">
            <i class="fas fa-cart-plus"></i>
                Crear venta
            </a>
        </x-slot>
        @include('home.row-cards-sales')



    </x-card>
    @endif
    @if (auth()->user()->client)
        <x-card >
            Bienvenidos
        </x-card>
    @endif
</div>
