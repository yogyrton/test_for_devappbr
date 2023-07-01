<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
{

    public function store(StoreMessageRequest $request)
    {
        $data = $request->validated();
        $userId = auth()->id();

        $message = Message::query()
            ->where('product_id', $data['product_id'])
            ->where('user_id', $userId)
            ->first();

        if ($message) {
            return back()->with('error', 'Вы уже оставляли сообщение');
        }

        Message::query()->create([
            'message' => $data['message'],
            'product_id' => $data['product_id'],
            'user_id' => $userId,
        ]);

        return back()->with('success', 'Сообщение добавлено');
    }
}
