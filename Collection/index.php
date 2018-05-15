<?php include('php_code.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM weblinks WHERE ID=$id");
		if (!is_null($record) ) {
			$n = mysqli_fetch_array($record);
			$URL = $n['URL'];
            $Description = $n['Description'];
            $Category = $n['Category'];
		}
	}
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Collection</title>
    </head>
    <body>
        <?php $results = mysqli_query($db, "SELECT * FROM weblinks"); ?>
        <?php if (isset($_SESSION['message'])): ?>
            <div class="msg">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <table>
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <tr>
                    <td><?php echo $row['URL']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td><?php echo $row['Category']; ?></td>
                    <td>
                        <a href="index.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
                    </td>
                    <td>
                        <a href="php_code.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
        
        <form method="post" action="php_code.php" >
            <div class="input-group">
                <input type="hidden" name="ID" value="<?php echo $id; ?>">
            </div>
            <div class="input-group">
                <label>URL</label>
                <input type="text" name="URL" value="<?php echo $URL; ?>">
            </div>
            <div class="input-group">
                <label>Description</label>
                <input type="text" name="Description" value="<?php echo $Description; ?>">
            </div>
            <div class="input-group">
                <label>Category</label>
                <input type="text" name="Category" value="<?php echo $Category; ?>">
            </div>
            <div class="input-group">
                <?php if ($update == true): ?>
                    <button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
                <?php else: ?>
                    <button class="btn" type="submit" name="save" >Save</button>
                <?php endif ?>
            </div>
        </form>
    </body>
    
</html>