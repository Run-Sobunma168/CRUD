<?php 
    include('../function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
        include ('../link/style.php');
        include ('../link/icon.php');
    ?>
    
    <title>Product Management</title>
    <link rel="stylesheet" href="../style/show.css">
</head>
<body >
     <div class="container border border-5 p-4 d-flex justify-content-between mt-4">
        <h2>Product's Information ​</h2>
        <div class=" d-flex">
            <button id="open_add" class="btn btn-primary me-1" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus"></i>  Add Product</button>
            <form method="post">
                <button id="Trash" name="_Trash" class="btn btn-outline-danger w-100 h-100">Trash<i class="fa-solid fa-trash" class=" w-100 h-100"></i></button>
            </form>
        </div>
     </div>
     <br><br>
     <div class="container">
        <table class="table align-middle" style="table-layout: fixed;">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php 
                ShowPro();
            ?>      
        </table>
     </div>
    <?php 
        include('modal.php');
    ?>
</body>
</html>
<?php include('../click.php'); ?>