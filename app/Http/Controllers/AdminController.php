<?php

namespace App\Http\Controllers;

use App\Http\Services\PostService;
use App\Http\Services\UserService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\DataTables;
use App\Http\Requests\User\UpdateUser;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->userService = new UserService();
        $this->postService = new PostService();
    }
    private UserService $userService;
    private PostService $postService;


    /**
     * Display dashboard panel.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        $posts=$this->postService->getPosts();
        return view('admin.dashboard',['posts' => $posts] );
    }


    /**
     * Display panel fore edit post.
     * @param int
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function set_notice($post_id)
    {
        $post=$this->postService->getPostById($post_id);
        return view('admin.set_notice', ['post' => $post]);
    }


    /**
     * Save notice fore post.
     * @param Request $request
     * @return RedirectResponse
     */
    public function returnPost(Request $request): RedirectResponse
    {
        $params = $request->except(['_token']);

        $params['status'] = 2;
        $this->postService->updatePost($params);
        return redirect()->route('adminPanel');
    }


    /**
     * Publicate post.
     * @param int
     * @return RedirectResponse
     */
    public function publicatepost($id): RedirectResponse
    {
        $this->postService->publicatePost($id);
        return redirect()->route('adminPanel');
    }


    /**
     * Delete post.
     * @param int
     * @return RedirectResponse
     */
    public function deletepost($id): RedirectResponse
    {
        $this->postService->destroyPost($id);
        return redirect()->route('adminPanel');
    }


    /**
     * Collect users fore dashboard.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function users()
    {
        $users=$this->userService->getUsers();
        return view('admin.users', ['users' => $users]);
    }


    /**
     * Operations with users fore DataTables.
     * @param Request $request
     * @return Application|Factory|\Illuminate\Contracts\View\View|JsonResponse
     * @throws Exception
     */
    public function getusers(Request $request)
    {
        if ($request->ajax()) {
            $users=$this->userService->getUsers();
            return Datatables::of($users)
                ->addColumn('action',function($users){
                    $html = '<a href="useredit/'.$users->id.'" class="btn btn-xs btn-secondary">Edit</a> ';
                    $html .=  '<a href="userdestroy/'.$users->id.'" class="btn btn-xs btn-xs btn-danger">Del</a> ';
                    $html .=  '<a href="toggleblock/'.$users->id.'" class="btn btn-xs btn-xs btn-warning">Block</a> ';
                    return $html;
                })
                ->rawColumns(['action'])->make(true);
        }
        return view('admin.users');
    }



    /**
     * Display page fore edit user.
     * @param int
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function useredit($id)
    {
        $user=$this->userService->getUserById($id);
        return view('admin.useredit', ['user' => $user]);
    }


    /**
     * Save user after editing.
     * @param UpdateUser $request
     * @return RedirectResponse
     */
    public function updateUser(UpdateUser $request): RedirectResponse
    {
        $params = $request->except(['_token']);
        $this->userService->updateUser($params);
        return redirect()->route('users');
    }


    /**
     * Delete user.
     * @param int
     * @return RedirectResponse
     */
    public function userdestroy($id): RedirectResponse
    {
        $this->userService->deleteUser($id);
        return redirect()->route('users');
    }


    /**
     * Toggle blocking users.
     * @param int
     * @return RedirectResponse
     */
    public function toggleblock($id): RedirectResponse
    {
        $status=$this->userService->getStatus($id);

        if($status == NULL){
            $status="blocked";
            $this->userService->setStatus($id,$status);
        }
        else if($status == "blocked"){
            $status=NULL;
            $this->userService->setStatus($id,$status);
        }
        return redirect()->route('users');
    }

}
