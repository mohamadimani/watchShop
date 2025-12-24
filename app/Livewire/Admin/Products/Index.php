<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    public $search;
    public $name;
    public $product;

    use WithPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete'];

    public function render()
    {
        $products = Product::query();
        if (mb_strlen($this->search) > 1) {
            $products = $products->where('title', 'LIKE', "%$this->search%");
        }
        $products = $products->orderBy('id', 'DESC')->with('category', 'brand', 'colors')->paginate(2);
        return view('livewire.admin.products.index', compact('products'));
    }

    public function changeIsActive(Product $product, $status = false)
    {
        $product->is_active = $status;
        $product->save();
    }

    public function deleteProduct(Product $product)
    {
        $this->confirm('برای حذف مطمئن هستید؟', [
            'onConfirmed' => 'delete',
        ]);

        $this->product = $product;
    }

    public function delete()
    {
        return Alert($this, __('menu.error'), __('menu.status_error'), 'error');

        $this->product->deleted_by = auth()->user()->id;
        $this->product->save();
        if ($this->product->delete()) {
            $this->alert('success', 'با موفقیت حذف شد');
        } else {
            $this->alert('error', 'مشکل در حذف');
        }
    }
}
