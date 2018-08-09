<?php

namespace App\Http\Controllers;

use App\Post;
use App\Elastic\Elastic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @var Elastic
     */
    protected $elastic;

    /**
     * PostController constructor.
     * @param Elastic $elastic
     */
    public  function __construct(Elastic $elastic)
    {
        $this->elastic = $elastic;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(20);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->title = request('title');
        $post->content = request('content');
        $post->save();

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search()
    {
        $search = request('search');

        $query = [
            'multi_match' => [
                'query' => $search,
                'fuzziness' => 'AUTO',
                'fields' => ['title^3','content'],
            ],
        ];

        $parameters = [
            'index' => 'blog',
            'type' => 'post',
            'body' => [
                "from" => 0,
                "size" => 20,
                'query' => $query
            ]
        ];


        $response = $this->elastic->search($parameters);

        $response = $response['hits']['hits'];

        return view('posts.index', ['response' => $response]);
    }
}
