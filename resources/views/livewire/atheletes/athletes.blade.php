<main class="main-content">
    <div class="container-fluid py-4">
        <div class="row">
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
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4 d-flex justify-content-end" id="navbar">
                    <div class="nav-item d-flex align-self-end">
                        <a wire:click="create()" class="btn btn-secondary active mb-0 text-white" role="button" aria-pressed="true">
                            Crear Atleta
                        </a>
                    </div>
                    <div class="ms-md-3 pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                            <input wire:model="search" type="text" class="form-control" placeholder="Filtrar por Nombre...">
                        </div>
                    </div>
                </div>
                @if($isModalOpen)
                    @include('livewire.atheletes.athletes-form')
                @endif
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Tabla Atletas</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Fecha de Nacimiento</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Genero</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($athletes as $athlete)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$athlete->name}}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{$athlete->alias}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="text-secondary text-xs font-weight-bold">{{$athlete->date_of_birth}}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-secondary text-xs font-weight-bold">{{$athlete->gender}}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                @if(is_null($athlete->photo))
                                                    <span class="text-secondary text-xs font-weight-bold">-</span>
                                                @else
                                                    <img src="{{asset('storage/'.$athlete->photo)}}" width="75px">
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <button wire:click="edit({{ $athlete->id }})"
                                                        class="btn btn-default btn-md mt-4 mb-4">Editar</button>
                                                <button wire:click="delete({{ $athlete->id }})"
                                                        class="btn btn-danger btn-md mt-4 mb-4">Borrar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $athletes->links() }}
            </div>
        </div>
    </div>
</main>
