<div class="container-fluid py-4">
    @if (session()->has('message'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
             role="alert">
            <div class="flex">
                <div>
                    <p class="text-sm">{{ session('message') }}</p>
                </div>
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header pb-0 px-3">
            <h6 class="mb-0">Perfil Categoria</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form wire:submit.prevent="store" action="#" method="POST" role="form text-left">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category-name" class="form-control-label">Nombre Completo</label>
                            <div class="">
                                <input wire:model="name" class="form-control" type="text" placeholder="Name" id="category-name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category-description">Descripcion</label>
                    <div class="">
                        <textarea wire:model="description" class="form-control" id="category-description" rows="3" placeholder="Descripcion"></textarea>
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
