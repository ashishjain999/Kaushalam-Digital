<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contract\BlogInterface;

/**
 * Class CreateController
 *
 * @package App\Http\Controllers
 * @author  Ashish.Jain
 */
class CreateController extends Controller
{

    /**
     * @var BlogInterface
     */
    public $blog;

    /**
     * CreateController constructor.
     *
     * @param BlogInterface $blog
     */
    public function __construct(BlogInterface $blog)
    {
        $this->blog = $blog;
    }

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
        $check = request()->validate([
            'post_title' => 'required',
            'post_body'  => 'required',
        ]);

        $sefUrl = str_replace(' ', '-', strtolower($request[ 'post_title' ]));

        $data = [
            'title'      => $request[ 'post_title' ],
            'sef_url'    => $sefUrl,
            'text'       => $request[ 'post_body' ],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $db = $this->blog->save($data);

        return redirect('/', 201)->with('success', 'Success');
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
        $post = $this->blog->edit($id, $sefUrl);

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
        $check = request()->validate([
            'post_title' => 'required',
            'post_body'  => 'required',
        ]);

        $sefUrl = str_replace(' ', '-', strtolower($request[ 'post_title' ]));

        $data = [
            'title'      => $request[ 'post_title' ],
            'sef_url'    => $sefUrl,
            'text'       => $request[ 'post_body' ],
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $db = $this->blog->update($id, $data);

        return redirect('/edit/' . $id . '/' . $sefUrl, 201)->with('success', 'Success');
    }

    /**
     * To delete the article
     *
     * @param $id
     * @return resource
     */
    public function delete($id)
    {
        //$delete = DB::table('posts')->where('id', '=', $id)->delete();
        $delete = $this->blog->delete($id);

        return redirect('/', 201)->with('danger', 'Danger');
    }

}
