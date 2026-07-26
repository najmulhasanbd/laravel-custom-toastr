<?php

namespace Najmul\CustomToastr;

class Toastr
{
    public function success($message)
    {
        session()->flash('custom_toastr.success', $message);
    }

    public function error($message)
    {
        session()->flash('custom_toastr.error', $message);
    }

    public function warning($message)
    {
        session()->flash('custom_toastr.warning', $message);
    }

    public function info($message)
    {
        session()->flash('custom_toastr.info', $message);
    }
}
