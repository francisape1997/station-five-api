<?php

namespace App\Services;

use App\Models\Context;

class ContextService
{
    public function parseMessage($request)
    {
        $message = addslashes($request->message);

        $context = Context::whereRaw("'{$message}' LIKE CONCAT('%', name, '%')")->first();

        if (!isset($context)) {
            abort(422, "Sorry, I don't understand.");
        }

        return $context->message->name;
    }
}
