<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = ['id','title','preview','content','user_id','status','image','is_private','notice','created_at','updated_at'];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }


    /**
     * Get all posts fore Logged users page.
     * @param
     *@return object
     */
    public function getAllPosts(): object
    {
        return Post::all()->whereNotIn('status', [0, 2]);
    }


    /**
     * Get posts fore admin-page.
     * @param
     *@return object
     */
    public function getPosts(): object
    {
        return Post::all()->whereIn('status', [0, 2]);
    }



    /**
     * Get users posts.
     * @param int
     *@return object
     */
    public function getMyPosts($id): object
    {
        return Post::all()->where('user_id', '=', $id)->whereNotIn('status',0);
    }



    /**
     * Get one post.
     * @param int
     *@return object
     */
    public function PostById($post_id): object
    {
        return Post::find($post_id);
    }



    /**
     * Delete post from base.
     * @param array
     * @return bool
     */
    public function destroyPost($id): bool
    {
        return Post::find($id)->delete();
    }



    /**
     * Add post to base.
     * @param array
     *@return bool
     */
    public function add($params): bool
    {
        $this->fill($params);
        return $this->save();
    }



    /**
     * Update post in base.
     * @param array
     *@return bool
     */
    public function updatePost($params): bool
    {
        $post=$this->find($params['post_id']);
        return $post->fill($params)->save();
    }



    /**
     * Get all posts fore start page.
     * @param
     *@return object
     */
    public function PostsForeMainPage(): object
    {
        return Post::all()->whereIn('status', 1)->where('is_private',0);
    }




    /**
     * Allow post to display.
     * @param int
     * @return bool
     */
    public static function publicatePost($id): bool
    {
        $post=Post::find($id);
        $post->status= 1;
        return $post->save();
    }


    /**
     * Obtane user-name fore post.
     * @param int
     * @return string
     */
    public function getUser($id): string
    {
        $user = User::find($id);
        return $user['name'];
    }



    /**
     * Remove old image.
     * @param int
     * @return bool
     */
    public static function deleteImage($post_id): bool
    {
        $post=Post::find($post_id);
        $post->image="";
        return $post->save();
    }
}
