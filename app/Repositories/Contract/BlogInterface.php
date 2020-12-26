<?php namespace App\Repositories\Contract;

/**
 * Interface BlogInterface
 *
 * @package App\Repositories\Contract
 * @author  Ashish.Jain
 */
interface BlogInterface
{

    /**
     * Retrieve all item from the table.
     *
     * @return mixed
     */
    public function all();

    /**
     * It will save the data into the database.
     *
     * @param array $data
     * @return mixed
     */
    public function save(array $data);

    /**
     * To edit the article.
     *
     * @param $id
     * @param $sefUrl
     * @return mixed
     */
    public function edit($id, $sefUrl);

    /**
     * Update an item from the model.
     *
     * @param array   $data
     * @param integer $id
     * @return mixed
     */
    public function update(int $id, array $data);

    /**
     * Delete an item from the model by key.
     *
     * @param integer $id
     * @return mixed
     */
    public function delete(int $id);
}
