<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="text-center">Your Account</h5>
            <div class="text-right">
                <a class="update" href='admin-student-edit-profile.php'>Update</a> | <a class="update" href='admin-student-delete.php'>Delete</a>
            </div>
            <form method="POST">
                <table class="table table-hover" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Fine</th>
                            <th>Issued Book</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while ($data = mysqli_fetch_assoc($result)) {
                            $query_book_issue = "SELECT * FROM `book_issue` WHERE `id` = $data['id']";
                            $result_book_issue = mysqli_query($connection,$query_book_issue);
                            while ($data_book_issues = mysqli_fetch_assoc($result_book_issue)) {
                            ?>
                            <tr>
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['full_name'];?></td>
                                <td><?php echo $data['email'];?></td>
                                <td><?php echo $total_fine += $data_book_issues['fine'];?></td>
                                <td><?php echo $data_book_issues['book_id'];?></td>
                            </tr>
                            <?php
                            }
                        }
                        mysqli_close($connection);
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>