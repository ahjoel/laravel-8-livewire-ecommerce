<?php

namespace App\Http\Livewire\Admin;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Category;

class AdminAddCategoryComponent extends Component
{
    public $name;
    public $slug;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        // dd($this->name);
        $category = new Category();
        $category->name = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Category has been created successfully!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base');
    }
}
