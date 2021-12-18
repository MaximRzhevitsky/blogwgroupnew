<?php

namespace App\Http\Services;

use App\Models\Message;
use Illuminate\Support\Collection;

class MessageService
{
    function __construct()
    {
        $this->messageModel = new Message();
    }


    public function getContacts($id): array
    {
        return $this->messageModel->getContacts($id);
    }


    public function count_unread($id): int
    {
        return $this->messageModel->getCountUnread($id);
    }


    public function createMessage($params): bool
    {
        return $this->messageModel->createMessage($params);
    }


    public function getMessages($author_id): Collection
    {
        return $this->messageModel->getMessages($author_id);
    }



}
