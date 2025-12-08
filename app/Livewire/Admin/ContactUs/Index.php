<?php

namespace App\Livewire\Admin\ContactUs;

use App\Models\ContactUs;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public function render()
    {
        $contacts = ContactUs::orderBy('id', 'DESC')->paginate(30);
        return view('livewire.admin.contact-us.index', compact('contacts'));
    }

    public function readContact($contactId)
    {
        $contact = ContactUs::find($contactId);
        $contact->read_by = user()->id;
        $contact->is_read = true;
        if ($contact->save()) {
            return Alert($this, __('contact.success'), __('contact.message_saved_success'), 'success');
        }
        return Alert($this, __('contact.error'), __('contact.message_not_saved'), 'success');
    }


    public function deleteContact($params)
    {
        $contact = ContactUs::find($params['id']);
        if ($contact->delete()) {
            return Alert($this, __('contact.success'), __('contact.delete_success'), 'success');
        }
        return Alert($this, __('contact.error'), __('contact.delete_error'), 'error');
    }

    public function deleteConfirm($contactId)
    {
        confirmAlert($this, __('contact.warning'), __('contact.delete_confirm_text'), 'deleteContact', ['id' => $contactId]);
    }
}
