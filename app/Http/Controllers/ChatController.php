<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function showChat($category)
    {
        $messages = Message::where('category', $category)->orderBy('created_at', 'asc')->get();
        return view('publicChat', [
            'category' => $category,
            'messages' => $messages,
            'title' => "Public Chat: $category",
            'active' => 'categories'
        ]);
    }

    public function sendMessage(Request $request, $category)
    {
        $message = $request->input('message');
        $user = $request->input('user');
        $newMessage =([
            'user' => $user,
            'message' => $message,
            'category' => $category,
        ]);
        event(new MessageSent($user, $message, $category));
        Message::create($newMessage);
        return response()->json(['status' => $message]);
    }
    public function deleteMessages($category)
    {
        Message::where('category', $category)->delete();
        return redirect('/chat/' . $category);
    }
}
