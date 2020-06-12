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
    <a href="?controller=admin&action=add_new"><button type="button" class="btn btn-danger">ADD USER</button></a>



    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">id </th>
            <th scope="col">username</th>
            <th scope="col">name</th>
            <th scope="col">level</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list_users as $key => $value) {?>
            <tr>
                <th scope="row"><?php echo $key+1?></th>
                <td><?= $value['id']?></td>
                <td><?php echo $value['username']?></td>
                <td><?php echo $value['name']?></td>
                <td><?php echo $value['level']?></td>
                <td>
                    <a href="?controller=admin&action=edit&userid=<?= $value['id']?>"><i class="fas fa-edit"></i></a>
                </td>
                <td>
                    <a href="?controller=admin&action=delete&userid=<?= $value['id']?>"><i class="fas fa-trash-alt"></i></a>
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