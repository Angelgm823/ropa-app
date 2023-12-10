<div>

    <x-card cardTitle="Bienvenidos" cardFooter="">
        <x-slot:cardTools>
            <a href="{{route('sales.list')}}" class="btn btn-primary">
                Ir a ventas
            </a>
            <a href="{{route('sales.create')}}" class="btn btn-bg-purple">
                Crear venta
            </a>
        </x-slot>
        @include('home.row-cards-sales')

        @include('home.card-graph')

        {{$listTotalVentasMes}}

    </x-card>
</div>
