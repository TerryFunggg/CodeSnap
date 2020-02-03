<?php
//namespace App\Model;
require_once "./../Library/DB.php";

//include __DIR__.'/../Library/functions.php';
class User
{
    private $user_id; // user id
    private $fields; // other record fields
    public function __construct()
    {
        $this->user_id = null;
        $this->fields = [
            'username'=>'',
            'password'=>'',
            'email_addr'=>'',
            'is_active'=> 0
        ];
    }

    public function __get($field)
    {
        if ($field == 'user_id'){
           return $this->user_id;
        } else{
            return $this->fields[$field];
        }
    }

    public function __set($field, $value)
    {
        if ($field == 'user_id'){
            $this->user_id = $value;
        }else if (array_key_exists($field,$this->fields)){
            $this->fields[$field] = $value;
        }
    }

    public static function validateEmailAddress($email)
    {
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public static function validateUsername($username)
    {
        return preg_match('/^[A-Z0-9]{2,20}$/i',$username);
    }

    public static function getById($user_id)
    {
        $user = new User();
        $db = new DB();
        $statement = $db->prepare("SELECT * FROM USER WHERE user_id = :id");
        $statement->bindValue(':id',$user_id);
        if($statement->execute()) {
           return $user->fetchRowFromDB($statement,$user);
        }
        return false;
    }

    public static function getByUsername($username)
    {
        $user = new User();
        $db = new DB();
        $statement = $db->prepare("SELECT * FROM USER WHERE username = :name");
        $statement->bindValue(':name',$username);

        if($statement->execute()) {
            return $user->fetchRowFromDB($statement,$user);
        }
        return false;
    }

    public function save():bool
    {
        $db = new DB();
        $params = $this->getParams($this->fields);
        if($this->user_id){
            $statement = $db->prepare("UPDATE USER SET $params WHERE user_id=:user_id");
            $statement->bindValue(":user_id",$this->user_id);
            $this->bindAllValues($statement,$this->fields);
            return $statement->execute();
        }else{
            $statement = $db->prepare("INSERT INTO USER (username, password, email_addr, is_active) VALUES (:username,:password,:email_addr,:is_active)");
            $this->bindAllValues($statement,$this->fields);
            return $statement->execute();
        }
    }

    public function setInactive() : bool
    {
        $this->is_active = 0;
        $this->save();
        $user = self::getByUsername($this->username);
        $db = new DB();
        $token = random_text(5);
        $statement = $db->prepare("INSERT INTO PENDING (USER_ID, TOKEN) VALUES (:uid,:cd)");
        $statement->bindValue(":uid",$user->user_id);
        $statement->bindValue(':cd',$token);
        return $statement->execute();
    }

    public function setActive($token):bool
    {
        $db = new DB();
        $statement = $db->prepare("SELECT TOKEN FROM PENDING WHERE USER_ID = :id");
        $statement->bindValue(':id',$this->user_id);
        $statement->execute();
        $result = $statement->fetch();
        if(!$result){
            return false;
        }else{
            $statement = $db->prepare("DELETE FROM PENDING WHERE USER_ID = :id AND TOKEN = :tk");
            $statement->bindValue(':id',$this->user_id);
            $statement->bindValue(':tk',$token);
            if(!$statement->execute()){
                    return false;
            }else{
                $this->is_active = 1;
                return $this->save();
            }
        }
    }

    private function getParams(array $params)
    {
        $filterParams = [];
        foreach ($params as $param => $value) {
                $filterParams[] = "$param=:$param";
        }
        return implode(",",$filterParams);
    }

    private function bindAllValues(PDOStatement $statement, array $params)
    {
        foreach ($params as $param => $value){
                $statement->bindValue(':'.$param,$value);
        }
        return $statement;
    }

    public function fetchRowFromDB(PDOStatement $statement , User $user){
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $user->username = $row['username'];
        $user->password = $row['password'];
        $user->email_addr = $row['email_addr'];
        $user->isActive = $row['is_active'];
        $user->user_id = $row['user_id'];
        return $user;
    }

}
