<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user_data';
    protected $primaryKey = 'uid';  // Define the primary key
    protected $allowedFields = [
        'google_id', 'type', 'name', 'email', 'phone', 'email_verify', 'avatar_url', 'time_stamp','password','reset_token','reset_expires'
    ];

    public function get_userdata_via_id($id)
    {
       $query = $this->db->table($this->table);
       $query->where('uid', $id); // Assuming 'id' is the primary key column name
   
       $result = $query->get()->getResultArray(); // Use get() to execute the query and get the row
   
       if ($result) {
           return $result;
       } else {
           return false;
       }
    }

  /**
     * Create or update a Google user.
     *
     * @param array $data User data from Google
     * @return int|bool The user's ID if successful, or false on failure
     */
    public function createOrUpdateGoogleUser($data)
    {
        // Check if the user already exists
        $existingUser = $this->where('google_id', $data['id'])->first();

        if ($existingUser) {
            // User exists, update the record
            $updateData = [
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar_url' => $data['picture']
            ];
            if ($this->update($existingUser['uid'], $updateData)) {
                return $existingUser['uid'];
            } else {
                return false;
            }
        } else {
            // New user, insert record
            $insertData = [
                'google_id' => $data['id'],
                'name' => $data['name'],
                'email' => $data['email'],
                'type' => 2,  // Default type
                'email_verify' => 1,  // Assuming email is verified by Google
                'avatar_url' => $data['picture']
            ];
            if ($this->insert($insertData)) {
                return $this->getInsertID();
            } else {
                return false;
            }
        }
    }

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    protected function hashPassword(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_BCRYPT);
        }
        return $data;
    }
}

?>