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
            <h6 class="mb-0">Perfil Atleta</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form wire:submit.prevent="store" action="#" method="POST" role="form text-left">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-name" class="form-control-label">Nombre</label>
                            <div class="">
                                <input wire:model="name" class="form-control" type="text" placeholder="" id="athletes-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-alias" class="form-control-label">Alias</label>
                            <div class="">
                                <input wire:model="alias" class="form-control" type="text" placeholder="" id="athletes-alias">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-dob" class="form-control-label">Fecha Nacimiento</label>
                            <div class="">
                                <input wire:model="date_of_birth" class="form-control" type="text" placeholder="" id="athletes-dob">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-gender" class="form-control-label">Genero</label>
                            <div class="">
                                <input wire:model="gender" class="form-control" type="text" placeholder="" id="athletes-gender">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-bt" class="form-control-label">Grupo Sanguineo</label>
                            <div class="">
                                <input wire:model="blood_type" class="form-control" type="text" placeholder="" id="athletes-bt">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-photo" class="form-control-label">Foto</label>
                            <div class="">
                                <input wire:model="photo" class="form-control" type="text" placeholder="" id="athletes-photo">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-bt" class="form-control-label">Usuario</label>
                            <div class="">
                                <input wire:model="blood_type" class="form-control" type="text" placeholder="" id="athletes-bt">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="athletes-photo" class="form-control-label">Academia</label>
                            <div class="">
                                <input wire:model="photo" class="form-control" type="text" placeholder="" id="athletes-photo">
                            </div>
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
