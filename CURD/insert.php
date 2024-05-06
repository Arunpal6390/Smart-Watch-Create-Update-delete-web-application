<?php include ('header.php'); ?>
<?php include ('test.php'); ?>
<?php


if(isset($_POST['pdetail']))
{
    $wid= $_POST['pl'];
    $model = $_POST['po'];
    $comp= $_POST['pr'];
    $beltc=$_POST['pc'];

    if($wid== "" || $model == "" || $comp == "" || $beltc == "" )
    {
         header('location:index.php?message=You need to fill the Smart Watch details completely!!!!!');
    }
    else
    {
        $result = pg_query($conn, "insert into smart_Watch(W_id,model,company,belt_color) values('".$wid."','".$model."','".$comp."','".$beltc."')");
        if (!$result) {
            die("query failed".pg_last_error($conn));
        }
        else
        {
             header('location:index.php?insert_msg=Your data has been added successfully');
        }
        
    }
    
}


