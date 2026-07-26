<?php

use Najmul\CustomToastr\Toastr;

if (! function_exists('toastr')) {
    /**
     * @return Toastr
     */
    function toastr()
    {
        return app('toastr');
    }
}
