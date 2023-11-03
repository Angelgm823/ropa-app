<div>
    <h1>Componente Categorias</h1>

    <x-card cardTitle="Lista de categorias ({{$this->totalRegistros}})" cardFooter=''>
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalcategory">
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

            <x-slot:body>
                <tr>
                    <td>...</td>
                    <td>...</td>
                    <td>
                        <a href="#" class="btn btn-success btn-xs" title="ver">
                            <i class="far fa-eye"></i>
                        </a>
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-xs" title="editar">
                            <i class="fas fa-edit"></i>
                    </td>
                    <td>
                        <a href="#" class="btn btn-danger btn-xs" title="eliminar">
                            <i class="fas fa-trash-alt"></i>
                    </td>
                </tr>

            </x-slot:body>
        </x-table>

    </x-card>

    <x-modal modalId="modalcategory" modalTitle="Categorias">
        <form wire:submit="store">
            <div class="row">
                <div class="col">

                    <input wire:model='nombre' type="text" class="form-control" placeholder="Nombre categoria">
                    @error('nombre')
                        <div class="alert alert-danger w-100 mt-4">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <button class="btn btn-primary float-right">Guardar</button>
        </form>
    </x-modal>

</div>
