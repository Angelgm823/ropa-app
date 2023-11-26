
<x-card cardTitle="Detalles Usuarios">
    <x-slot:cardTools>
        <a href="{{route('users')}}" class="btn btn-primary">
            <i class="fas fa-arrow-circle-left"></i> Regresar
        </a>
    </x-slot>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">

                    <div class="text-center">
                        <x-image :item="$user" size="200"/>
                    </div>
                    <h2 class="profile-username text-center">{{$user->name}}</h2>
                    <p class="text-muted text-center">{{$user->admin ? 'Administrador' : 'Vendedor'}}</p>

                    <ul class="list-group mb-3">
                        <li class="list-group-item">
                            <b>Correo</b> <a class="float-right">{{$user->email}}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Perfil</b> <a class="float-right">{!!$user->activeLabel!!}</a>
                        </li>

                        <li class="list-group-item">
                            <b>Creado</b> <a class="float-right">{{$user->created_at}}</a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <div class="col-md-8">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Producto</th>
                        <th>Precio venta</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    {{--@foreach ($category->products as $product)
                    <tr>
                        <th>{{$product->id}}</th>
                        <th>
                            <x-image :item="$product"/>
                        </th>
                        <th>{{$product->name}}</th>
                        <th>
                            {!!$product->precio!!}
                        </th>
                        <th>{!!$product->stockLavel!!}</th>
                    </tr>
                    @endforeach--}}
                </tbody>
            </table>
        </div>
    </div>

</x-card>

