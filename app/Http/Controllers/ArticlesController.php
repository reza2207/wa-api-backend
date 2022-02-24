<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Articles;

class ArticlesController extends Controller
{

    public $title = "Articles";

    public function __construct()
    {
        //$this->middleware('auth');

    }

    public function index()
    {
        $data['title'] = $this->title;
        $articles = new Articles;
        $list = Articles::all();
        //dump($list);
        $data['posts'] = $list;
        $data['last'] = Articles::orderBy('created_at', 'desc')->first();

        return view('articles', $data);
    }

    public function new_article()
    {
        $this->middleware('auth');
        return view('new_article');
    }

    public function store(Request $request)
    {
        $this->middleware('auth');
        $this->validate($request, [
			'title'=> 'required',
            'content'=> 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        $image = $request->file('image');
        $nama_file = time()."_".$image->getClientOriginalName();

        //tujuan

        $tujuan = 'img-articles';
		$image->move($tujuan,$nama_file);

        $id = Auth::user()->id;
		articles::create([
            'title' => $request->title,
            'content' => $request->content,
			'image' => $nama_file,
            'slug' => Str::slug($request->title, '-'),
            'id_users' => $id
		]);
        //title','content', 'image', 'slug', 'id_users
		$data['alert'] = 'success';
        //return view('/articles', $data);
        return redirect()->back()->with('message', 'Success!');
    }

    public function edit($id)
    {
        $this->middleware('auth');
        $data['data'] = Articles::where('id',$id)->firstOrFail();
        return view('edit_articles',$data);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
			'title'=> 'required',
            'content'=> 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        $image = $request->file('image');
        $nama_file = time()."_".$image->getClientOriginalName();

        //tujuan

        $tujuan = 'img-articles';
		$image->move($tujuan,$nama_file);
        $id = $request->id;
        $iduser = Auth::user()->id;
		articles::where('id', $id)->update([
            'title' => $request->title,
            'content' => $request->content,
			'image' => $nama_file,
            'slug' => Str::slug($request->title, '-'),
            'id_users' => $iduser
		]);
        //title','content', 'image', 'slug', 'id_users
		$data['alert'] = 'success';
        //return view('/articles', $data);
        return redirect()->back()->with('message', 'Update Success!');
    }


    public function delete($id)
    {
        //maaf tidak diberi warning, karna keterbatasan waktu
        $data = articles::find($id)->delete();
        return redirect()->back()->with('message', 'Delete Success');
    }

    public function getAllArticles()
    {
        $articles = articles::all();

        return response()->json([
            'message' => 'success',
            'data' => $articles
        ], 200);
    }

    public function getIdArticles($id)
    {
        $articles = Articles::where('id',$id)->firstOrFail();

        return response()->json([
            'message' => 'success',
            'data' => $articles
        ], 200);
    }

    public function api_store(Request $request)
    {
        //api


        $this->validate($request, [
			'title'=> 'required',
            'content'=> 'required',
            'image' => 'file|image|mimes:jpeg,png,jpg|max:2048',
		]);

        $image = $request->file('image');
        if($image !== null){
        $nama_file = time()."_".$image->getClientOriginalName();

            //tujuan

            $tujuan = 'img-articles';
            $image->move($tujuan,$nama_file);
        }else{
            $nama_file = "";
        }
        $id = Auth::user()->id;
		articles::create([
            'title' => $request->title,
            'content' => $request->content,
			'image' => $nama_file,
            'slug' => Str::slug($request->title, '-'),
            'id_users' => $id
		]);
        return response()->json([
            'message' => 'berhasil ditambahkan',
            'data' => 'success',
        ], 200);
    }
}
