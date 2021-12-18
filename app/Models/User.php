<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id','name','email', 'birthday','country','city','gender','password','created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class,'posts','id','user_id');
    }


    public function messages(): HasOne
    {
        return $this->hasOne(Message::class,'sender_id','id');
    }


    public function author_id(): HasOne
    {
        return $this->hasOne(Message::class,'author_id','id');
    }



    /**
     * Save new user to base.
     * @param array
     *@return bool
     */
    public static function add($fields): bool
    {
        $user = new static;
        $user->fill($fields);
        return $user->save();
    }


    /**
     * Generate bcrypt password.
     * @param int
     *@return void
     */
    public function generatePassword($password): void
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }



    /**
     * Get user.
     * @param int
     *@return object
     */
    public function getUserById($id): object
    {
        return User::find($id);
    }


    /**
     * Get all users fore admin page.
     *@return Collection
     */
    public function getUsers(): Collection
    {
        return User::all();
    }



    /**
     * Edit user-data in base.
     * @param array
     *@return bool
     */
    public function edit($params): bool
    {
        $user=$this->find($params['id']);
        return $user->fill($params)->save();
    }



    /**
     * Delete user from base.
     * @param int
     *@return bool
     */
    public static function deleteUser($id): bool
    {
        return User::find($id)->delete();
    }



    /**
     * Get status of post.
     * @param int
     *@return ?string
     */
    public static function getStatus($id): ?string
    {
        return User::find($id)->status;
    }


    /**
     * Set status of post.
     * @param int
     * @param mixed
     * @return bool
     */
    public static function setStatus($id,$status): bool
    {
        $user = User::find($id);
        $user->status = $status;
        return $user->save();
    }



    /**
     * Check user is_admin.
     * @return bool
     */
    public function isAdmin()
    {
        return $this->is_admin === 1;
    }


}
