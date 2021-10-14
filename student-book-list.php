<?php
session_start();
include('inc/config.php');
include('inc/queryfile.php');
include('inc/headerwithoutnav.php');
$_student_id = $_SESSION['id'];
if (!$_student_id) {
    header('Location: index.php');
    die();
}
$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    throw new Exception("Cannot connect to database");
}
// $action = $_POST['action'] ?? '';
// if("search_book" == $action){
//     $search_book_list = $_POST['search_book_list'] ?? '';
//     $query = "SELECT * FROM `books` WHERE book_name LIKE '%{$search_book_list}%'";
//     $result_book = mysqli_query($connection, $query);
//     // while ($data = mysqli_fetch_assoc($result_book)) {
//     //     var_dump($data['id']);
//     // }
//     // die();
// }


?>
<div class="container-fluid admin-dashboard">
    <div class="row">
        <div class="col-lg-2">
            <?php include('inc/student/sidebar.php'); ?>
        </div>
        <div class="col-lg-9 doctor-specialization">
            <div class="admin-header d-flex justify-content-between">
                <h2>STUDENT | ALL BOOK LIST </h2>
            </div>
            <?php include('inc/student/manage-books-dashboard.php'); ?>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>