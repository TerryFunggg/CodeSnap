<?php
namespace App\Module;
    class User
    {
        private $id;          //user id
        private $fields;        // other fields

        public function __construct()
        {
            $this->id = null;
            $this->fields = array(
                'name' => '',
                'passwd' => '',
                'email' => '',
                'is_company'=> '1'
            );
        }

        /**
          if $field == 'id' return userid else return fields array
          
         */
        public function __get($field)
        {
            if($field == 'id')
            {
                return $this->id;
            }
            else
            {
                return $this->fields[$field];
            }
        }

        public function __set($field, $value)
        {
            if($field == 'id'){
                $this->id = $value;
            }
            else if(array_key_exists($field, $this->fields))
            {
                $this->fields[$field] = $value;
            }
        }

        public static function vaildateUsername($username)
        {
            return preg_match('/^[A-Z0-9]{2,16}$/i',$username); 
        }

        public static function vaildateEmail($email){
            return filter_var($email , FILTER_VALIDATE_EMAIL);
        }

        public static function getByField($field,$data)
        {
            // connect to db()
            $conn = db_connect();

            $sql = 'SELECT * FROM USER where `' . $field .'` = `' . $data . '`' ;
            $result = $conn->query($sql);
            
            $user = new User();
            if($result->num_rows > 0){
                $row = mysqli_fetch_assoc($result);
                $user->id = $row['id'];
                $user->name = $row['name'];
                $user->passwd = $row['passwd'];
                $user->email = $row['email']; 
                $user->is_company = $row['is_company']; 
            }

            mysqli_free_result($result);
            return $user;
        }

        public function save()
        {
            $conn = db_connect();
            
            if($this->id)
            {
                $sql = sprintf('UPDATE `user` SET name = "%s", passwd = "%s" , email = "%s" , is_company = %d ' .
                               'WHERE id = %d ',
                               $this->name,
                               sha1($this->passwd),
                               $this->email,
                               $this->is_company,
                               $this->id);
                return $conn->query($sql);
            }
            else
            {
                $sql = sprintf('INSERT INTO `user` (name,passwd,email,is_company) values ("%s" , "%s" , "%s" , "%d")',
                               $this->name,
                               sha1($this->passwd),
                               $this->email,
                               $this->is_company);
                return $conn->query($sql);   

            }

        
            
        }
}
