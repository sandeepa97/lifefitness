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
        $fitnessBlogs->fitnessBlog_subject = $data['fitnessBlog_subject'];
        $fitnessBlogs->fitnessBlog_content = $data['fitnessBlog_content'];
        $fitnessBlogs->fitnessBlog_date = $data['fitnessBlog_date'];
        $fitnessBlogs->fitnessBlog_time = $data['fitnessBlog_time'];
        $fitnessBlogs->fitnessBlog_type_id = $data['fitnessBlog_type_id'];
        $fitnessBlogs->recipients_id = $data['recipients_id'];
        $fitnessBlogs->save();
        return $fitnessBlogs;

    }

    public function delete($id)
    {
        return FitnessBlog::where('id', $id)->delete();
    }
}
