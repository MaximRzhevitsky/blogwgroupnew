<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;

class Message extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['id','sender_id','author_id','created_at','updated_at','text'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get number of unread messages.
     * @param array
     *@return int
     */
    public function getCountUnread($id): int
    {
        return Message::all()->where('author_id','=', $id)->where('is_read','=', NULL)->count();
    }



    /**
     * Add message to base.
     * @param array
     *@return bool
     */
    public function createMessage($params): bool
    {
        $this->fill($params);
        return $this->save();
    }



    /**
     * Get all messages of author.
     * @param int
     * @return Collection
     */
    public function getMessages($author_id): Collection
    {
        $messages= Message::all()->where('author_id',$author_id);
        self::toggleread();
        return $messages;
    }



    /**
     * Get contacts list for page with posts.
     * @param int
     * @return array
     */
    public function getContacts($id): array
    {
        $senders_ids = Message::where('author_id','=',$id)->groupBy('sender_id')->pluck('sender_id');
        $contacts=[];
        foreach ($senders_ids as $sender_id){
            $contacts[]=User::find($sender_id);
        }
        return $contacts;
    }



    /**
     * Add message to base.
     * @param array
     * @return bool
     */
    public function add($fields): bool
    {
        $message = new static;
        $message->fill($fields);
        return $message->save();
    }


    /**
     * Get user fore message.
     * @param int
     *@return string
     */
    public function getUser($id): string
    {
        $message=Message::find($id);
        $author_id=$message["sender_id"];
        $user = User::find($author_id);
        return $user['name'];
    }


    /**
     * Toggle message from unread to read.
     * @param int
     *@return void
     */
    public static function toggleread(): void
    {
        $messages=Message::all();
        foreach ($messages as $message){
            $message->is_read=1;
            $message->save();
        }
    }

}
