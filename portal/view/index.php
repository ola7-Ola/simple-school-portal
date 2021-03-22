<?php
    session_start();

    // school logic
    require_once "../control/school.php";
    $_SESSION['TITLE'] = "Semrem College";

    // if user not logged redirect back to login page 
    if(empty($_SESSION['USER']))  
        redirect("./../");    
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $_SESSION['TITLE']?></title>
<!-- <link rel="stylesheet" hre='main.css' type="text/css"/> -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="shortcut icon" href="favicon.ico"/>


<style>

    body {
        color: #404E67;
        background: burlywood;
        font-family: 'Open Sans', 'Varela Round', sans-serif;

    }

    .table-wrapper {
        width: 90%;
        margin: 30px auto;
        background: #fff;
        padding: 20px;	
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
    .table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 6px 0 0;
        font-size: 22px;
    }
    .table-title .addNew {
        float: right;
        height: 30px;
        font-weight: bold;
        font-size: 12px;
        text-shadow: none;
        min-width: 100px;
        border-radius: 50px;
        line-height: 13px;
    }
    .table-title .addNew i {
        margin-right: 4px;
    }

    table.table {
        table-layout: fixed;
    }

    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
        cursor: pointer;
        display: inline-block;
        margin: 0 5px;
        min-width: 24px;
    }    
    table.table td a.add {
        color: #27C46B;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }
    table.table td a.add i {
        font-size: 24px;
        margin-right: -1px;
        position: relative;
        top: 3px;
    }    
    table.table .form-control {
        height: 32px;
        line-height: 32px;
        box-shadow: none;
        border-radius: 2px;
    }
    table.table .form-control.error {
        border-color: #f50000;
    }
    table.table td .add, table.table td .cancel, table.table td .submit {
        display: none;
    }

    .modal-confirm {		
        color: #636363;
        width: 400px;
    }

    .modal-confirm .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
        font-weight: bolder;
    }

    .modal-confirm .modal-header {
        border-bottom: none;   
        position: relative;
    }


    .modal-confirm .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }

    .modal-confirm .modal-body {
        color: #999;
    }
    
    
    .modal-confirm .modal-footer a {
        color: #999;
    }		

    .modal-confirm .btn, .modal-confirm .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
    }

    .modal-confirm .btn-secondary {
        background: #c1c1c1;
    }
    .modal-confirm .btn-secondary:hover, .modal-confirm .btn-secondary:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
    


    .modal-confirm .form-control, .modal-confirm .btn {
        min-height: 40px;
        border-radius: 3px; 
    }

    .modal-confirm .modal-footer {
        border: none;
        text-align: center;
        border-radius: 5px;
        font-size: 13px;
    }	

    .modal-confirm .icon-box {
        color: #fff;		
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        top: -70px;
        width: 95px;
        height: 95px;
        border-radius: 50%;
        z-index: 9;
        background: #82ce34;
        padding: 15px;
        text-align: center;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
        font-size: 58px;
        position: relative;
        top: 3px;
        
    }

    .modal-confirm.modal-dialog {
        margin-top: 80px;
    }

    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
        background: #82ce34;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        border: none;
    }
    .modal-confirm .btn:hover, .modal-confirm .btn:focus {
        background: #6fb32b;
        outline: none;
    }

    .modal-delete {		
	color: #636363;
	width: 400px;
    }
    .modal-delete .modal-content {
        padding: 20px;
        border-radius: 5px;
        border: none;
        text-align: center;
        font-size: 14px;
    }
    .modal-delete .modal-header {
        border-bottom: none;   
        position: relative;
    }
    .modal-delete h4 {
        text-align: center;
        font-size: 26px;
        margin: 30px 0 -10px;
    }
    .modal-delete .close {
        position: absolute;
        top: -5px;
        right: -2px;
    }
    .modal-delete .modal-body {
        color: #999;
    }
    .modal-delete .modal-footer {
        border: none;
        text-align: center;		
        border-radius: 5px;
        font-size: 13px;
        padding: 10px 15px 25px;
    }
    .modal-delete .modal-footer a {
        color: #999;
    }		
    .modal-delete .icon-box {
        width: 80px;
        height: 80px;
        margin: 0 auto;
        border-radius: 50%;
        z-index: 9;
        text-align: center;
        border: 3px solid #f15e5e;
    }
    .modal-delete .icon-box i {
        color: #f15e5e;
        font-size: 46px;
        display: inline-block;
        margin-top: 13px;
    }
    .modal-delete .btn, .modal-delete .btn:active {
        color: #fff;
        border-radius: 4px;
        background: #60c7c1;
        text-decoration: none;
        transition: all 0.4s;
        line-height: normal;
        min-width: 120px;
        border: none;
        min-height: 40px;
        border-radius: 3px;
        margin: 0 5px;
    }
    .modal-delete .btn-secondary {
        background: #c1c1c1;
    }
    .modal-delete .btn-secondary:hover, .modal-delete .btn-secondary:focus {
        background: #a8a8a8;
    }
    .modal-delete .btn-danger {
        background: #f15e5e;
    }
    .modal-delete .btn-danger:hover, .modal-delete .btn-danger:focus {
        background: #ee3535;
    }




