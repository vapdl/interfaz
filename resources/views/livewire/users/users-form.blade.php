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
            <h6 class="mb-0">Perfil Usuario</h6>
        </div>
        <div class="card-body pt-4 p-3">
            <form wire:submit.prevent="store" action="#" method="POST" role="form text-left">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-name" class="form-control-label">Nombre Completo</label>
                            <div class="">
                                <input wire:model="name" class="form-control" type="text" placeholder="Name" id="user-name">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-email" class="form-control-label">Email</label>
                            <div class="">
                                <input wire:model="email" class="form-control" type="email" placeholder="@example.com" id="user-email">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-phone" class="form-control-label">Telefono</label>
                            <div class="">
                                <input wire:model="phone" class="form-control" type="tel" placeholder="40770888444" id="user-phone">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-location" class="form-control-label">Ubicacion</label>
                            <div class="">
                                <input wire:model="location" class="form-control" type="text" placeholder="Location" id="user-location">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-password" class="form-control-label">Clave</label>
                            <div class="">
                                <input wire:model="password" class="form-control" type="password" placeholder="40770888444" id="user-password">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="user-academy" class="form-control-label">Academia</label>
                            <select wire:model="academy_id" class="form-control" type="text" id="user-academy">
                                <option value="">-</option>
                                @foreach($academies as $item => $value)
                                    <option value="{{$item}}">{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="user-about">Sobre este usuario</label>
                    <div class="">
                        <textarea wire:model="about" class="form-control" id="user-about" rows="3" placeholder="Say something about yourself"></textarea>
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
