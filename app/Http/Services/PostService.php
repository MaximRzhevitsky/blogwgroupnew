<?php

namespace App\Http\Services;

use App\Models\Post;

class PostService
{
    function __construct()
    {
        $this->postModel = new Post();
    }

    public function getAllPosts(): object
    {
        return $this->postModel->getAllPosts();
    }

    public function getPosts(): object
    {
        return $this->postModel->getPosts();
    }


    public function getMyPosts($id): object
    {
        return $this->postModel->getMyPosts($id);
    }

    public function publicatePost($id): bool
    {
        return $this->postModel->publicatePost($id);
    }


    public function destroyPost($id): bool
    {
        return $this->postModel->destroyPost($id);
    }



    public function createPost($params): bool
    {
        return $this->postModel->add($params);
    }

    public function updatePost($params): bool
    {
        return $this->postModel->updatePost($params);
    }


    public function getPostsForeMainPage(): object
    {
        return $this->postModel->PostsForeMainPage();
    }


    public function getPostById($post_id): object
    {
        return $this->postModel->PostById($post_id);
    }


    public function deleteImage($post_id): bool
    {
        return $this->postModel->deleteImage($post_id);
    }


}
