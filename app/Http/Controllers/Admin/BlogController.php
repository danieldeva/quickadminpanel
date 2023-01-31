<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BlogController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('blog_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blog.index');
    }

    public function create()
    {
        abort_if(Gate::denies('blog_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blog.create');
    }

    public function edit(Blog $blog)
    {
        abort_if(Gate::denies('blog_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blog.edit', compact('blog'));
    }

    public function show(Blog $blog)
    {
        abort_if(Gate::denies('blog_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.blog.show', compact('blog'));
    }
}
