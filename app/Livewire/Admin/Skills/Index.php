<?php

namespace App\Livewire\Admin\Skills;

use App\Models\Skill;
use Livewire\Component;

class Index extends Component
{
    public $title_en;
    public $title_fa;
    public $description_en;
    public $description_fa;
    public $percentage;
    public $icon;
    // edit
    public $editRowId;

    public function render()
    {
        $icons = skillsIcon();
        $skills = Skill::orderBy('id', 'DESC')->get();
        return view('livewire.admin.skills.index', compact('skills', 'icons'));
    }

    public function skillStore()
    {
        $this->validate([
            'title_en' => 'string|nullable',
            'title_fa' => 'string|nullable',
            'description_en' => 'string|min:10|max:255',
            'description_fa' => 'string|min:10|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'icon' => 'required|string',
        ]);
        $res = Skill::create([
            'title_en' => $this->title_en,
            'title_fa' => $this->title_fa,
            'description_en' => $this->description_en,
            'description_fa' => $this->description_fa,
            'percentage' => $this->percentage,
            'icon' => $this->icon,
            'created_by' => user()->id,
        ]);
        if ($res) {
            $this->reset();
            return alert($this, __('public.success'), __('public.successfully_saved'), 'success');
        }
        return alert($this, __('public.error'), __('public.save_failed'), 'error');
    }

    public function skillَUpdate()
    {
        $this->validate([
            'title_en' => 'string|nullable',
            'title_fa' => 'string|nullable',
            'description_en' => 'string|min:10|max:255',
            'description_fa' => 'string|min:10|max:255',
            'percentage' => 'required|integer|min:0|max:100',
            'icon' => 'required|string',
        ]);
        $skill = Skill::find($this->editRowId);
        $res = $skill->update([
            'title_en' => $this->title_en,
            'title_fa' => $this->title_fa,
            'description_en' => $this->description_en,
            'description_fa' => $this->description_fa,
            'percentage' => $this->percentage,
            'icon' => $this->icon,
        ]);
        if ($res) {
            $this->reset();
            return alert($this, 'success', __('public.successfully_updated'), 'success');
        }
        return alert($this, 'error', __('public.update_failed'), 'error');
    }

    public function setIconId($iconId)
    {
        $this->icon = $iconId;
    }

    public function updateStatus($id, $status)
    {
        $res = Skill::find($id)->update(['is_active' => $status]);
        if ($res) {
            return alert($this, __('skill.success'), __('skill.status_updated_successfully'), 'success');
        }
        return alert($this, __('skill.error'), __('skill.status_updated_failed'), 'error');
    }

    public function editSkill($id)
    {
        $skill = Skill::find($id);
        $this->editRowId = $skill->id;
        $this->title_fa = $skill->title_fa;
        $this->title_en = $skill->title_en;
        $this->description_fa = $skill->description_fa;
        $this->description_en = $skill->description_en;
        $this->percentage = $skill->percentage;
        $this->icon = $skill->icon;
    }

    public function skillَUpdateCancel()
    {
        $this->reset();
    }

    public function deleteConfirm($skillId)
    {
        confirmAlert($this, __('skill.warning'), __('skill.delete_confirm_text'), 'deleteSkill', ['id' => $skillId]);
    }

    public function deleteSkill($params)
    {
        $skill = Skill::find($params['id']);
        if ($skill->delete()) {
            return Alert($this, __('skill.success'), __('skill.delete_success'), 'success');
        }
        return Alert($this, __('skill.error'), __('skill.delete_error'), 'error');
    }
}