</style>

</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <a class="navbar-brand" href="./"><strong class='text-success'>SEMREM</strong><small class='text-warning'>college</small></a>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout  <span><i class="fa fa-sign-out"></i></span></a>
        </li>
    </ul>
    </div>
</nav>

<!-- main page  -->
<div class="container-fluid">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Student <b>Details</b></h2></div>
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-info addNew" data-toggle="modal" data-target="#addNew"><i class="fa fa-plus"></i> Add New</button>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S/N </th>
                        <th >First Name</th>
                        <th >Last Name</th>
                        <th >Phone No.</th>
                        <th >Email</th>
                        <th >Gender</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    // method of class student 
                    $students = $semrem->studentDetails();
                    $number = 1;
                    foreach($students as $student){ ?>
                        <tr>
                            <td><?php echo $number ?></td>
                            <td ><?php echo $student['firstName']; ?></td>
                            <td><?php echo $student['lastName']; ?></td>
                            <td><?php echo $student['contact']; ?></td>
                            <td><?php echo $student['email']; ?></td>
                            <td><?php echo $student['gender']; ?></td>
                            <td> 
                                <a  data-toggle="modal" data-target="#editRecord-<?php echo $number; ?>"><i class="material-icons edit" style="color: green;">edit </i> </a>
                                <a  data-toggle="modal" data-target="#deleteRecord-<?php echo $number; ?>"><i class="material-icons" style="color: red;">delete </i> </a>

                                <!-- edit Modal HTML -->
                                <div class="modal fade" id="editRecord-<?php echo $number; ?>">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit <?php echo $student['firstName'] . ' '. $student['lastName']; ?> Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action='update.php?id=<?php echo $student['id']; ?>' method='POST'>
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <input type="text" value="<?php echo $student['firstName'];?>" class="form-control" name="upFirstName" required placeholder="First Name">
                                                        </div><br>
                                                        <div class="input-group">
                                                            <input type="text" value="<?php echo $student['lastName'];?>" class="form-control" name="upLastName" required placeholder="Last Name">
                                                        </div><br>
                                                        <div class="input-group">
                                                            <input type="text" value="<?php echo $student['contact'];?>" class="form-control" name="upContact" required placeholder="contact">
                                                        </div><br>
                                                        <div class="input-group">
                                                            <input type="email" value="<?php echo $student['email'];?>" class="form-control" name="upEmail" required placeholder="email">
                                                        </div><br>
                                                        <div class="input-group">
                                                            <select name="upGender" style="width:100%;">
                                                                <option value="<?php echo $student['gender'] ?>" selected hidden><?php echo $student['gender'];?></option>
                                                                <option > Male </gender>
                                                                <option> Female </gender>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Details</button>
                                                        <?php 
                                                            if(isset($_SESSION['UPDATE_STUDENT']) ){
                                                                echo"
                                                                    <script type='text/javascript'>
                                                                        $(document).ready(function(){
                                                                            $('#confirmUpdate').modal('show');
                                                                        })
                                                                    </script>";
                                                            }
                                                        ?>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- delete Modal HTML -->
                                <div class="modal fade" id="deleteRecord-<?php echo $number; ?>">
                                    <div class="modal-dialog modal-delete">
                                        <div class="modal-content">
                                            <div class="modal-header flex-column">
                                                <div class="icon-box">
                                                    <i class="material-icons">clear</i>
                                                </div>						
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do you really want to delete <strong class="text-danger"> <?php echo $student['firstName'] ." ". $student['lastName']; ?></strong> records? This process cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <a href="delete.php?id=<?php echo $student['id']?>&fn=<?php echo $student['firstName']?>&ln=<?php echo $student['lastName']?>"><button type="button" class="btn btn-danger">Delete</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr><?php   
                        $number++;
                    }
                ?>   
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add New Record Modal  -->
<div class="modal" id="addNew" tabindex="-1" role="dialog">
    <form action="add.php" method="post">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><small>add</small> <strong>Student</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="auto-form-wrapper">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" class="form-control" name="firstName" required placeholder="First Name">
                            </div><br>
                            <div class="input-group">
                                <input type="text" class="form-control" name="lastName" required placeholder="Last Name">
                            </div><br>
                            <div class="input-group">
                                <input type="number" class="form-control" name="contact" required placeholder="contact">
                            </div><br>
                            <div class="input-group">
                                <input type="email" class="form-control" name="email" required placeholder="email">
                            </div><br>
                            <div class="input-group">
                                <select name="gender" style="width:100%;">
                                    <option> Male </gender>
                                    <option> Female </gender>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Update student confirm modal  -->
