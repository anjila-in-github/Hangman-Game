<?php
@include 'connect.php';

if(isset($_POST['add_category'])){
    $category_name=$_POST['category_name'];
        $category_image=$_FILES['category_image']['name'];
        $category_image_tmp_name=$_FILES['category_image']['tmp_name'];
        $category_image_folder='images/'.$category_image;
if(empty($category_name)|| empty($category_image)){
    $message[]='Please fill out all';
}else{
    $insert="INSERT INTO catgeory(category_name, image)VALUES('$category_name','$category_image')";
    $upload= mysqli_query($conn,$insert);
    if($upload){
        move_uploaded_file($category_image_tmp_name,$category_image_folder);
          $message[]='new category added successfully';
    }else{
        $message[]='couldnot add category';

    }
}

}
;
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    mysqli_query($conn,"DELETE FROM catgeory WHERE id=$id");
    header('location:categories.php');
};

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
    <div class="container">
        <div class="admin-category-form-container">
            <form action ="<?php $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <h1>ADD A NEW CATEGORY</h1>
            <input type ="text" placeholder="enter a category name" name="category_name" class="box">
            <input type ="file" accept="image/png, image/jpeg, image/jpg" name="category_image" class="box">
            <input type="submit" class="btn" name="add_category" value="add a category">

            
        </form>
</div>
<?php
$select=mysqli_query($conn,"SELECT * FROM catgeory");
?>
<div class="category_display">
    <table class="category-display-table">
        <thread>
            <tr>
                <th>category image</th>
                <th>category name</th>
                <th>action</th>
            </tr>
</thread>
<?php
while($row=mysqli_fetch_assoc($select)){


?>

<tr>
    <td><img src="uploaded_img/<?php $row['image'];?>" .height="100".alt=""></td>
     <td><?php echo $row['category_name'];?></td>
     <td>
        <a href="categories_update.php?edit=<?php echo $row['id'];?>"class="btn"><i class="fas fa-edit"></i>edit</a>

        <a href="categories.php?delete=<?php echo $row['id'];?>"class="btn"><i class="fas fa-trash"></i>delete</a>
    </td>
            </tr>
<?php
};
?>
</table>
</div>
</div>

    
</body>
</html>