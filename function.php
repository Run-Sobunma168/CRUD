<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php 
    $connection = new mysqli('localhost','root','','db_php_2');

    // Add product
    function add_product(){
        global $connection; //make connection as global variable
        if(isset($_POST['btn_add'])){
            $name     = $_POST['_name'];
            $category = $_POST['_category'];
            $price    = $_POST['_price'];
            if(!empty($name) && !empty($price) && !empty($category)){
                $sql_insert = "
                                INSERT INTO `product` (`name`,`category`,`price`)
                                VALUES ('$name' ,'$category' ,'$price');
                              ";
                $result = $connection -> query($sql_insert);
                if($result){
                    echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Data Inserted",
                                    text: "You inserted product",
                                    icon: "success",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
                }
            }
            else{
                echo '
                    <script>
                        $(document).ready(function(){
                            swal({
                                title: "Data Inserted",
                                text: "You inserted product fail",
                                icon: "error",
                                button: "Confirm",
                            });
                        })
                    </script>
                ';
            }
        }
    }
    add_product();
    
    // show Product
    function ShowPro(){
        global $connection ;
        $sql = ' SELECT * FROM `product` WHERE `is_delete`= 0 ORDER BY `id` DESC ';
        $result = $connection -> query($sql);
        while( $row = mysqli_fetch_assoc( $result)){
            echo '
                <tr>
                    <td>'.$row['id'].'</td>
                    <td>'.$row['name'].'</td>
                    <td>'.$row['category'].'</td>
                    <td>'.$row['price'].'</td>
                    <td class="td_button">
                        <button id="open_edit" class="btn btn-outline-warning h-100 me-2 " data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-pen-to-square"></i>  Edit</button>
                        <form method="post">
                            <input name ="id_remove" , value = '.$row['id'].' type = "hidden">
                            <button id="delete_pro" name="delete_pro" class="btn btn-outline-danger h-100 "><i class="fa-solid fa-trash"></i>  Delete</button>
                        </form>
                    </td>
                    
                </tr>
            ' ; 
        }

    }

    // show remove 
    function showTrash(){
        global $connection ;
        $sql = ' SELECT * FROM `product` WHERE `is_delete` = 1 ORDER BY `id` ASC';
        $reuslt = $connection -> query($sql); 
        while($row = mysqli_fetch_assoc($reuslt)){
            echo '
            <tr>
                <td>'.$row['id'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['category'].'</td>
                <td>'.$row['price'].'</td>
                <td>
                    <form method="post">
                        <input name ="id_remove" , value = '.$row['id'].' type = "hidden">
                        <button id="recover" name="_recover" class="btn btn-outline-primary ""><i class="fa-solid fa-rotate-right"></i> RECOVER</button>
                    </form>
                </td>
            </tr>
        ' ; 
        }
    }

    // edit product 
    function edit_produc(){
        global $connection ; 
        if(isset($_POST['btn_edit'])){
            $id         = $_POST['_id'];
            $name       = $_POST['_name'];
            $category   = $_POST['_category'];
            $price      = $_POST['_price'];
            if( !empty($name) && !empty($category) && !empty($price) ){
                $sql_update = "
                                UPDATE `product` SET `name` = '$name' , `category` = '$category' , `price` = '$price' WHERE `id` = '$id';    
                            ";
                $result = $connection -> query($sql_update);
                if($result){
                    echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Data Update",
                                        text: "You Edit product",
                                        icon: "success",
                                        button: "Confirm",
                                    });
                                })
                            </script>
                        ';
                }
            }
            else{
                echo '
                        <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Data Update",
                                    text: "You Edit product fail",
                                    icon: "error",
                                    button: "Confirm",
                                });
                            })
                        </script>
                    ';
            }

        }
    }
    edit_produc();

    // Delete
    function Remove(){
        global $connection ;

        if(isset($_POST['delete_pro'])){
            $remove = $_POST['id_remove'];
            $sql_set = "
                        UPDATE `product` SET `is_delete` = 1  WHERE `id` = '$remove' ;
            ";
            $result = $connection -> query($sql_set) ;
            if($result){
                echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Data Remove",
                                        text: "You remove product",
                                        icon: "success",
                                        button: "Confirm",
                                    });
                                })
                            </script>
                        ';
            }
        };
        
    }
    Remove();

    function Recover(){
        global $connection ;

        if(isset($_POST['_recover'])){
            $remove = $_POST['id_remove'];
            $sql_set = "
                        UPDATE `product` SET `is_delete` = 0  WHERE `id` = '$remove' ;
            ";
            $result = $connection -> query($sql_set) ;
            if($result){
                echo '
                            <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Data Recover",
                                        text: "You recover product",
                                        icon: "success",
                                        button: "Confirm",
                                    });
                                })
                            </script>
                        ';
            }
        };
        
    }
    Recover();
    // Locationtrash
    function LocationTrash(){
        if(isset($_POST['_Trash'])){
            session_start();
            header('location: trash.php');
        }
    }
    LocationTrash();

    //locationShow
    function LocationShow(){
        if(isset($_POST['_Back'])){
            session_start();
            header('location: show.php');
        }
    }
    LocationShow();