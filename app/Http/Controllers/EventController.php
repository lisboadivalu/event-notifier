<?php

namespace App\Http\Controllers;

use App\Events\NotificationEvent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function sendNotification(Request $request): JsonResponse
    {
        $data = [
            'author' => $request->author,
            'description' => $request->description,
        ];

        event(new NotificationEvent($data));

        return response()->json([
            'message' => 'notification was sent'
        ], 202);
    }
}
