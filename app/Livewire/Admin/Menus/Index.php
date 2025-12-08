<?php

namespace App\Livewire\Admin\Menus;

use App\Models\Menu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Index extends Component
{
    public $title;
    public $link;
    public $title_edit;
    public $link_edit;
    public $editRowId;

    public function render()
    {
        $menus = Menu::all();
        return view('livewire.admin.menus.index', compact('menus'));
    }

    public function menuStore()
    {
        $this->validate([
            'title' => 'required|string',
            'link' => 'required|string',
        ]);

        $res = Menu::create([
            'title' => $this->title,
            'link' => $this->link,
            'created_by' => user()->id,
        ]);
        if ($res) {
            $this->title = '';
            $this->link = '';
            return alert($this, __('menu.success'), __('menu.menu_success'), 'success');
        }
        return alert($this, __('menu.error'), __('menu.menu_error'), 'success');
    }

    public function editMenu($id)
    {
        $this->editRowId = $id;
        $menu =  Menu::find($id);
        $this->title_edit = $menu->title;
        $this->link_edit = $menu->link;
    }

    public function updateMenu()
    {
        $menu =  Menu::find($this->editRowId);
        $menu->title = $this->title_edit;
        $menu->link = $this->link_edit;
        $menu->updated_by = user()->id;
        if ($menu->save()) {
            $this->editRowId = null;
            $this->title_edit = null;
            $this->link_edit = null;

            return Alert($this, __('menu.success'), __('menu.update_success'), 'success');
        }
        return Alert($this, __('menu.error'), __('menu.update_error'), 'error');
    }

    public function updateStatus($id, $status)
    {
        $menu = Menu::find($id);
        $menu->is_active = $status;
        if ($menu->save()) {
            return Alert($this, __('menu.success'), __('menu.status_success', ['status' => ($status == 1 ? __('menu.status_active') : __('menu.status_inactive'))]), 'success');
        }
        return Alert($this, __('menu.error'), __('menu.status_error'), 'error');
    }

    public function deleteMenu($params)
    {
        $menu = Menu::find($params['id']);
        if ($menu->delete()) {
            return Alert($this, __('menu.success'), __('menu.delete_success'), 'success');
        }
        return Alert($this, __('menu.error'), __('menu.delete_error'), 'error');
    }

    public function deleteConfirm($menuId)
    {
        confirmAlert($this, __('menu.warning'), __('menu.delete_confirm_text'), 'deleteMenu', ['id' => $menuId]);
    }
}
