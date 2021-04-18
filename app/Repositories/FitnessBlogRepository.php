<?php

namespace App\Repositories;

use App\Repositories\Contract\FitnessBlogRepositoryInterface;
use App\FitnessBlog;
use Auth;

class FitnessBlogRepository implements FitnessBlogRepositoryInterface
{

    public function fetchAll()
    {
    //    return FitnessBlog::all();
        return FitnessBlog::with(['blogType'])->get();
    }

    public function fetch($id)
    {
    }

    public function create($data)
    {
        return FitnessBlog::create($data);
    }
    public function update($data, $id)
    {

        $fitnessBlogs = FitnessBlog::find($id);
        $fitnessBlogs->blog_type_id = $data['blog_type_id'];
        $fitnessBlogs->blog_subject = $data['blog_subject'];
        $fitnessBlogs->blog_content = $data['blog_content'];
        $fitnessBlogs->save();
        return $fitnessBlogs;

    }

    public function delete($id)
    {
        return FitnessBlog::where('id', $id)->delete();
    }
}
