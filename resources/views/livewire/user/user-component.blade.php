<div>
    <x-card cardTitle="Listado de usuarios ({{$this->totalRegistros}})">
       <x-slot:cardTools>
          <a href="#" class="btn btn-primary" wire:click='create'>
            <i class="fas fa-plus-circle"></i> Crear usuario
          </a>
       </x-slot>

       <x-table>
          <x-slot:thead>
             <th>ID</th>
             <th>Imagen</th>
             <th>Nombre</th>
             <th>Correo</th>
             <th>Perfil</th>
             <th>Estado</th>
             <th width="3%">Ver</th>
             <th width="3%">Editar</th>
             <th width="3%">Eliminar</th>

          </x-slot>

          @forelse ($users as $user)

             <tr>
                <td>{{$user->id}}</td>
                <td>
                    <x-image :item="$user"/>
                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->admin ? 'Administrador' : 'Vendedor'}}</td>
                <td>{!!$user->activeLabel!!}</td>
                <td>
                    <a href="{{route('users.show', $user)}}" class="btn btn-success btn-sm" title="Ver">
                        <i class="far fa-eye"></i>
                    </a>
                </td>
                <td>
                    <a href="#" wire:click='edit({{$user->id}})' class="btn btn-primary btn-sm" title="Editar">
                        <i class="far fa-edit"></i>
                    </a>
                </td>
                <td>
                    <a wire:click="$dispatch('delete',{id: {{$user->id}}, eventName:'destroyUser'})" class="btn btn-danger btn-sm" title="Eliminar">
                        <i class="far fa-trash-alt"></i>
                    </a>
                </td>
             </tr>

             @empty

             <tr class="text-center">
                <td colspan="9">Sin registros</td>
             </tr>

             @endforelse

       </x-table>

       <x-slot:cardFooter>
            {{$users->links()}}

       </x-slot>
    </x-card>


 <x-modal modalId="modalUser" modalTitle="Usuarios">
    <form wire:submit={{$Id==0 ? "store" : "update($Id)"}}>
        <div class="form-row">

            {{--input name--}}
            <div class="form-group col-12 col-md-6">
                <label for="name">Nombre:</label>
                <input wire:model='name' type="text" class="form-control" placeholder="Nombre" id="name">
                @error('name')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            {{--input email--}}
            <div class="form-group col-12 col-md-6">
                <label for="email">Correo:</label>
                <input wire:model='email' type="email" class="form-control" placeholder="Correo" id="email">
                @error('email')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            {{--input password--}}
            <div class="form-group col-12 col-md-6">
                <label for="password">Contraseña:</label>
                <input wire:model='password' type="password" class="form-control" placeholder="Contraseña" id="password">
                @error('password')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            {{--input re-password--}}
            <div class="form-group col-12 col-md-6">
                <label for="re_password">Contraseña:</label>
                <input wire:model='re_password' type="password" class="form-control" placeholder="Confirmar contraseña" id="re_password">
                @error('re_password')
                    <div class="alert alert-danger w-100 mt-2">{{$message}}</div>
                @enderror
            </div>

            {{--Input checkbox admin--}}
            <div class="form-group form-check col-md-6">
                <div class="icheck-primary">
                    <input wire:model='admin' type="checkbox" id="admin">
                    <label class="form-check-label" for="admin">¿Es administrador?</label>
                </div>
            </div>

            {{--Input checkbox active--}}
            <div class="form-group form-check col-md-6">
                <div class="icheck-primary">
                    <input wire:model='active' type="checkbox" id="active">
                    <label class="form-check-label" for="active">¿Está activo?</label>
                </div>
            </div>

            {{--Input image--}}
            <div class="form-group col-md-6">
                <label for="image">Imagen:</label> <br>
                <input wire:model='image' type="file" id="image" accept="image/*">
            </div>
            <div class="col-md-12">
                @if ($Id>0)
                    <x-image :item="$user = App\Models\User::find($Id)" size="200" float="float-right"/>
                @endif
                @if ($this->image)
                <img src="{{$image->temporaryUrl()}}" class="rounded float-left" width="200">
                @endif

            </div>

        </div>

        <hr>
        <button class="btn btn-primary float-right">{{$Id==0 ? 'Guardar' : 'Editar'}}</button>
    </form>
 </x-modal>

</div>

