<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    public $editCategoryId;
    public $search;
    public $title;
    public $category;
    public $showSubCategoriesId;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];

    public function render()
    {
        $categories = Category::query();
        if (mb_strlen($this->search) > 1) {
            $categories = $categories->where('title', 'LIKE', "%$this->search%");
        }
        $categories = $categories->orderBy('id', 'DESC')->paginate(30);
        return view('livewire.admin.categories.index', compact('categories'));
    }

    public function updatededitCategoryId()
    {
        $this->setCategoryModel($this->editCategoryId);
        $this->title = $this->category->title;
    }

    public function updatedshowSubCategoriesId()
    {
        $this->setCategoryModel($this->showSubCategoriesId);
    }

    public function setCategoryModel($categoryId)
    {
        $this->category = Category::where('id', $categoryId)->first();
    }

    public function updateCategory()
    {
        $this->category->title = $this->title;
        if ($this->category->save()) {
            $this->title = null;
            $this->editCategoryId = null;
            return Alert($this, 'موفق', 'با موفقیت ویرایش شد', 'success');
        }
    }

    public function deleteCategory(Category $category)
    {
        confirmAlert($this, 'اخطار!', 'برای حذف مطمئن هستید؟', 'delete', ['id' => $category->id]);
        $this->category = $category;
    }

    public function delete()
    {
        if ($this->categoryHasProducts()) {
            return Alert($this, 'خطا', 'دسته بندی های دارای محصول را نمیتوان حذف کرد', 'error');

        }
        if ($this->category->delete()) {
            return Alert($this, 'موفق', 'حذف شد', 'success');
        }
        return Alert($this, 'خطا', 'مشکل در حذف', 'error');


    }

    public function updateStatus($categoryId, $status)
    {
        $category = Category::where('id', $categoryId)->first();
        $category->is_active = $status;
        if ($category->save()) {
            return Alert($this, 'موفق', 'با موفقیت ویرایش شد', 'success');
        }
    }

    public function categoryHasProducts()
    {
        if (Product::where('category_id', $this->category->id)->first()) {
            return true;
        }
        return false;
    }
}
