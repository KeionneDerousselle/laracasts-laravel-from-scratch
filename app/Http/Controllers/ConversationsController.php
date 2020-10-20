<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;

class ConversationsController extends Controller
{
    public function index()
    {
        return view('conversations.index', [
            'conversations' => Conversation::all()
        ]);
    }

    public function show(Conversation $conversation)
    {
        return view('conversations.show', [
            'conversation' => $conversation
        ]);
    }

    public function update(Conversation $conversation)
    {
        $this->validateReply();
        $this->authorize('update', $conversation);

        $conversation->best_reply_id = request('replyId');
        $conversation->save();

        return redirect(route('conversations.show', $conversation));
    }

    protected function validateReply()
    {
        return request()->validate([
            'replyId' => 'exists:replies,id',
        ]);
    }
}
