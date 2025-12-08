<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;

class Index extends Component
{
    public $editRowId;
    public $title;
    public $description;

    public function render()
    {
        $services = Service::orderBy('id', 'DESC')->get();
        return view('livewire.admin.services.index', compact('services'));
    }

    public function storeService()
    {
        $this->validate([
            'title' => 'string|nullable',
            'description' => 'string|min:10|max:1000',
        ]);
        $res = Service::create([
            'title' => $this->title,
            'description' => $this->description,
            'created_by' => user()->id,
        ]);
        if ($res) {
            $this->reset();
            return alert($this, __('service.success'), __('service.service_added_successfully'), 'success');
        }
        return alert($this, 'error', __('service.service_added_failed'), 'error');
    }

    public function deleteConfirm($serviceId)
    {
        confirmAlert($this, __('service.warning'), __('service.delete_confirm_text'), 'deleteService', ['id' => $serviceId]);
    }

    public function deleteService($params)
    {
        $service = Service::find($params['id']);
        if ($service->delete()) {
            return Alert($this, __('service.success'), __('service.delete_success'), 'success');
        }
        return Alert($this, __('service.error'), __('service.delete_error'), 'error');
    }

    public function updateStatus($id, $status)
    {
        $res = Service::find($id)->update(['is_active' => $status]);
        if ($res) {
            return alert($this, __('service.success'), __('service.status_updated_successfully'), 'success');
        }
        return alert($this, __('service.error'), __('service.status_updated_failed'), 'error');
    }

    public function editService($id)
    {
        $service = Service::find($id);
        $this->editRowId = $service->id;
        $this->title = $service->title;
        $this->description = $service->description;
    }

    public function updateService()
    {
        $this->validate([
            'title' => 'string|nullable',
            'description' => 'string|min:10|max:1000',
        ]);

        $service = Service::find($this->editRowId);
        $res = $service->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);
        if ($res) {
            $this->reset();
            return alert($this, __('service.success'), __('service.service_updated_successfully'), 'success');
        }
        return alert($this, __('service.error'), __('service.service_updated_failed'), 'error');
    }

    public function updateServiceCancel()
    {
        $this->reset();
    }
}
