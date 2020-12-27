<?php namespace App\Repositories\Eloquent;

use App\Repositories\Contract\BlogInterface;
use DB;

/**
 * Class BlogRepository
 *
 * @package App\Repositories\Repositories
 * @author  Ashish.Jain
 */
class BlogRepository implements BlogInterface
{

    /**
     * @var string
     */
    var $table = 'posts';

    /**
     * Retrieve all item from the table.
     *
     * @return mixed
     */
    public function all()
    {
        return DB::table($this->table)
                 ->select('id', 'title', 'sef_url', 'text', 'created_at', 'updated_at')
                 ->orderBy('id', 'DESC')
                 ->get();
    }

    /**
     * It will save the data into the database.
     *
     * @param array $data
     * @return mixed|void
     */
    public function save(array $data)
    {
        return DB::table($this->table)->insertGetId($data);
    }

    /**
     * To edit the article.
     *
     * @param $id
     * @param $sefUrl
     * @return mixed
     */
    public function edit($id, $sefUrl)
    {
        return DB::table($this->table)
                 ->select('id', 'title', 'sef_url', 'text', 'created_at', 'updated_at')
                 ->where('sef_url', $sefUrl)
                 ->where('id', $id)
                 ->first();
    }

    /**
     * To update an article.
     *
     * @param array $data
     * @param int   $id
     * @return mixed|void
     */
    public function update(int $id, array $data)
    {
        return DB::table($this->table)->where('id', $id)->update($data);
    }

    /**
     * Delete an item from the model by key.
     *
     * @param int $id
     * @return mixed|void
     */
    public function delete(int $id)
    {
        return DB::table($this->table)->where('id', '=', $id)->delete();
    }
}
