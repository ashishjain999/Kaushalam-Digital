<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 * @author  Ashish Jain
 */
class HomeController extends Controller
{

    /**
     * Select values from posts table
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     */
    public function index()
    {
        $posts = DB::table('posts')
                   ->select('id', 'title', 'sef_url', 'text', 'created_at', 'updated_at')
                   ->orderBy('id', 'DESC')
                   ->get();

        return view('posts.home', ['posts' => $posts]);
    }
}
