<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Perfil Academia</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form wire:submit.prevent="store" action="#" method="POST" role="form text-left">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-name" class="form-control-label">Nombre</label>
                            <div class="">
                                <input wire:model="name" class="form-control" type="text" placeholder="Name" id="academy-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-email" class="form-control-label">Email</label>
                            <div class="">
                                <input wire:model="email" class="form-control" type="email" placeholder="@example.com" id="academy-email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-phone" class="form-control-label">Telefono</label>
                            <div class="">
                                <input wire:model="phone" class="form-control" type="tel" placeholder="40770888444" id="academy-phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-address" class="form-control-label">Direccion</label>
                            <div class="">
                                <input wire:model="address" class="form-control" type="text" placeholder="Address" id="academy-address">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-pool-size" class="form-control-label">Tamaño Piscina</label>
                            <div class="">
                                <input wire:model="pool_size" class="form-control" type="number" placeholder="25" id="academy-pool-size">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-logo" class="form-control-label">Logo</label>
                            @if ($logo)
                                <img src="{{asset('storage/'.$logo)}}" width="50px">
                            @endif
                            <input wire:model="logo" class="form-control" type="file" id="academy-logo">
                            @error('logo') <span class="error">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="academy-description">Descripcion</label>
                    <div class="">
                        <textarea wire:model="description" class="form-control" id="academy-description" rows="3" placeholder="Say something about yourself"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="academy-pool-size" class="form-control-label">Categorias de la academia</label>
                            <ul wire:model="academy_categories">
                                @foreach($academy_categories as $item => $value)
                                    <li>
                                        {{$value}} - <a href="#" wire:click="deleteCategory({{ $item }})">Eliminar</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="add-category" class="form-control-label">Agregar Categoria</label>
                            <select class="form-control" type="text" id="add-category" wire:model="academy_selected_category_id" wire:change="insertCategory()">
                                <option value="">-</option>
                                @foreach($categories as $item => $value)
                                    <option value="{{$item}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-md mt-4 mb-4">Guardar</button>
                    <button wire:click="closeModalPopover()" type="button" class="btn btn-default mt-4 mb-4">
                        Cerrar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
