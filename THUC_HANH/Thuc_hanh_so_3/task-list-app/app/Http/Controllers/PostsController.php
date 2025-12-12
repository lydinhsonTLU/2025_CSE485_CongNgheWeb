<?php
namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::all();
        return view("home", compact("posts"));
    }
}
