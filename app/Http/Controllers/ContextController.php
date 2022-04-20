<?php

namespace App\Http\Controllers;

use App\Services\ContextService;

use App\Http\Requests\MessageRequest;

class ContextController extends Controller
{
    private $contextService;

    public function __construct(ContextService $contextService)
    {
        $this->contextService = $contextService;
    }

    public function __invoke(MessageRequest $request)
    {
        $message = $this->contextService->parseMessage($request);

        return response()->json([
            'conversation_id' => $request->conversation_id,
            'message' => $message,
        ]);
    }
}
