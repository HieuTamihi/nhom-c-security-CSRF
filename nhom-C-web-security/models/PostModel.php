<?php
require_once 'BaseModel.php';
class PostModel extends BaseModel
{
    /**
     * Delete user by id
     * @param $id
     * @return mixed
     */
    public function deleteUserById($id, $token)
    {
        $sql = 'DELETE FROM post WHERE post_id  = "' . $id . '" AND concat(tokenPost,"123") = "' . $token . '"';
        // var_dump($sql);
        // die();
        return $this->delete($sql);
    }
    /**
     * Search users
     * @param array $params
     * @return array
     */
    public function getUsers($params = [])
    {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM post WHERE post_url LIKE "%' . $params['keyword'] . '%"';
            $users = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM post';
            $users = $this->select($sql);
        }

        return $users;
    }
}
