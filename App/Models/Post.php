<?php

namespace App\Models;

use PDO;
use PDOException;

class Post extends \Core\Model
{
    public static function getAll()
    {
        try {
            
            $db = static::getDB();
           
            $stmt = $db->query('SELECT id, image, title, content FROM posts ORDER BY created_at');

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
            return $results;

        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public static function insertPost($table,$data)
    {
        try {
            $db = static::getDB();
            $keys = implode(",", array_keys($data));
            $values = ":" .implode(", :",array_keys($data));

            $sql = "INSERT INTO $table($keys) VALUES($values)";

            $statement =  $db->prepare($sql);
            foreach($data as $key => $value) {
                $statement->bindValue(":$key",$value);
            }

            return $statement->execute();

        } catch(PDOException $e){
            echo $e->getMessage();
        }

    }

    public static function getPostById($table,$cond,$data = array(), $fetchStyle = PDO::FETCH_ASSOC)
    {
        try{
            $db = static::getDB();
            $sql = "SELECT * FROM $table WHERE $cond";
            $statement = $db->prepare($sql);

            foreach($data as $key => $value){
                $statement->bindParam($key,$value);
            }
         
            $statement->execute();
            return $statement->fetchAll($fetchStyle);

        } catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function updatePost($table,$cond,$data)
    {
        try{
            $db = static::getDB();
            $updateKeys = '';
            foreach($data as $key => $value) {
                $updateKeys .= "$key=:$key,";
            }
            $updateKeys = rtrim($updateKeys,","); // cut day , cuoi hang
            $sql = "UPDATE $table SET $updateKeys WHERE $cond";
            $statement = $db->prepare($sql);
            $statement->bindValue(":$key",$value);
    
            foreach($data as $key => $value) {
                $statement->bindValue(":$key",$value);
            }
    
            return $statement->execute();

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    public static function deletePost($table,$cond,$limit =1){
        try {
            $db = static::getDB();
            $sql = "DELETE FROM $table WHERE $cond LIMIT $limit";
            return $db->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    
    }

   


}