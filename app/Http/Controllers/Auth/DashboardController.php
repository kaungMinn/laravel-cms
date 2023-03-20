<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\Models\Message;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $postCount = Post::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $messageCount = Message::count();
        return view('auth.dashboard', compact('postCount', 'categoryCount', 'userCount', 'messageCount'));
    }
}
