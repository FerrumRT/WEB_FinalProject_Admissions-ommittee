<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('403');
        return view("pages.news.create")->with('title', 'Add News');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'image_url' => 'required',
            'content' => 'required',
        ]);

        $news = new News;
        $news->title = $request->input('title');
        $news->image_url = $request->input('image_url');
        $news->content = $request->input('content');
        $news->short_content = substr($news->content, 0, 100) . "...";
        $news->admission_member_id = Auth::user()->getAuthIdentifier();
        $news->save();

        return redirect('/news/' . $news->id)->with('success', 'News added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $one_news = News::find($id);
        $adm_mem = AdmissionMember::find($one_news->admission_member_id);
        $user = User::find($adm_mem->user_id);
        return view("pages.news.show")->
        with("one_news", $one_news)->
        with("adm_mem", $adm_mem)->
        with("user", $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->is_adm_member)
            return redirect('403');
        $news = News::find($id);
        return view("pages.news.edit")->with('title', 'Edit News')->with('news', $news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'image_url' => 'required',
            'content' => 'required',
        ]);

        $news = News::find($id);
        $news->title = $request->input('title');
        $news->image_url = $request->input('image_url');
        $news->content = $request->input('content');
        $news->short_content = substr($news->content, 0, 100) . "...";
        $news->admission_member_id = Auth::user()->getAuthIdentifier();
        $news->save();

        return redirect('/news/' . $news->id)->with('success', 'Updating completed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect('/')->with('success', 'News deleted');
    }
}
