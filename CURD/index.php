<?php include ('header.php'); ?>
<?php include ('test.php'); ?>

<div class="mybtn">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD SMART WATCH
        DATA</button>
</div>

<table class="table thead-dark table-striped table-bordered table-hover">
    <thead>
        <tr class="bg-primary">
            <th>Watch Id</th>
            <th>Model Name</th>
            <th>Company Name</th>
            <th>Belt_Color</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $result = pg_query($conn, "select * from smart_Watch");
        if (!$result) {
            echo "an error occured.\n";
            exit;
        }
        while ($row = pg_fetch_row($result)) {

            ?>
            <tr>
                <td>
                    <?php echo "$row[0]"; ?>
                </td>
                <td>
                    <?php echo "$row[1]"; ?>
                </td>
                <td>
                    <?php echo "$row[2]"; ?>
                </td>
                <td>
                    <?php echo "$row[3]"; ?>
                </td>
                <td>
                    <a href="update.php?id=<?php echo "$row[0]"; ?>" class="btn btn-primary">Update</a>
                </td>
                <td>
                    <a href="delete.php?id=<?php echo "$row[0]"; ?>" class="btn btn-primary">Delete</a>
                </td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>

<!-- ............(message passed through header function we have to display it here............. -->
<?php
   if(isset($_GET['message']))
   {
   ?> 
     <div class="alert alert-danger" role="alert">
        <?php echo $_GET['message']; ?>
     </div>
     <?php 
   }
?>

<?php
   if(isset($_GET['insert_msg']))
   {
   ?> 
     <div class="alert alert-success" role="alert">
         <?php echo $_GET['insert_msg']; ?>
     </div>
     <?php 
   }
?>

<?php
   if(isset($_GET['update_msg']))
   {
   ?> 
     <div class="alert alert-success" role="alert">
         <?php echo $_GET['update_msg']; ?>
     </div>
     <?php 
   }
?>

<?php
   if(isset($_GET['delete_msg']))
   {
   ?> 
     <div class="alert alert-success" role="alert">
         <?php echo $_GET['delete_msg']; ?>
     </div>
     <?php 
   }
?>

<!-- ..............Bootstrap modal.... -->

<!-- Modal -->
<form action="insert.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Smart watch Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="pid">Watch No:</label>
                        <input type="text" name="pl" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pid">Watch Model:</label>
                        <input type="text" name="po" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="pid">Watch Company:</label>
                        <input type="text" name="pr" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label for="pid">Watch Color:</label>
                        <input type="text" name="pc" class="form-control">
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="pdetail" value="Add">
                </div>
            </div>
        </div>
    </div>
</form>



<?php include ('footer.php'); ?>