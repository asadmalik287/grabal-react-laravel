<?php

namespace App\Http\Helpers;

class Helper
{
    public function displayAlert()
    {
        if (Session::has('message')) {
            list($type, $message) = explode('|', Session::get('message'));

            $type = $type == 'error' ?: 'danger';
            $type = $type == 'message' ?: 'info';

            return sprintf('<div class="alert alert-%s">%s</div>', $type, $message);
        }

        return '';
    }
}
