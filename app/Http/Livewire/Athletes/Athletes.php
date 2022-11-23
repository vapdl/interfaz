<?php

namespace App\Http\Livewire\Athletes;

use App\Models\Academy;
use App\Models\Athlete;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;


class Athletes extends Component
{
    use WithPagination;

    public $athlete_id, $name, $date_of_birth, $blood_type, $gender, $photo, $alias ,$users, $users_id, $academies, $academies_id;
    public $isModalOpen = 0;
    public $search;
    public function render()
    {
        $perPage = env('PAGINATION_SIZE', 10);
        $athletes = Athlete::where('name','like' ,'%'.$this->search.'%')->paginate($perPage);
        return view('livewire.atheletes.athletes', ['athletes' => $athletes]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }

    public function openModalPopover()
    {
        $this->isModalOpen = true;
        $this->academies = Academy::all()->pluck('name','id')->all();
        $this->users= User::all()->pluck('name','id')->all();
    }

    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }

    private function resetCreateForm(){
        $this->athlete_id = null;
        $this->name = '';
        $this->date_of_birth = '';
        $this->blood_type = '';
        $this->gender = '';
        $this->photo = '';
        $this->alias = '';
        $this->users_id = null;
        $this->academies_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'date_of_birth' => 'required',
            'blood_type' => 'required',
            'gender' => 'required',
            'users_id' => 'required'
        ]);

        Athlete::updateOrCreate(['id' => $this->athlete_id], [
            'name' => $this->name,
            'date_of_birth' => $this->date_of_birth,
            'blood_type' => $this->blood_type,
            'gender' => $this->gender,
            'photo' => $this->photo,
            'alias' => $this->alias,
            'users_id' => $this->users_id,
            'academies_id' => $this->academies_id
        ]);

        session()->flash('message', $this->athlete_id ? 'Atleta actualizado.' : 'Atleta creado.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $athlete = Athlete::findOrFail($id);

        $this->athlete_id = $id;
        $this->name = $athlete->name;
        $this->date_of_birth = $athlete->date_of_birth;
        $this->blood_type = $athlete->blood_type;
        $this->gender = $athlete->gender;
        $this->photo = $athlete->photo;
        $this->alias = $athlete->alias;
        $this->users_id = $athlete->users_id;
        $this->academies_id = $athlete->academies_id;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Athlete::find($id)->delete();
        session()->flash('message', 'Atleta Borrado.');
    }
}
