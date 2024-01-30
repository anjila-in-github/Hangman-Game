
<?php
@include 'connect.php';

$id=$_GET['edit'];

if(isset($_POST['update_category'])){
    $category_name=$_POST['category_name'];
        $category_image=$_FILES['category_image']['name'];
        $category_image_tmp_name=$_FILES['category_image']['tmp_name'];
        $category_image_folder='uploaded_img/'.$category_image;
if(empty($category_name)|| empty($category_image)){
    $message[]='Please fill out all';
}else{
    $update="UPDATE catgeory SET category_name='$category_name', image='category_image'
    WHERE id=$id";
    $upload= mysqli_query($conn,$update);
    if($upload){
        move_uploaded_file($category_image_tmp_name,$category_image_folder);
    }else{
        $message[]='couldnot add product';

    }
}

}
;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="categories.css">
</head>
<body>
<?php
    if(isset($message)){
        foreach ($message as $message) {
            echo '<span class="message">'.$message.'</span>' ;
        }
    }
    ?>
    <div class="conatiner">
    <div class="admin-category-form-container centered">
        <?php
        $select=mysqli_query($conn,"SELECT * from catgeory WHERE id=$id");
        while($row=mysqli_fetch_assoc($select)){

        
        ?>
            <form action ="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <h1> UPDATE CATEGORY</h1>
            <input type ="text" placeholder="enter a category name" value="<?php $row[' category_name'];?>" name="category_name" class="box">
            <input type ="file" accept="image/png,image/jpeg,image/jpg" name="category_image" class="box">
            <input type="submit" class="btn" name="update_category" value="update a category">
            <a href="categories.php" class="btn"> go back</a>

            
        </form>
        <?php
    }
    ;
    ?>
</div>
</div>
</body>
</html>