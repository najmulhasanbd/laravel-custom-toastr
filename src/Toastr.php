<?php

namespace Najmul\CustomToastr;

class Toastr
{
    protected function addToast($type, $message, $position, $duration)
    {
        $toasts = session()->get('custom_toastr_messages', []);
        $toasts[] = [
            'type' => $type,
            'message' => $message,
            'position' => $position,
            'duration' => $duration
        ];
        session()->flash('custom_toastr_messages', $toasts);
    }

    public function success($message, $position = null, $duration = null)
    {
        $this->addToast('Success', $message, $position, $duration);
    }

    public function error($message, $position = null, $duration = null)
    {
        $this->addToast('Error', $message, $position, $duration);
    }

    public function warning($message, $position = null, $duration = null)
    {
        $this->addToast('Warning', $message, $position, $duration);
    }

    public function info($message, $position = null, $duration = null)
    {
        $this->addToast('Info', $message, $position, $duration);
    }
}
