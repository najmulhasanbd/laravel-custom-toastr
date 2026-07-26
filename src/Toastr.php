<?php

namespace Najmul\CustomToastr;

class Toastr
{
    protected function addToast($type, $message, $title, $position, $duration)
    {
        $toasts = session()->get('custom_toastr_messages', []);
        $toasts[] = [
            'type' => $type,
            'title' => $title,
            'message' => $message,
            'position' => $position,
            'duration' => $duration
        ];
        session()->flash('custom_toastr_messages', $toasts);
    }

    public function success($message, $title = null, $position = null, $duration = null)
    {
        $this->addToast('Success', $message, $title, $position, $duration);
    }

    public function error($message, $title = null, $position = null, $duration = null)
    {
        $this->addToast('Error', $message, $title, $position, $duration);
    }

    public function warning($message, $title = null, $position = null, $duration = null)
    {
        $this->addToast('Warning', $message, $title, $position, $duration);
    }

    public function info($message, $title = null, $position = null, $duration = null)
    {
        $this->addToast('Info', $message, $title, $position, $duration);
    }
}
