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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
</head>
<body>

<div class="container">

    <a href="?controller=main"> <button type="button" class="btn btn-primary">Home</button></a>
    <a href="?controller=category&action=add_new"><button type="button" class="btn btn-danger">ADD CATEGORY</button></a>

    <form class="mt-3" method="post">
        <div class="form-group">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="search_value">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" name="action" value="search_category">Search</button>
                    </div>
                </div>
            </div>
        </div>

    </form>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">CategoryID </th>
            <th scope="col">CategoryName</th>
            <th scope="col">MoreInfo</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_category as $key => $value) {?>
            <tr>
                <th scope="row"><?php echo $key+1?></th>
                <td><?= $value['CategoryID']?></td>
                <td><?php echo $value['CategoryName']?></td>
                <td><?php echo $value['MoreInfo']?></td>

                <td>
                    <a href="?controller=category&action=edit&category_id=<?= $value['CategoryID']?>"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <a href="?controller=category&action=delete&category_id=<?= $value['CategoryID']?>"><i class="fas fa-trash-alt"></i></a>
                </td>

            </tr>

        <?php } ?>
        </tbody>
    </table>
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