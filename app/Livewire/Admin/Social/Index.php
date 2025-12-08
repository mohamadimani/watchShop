<?php

namespace App\Livewire\Admin\Social;

use App\Models\Social;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Index extends Component
{
    public $editRowId;
    public $title;
    public $link;
    public $icon;
    public $title_edit;
    public $link_edit;
    public $icon_edit;

    public function render()
    {
        $icons = [
            'telegram',
            'instagram',
            'whatsapp',
            'facebook',
            'github',
            'linkedin',
            'stackoverflow',
            'tiktok',
            'youtube',
            'x',
        ];
        $socials = Social::orderBy('id', 'DESC')->get();
        return view('livewire.admin.social.index', compact('icons', 'socials'));
    }

    public function setIconId($icon)
    {
        $this->icon = $icon;
    }

    public function setIconEditId($icon)
    {
        $this->icon_edit = $icon;
    }

    public function store()
    {
        $this->validate([
            'title' => 'required|string',
            'link' => 'required',
            'icon' => 'required|string|unique:socials,icon',
        ]);

        $social = Social::create([
            'title' => $this->title,
            'link' => $this->link,
            'icon' => $this->icon,
        ]);
        if ($social) {
            $this->reset();
            $this->icon = null;
            return alert($this, __('social.success'), __('social.added_successfully'), 'success');
        }
        return alert($this, __('social.error'), __('social.added_failed'), 'error');
    }

    public function update($socialId)
    {
        $this->validate([
            'title_edit' => 'required|string',
            'link_edit' => 'required',
            'icon_edit' => [
                'required',
                'string',
                Rule::unique('socials', 'icon')->ignore($socialId),
            ],

        ]);

        $social = Social::find($socialId)->update([
            'title' => $this->title_edit,
            'link' => $this->link_edit,
            'icon' => $this->icon_edit,
        ]);
        if ($social) {
            $this->reset();
            $this->icon = null;
            return alert($this, __('social.success'), __('social.added_successfully'), 'success');
        }
        return alert($this, __('social.error'), __('social.added_failed'), 'error');
    }

    public function updateStatus($id, $status)
    {
        $res = Social::find($id)->update(['is_active' => $status]);
        if ($res) {
            return alert($this, __('social.success'), __('social.status_updated_successfully'), 'success');
        }
        return alert($this, __('social.error'), __('social.status_updated_failed'), 'error');
    }

    public function delete($params)
    {
        $social = Social::find($params['id']);
        if ($social->delete()) {
            return Alert($this, __('social.success'), __('social.delete_success'), 'success');
        }
        return Alert($this, __('social.error'), __('social.delete_error'), 'error');
    }

    public function deleteConfirm($socialId)
    {
        confirmAlert($this, __('social.warning'), __('social.delete_confirm_text'), 'delete', ['id' => $socialId]);
    }

    public function edit($socialId)
    {
        $social = Social::find($socialId);
        $this->editRowId = $socialId;
        $this->title_edit = $social->title;
        $this->link_edit = $social->link;
        $this->icon_edit = $social->icon;
    }
}
