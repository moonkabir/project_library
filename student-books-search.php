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
$action = $_POST['action'] ?? '';
if("search_book" == $action){
    $search_book_list = $_POST['search_book_list'] ?? '';
    $query = "SELECT * FROM `books` WHERE book_name LIKE '%{$search_book_list}%'";
    $result_book = mysqli_query($connection, $query);
}
?>
<div class="container-fluid admin-dashboard">
    <div class="row">
        <div class="col-lg-2">
            <?php include('inc/student/sidebar.php'); ?>
        </div>
        <div class="col-lg-9 doctor-specialization">
            <div class="admin-header d-flex justify-content-between">
                <h2>STUDENT | SEARCH BOOK LIST </h2>
            </div>
            <div class="container-fluid container-fullw bg-white doctor-specialization">
                <div class="row">
                    <div class="col-md-12 doctor-specialization-list">
                        <h5 class="text-center">Search Book List</h5>
                        <form class="form-group text-right d-flex justify-content-end" method="post" action="./student-books-search.php">
                            <input class="form-control" style="width: 20%;" type="text" name="search_book_list" placeholder="Search your book">
                            <input type="hidden" name="action" value="search_book">
                            <button type="submit" class="btn pull-right">Search</button>
                        </form>
                        <table class="table table-hover" id="sample-table-1">
                            <tr>
                                <th class="center">ID</th>
                                <th>Book Name</th>
                                <th>Author Name</th>
                                <th class="center">Edition</th>
                                <th>Publication</th>
                                <th>Action</th>
                            </tr>
                            <tr>
                                <?php
                                    while ($data = mysqli_fetch_assoc($result_book)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $data['id']; ?></td>
                                            <td><?php echo $data['book_name']; ?></td>
                                            <td><?php echo $data['author']; ?></td>
                                            <td><?php echo $data['edition']; ?></td>
                                            <td><?php echo $data['publication']; ?></td>
                                            <td>
                                                <form name="registration" method="post">
                                                    <input type="hidden" name="book_id" value="<?php echo $data['id']; ?>">
                                                    <input type="hidden" name="action" value="student-book-issue">
                                                    <div class="form-actions">
                                                        <button type="submit" class="btn pull-right" name="submit">Issued</button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>

                                    <?php }
                                ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('inc/footer.php'); ?>