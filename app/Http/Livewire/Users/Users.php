<?php

namespace App\Http\Livewire\Users;

use App\Models\Academy;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;


class Users extends Component
{
    use WithPagination;

    public $user_id, $name, $email, $password, $phone, $location, $about, $academies, $academy_id;
    public $isModalOpen = 0;
    public $search;
    public function render()
    {
        $perPage = env('PAGINATION_SIZE', 10);
        $users = User::where('name','like' ,'%'.$this->search.'%')->paginate($perPage);
        return view('livewire.users.users', ['users' => $users]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->academies= Academy::all()->pluck('name','id')->all();
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->user_id= null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->phone = '';
        $this->location = '';
        $this->about= '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone' => 'required',
        ]);

        User::updateOrCreate(['id' => $this->user_id], [
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'phone' => $this->phone,
            'location' =>$this->location,
            'about' =>  $this->about,
            'academies_id' => empty($this->academy_id)?null:$this->academy_id
        ]);

        session()->flash('message', $this->user_id ? 'Usuario Actualizado.' : 'Usuario Creado.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->phone = $user->phone;
        $this->location = $user->location;
        $this->about = $user->about;
        $this->academy_id = $user->academies_id;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        User::find($id)->delete();
        session()->flash('message', 'Usuario Borrado.');
    }
}
