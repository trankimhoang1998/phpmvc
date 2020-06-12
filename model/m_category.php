<?php

class CategoryDB{
    public function get_categories(){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM categories";
            $statement=$db->prepare($query);
            $statement->execute();
            $categories= $statement->fetchAll();
            return ($categories);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public function addcategory($category){
        $db= Database::getDB();
        try{
            $query="INSERT INTO categories
                  (CategoryID,CategoryName,MoreInfo)
                  VALUES (:CategoryID,:CategoryName,:MoreInfo)
                    ";
            $statement=$db->prepare($query);
            $statement->bindValue(':CategoryID',$category['CategoryID']);
            $statement->bindValue(':CategoryName',$category['CategoryName']);
            $statement->bindValue(':MoreInfo',$category['MoreInfo']);

            $statement->execute();
            $statement->closeCursor();
            $statement_id=$db->lastInsertId();
            return ($statement_id);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public  function deletecategory($categoryid){
        $db= Database::getDB();
        try{
            $query="DELETE FROM categories WHERE CategoryID=:CategoryID";
            $statement=$db->prepare($query);
            $statement->bindValue(':CategoryID',$categoryid);
            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public  function get_category_by_categoryid($CategoryID){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM categories WHERE $CategoryID=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$CategoryID);
            $statement->execute();
            $books= $statement->fetch();
            $statement->closeCursor();
            return ($books);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }


    public function updatecategory($category){
        $db= Database::getDB();
        try{
            $query="UPDATE categories SET
                  CategoryName=?,
                  MoreInfo=?
                  WHERE CategoryID=?
                    ";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$category['CategoryName']);
            $statement->bindParam(2,$category['MoreInfo']);
            $statement->bindParam(3,$category['CategoryID']);

            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public function search_category($search_value){
        $db= Database::getDB();
        $search_value='%'.trim($search_value).'%';
        try{
            $query="SELECT * FROM categories WHERE CategoryName like ? OR MoreInfo like ?";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$search_value);
            $statement->bindParam(2,$search_value);
            $statement->execute();
            $row_count= $statement->fetchAll();
            $statement->closeCursor();
            return ($row_count);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }

    }


}

