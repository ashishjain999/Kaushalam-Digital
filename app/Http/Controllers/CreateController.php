<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

/**
 * Class CreateController
 *
 * @package App\Http\Controllers
 * @author  Ashish Jain
 */
class CreateController extends Controller
{

    /**
     * Main page to show an article
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public function index()
    {
        return view('posts.create');
    }

    /**
     * To save the data into the database
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $sefUrl = str_replace(' ', '-', strtolower($request[ 'post_title' ]));

        $data = [
            'title'      => $request[ 'post_title' ],
            'sef_url'    => $sefUrl,
            'text'       => $request[ 'post_body' ],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $db = DB::table('posts')->insertGetId($data);

        return redirect('/', 201);
    }

    /**
     * To edit the article
     *
     * @param $id
     * @param $sefUrl
     * @return \Illuminate\Contracts\Foundation\Application|
     */
    public function edit($id, $sefUrl)
    {
        $post = DB::table('posts')
                  ->select('id', 'title', 'sef_url', 'text', 'created_at', 'updated_at')
                  ->where('sef_url', $sefUrl)
                  ->where('id', $id)
                  ->first();

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * To update the article
     *
     * @param Request $request
     * @param         $id
     * @return array
     */
    public function update(Request $request, $id)
    {
        $sefUrl = str_replace(' ', '-', strtolower($request[ 'post_title' ]));

        $data = [
            'title'      => $request[ 'post_title' ],
            'sef_url'    => $sefUrl,
            'text'       => $request[ 'post_body' ],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $db = DB::table('posts')->where('id', $id)->update($data);

        return redirect('/edit/' . $id . '/' . $sefUrl, 201);

        return view('posts.edit');
    }

    /**
     * To delete the article
     *
     * @param $id
     * @return resource
     */
    public function delete($id)
    {
        $delete = DB::table('posts')->where('id', '=', $id)->delete();

        return redirect('/', 201);
    }

}
