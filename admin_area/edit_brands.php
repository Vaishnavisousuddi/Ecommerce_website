<?php
if(isset($_GET['edit_brands'])){
    $edit_brand=$_GET['edit_brands'];

    $get_brands="Select * from `brands` where brand_id=$edit_brand";
    $result=mysqli_query($con,$get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];

}

if(isset($_POST['edit_brand'])){
    $brand_title=$_POST['brand_title'];
    
    $update_query="update `brands` set brand_title='$brand_title' where  brand_id=$edit_brand";
    $result_brand=mysqli_query($con,$update_query);
    if($result_brand){
        echo "<script>alert('Brands has been updated sucessfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";

    }



}
?>

<div class="container mt-5">
    <h2 name="title" class="text-center">Edit Brands</h2>
    <form action="" method="post" class="text-center">
    <div class="form-outline w-50 m-auto mb-4">
        <label for="brand_title" class="form-label p-2">Brand Title</label>
        <input type="text" id="brand_title" name="brand_title" class="form-control" required="required" value="<?php echo $brand_title?>">
    </div>
    <input type="submit" value="Update Brand" class="btn btn-info px-3 mb-3 mt-3" name="edit_brand">
    </form>
</div>