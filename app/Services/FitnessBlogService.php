<?php

namespace App\Services;

use App\Repositories\Contract\FitnessBlogRepositoryInterface;
use App\Services\Contract\ServiceInterface;
use App\FitnessBlog;
use Auth;

class FitnessBlogService implements ServiceInterface
{

    protected $fitnessBlogRepository;
    function __construct(FitnessBlogRepositoryInterface $fitnessBlogRepository)
    {
        $this->fitnessBlogRepository = $fitnessBlogRepository;
    }
    public function fetchAll()
    {
        $fitnessBlogs = $this->fitnessBlogRepository->fetchAll();

        return $fitnessBlogs;
    }

    /**
     * Fetch User by ID
     *
     * @param [type] $id
     * @return void
     */
    public function fetch($id)
    {
    }

    /**
     * Create new user
     *
     * @param [type] $data
     * @return void
     */
    public function store($data)
    {
        $array = [
            'blog_subject'=>$data['blog_subject'],
            'blog_content'=>$data['blog_content'],
            'blog_date'=>$data['blog_date'],
            'blog_time'=>$data['blog_time'],
            'blog_type_id'=>$data['blog_type_id'],
            'recipients_id'=>$data['recipients_id'],

        ];
        return $this->fitnessBlogRepository->create($array);
    }

    /**
     * Update existing user
     *
     * @param [type] $data
     * @param [type] $id
     * @return void
     */
    public function update($data, $id)
    {
        return $this->fitnessBlogRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->fitnessBlogRepository->delete($id);
    }
}
