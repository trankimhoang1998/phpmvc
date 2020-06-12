<?php

class Admin_DB{
    public static function check_login($user){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM admin WHERE username=? AND password=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$user['username']);
            $statement->bindParam(2,$user['password']);
            $statement->execute();
            $result= $statement->fetchAll();
            $statement->closeCursor();
            if(count($result)>0){
                return true;
            }
            else{
                return false;
            }
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function get_user_by_username($username){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM admin WHERE username=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$username);
            $statement->execute();
            $admins= $statement->fetch();
            $statement->closeCursor();
            return ($admins);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }
}

