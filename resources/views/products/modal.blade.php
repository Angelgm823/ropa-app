<x-modal modalId="modalProduct" modalTitle="Productos" modalSize="modal-lg">
    <form wire:submit={{ $Id == 0 ? 'store' : "update($Id)" }}>
        <div class="form-row">

            {{--Name--}}
            <div class="form-group col-7">
                <label for="name">Nombre: </label>
                <input wire:model='name' type="text" class="form-control" placeholder="Nombre producto">
                @error('name')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--Select category--}}
            <div class="form-group col-5">
                <label for="category_id">Categoria: </label>

                <select wire:model='category_id' id="category_id" class="form-control">
                    <option value="0"></option>
                </select>
                @error('category_id')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

                {{--textarea--}}
            <div class="form-group col-md-12">
                <label for="descripcion">Descripcion: </label>

                <textarea wire:model='descripcion' id="descripcion" class="form-control" cols="15" rows="4" >
                </textarea>

                @error('descripcion')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--precio de compra--}}
            <div class="form-group col-4">
                <label for="precio_compra">Precio de compra: </label>
                <input wire:model='precio_compra' type="number" class="form-control"
                placeholder="Precio de compra">
                @error('precio_compra')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--precio de venta--}}
            <div class="form-group col-4">
                <label for="precio_venta">Precio de venta: </label>
                <input wire:model='precio_venta' type="number" class="form-control"
                placeholder="Precio de venta">
                @error('precio_venta')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--codigo de barras--}}
            <div class="form-group col-4">
                <label for="codigo_barras">Codigo de barras: </label>
                <input wire:model='codigo_barras' type="number" class="form-control"
                placeholder="Codigo de barras">
                @error('codigo_barras')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--Stock--}}
            <div class="form-group col-4">
                <label for="stock"> Stock: </label>
                <input wire:model='stock' type="number" class="form-control"
                placeholder="Stock">
                @error('stock')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--Stock minimo--}}
            <div class="form-group col-4">
                <label for="stock_minimo"> Stock: </label>
                <input wire:model='stock_minimo' type="number" class="form-control"
                placeholder="Stock minimo">
                @error('stock_minimo')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--Fecha de vencimiento--}}
            <div class="form-group col-4">
                <label for="fecha_vencimiento"> Fecha de vencimiento: </label>
                <input wire:model='fecha_vencimiento' type="date" class="form-control"
                placeholder="Fecha de vencimiento">
                @error('fecha_vencimiento')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--check active--}}
            <div class="form-group col-3">
                <div class="icheck-primary">
                    <input wire:model='active' type="checkbox" id="active">
                    <label for="active">
                        Esta activo?
                    </label>
                </div>
                @error('active')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--input imagen--}}
            <div class="form-group col-3">

                <label for="image">Imagen</label>
                <input wire:model='image' type="file" id="image" accept="image/*">

                @error('image')
                    <div class="alert alert-danger w-100 mt-4">{{ $message }}</div>
                @enderror
            </div>

            {{--input imagen--}}
            <div class="form-group col-6">

                <img src="" alt="">
            </div>

        </div>
        <button class="btn btn-primary float-right">{{ $Id == 0 ? 'Guardar' : 'Editar' }}</button>
    </form>
</x-modal>
