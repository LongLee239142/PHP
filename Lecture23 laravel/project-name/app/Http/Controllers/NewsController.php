<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news'); // trả về trang news.blade.php
    }
} // không phải thiếu thẻ đóng php đâu, cấu trúc nó vậy :"(