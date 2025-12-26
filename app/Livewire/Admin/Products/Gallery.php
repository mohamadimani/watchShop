<?php

namespace App\Livewire\Admin\Products;

use App\Models\ProductGallery;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{

    public $product;
    public $gallery;
    use WithPagination;

    protected $listeners = ['delete'];

    public function render()
    {
        return view('livewire.admin.products.gallery');
    }

    public function updateStatus(ProductGallery $gallery, $status)
    {
        $gallery->is_active = $status;
        if ($gallery->save()) {
            return Alert($this, 'موفق', 'وضعیت بروزرسانی شد', 'success');;
        }

        return Alert($this, 'خطا', 'وضعیت بروزرسانی نشد', 'error');;
    }

    public function updatePosition(ProductGallery $gallery, $status)
    {
        $productGallery = ProductGallery::where('product_id', $gallery->product_id)->update([
            'position' => 0
        ]);

        $gallery->position = 1;
        if ($gallery->save()) {
            return Alert($this, 'موفق', 'وضعیت بروزرسانی شد', 'success');
        }
        return Alert($this, 'خطا', 'مشکل در انجام', 'error');
    }


    public function deleteGallery(ProductGallery $gallery)
    {
        $this->gallery = $gallery;
        confirmAlert($this, 'اخطار!', 'برای حذف مطمئن هستید؟', 'delete', ['id' => $gallery->id]);

    }

    public function delete()
    {
        // $this->gallery->deleted_by = user()->id;
        // $this->gallery->save();

        if($this->gallery->position == 1){
            return Alert($this, 'خطا', 'تصویر شاخص را نمیتوان حذف کرد!', 'error');
        }

        DeleteImage('products/gallery/' . $this->gallery->image);
        if ($this->gallery->delete()) {
            return Alert($this, 'موفق', 'حذف شد', 'success');
        }
        return Alert($this, 'خطا', 'مشکل در حذف', 'error');
    }
}
