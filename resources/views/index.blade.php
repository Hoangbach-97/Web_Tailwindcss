{{-- 
    app đóng vai trò master: tải footer và các section(nội dung) tùy vào từng trang --}}
    {{-- Đây là nội dung trang chính --}}
    {{-- VÌ trang dùng Taiwindcss ta điểm lại từng chi tiết các thuộc tính --}}
@extends('layouts.app')

@section('noidung')
{{--background-image: lớp tự chỉnh sửa/ grid gird-cols-1???  --}}
<div class="background-image grid gird-cols-1 m-auto">
    {{-- flexbox --}}
    <div class="flex text-gray-100 pt-10">
        {{--  --}}
        <div class="m-auto pt-4 pb-16 sm:auto w-4/5 block text-center">
            {{-- sm: min-width: 640px --}}
                <h1 class="sm:text-white text-4xl uppercase font-bold  text-shadow-md p-14">QUÀ TẶNG THIÊN NHIÊN</h1>
        
        <a href="/blog" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold uppercase text-xl ">
            Read more
        
        </a>
    </div>
    </div>
</div>
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
    <div>
         <img src="https://cdn.pixabay.com/photo/2020/08/01/12/18/winnats-pass-5455266_1280.jpg" alt="pictureblog">
        </div>
        <div class="m-auto sm:m-auto text-left w-4/5 block ">
            <h2 class="text-3xl font-extrabold text-gray-600">Con người với thiên nhiên</h2>
            <p class="text-gray-500 text-l py-8">
                Con người khai thác thiên nhiên rồi sử dụng một cách vô tội vạ mà không nhận ra rằng:
                 Thiên nhiên là bạn tốt và đang cần chúng ta yêu mến, bảo vệ.
            </p>
            <p class="text-gray-600 text-xl pb-9 font-extrabold">
                Con người khai thác thiên nhiên rồi sử dụng một cách vô tội vạ mà không nhận ra rằng:
                Thiên nhiên là bạn tốt và đang cần chúng ta yêu mến, bảo vệ.
            </p>
            <a href="/blog" class="uppercase bg-blue-600 text-gray-100 text-s font-extrabold px-8 py-3 rounded-3xl  ">
                Tìm hiểu thêm
            </a>
        </div>

    </div>
    <div class="text-center pb-15 bg-black text-white ">
        <h2 class="text-3xl text-l pb-5"> Bạn muốn gì từ thiên nhiên?</h2>
        <span class="text-4xl py-1 font-extrabold block">Bảo vệ</span>
        <span class="text-4xl py-1 font-extrabold block">Phát triển</span>
        <span class="text-4xl py-1 font-extrabold block">Khai thác</span>
    </div>
    <div class="text-center py-15">
        <span class="uppercase text-s text-gray-400">Blog</span>
        <h2 class="text-3xl font-bold py-10"> Posts gần đây </h2>
        <p class="m-auto w-4/5 text-gray-500">
            Tác động của thiên nhiên với đời sống con người.</p>
    </div>
    <div class="sm:grid grid-cols-2 w-4/5 m-auto">
    <div  class="flex bg-yellow-700 text-gray-100 pt-10">
        <div class="m-auto pt-4  pb-16 sm:m-auto w-4/5 block">
        <span class=" text-xs uppercase">MẸ THIÊN NHIÊN</span>
        <h3 class="text-xl font-bold py-10">
            Thiên nhiên có vai trò rất quan trọng đối với tất cả con người cũng như tất cả những sinh vật sống trên trái đất. Chính vì thế chúng ta phải biết khai thác, sử dụng hợp lí cũng như bảo tồn, 
            giữ gìn thiên nhiên để thiên nhiên trở thành một trong những tài sản quý giá nhất của con người chúng ta.</h3>
            <a href=""  class="uppercase bg-transparent border-2 
            border-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">Tìm hiểu thêm</a>
        </div>
    </div>
    <div>
        <img src="https://cdn.pixabay.com/photo/2016/03/09/09/43/person-1245959_1280.jpg" alt="pictureblog">
       </div>
    </div>
    @endsection 
    
