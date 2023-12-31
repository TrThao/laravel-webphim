<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Episode;
use Carbon\Carbon;
use Storage;
// use Illuminate\Http\File;
use File;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Movie::with('category', 'movie_genre', 'country', 'genre')->orderBy('id', 'DESC')->get();
        $path = public_path() . "/json_file/";
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($path . 'movies.json', json_encode($list));    //file::put
        return view('admincp.movie.index', compact('list'));
    }

    public function update_year(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->year = $data['year'];

        $movie->save();
    }
    public function update_season(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->season = $data['season'];

        $movie->save();
    }
    public function update_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->topview = $data['topview'];

        $movie->save();
    }
    public function filter_topview(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', $data['value'])->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 0) {
                $text = 'HD';
            } elseif ($mov->resolution == 1) {
                $text = 'SD';
            } elseif ($mov->resolution == 2) {
                $text = 'HDCam';
            } elseif ($mov->resolution == 3) {
                $text = 'Cam';
            } elseif ($mov->resolution == 4) {
                $text = 'FullHD';
            } else {
                $text = 'Trailer';
            }

            $output .= ' <div class="item post-37176">
                               <a href=" ' . url('phim/' . $mov->slug) . ' " title=" ' . $mov->title . ' ">
                                   <div class="item-link">
                                       <img src=" ' . url('uploads/movie/' . $mov->image) . ' "
                                           class="lazy post-thumb" alt="' . $mov->title . '"
                                           title="' . $mov->title . '" />
                                       <span class="is_trailer">' . $text . '</span>
                                   </div>
                                   <p class="title">' . $mov->title . '</p>
                               </a>
                               <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                               <div style="float: left;">
                                   <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                       <span style="width: 0%"></span>
                                   </span>
                               </div>
                           </div>';
        }
        echo $output;
    }
    public function filter_default(Request $request)
    {
        $data = $request->all();
        $movie = Movie::where('topview', '0')->orderBy('ngaycapnhat', 'DESC')->take('10')->get();
        $output = '';
        foreach ($movie as $key => $mov) {
            if ($mov->resolution == 0) {
                $text = 'HD';
            } elseif ($mov->resolution == 1) {
                $text = 'SD';
            } elseif ($mov->resolution == 2) {
                $text = 'HDCam';
            } elseif ($mov->resolution == 3) {
                $text = 'Cam';
            } elseif ($mov->resolution == 4) {
                $text = 'FullHD';
            } else {
                $text = 'Trailer';
            }

            $output .= ' <div class="item post-37176">
                               <a href=" ' . url('phim/' . $mov->slug) . ' " title=" ' . $mov->title . ' ">
                                   <div class="item-link">
                                       <img src=" ' . url('uploads/movie/' . $mov->image) . ' "
                                           class="lazy post-thumb" alt="' . $mov->title . '"
                                           title="' . $mov->title . '" />
                                       <span class="is_trailer">' . $text . '</span>
                                   </div>
                                   <p class="title">' . $mov->title . '</p>
                               </a>
                               <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                               <div style="float: left;">
                                   <span class="user-rate-image post-large-rate stars-large-vang"
                                       style="display: block;/* width: 100%; */">
                                       <span style="width: 0%"></span>
                                   </span>
                               </div>
                           </div>';
        }
        echo $output;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $list_genre = Genre::all();
        $genre = Genre::pluck('title', 'id');
        // $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        return view('admincp.movie.form', compact('category', 'country', 'genre', 'list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];


        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }

        $movie->ngaytao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');

        $get_image = $request->file('image');



        //Thêm Hình Ảnh
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/', $new_image);
            $movie->image = $new_image;
        }
        // dd($request);
        // dd($movie->image);
        $movie->save();

        // Thêm Nhiều Thể Loại cho Phim
        $movie->movie_genre()->attach($data['genre']);

        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        // $list = Movie::with('category', 'genre', 'country')->orderBy('id', 'DESC')->get();
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        return view('admincp.movie.form', compact('category', 'country', 'genre', 'movie', 'list_genre', 'movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->tags = $data['tags'];
        $movie->trailer = $data['trailer'];
        $movie->sotap = $data['sotap'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->slug = $data['slug'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->thuocphim = $data['thuocphim'];
        $movie->country_id = $data['country_id'];


        foreach ($data['genre'] as $key => $gen) {
            $movie->genre_id = $gen[0];
        }
        $movie->ngaycapnhat = Carbon::now('Asia/Ho_Chi_Minh');

        //Thêm Hình Ảnh


        $get_image = $request->file('image');

        if ($get_image) {
            if (file_exists('uploads/movie/' . $movie->image)) {
                unlink('uploads/movie/' . $movie->image);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('uploads/movie/', $new_image);
                $movie->image = $new_image;
            }
        }
        // dd($request);
        // dd($movie->image);
        $movie->save();

        $movie->movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie =  Movie::find($id);
        //xóa ảnh
        if (file_exists('uploads/movie/' . $movie->image)) {
            unlink('uploads/movie/' . $movie->image);
        }
        //xóa thể loại
       
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete();
  
      
      

        // Xóa tập phim
        Episode::whereIn('movie_id', [$movie->id])->delete();
        $movie->delete();

        return redirect()->back();
    }
}