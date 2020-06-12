<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

        <div class="container">
            <form method="post">
                <div class="form-group">
                    <label>CardID</label>
                    <input type="text" class="form-control" name="cardid" value="<?php echo $cardID ?>">
                </div>
                <div class="form-group">
                    <label>BookID</label>
                    <input type="text" class="form-control" name="bookid">
                </div>
                <?php echo $message_error ?>
                <br>

                <button type="submit" class="btn btn-primary" name="action" value="add_borrow_book">ADD</button>
            </form>
            <br>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th colspan="2">CardID:<?php echo $student['CardID']?></th>
                    <th colspan="2">Name:<?php echo $student['Name']?></th>
                    <th colspan="3">Address:<?php echo $student['Address']?></th>


                </tr>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">BookID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Author</th>
                    <th scope="col">Dateborrow</th>
                    <th scope="col">Action</th>

                </tr>
                </thead>
                <tbody>
                <?php if(isset($_SESSION[$cardID])): ?>
                    <?php foreach ($_SESSION[$cardID] as $key => $value){?>

                <tr>
                    <th scope="row"><?php echo $key+1?></th>
                    <td><?= $value['bookid']?></td>
                    <td><?= $value['name']?></td>
                    <td><?= $value['publisher']?></td>
                    <td><?= $value['author']?></td>
                    <td><?= $value['dateborrow']?></td>
                    <td>
                        <a href="?controller=receipt&cardID=<?php echo $cardID; ?>&action=delete&id=<?=$key?>">Delete</a>
                    </td>
                </tr>


                    <?php } ?>
                <?php endif; ?>
                </tbody>
            </table>

            <form action="" method="post">

                <input type="hidden" name="cardID" value="<?php echo $cardID; ?>">

                <button type="submit" class="btn btn-primary" value="receipt_book" name="action" >Submit</button>

            </form>




           <!-- //<a href="?action=receipt_book&CardID="></a>-->
        </div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>