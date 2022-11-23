<?php

namespace App\Http\Livewire\Academies;

use App\Models\Academy;
use App\Models\Category;
use Exception;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;


class Academies extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name, $description, $phone, $email, $logo, $address, $pool_size, $academy_id, $categories, $academy_categories, $academy_selected_category_id;
    public $isModalOpen = 0;
    public $search;
    public function render()
    {
        $perPage = env('PAGINATION_SIZE', 10);
        $academies = Academy::where('name','like' ,'%'.$this->search.'%')->paginate($perPage);
        return view('livewire.academies.academies', ['academies' => $academies]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->categories= Category::all()->pluck('name','id')->all();
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->academy_id = null;
        $this->name = '';
        $this->description = '';
        $this->phone = '';
        $this->email = '';
        $this->logo = '';
        $this->address= '';
        $this->pool_size=25;
        $this->academy_categories = [];
        $this->academy_selected_category_id='';
    }

    public function store()
    {
        if($this->logo instanceof TemporaryUploadedFile)
        {
            $this->validate([
                'name' => 'required',
                'pool_size' => 'required',
                'logo' => 'image|max:1024'
            ]);
            $logo = $this->logo->storeAs('logo', str_replace(' ', '', $this->name).".".explode('/', $this->logo->getMimeType())[1], 'public');
        }else{
            $this->validate([
                'name' => 'required',
                'pool_size' => 'required'
            ]);
            $logo= $this->logo;
        }
        Academy::updateOrCreate(['id' => $this->academy_id], [
            'name' => $this->name,
            'description' => $this->description,
            'phone' => $this->phone,
            'email' => $this->email,
            'logo' => $logo,
            'address' =>  $this->address,
            'pool_size' => $this->pool_size
        ]);

        session()->flash('message', $this->academy_id ? 'Academia Actualizada.' : 'Academia Creada.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $academy = Academy::findOrFail($id);

        $this->academy_id = $id;
        $this->name = $academy->name;
        $this->description = $academy->description;
        $this->phone= $academy->phone;
        $this->email = $academy->email;
        $this->logo = $academy->logo;
        $this->address= $academy->address;
        $this->pool_size= $academy->pool_size;
        $this->academy_categories = $academy->categories->pluck('name','id')->all();
        $this->academy_selected_category_id='';
        $this->openModalPopover();
    }

    public function delete($id)
    {
        Academy::find($id)->delete();
        session()->flash('message', 'Academia Borrada.');
    }

    public function insertCategory()
    {
        $academy= Academy::find($this->academy_id);
        try{
            $academy->categories()->attach($this->academy_selected_category_id);
            $this->academy_categories = $academy->categories->pluck('name','id')->all();
            $this->academy_selected_category_id='';
            session()->flash('message', 'Categoria Insertada con Exito');
        }catch (Exception $exception)
        {
            session()->flash('message', 'Categoria ya Pertenece a la Academia.');
        }

    }

    public function deleteCategory($categoryId)
    {
        if($categoryId != "")
        {
            $academy= Academy::find($this->academy_id);
            try {
                $academy->categories()->detach($categoryId);
                $this->academy_categories = $academy->categories->pluck('name','id')->all();
                $this->academy_selected_category_id='';
                session()->flash('message', 'Categoria Borrada con Exito');
            }catch(Exception $exception){
                session()->flash('message', 'Categoria no se puede Borrar');
            }

        }
    }
}
