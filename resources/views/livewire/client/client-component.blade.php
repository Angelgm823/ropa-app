<div>
    <x-card cardTitle="Listado de clientes ({{$this->totalRegistros}})">
       <x-slot:cardTools>
          <a href="#" class="btn btn-primary" wire:click='create'>
            <i class="fas fa-plus-circle"></i> Crear cliente
          </a>
       </x-slot>

       <x-table>
          <x-slot:thead>
             <th>ID</th>
             <th>Nombre</th>
             <th>Identificacion</th>
             <th>Correo</th>
             <th>Telefono</th>
             <th width="3%">Ver</th>
             <th width="3%">Editar</th>
             <th width="3%">Eliminar</th>

          </x-slot>

          @forelse ($clientes as $cliente)

             <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->identificacion}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->telefono}}</td>

                <td>
                    <a href="{{route('clients.show', $cliente)}}}" class="btn btn-success btn-sm" title="Ver">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="{{route('clients.show',$cliente)}}" wire:click='edit({{$cliente->id}})' class="btn btn-primary btn-sm" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a wire:click="$dispatch('delete',{id: {{$cliente->id}}, eventName:'destroyClient'})" class="btn btn-danger btn-sm" title="Eliminar">
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
            {{$clientes->links()}}

       </x-slot>
    </x-card>


 @include('clients.form')

</div>
