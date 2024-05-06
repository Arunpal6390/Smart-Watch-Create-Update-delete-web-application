
<?php include ('test.php'); ?>

<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];
}
    $result = pg_query($conn,"delete from smart_Watch where W_id='$id'");
    if(!$result)
    {
        die("query failed".pg_last_error($conn));
    }
    else
    {
        header('location:index.php?delete_msg=You have successfully deleted Smart watch detail!!!');
    }
    
?>