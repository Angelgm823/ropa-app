<div>

    <x-card cardTitle="Lista de categorias ({{ $this->totalRegistros }})" >
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary" wire:click='create'>
                <i class="fas fa-plus-circle"></i>
                Crear Categoria
            </a>

        </x-slot>

        <x-table>

            <x-slot:thead>
                <th>ID</th>
                <th>Nombre</th>
                <th width="3%">Ver</th>
                <th width="3%">Editar</th>
                <th width="3%">Eliminar</th>
            </x-slot>

            @forelse ($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                        <a href="{{route('categorias.show', $category)}}" class="btn btn-success btn-xs" title="ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" wire:click='edit({{$category->id}})' class="btn btn-primary btn-xs" title="editar">
                            <i class="fas fa-edit"></i>
                    </td>
                    <td>
                        <a wire:click="$dispatch('delete',{id: {{$category->id}}, eventName:'destroyCategory'})" class="btn btn-danger btn-xs"
                        title="eliminar">
                            <i class="far fa-trash-alt"></i>
                    </td>
                </tr>

            @empty
                <tr class="text-center">
                    <td colspan="5">
                        Sin registros
                    </td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{$categories->links()}}
        </x-slot>

    </x-card>

    <x-modal modalId="modalcategory" modalTitle="Categorias">
        <form wire:submit={{$Id==0 ? "store" : "update($Id)"}}>
            <div class="form-row">
                <div class="form-group-col-12">
                    <label for="name">Nombre: </label>
                    <input wire:model='name' type="text" class="form-control" placeholder="Nombre categoria">
                    @error('name')
                        <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
        </form>
    </x-modal>

</div>
