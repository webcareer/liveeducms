<?php include "./header.php"; ?>
<?php
    if(isset($_POST['submit'])){
        $rights = $_POST['rights'];

        $sql = "INSERT INTO users_rights (id, rights) VALUES (null, '$rights')";

        if(mysqli_query($conn, $sql)){
            $message = "New Rights got added.";
        }
        else{
            $error = "Error : " . mysqli_error($conn);
        }
    }
?>
<div class="content-wrapper">
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card card-register mx-auto mt-5">
                    <div class="card-header">Add New Rights</div>
                    <div class="card-body">
                        <form method="POST" action="users_rights.php">
                            <div class="form-group">
                                <label for="username">Rights</label>
                                <input class="form-control" id="rights" name="rights" type="text" placeholder="User's Rights" required >
                            </div>
                            <input type="submit" id="submit" name="submit" value="Save" class="btn btn-primary btn-block">
                        </form>
                        <br>

                        <?php
                            if(isset($message)){
	                            echo "<div class='alert alert-primary' role='alert'>" . $message . "</div>";
                            }

                            if(isset($error)){
                                echo "<div class='alert alert-danger' role='alert'>" . $error . "</div>";
                            }
                        ?>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fa fa-table"></i> Rights
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rights</th>
                                </tr>
                                </thead>
                                <tbody>
					            <?php
					            $sql    = "SELECT * FROM users_rights";
					            $result = mysqli_query( $conn, $sql );
					            if(mysqli_num_rows($result) > 0){
						            while($row = mysqli_fetch_assoc($result)){
							            ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['rights']; ?></td>
                                        </tr>
							            <?php
						            }
					            }
					            else{
						            echo "<tr><td colspan='2'>No User's Rights</td></tr>";
					            }
					            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
	</div>
<?php include  "./footer.php"; ?>
