<?php

class ReceiptBD{
    public static function receipt_book($receipt){
        $db= Database::getDB();
        try{
            $query="INSERT INTO receipts
                  (CardID,BookID,dateborrow)
                  VALUES (?,?,?)
                    ";
            $statement=$db->prepare($query);
            $statement->bindParam(1,$receipt['cardID']);
            $statement->bindParam(2,$receipt['bookID']);
            $statement->bindParam(3,$receipt['dateborrow']);

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
}