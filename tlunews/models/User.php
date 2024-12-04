<?php
require_once __DIR__.'/../config/Database.php';
class User{
    private $id;
    private $userName;
    private $password;
    private $role;  // 0 is user ; 1 is admin
    public function getId(){
        return $this->id;
    }
    public function getUserName(){
        return $this->userName;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getRole(){
        return $this->role;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setUserName($userName){
        $this->userName = $userName;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setRole($role){
        $this->role = $role;
    }
    public function validationLogin($userName, $password)
    {
        $db = new Database();
        $connection = $db::getConnection();
        if($connection === null){
            throw new Exception('Failed in connect database');

        }
        try{
            $sql = "SELECT ID, USERNAME, PASSWORD, ROLE FROM USERS WHERE username = :userName";
            $statement = $connection->prepare($sql);
            $statement->bindParam(':username', $userName);
            $statement->execute();

            $user = $statement->fetch(PDO::FETCH_ASSOC);
            if($user){
                if(password_verify($password, $user['password'])){
                    $this->id = $user['id'];
                    $this->userName = $user['username'];
                    $this->password = $user['password'];
                    $this->role = $user['role'];

                    return [
                        'success' => true,
                        'role' => $this->role,
                        'userId' => $this->id
                    ];
                }else{
                    return [
                        'success'=> false,
                        'message'=> 'Invalid password'
                    ];
                }
            }else{
                return [
                    'success' => false,
                    'message'=> 'User not exits'
                ];
            }

        }catch (PDOException $e){
            throw new Exception('Failed in query database'.$e->getMessage());
    }
    }
}
