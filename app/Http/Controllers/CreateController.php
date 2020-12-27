<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contract\BlogInterface;
use App\Http\Requests\PostRequest;

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
     * @return void
     */
    public function index()
    {
        return view('posts.create');
    }

    /**
     * To save the data into the database
     *
     * @param PostRequest $request
     * @return array
     */
    public function store(PostRequest $request)
    {
//        $check = request()->validate([
//            'post_title' => 'required',
//            'post_body'  => 'required',
//        ]);

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
     * @return void
     */
    public function edit($id, $sefUrl)
    {
        $post = $this->blog->edit($id, $sefUrl);

        return view('posts.edit', ['post' => $post]);
    }

    /**
     * To update the article
     *
     * @param PostRequest $request
     * @param             $id
     * @return array
     */
    public function update(PostRequest $request, $id)
    {
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
        $delete = $this->blog->delete($id);

        return redirect('/', 201)->with('danger', 'Danger');
    }

}
