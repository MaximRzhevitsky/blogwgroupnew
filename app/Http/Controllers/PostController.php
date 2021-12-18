<?php
namespace App\Http\Controllers;

use App\Http\Requests\Post\StorePost;
use App\Http\Requests\Post\UpdatePost;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Http\Services\PostService;
use App\Http\Services\MessageService;


class PostController extends Controller
{
    public function __construct()
    {
        $this->postService = new PostService();
        $this->messageService = new MessageService();
    }

    private PostService $postService;
    private MessageService $messageService;


    /**
     *Display main-page with posts.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        $user_id=$this->getUserId();
        $posts=$this->postService->getAllPosts();
        $count_unread=$this->messageService->count_unread($user_id);
        $contacts=$this->messageService->getContacts($user_id);
        return view('pages.allposts', ['posts' => $posts, 'user_id' => $user_id, 'count_unread' => $count_unread, 'contacts' => $contacts]);
    }



    /**
     * Display page fore new post.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function create()
    {
        return view('pages.newpost');
    }



    /**
     * Create post to base.
     * @param Mixed
     *@return RedirectResponse
     */
    public function store(StorePost $request): RedirectResponse
    {
        $params=$request->all();
        $path = $this->saveImage($request);
        $params['image']=$path;
        $params['user_id']=$this->getUserId();
        $this->postService->createPost($params);
        return redirect()->route('posts');
    }



    /**
     * Display page with own posts.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function getPosts()
    {
        $user_id=$this->getUserId();
        $posts=$this->postService->getMyPosts($user_id);

        return view('pages.myposts', ['posts' => $posts]);
    }



    /**
     * Display page fore edit post.
     * @param int
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function edit($id)
    {
        $post=$this->postService->getPostById($id);
        return view('pages.editpost', ['post' => $post]);
    }


    /**
     * Update post.
     * @param Mixed
     * @return RedirectResponse
     */
    public function update(UpdatePost $request): RedirectResponse
    {
        $params = $request->except(['_token']);
        $path = $this->saveImage($request);
        $params['image'] = $path;
        $params['status'] = 0;
        $this->postService->updatePost($params);

        return redirect()->route('myposts');
    }


    /**
     * Delete post.
     * @param int
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $this->postService->destroyPost($id);
        return redirect()->back();
    }


    /**
     * Save new image.
     * @param Mixed
     * @return string
     */
    public function saveImage($request): string
    {
        return $request->file('image')->store('user_images','public');
    }



    /**
     * Get users id.
     *@return int
     */
    public function getUserId(): int
    {
        $user= Auth::user();
        return $user['id'];
    }


}
