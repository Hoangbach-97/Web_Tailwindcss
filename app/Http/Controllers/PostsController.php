<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
// use App\Validations\Validation;
use Cviebrock\EloquentSluggable\Services\SlugService;   
class PostsController extends Controller
{
    // function này cho phép các mục có thể truy cập ngay cả khi không cần login. Các mục edit và delete thì cấm
    public function __construct(){
        $this->middleware('auth', ['except'=>['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        return view('blog.index')
        // Trả về cho trang blog/index.blade.php mảng posts các bài viết dựa vào ngày cập nhật mới nhất
        ->with('posts', Post::orderBy('updated_at', 'desc')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Valid dữ liệu lưu vào 
    $request->validate([
        'title' =>'required',
        'description' =>'required',
        'image' =>'required|mimes:jpg,png,jpeg|max:5048'//5048 kilobyte =5Mb
    ]);
    // Lưu ảnh với tên gồm id unique +tên title bài viết +đuôi ảnh
    $newImageName = uniqid(). '-' . $request->title . '.' .$request->image->extension();
    // dd($newImageName);
    //  lưu vào thư mục public/images với hàm move('vị trí lưu', 'tên file ảnh)
     $request->image->move(public_path('images'),$newImageName);
        Post::create([
            //Title =title nhập vào
            'title' =>$request->input('title'),
            // slug = Dùng sluggable để tạo SEO đường dẫn (lớp cần tạo/Model, field slug, title nhập vào)
            'slug' =>SlugService::createSlug(Post::class, 'slug', $request->title), 
            'description' =>$request->input('description'),
            'image_path'=> $newImageName,
            // user_id=id của user đăng nhập
            'user_id' =>auth()->user()->id

        ]);
        // Return với thông báo
        return redirect('/blog')->with('mess', 'Đăng bài thành công!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
//Vào bảng posts tại trường slug lấy trùng với slug trên URI đầu tiên=>Trả về tất cả các thông tin liên quan
        $show = Post::where('slug', $slug)->first();
        return view('blog.show')
        ->with('posts', $show); //Trả về cùng biến posts với slug tìm được

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $edit =Post::where('slug', $slug)->first();
        return view('blog.edit')->with('post',$edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            
            'title' =>'required',
            'description' =>'required',
        ]);
        //
        Post::where('slug', $slug)
        ->update([
            'title' =>$request->input('title'),
            'slug' =>SlugService::createSlug(Post::class, 'slug', $request->title),
            'description' =>$request->input('description'),
            'user_id' =>auth()->user()->id

        ]);
        return redirect('/blog')->with('mess','Bài viết đã được cập nhật');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        
        $post = Post::where('slug', $slug);
        $post->delete();
        return redirect('/blog')->with('mess','Bài viết đã được xóa');


    }
}
