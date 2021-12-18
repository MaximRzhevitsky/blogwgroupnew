<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Message\StoreMessage;
use Illuminate\Support\Facades\Auth;
use App\Http\Services\MessageService;
use Illuminate\View\View;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->messageService = new MessageService();
    }

    private MessageService $messageService;


    /**
     * Create message.
     * @param int
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function create($id)
    {
        $sender_id = $this->getUserId();
        $author_id=$id;

        return view('pages.message', ['author_id'=>$author_id, 'sender_id'=>$sender_id]);
    }


    /**
     * Store message.
     * @param Mixed
     * @return RedirectResponse
     */
    public function store(StoreMessage $request): RedirectResponse
    {
        $params = $request->except(['_token']);
        $this->messageService->createMessage($params);
        return redirect()->route('posts');

    }


    /**
     * Toggle messages to reading.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function read()
    {
        $author_id = $this->getUserId();
        $messages=$this->messageService->getMessages($author_id);
        return view('pages.readmessage', ['messages' => $messages,'author_id'=>$author_id,]);
    }


    /**
     * Get user-id.
     *@return int
     */
    public function getUserId(): int
    {
        $user= Auth::user();
        return $user['id'];
    }

}
