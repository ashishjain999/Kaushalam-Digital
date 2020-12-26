<?php namespace App\Http\Controllers;

use App\Repositories\Contract\BlogInterface;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 * @author  Ashish.Jain
 */
class HomeController extends Controller
{

    /**
     * @var BlogInterface
     */
    public $blog;

    /**
     * HomeController constructor.
     *
     * @param BlogInterface $blog
     */
    public function __construct(BlogInterface $blog)
    {
        $this->blog = $blog;
    }

    /**
     * Select values from posts table
     *
     * @return \Illuminate\Contracts\Foundation\Application|
     */
    public function index()
    {
        $posts = $this->blog->all();

        return view('posts.home', ['posts' => $posts]);
    }
}
