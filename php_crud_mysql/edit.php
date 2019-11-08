<?php
include("db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])){
   // echo 'updating';
   $id = $_GET['id'];
   $title = $_POST['title'];
   $description = $php_errormsg['description'];

   $query = "UPDATE task set title='$title', description = '$description' WHERE id=$id";
   mysqli_query($conn,$query);
   $_SESSION['message'] = 'Update Ok';
   $_SESSION['message_type'] = 'warning';
   header("Location: index.php");
   



}

?>

<?php include("includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                  <div class="form-gropu">
                      <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" placeholder="Update Title">
    
            </div>        
                <div class="form-gropu">
                <textarea name="description" row="2" class="form-control" placeholder="Update Description"><?php echo $description; ?> </textarea>
            
            </div>
            <button class="btn btn-success" name="update">
                Update
            </button>
            </form>
</div>
</div>
</div>
</div>

<?php include("includes/footer.php") ?>