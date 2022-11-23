<?php

namespace App\Http\Livewire\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class Categories extends Component
{
    use WithPagination;

    public $category_id, $name, $description;
    public $isModalOpen = 0;
    public $search;
    public function render()
    {
        $perPage = env('PAGINATION_SIZE', 10);
        $categories = Category::where('name','like' ,'%'.$this->search.'%')->paginate($perPage);
        return view('livewire.categories.categories', ['categories' => $categories]);
    }

    public function create()
    {
        $this->resetCreateForm();
        $this->openModalPopover();
    }
    public function openModalPopover()
    {
        $this->isModalOpen = true;
    }
    public function closeModalPopover()
    {
        $this->isModalOpen = false;
    }
    private function resetCreateForm(){
        $this->category_id= null;
        $this->name = '';
        $this->description = '';
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Category::updateOrCreate(['id' => $this->category_id], [
            'name' => $this->name,
            'description' => $this->description,
        ]);

        session()->flash('message', $this->category_id ? 'Categoria Actualizada.' : 'Categoria Creada.');
        $this->closeModalPopover();
        $this->resetCreateForm();
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $this->category_id = $id;
        $this->name = $category->name;
        $this->description = $category->description;

        $this->openModalPopover();
    }

    public function delete($id)
    {
        Category::find($id)->delete();
        session()->flash('message', 'Categoria Borrada.');
    }
}
