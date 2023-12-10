<div>

    <x-card cardTitle="Lista de productos ({{ $this->totalRegistros }})" >


        <x-table>

            <x-slot:thead>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio venta</th>
                <th>Stock</th>
                <th>Categoria</th>
                <th>Estado</th>
                <th width="3%">Ver</th>

            </x-slot>

            @forelse ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>
                        <x-image :item="$product"/>
                    </td>
                    <td>{{$product->name}}</td>
                    <td>{!!$product->precio!!}</td>
                    <td>{!!$product->stockLavel!!}</td>
                    <td>
                        <a class="badge badge-secondary" href="{{route('categorias.show', $product->category->id)}}"> {{$product->category->name}}</a>
                    </td>
                    <td>{!!$product->activeLabel!!}</td>
                    <td>
                        <a href="{{route('products.show', $product)}}" class="btn btn-success btn-xs" title="ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>

                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="10">
                        Sin registros
                    </td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{$products->links()}}
        </x-slot>

    </x-card>

    @include('products.modal')

</div>
