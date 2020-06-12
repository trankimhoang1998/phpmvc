<?php



class BookDB{
    public static function get_book(){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM books";
            $statement=$db->prepare($query);
            $statement->execute();
            $books= $statement->fetchAll();
            return ($books);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function get_book_by_page($start,$limit){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM books LIMIT $start, $limit";
            $statement=$db->prepare($query);
            $statement->execute();
            $books= $statement->fetchAll();
            return ($books);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }


    public static function get_book_by_categoryid($id){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM books WHERE categoryID=:categoryID";
            $statement=$db->prepare($query);
            $statement->bindValue(':categoryID',$id);
            $statement->execute();
            $books= $statement->fetchAll();
            return ($books);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function get_book_by_bookid($bookID){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM books WHERE bookID=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$bookID);
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

    public static function addbook($bookid,$name,$publisher,$author,$categoryid,$numbofpage,$maxdate,$num,$summary,$picture){
        $db= Database::getDB();
        try{
            $query="INSERT INTO books
                  (BookID,Name,Publisher,Author,CategoryID,Numbofpage,Maxdate,Num,Summary,Picture)
                  VALUES (:bookid,:name,:publisher,:author,:categoryid,:numbofpage,:maxdate,:num,:summary,:picture)
                    ";
            $statement=$db->prepare($query);
            $statement->bindValue(':bookid',$bookid);
            $statement->bindValue(':name',$name);
            $statement->bindValue(':publisher',$publisher);
            $statement->bindValue(':author',$author);
            $statement->bindValue(':categoryid',$categoryid);
            $statement->bindValue(':numbofpage',$numbofpage);
            $statement->bindValue(':maxdate',$maxdate);
            $statement->bindValue(':num',$num);
            $statement->bindValue(':summary',$summary);
            $statement->bindValue(':picture',$picture);
            $statement->execute();
            $statement->closeCursor();

            $book_id=$db->lastInsertId();
            return ($book_id);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function deletebook($bookid){
        $db= Database::getDB();
        try{
            $query="DELETE FROM books WHERE BookID=:bookid";
            $statement=$db->prepare($query);
            $statement->bindValue(':bookid',$bookid);
            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);
        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function update($book){
        $db= Database::getDB();
        try{
            $query="UPDATE books SET
                  Name=?,
                  Publisher=?,
                  Author=?,
                  CategoryID=?,
                  Numbofpage=?,
                  Maxdate=?,
                  Num=?,
                  Summary=?,
                  Picture=? 
                  WHERE BookID=?
                    ";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$book['Name']);
            $statement->bindParam(2,$book['Publisher']);
            $statement->bindParam(3,$book['Author']);
            $statement->bindParam(4,$book['CategoryID']);
            $statement->bindParam(5,$book['Numbofpage']);
            $statement->bindParam(6,$book['Maxdate']);
            $statement->bindParam(7,$book['Num']);
            $statement->bindParam(8,$book['Summary']);
            $statement->bindParam(9,$book['Picture']);
            $statement->bindParam(10,$book['BookID']);

            $row_count= $statement->execute();
            $statement->closeCursor();
            return ($row_count);

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }

    public static function search_book($search_value){
        $db= Database::getDB();
        $search_value='%'.trim($search_value).'%';
        try{
            $query="SELECT * FROM books WHERE Name like ? OR Author like ? OR Summary like ?";
            $statement=$db->prepare($query);

            $statement->bindParam(1,$search_value);
            $statement->bindParam(2,$search_value);
            $statement->bindParam(3,$search_value);
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

    public static function check_bookID($bookID){
        $db= Database::getDB();
        try{
            $query="SELECT * FROM books WHERE bookID=?";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$bookID);
            $statement->execute();
            $books= $statement->fetch();
            if(!empty($books)){
                return true;
            }else {
                return false;
            }

        }catch (PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Error connecting to database: $error_message</p>";
            exit();
        }
    }
}

