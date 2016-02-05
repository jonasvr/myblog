<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//added by Jonas
use App\Subjects;
use App\blogs;
use App\Http\Requests\BlogPostRequest;

class BlogController extends Controller
{
    public function create()
    {
      $subjects = $this->getsubjects();
      $route    = 'addBlog';
      return View('blog.create',['subjects' => $subjects, 'route' => $route]);
    }

    public function addBlog(BlogPostRequest $request)
    {
      $input             = new blogs;
      $input->title      = $request->title;
      $input->date       = $request->date;
      $input->subject_id = $request->subject;
      $input->Text       = $request->text;
      $input->save();
      return View('home')->withSuccess('toegevoegt');
    }

    public function getUpdate($id)
    {
      $input            = blogs::find($id);
      $subjects = $this->getsubjects();
      $route    = 'update';
      return View('blog.create',['subjects' => $subjects, 'route' => $route, 'old' => $input]);
    }

    public function update(BlogPostRequest $request)
    {
      $input             = blogs::find($request->blog_id);
      $input->title      = $request->title;
      $input->date       = $request->date;
      $input->subject_id = $request->subject;
      $input->Text       = $request->text;
      $input->save();
      return View('home')->withSuccess('updated');
    }

    public function allBlogs()
    {
      $blogs = blogs::orderBy('date', 'desc')->paginate(10);
      $subjects = $this->getsubjects();
      return view('blog.blogpage',['blogs' => $blogs, 'subjects' => $subjects]);
    }

    public function subjectBlogs($subject_id)
    {
      $blogs = blogs::where('subject_id',$subject_id)->orderBy('date', 'desc')->paginate(10);
      $subjects = $this->getsubjects();
      return view('blog.blogpage',['blogs' => $blogs, 'subjects' => $subjects,'type'=>$subject_id]);
    }

    public function getsubjects()
    {
      $getsubjects = subjects::select('id','name')->get();
      foreach($getsubjects as $get)
      {
          $subjects[$get->id] = $get->name;
      }
      return $subjects;
    }
}
