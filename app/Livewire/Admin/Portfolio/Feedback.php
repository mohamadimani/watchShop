<?php

namespace App\Livewire\Admin\Portfolio;

use App\Models\PortfolioFeedback;
use Livewire\Component;

class Feedback extends Component
{
    public $portfolio;

    public function render()
    {
        $feedbacks = PortfolioFeedback::where('portfolio_id', $this->portfolio->id)->orderBy('id', 'DESC')->get();
        return view('livewire.admin.portfolio.feedback', compact('feedbacks'));
    }

    public function updateStatus($id, $status)
    {
        $feedbacks = PortfolioFeedback::find($id);
        $feedbacks->is_active = $status;
        if ($feedbacks->save()) {
            return Alert($this, __('menu.success'), __('menu.status_success', ['status' => ($status == 1 ? __('menu.status_active') : __('menu.status_inactive'))]), 'success');
        }
        return Alert($this, __('menu.error'), __('menu.status_error'), 'error');
    }

    public function deleteConfirm($feedbackId)
    {
        confirmAlert($this, __('portfolio.warning'), __('portfolio.delete_confirm_text'), 'delete', ['id' => $feedbackId]);
    }

    public function delete($params)
    {
        $feedback = PortfolioFeedback::find($params['id']);
        if ($feedback->delete()) {
            return Alert($this, __('portfolio.success'), __('portfolio.delete_success'), 'success');
        }
        return Alert($this, __('portfolio.error'), __('portfolio.delete_error'), 'error');
    }
}
