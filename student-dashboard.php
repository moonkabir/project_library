<?php 
session_start();
$_student_id = $_SESSION['id']??0;
if(!$_student_id){
    header('Location: index.php');
    die();
}
include('inc/headerwithoutnav.php');
include('inc/config.php');

$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
	throw new Exception("Cannot connect to database");
}
$query = "SELECT * FROM `book_return` where `student_id` = {$_student_id}";
$result = mysqli_query($connection, $query);

?>
<div class="container-fluid dashboard">
    <div class="row">
		<div class="col-lg-2">
			<?php include('inc/student/sidebar.php'); ?>		
		</div>
		<div class="col-lg-9">
			<div class="admin-header d-flex justify-content-between">
				<h2> Dashboard</h2>
            </div>  
			<div class="row dashboard-manage" >
				<?php include('inc/student/dashboard.php'); ?>
			</div>
		</div>
    </div>
</div>
<?php include('inc/footer.php'); ?> 