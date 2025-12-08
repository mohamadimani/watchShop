<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\Portfolio;
use App\Models\PortfolioFeedback;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Index extends Component
{

    public $editRowId;
    public $title_en;
    public $title_fa;
    public $description_en;
    public $description_fa;
    public $link;
    public $image;
    public $done_date;
    public $used_skills;
    public $skills = [];

    public $customer_name;
    public $feedback;

    use WithFileUploads;
    public function render()
    {
        $portfolio = Portfolio::orderBy('id', 'DESC')->get();
        $skillsList = skillsIcon();
        return view('livewire.admin.portfolio.index', compact('portfolio', 'skillsList'));
    }

    public function store()
    {
        $this->validate([
            'title_en' => 'string|nullable',
            'title_fa' => 'string|nullable',
            'description_en' => 'string|min:10|max:1000',
            'description_fa' => 'string|min:10|max:1000',
            'link' => 'string|nullable',
            'done_date' => 'string|nullable',
            'image' => 'image',
            'skills' => 'array|nullable',
        ]);

        $skills = join(', ', $this->skills);
        $portfolio = Portfolio::create([
            'title_en' => $this->title_en,
            'title_fa' => $this->title_fa,
            'description_en' => $this->description_en,
            'description_fa' => $this->description_fa,
            'link' => $this->link,
            'done_date' => $this->done_date,
            'skills' => $skills,
            'created_by' => user()->id,
        ]);
        if ($portfolio) {
            if ($this->image) {
                $imageName = time() . '.' . $this->image->extension();
                $this->image->storeAs('portfolio/' . $portfolio->id . '/', $imageName, 'publicImage');
                $portfolio->image = $imageName;
                $portfolio->save();
            }

            $this->reset();
            $this->skills = [];

            return alert($this, __('portfolio.success'), __('portfolio.added_successfully'), 'success');
        }
        return alert($this, __('portfolio.error'), __('portfolio.added_failed'), 'error');
    }

    public function setUsedSkills($skill)
    {
        $this->skills = $skill;
    }

    public function updateStatus($id, $status)
    {
        $res = Portfolio::find($id)->update(['is_active' => $status]);
        if ($res) {
            return alert($this, __('portfolio.success'), __('portfolio.status_updated_successfully'), 'success');
        }
        return alert($this, __('portfolio.error'), __('portfolio.status_updated_failed'), 'error');
    }

    public function deleteConfirm($portfolioId)
    {
        confirmAlert($this, __('portfolio.warning'), __('portfolio.delete_confirm_text'), 'delete', ['id' => $portfolioId]);
    }

    public function delete($params)
    {
        $portfolio = Portfolio::find($params['id']);
        $portfolio->deleted_by = user()->id;
        $portfolio->save();
        if ($portfolio->delete()) {
            return Alert($this, __('portfolio.success'), __('portfolio.delete_success'), 'success');
        }
        return Alert($this, __('portfolio.error'), __('portfolio.delete_error'), 'error');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::find($id);
        $skills = $portfolio->skills;

        $this->editRowId = $portfolio->id;
        $this->title_fa = $portfolio->title_fa;
        $this->title_en = $portfolio->title_en;
        $this->description_fa = $portfolio->description_fa;
        $this->description_en = $portfolio->description_en;
        $this->link = $portfolio->link;
        $this->done_date = $portfolio->done_date;
        $this->image = $portfolio->image;
        $this->skills = explode(',', $skills);
    }

    public function update()
    {
        $this->validate([
            'title_en' => 'nullable|string',
            'title_fa' => 'nullable|string',
            'description_en' => 'string|min:10|max:1000',
            'description_fa' => 'string|min:10|max:1000',
            'link' => 'nullable|string',
            'done_date' => 'nullable|string',
            'image' => 'nullable',
            'skills' => 'nullable|array',
        ]);

        $skills = join(', ', $this->skills);
        $portfolio = Portfolio::find($this->editRowId);
        $res = $portfolio->update([
            'title_en' => $this->title_en,
            'title_fa' => $this->title_fa,
            'description_en' => $this->description_en,
            'description_fa' => $this->description_fa,
            'link' => $this->link,
            'done_date' => $this->done_date,
            'skills' => $skills,
        ]);
        if ($res) {
            if ($this->image instanceof TemporaryUploadedFile) {
                $oldImage = $portfolio->image;
                $imageName = time() . '.' . $this->image->extension();
                $this->image->storeAs('portfolio/' . $portfolio->id . '/', $imageName, 'publicImage');
                $portfolio->image = $imageName;
                $portfolio->save();

                deleteImage('portfolio/' . $portfolio->id . '/' . $oldImage);
            }

            $this->reset();
            return alert($this, __('portfolio.success'), __('portfolio.updated_successfully'), 'success');
        }
        return alert($this, __('portfolio.error'), __('portfolio.updated_failed'), 'error');
    }

    public function editCancel()
    {
        $this->reset();
    }

    public function saveFeedback($portfolioId)
    {
        if (!$this->customer_name) {
            return alert($this, __('portfolio.error'), __('portfolio.customer_name_is_required'), 'error');
        }
        if (!$this->feedback) {
            return alert($this, __('portfolio.error'), __('portfolio.feedback_is_required'), 'error');
        }

        $portfolioFeedback = PortfolioFeedback::create([
            'portfolio_id' => $portfolioId,
            'customer_name' => $this->customer_name,
            'feedback' => $this->feedback,
        ]);

        if ($portfolioFeedback) {
            $this->reset();
            return alert($this, __('portfolio.success'), __('portfolio.added_successfully'), 'success');
        }
        return alert($this, __('portfolio.error'), __('portfolio.added_failed'), 'error');
    }
}
