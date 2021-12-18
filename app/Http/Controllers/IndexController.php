<?php

namespace App\Http\Controllers;
use App\Http\Services\PostService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->postService = new PostService();
    }

    private PostService $postService;


    /**
     * Display index panel.
     * @return Application|Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        $posts=$this->postService->getPostsForeMainPage();
        return view('index',['posts'=>$posts]);
    }

}
