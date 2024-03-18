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
    
    <title>Recycle bin</title>
    <link rel="stylesheet" href="">
</head>
<body >
     <div class="container border border-5 p-4 d-flex justify-content-between mt-4">
        <h2>Recycle Bin ​</h2>
        <div class=" d-flex ">
            <button id="Select" class="btn btn-primary me-1 "><i class="fa-solid fa-plus"></i> SELECT</button>
            <form method="post" class=" h-100 ">
                <button name="_Back" class=" btn btn-danger h-100">BACK</button>
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
                showTrash();
            ?>      
        </table>
     </div>
    <?php 
        include('modal.php');
    ?>
</body>
</html>
<?php include('../click.php'); ?>