<div id="confirmUpdate" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">check</i>
				</div>				
			</div>
			<div class="modal-body">
				<p class="text-center">Your have succesfully Updated<strong class="text-secondary"> <?php echo $_SESSION['UPDATE_STUDENT']; ?></strong> Record</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>

<!-- Add Student confirm modal modal  -->
<div id="addStudent" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">check</i>
				</div>				
			</div>
			<div class="modal-body">
				<p class="text-center"><strong class="text-secondary"> <?php echo $_SESSION['ADD_STUDENT']; ?></strong> is now a Student</p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>


<!-- confirm Delete confirm modal  -->
<div id="confirmDelete" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div class="modal-content">
			<div class="modal-header">
				<div class="icon-box">
					<i class="material-icons">check</i>
				</div>				
			</div>
			<div class="modal-body">
				<p class="text-center">Your have Succesfully Deleted<strong class="text-warning"> <?php echo $_SESSION['DELETE_STUDENT'] ?></strong> From Record </p>
			</div>
			<div class="modal-footer">
				<button class="btn btn-success btn-block" data-dismiss="modal">OK</button>
			</div>
		</div>
	</div>
</div>

<?php 
    if(isset($_SESSION['DELETE_STUDENT']) ){
        echo"
            <script type='text/javascript'>
                $(document).ready(function(){
                    $('#confirmDelete').modal('show');
                })
            </script>";
    } if (isset($_SESSION['ADD_STUDENT'])){
        echo "<script type='text/javascript'>
            $(document).ready(function(){
                $('#addStudent').modal('show');
            })
        </script>";
    }
    unset($_SESSION['ADD_STUDENT']);
    unset($_SESSION['UPDATE_STUDENT']);
    unset($_SESSION['DELETE_STUDENT']);

?>
</body>
</html>