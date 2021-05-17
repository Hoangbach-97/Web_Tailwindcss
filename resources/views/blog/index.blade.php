@extends('layouts.app')
@section('noidung')
<div class="w-4/5 m-auto text-center">
<div class="py-15 border-b border-gray-300">
    <h1 class="text-5xl">Blog Post</h1>
</div>
</div> 
@if(session()->has('mess'))
<div class="pl-3 w-4/5 m-auto pl-2 text-center">
    <p class="text-2xl  bg-green-400 text-gray-80 py-3 w-1/6 ">
        {{session()->get('mess')}}
    </p>
</div>
@endif
@if(Auth::check())
<div class="pt-15 w-4/5 m-auto"> 
<a href="/blog/create" class="bg-blue-500 px-4 uppercase
 text-gray-100 text-l font-extrabold py-3 rounded-2xl">Create post</a>
</div>
@endif  

@foreach($posts as $post)
{{-- Lấy giá trị từ bảng post theo thời gian giảm dần: Xem hàm index tại PostController để rõ --}}
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
        <img src="{{asset('images/'.$post->image_path)}}" alt="pictureblog">
       </div>
       <div>
           <h2 class="text-gray-700 font-bold text-5xl pb-4">
            {{$post->title}}
           </h2>
           <span class="text-gray-500">
               {{-- Đặt relationship hasMany: 1 user có nhiều post, và belongTo: 1 post chỉ có 1 user tại Model --}}
               By: <span  class="font-bold italic text-gray-700">{{$post->user->name}}</span>, Đăng ngày {{date("d-m-Y", strtotime($post->updated_at))}}

           </span>
           <p class="text-gray-700 pt-8 pb-10 text-xl leading-8 font-light ">
           {{$post->description}}
           </p>
           <a href="/blog/{{$post->slug}}" class="uppercase bg-blue-500 text-lg text-gray-100 
           font-extrabold py-4 px-8 rounded-3xl">Keep Reading </a>
           {{-- Button Edit Bài post Của ai thì người đó sửa và xóa--}}
            @if(Auth::check() && Auth::user()->id===$post->user->id)
            <span class="float-right px-3 py-3 bg-green-500 border-2 rounded-xl hover:bg-gray-800">
            <a href="/blog/{{$post->slug}}/edit"
                class="text-gray-200 font-bold italic  pb-1 "
                >Edit</a>

            </span>
           <span class="float-right px-3 py-3 bg-red-500 border-2 rounded-xl hover:bg-gray-800 ">
            <form action="/blog/{{$post->slug}}/delete" method="post">
            @csrf
            <button type="submit" class="text-gray-100 ">Delete</button>
            </form>
           </span>
@endif
       </div>
       
</div>

@endforeach
@endsection