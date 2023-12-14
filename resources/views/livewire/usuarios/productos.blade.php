<div>

    <x-card cardTitle="Lista de productos ({{ $this->totalRegistros }})">




        <div class="row">

        @forelse ($products as $product)
        <div class="card col">
            <x-image :item="$product" class="card-img-top" />
            <div class="card-body">
                <h5 class="card-title">{{$product->name}} {!!$product->precio!!} {!!$product->stockLavel!!}</h5>
                <p class="card-text"></p>
                <a href="{{route('user.product', $product)}}" class="card-link" title="ver">
                    <i class="far fa-eye"></i> Mostrar producto
                </a>
            </div>


        </div>

        @empty
        <p>Sin registros</p>
        @endforelse
        </div>


        <x-slot:cardFooter>
            {{$products->links()}}
            </x-slot>

    </x-card>

    @include('products.modal')

</div>
