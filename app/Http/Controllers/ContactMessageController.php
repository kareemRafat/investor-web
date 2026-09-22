<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactMessage;
use Illuminate\Http\JsonResponse;

class ContactMessageController extends Controller
{
    public function store(StoreContactMessageRequest $request): JsonResponse
    {
        // Honeypot: bots fill the hidden "website" field. Pretend success
        // without storing anything so bots learn nothing.
        if ($request->filled('website')) {
            return response()->json([
                'message' => __('pages.contact.success'),
            ], 201);
        }

        ContactMessage::create($request->safe()->only([
            'name',
            'email',
            'phone',
            'subject',
            'message',
        ]));

        return response()->json([
            'message' => __('pages.contact.success'),
        ], 201);
    }
}
