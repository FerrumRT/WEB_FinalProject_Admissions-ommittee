<?php

namespace App\Http\Controllers;

use App\AdmissionMember;
use App\EducationDegree;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if (!Auth::user()->admission_member_id != null)
            abort(403);
        $edu_deg = EducationDegree::all();
        return view("pages.news.create")->with('title', 'Add News')->
        with('edu_deg', $edu_deg);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->admission_member_id != null)
            abort(403);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);

        $news = new News;
        $news->title = $request->input('title');
        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/news_img', 'public');
            $news->image_url = "/storage/" . $img_path;
        }
        $news->content = $request->input('content');
        $news->short_content = substr($news->content, 0, 100) . "...";
        $news->admission_member_id = (Auth::user()->admission_member_id);
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
        if ($one_news == null)
            abort(404);
        $adm_mem = AdmissionMember::find($one_news->admission_member_id);
        $user = User::find($adm_mem->user_id);
        $edu_deg = EducationDegree::all();
        return view("pages.news.show")->
        with('title', $one_news->name)->
        with("one_news", $one_news)->
        with("adm_mem", $adm_mem)->
        with("user", $user)->
        with('edu_deg', $edu_deg);
    }

    /**
     * @param Request $request
     * @param int $page = 1
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function search(Request $request)
    {
        $title = $request->input('title');
        if (!empty($title))
            $news = DB::table('news')->where('title', 'LIKE', "%" . $title . "%")->paginate(10);
        else
            $news = News::paginate(10);

        $edu_deg = EducationDegree::all();

        $page_count = News::all()->count() / 10;

        return view("pages.news.result")->
        with("news", $news)->
        with('edu_deg', $edu_deg)->
        with('title', $title)->
        with('pages_count', $page_count);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Auth::user()->admission_member_id != null)
            abort(403);
        if (Auth::user() == null)
            return redirect('/login');
        $news = News::find($id);
        $edu_deg = EducationDegree::all();
        if (!Auth::user()->admission_member_id != null || Auth::user()->id != AdmissionMember::find($news->admission_member_id)->user_id)
            abort(403);
        return view("pages.news.edit")
            ->with('title', 'Edit News')
            ->with('news', $news)
            ->with('edu_deg', $edu_deg);
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
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->admission_member_id != null)
            abort(403);
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
        ]);


        $news = News::find($id);
        if ($news == null)
            abort(404);
        $news->title = $request->input('title');
        if (!empty($request->file('image'))) {
            $img_path = $request->file('image')->store('img/news_img', 'public');
            $news->image_url = "/storage/" . $img_path;
        }
        $news->content = $request->input('content');
        $news->short_content = substr($news->content, 0, 100) . "...";
        $news->admission_member_id = Auth::user()->admission_member_id;
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
        if (Auth::user() == null)
            return redirect('/login');
        if (!Auth::user()->admission_member_id != null)
            abort(403);
        $news = News::find($id);
        if ($news == null)
            abort(404);
        $news->delete();
        return redirect('/')->with('success', 'News deleted');
    }
}
