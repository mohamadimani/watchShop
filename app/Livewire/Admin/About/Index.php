<?php

namespace App\Livewire\Admin\About;

use App\Models\AboutUs;
use Livewire\Component;
use Livewire\WithFileUploads;

class Index extends Component
{
    public $title;
    public $summary;
    public $description;
    public $image;
    public $cv;
    public $image_name;
    public $cv_name;

    use WithFileUploads;
    public function render()
    {
        if ($about = AboutUs::first()) {
            $this->image_name = $about->image;
            $this->cv_name = $about->cv;
        }
        return view('livewire.admin.about.index');
    }

    public function mount()
    {
        if ($about = AboutUs::first()) {
            $this->title = $about->title;
            $this->summary = $about->summary;
            $this->description = $about->description;
            $this->image_name = $about->image;
            $this->cv_name = $about->cv;
        }
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'summary' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image',
            'cv' => 'nullable|file',
        ]);

        if ($about = AboutUs::first()) {
            $about->update([
                'title' => $this->title,
                'summary' => $this->summary,
                'description' => $this->description,
                'created_by' => user()->id,
            ]);
        } else {
            $newAbout = About::create([
                'title' => $this->title,
                'summary' => $this->summary,
                'description' => $this->description,
                'created_by' => user()->id,
            ]);
        }


        if ($about or $newAbout) {

            if ($this->image) {
                if ($about) {
                    deleteImage('about/image/' . $about->image);
                }
                $imageName = time() . '_image.' . $this->image->extension();
                $this->image->storeAs('about/image/', $imageName, 'publicImage');
                $about->image = $imageName;
                $about->save();
            }

            if ($this->cv) {
                if ($about) {
                    deleteImage('about/cv/' . $about->image);
                }
                $cvName = time() . '_cv.' . $this->cv->extension();
                $this->cv->storeAs('about/cv/', $cvName, 'publicImage');
                $about->cv = $cvName;
                $about->save();
            }

            return alert($this, __('about.success'), __('about.added_successfully'), 'success');
        }
        return alert($this, __('about.error'), __('about.added_failed'), 'error');
    }
}
