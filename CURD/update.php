<?php include ('header.php'); ?>
<?php include ('test.php'); ?>

<!-- this is to get the id passed trough URL and fetch details of that row through this id and display data -->
<?php
    if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        $result = pg_query($conn, "select * from smart_Watch where W_id=$id");
        if (!$result) {
            echo "an error occured.\n";
            exit;
        }
        else
        {
            $row = pg_fetch_row($result);
        }
        
    }
?>

<!-- Here this the logic for actual updation in this page itself -->
<?php

if (isset($_POST['update_p'])) 
{
    $wid = $_POST['pl'];
    $mod = $_POST['po'];
    $comp = $_POST['pr'];
    $wcol=$_POST['p'];
    $id_new=$_GET['id_new'];

    $result = pg_query($conn,"update smart_Watch set W_id = '$wid',company = '$comp',belt_color = '$wcol' where W_id='$id_new'");
    
        if(!$result)
        {
            die("query failed".pg_last_error($conn));
        }
        else
        {
            header('location:index.php?update_msg=You have successfully updated Smart Watch detail!!!');
        }
}
?>
<form action="update.php?id_new=<?php echo $id;?>" method="post">
    <div class="form-group">
        <label for="pid">Watch No:</label>
        <input type="text" name="pl" class="form-control" value=<?php echo $row[0];?>>
    </div>

    <div class="form-group">
        <label for="pid">Watch Model:</label>
        <input type="text" name="po" class="form-control" value=<?php echo $row[1];?>>
    </div>

    <div class="form-group">
        <label for="pid">Watch Company:</label>
        <input type="text" name="pr" class="form-control" value=<?php echo $row[2];?>>
    </div>
    
    <div class="form-group">
        <label for="pid">Watch Color:</label>
        <input type="text" name="p" class="form-control" value=<?php echo $row[3];?>>
    </div>


    <input type="submit" class="btn btn-primary" name="update_p" value="Update">

</form>







<?php include ('footer.php'); ?>