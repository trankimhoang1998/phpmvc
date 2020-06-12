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



    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>BookID</label>
            <input type="text" class="form-control" name="bookid" value="<?= $list_books['BookID']?>">
        </div>
        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="<?= $list_books['Name']?>">
        </div>
        <div class="form-group">
            <label>Publisher</label>
            <input type="text" class="form-control" name="publisher" value="<?= $list_books['Publisher']?>">
        </div>
        <div class="form-group">
            <label>Author</label>
            <input type="text" class="form-control" name="author" value="<?= $list_books['Author']?>">
        </div>

        <div class="form-group">
            <label>Category</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="categoryid">

                <?php
                foreach ($list_categories as $key => $value) {
                    ?>
                    <option value="<?= $value['CategoryID'] ?>"><?= $value['CategoryName'] ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>Numbofpage</label>
            <input type="text" class="form-control" name="numbofpage" value="<?= $list_books['Numbofpage']?>">
        </div>
        <div class="form-group">
            <label>Maxdate</label>
            <input type="text" class="form-control" name="maxdate" value="<?= $list_books['Maxdate']?>">
        </div>
        <div class="form-group">
            <label>Num</label>
            <input type="text" class="form-control" name="num" value="<?= $list_books['Num']?>">
        </div>
        <div class="form-group">
            <label>summary</label>
            <input type="text" class="form-control" name="summary" value="<?= $list_books['Summary']?>">
        </div>

        <div class="form-group">
            <label>Picture</label>
            <input type="file" class="form-control" name="picture"">
        </div>

        <div class="form-group">
            <input type="hidden" class="form-control" name="old_picture" value="<?= $list_books['Picture']?>">
        </div>

        <button type="submit" class="btn btn-primary" value="save_edit" name="action">ADD</button>
    </form>

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