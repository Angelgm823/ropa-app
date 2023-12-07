<div>
    <x-card cardTitle="Listado ventas ({{$this->totalRegistros}})">
        <x-slot:cardTools>
            <span class="badge badge-info" style="font-size: 1.2rem;">
                Total:
            </span>
            Selector de fechas

            <a href="{{route('sales.create')}}" class="btn btn-primary">
                <i class="fas fa-cart-plus"></i>
                Crear venta
            </a>
            </x-slot>

            <x-table>
                <x-slot:thead>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Productos</th>
                    <th>Articulos</th>
                    <th>Fecha</th>
                    <th width="3%">Ver</th>
                    <th width="3%">Editar</th>
                    <th width="3%">Eliminar</th>

                    </x-slot>

                    @forelse ($sales as $sale)

                    <tr>
                        <td>
                            <span class="badge badge-primary">
                                FV-{{$sale->id}}
                            </span>
                        </td>
                        <td>{{$sale->client->nombre}}</td>
                        <td>
                            <span class="badge badge-secondary">
                                {{money($sale->total)}}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-pill bg-purple">
                                {{$sale->items->count()}}
                            </span>
                        </td>
                        <td>
                            <span class="badge badge-pill bg-purple">
                                {{$sale->items->sum('pivot.cantidad')}}
                            </span>
                        </td>
                        <td>{{$sale->fecha}}</td>
                        <td>
                            <a href="" class="btn btn-success btn-sm" title="Ver">
                                <i class="far fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#" wire:click='edit({{$sale->id}})' class="btn btn-primary btn-sm" title="Editar">
                                <i class="far fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a wire:click="$dispatch('delete',{id: {{$sale->id}}, eventName:'destroySale'})" class="btn btn-danger btn-sm" title="Eliminar">
                                <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>

                    @empty

                    <tr class="text-center">
                        <td colspan="5">Sin registros</td>
                    </tr>

                    @endforelse

            </x-table>

            <x-slot:cardFooter>
                {{$sales->links()}}

                </x-slot>
    </x-card>


</div>
