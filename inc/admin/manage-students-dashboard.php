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
                            <th>Returned Book</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['full_name'];?></td>
                                <td><?php echo $data['email'];?></td>
                                <td>
                                    <?php 
                                        $query2 = "SELECT * FROM `book_return` WHERE student_id = {$data['id']}";
                                        $result2 = mysqli_query($connection,$query2);
                                        $fine = 0;
                                        while ($data2 = mysqli_fetch_assoc($result2)) {
                                            if($data2['fine']){
                                                $fine += $data2['fine'];
                                            }
                                        }
                                        echo ( $fine);
                                    ?> 
                                </td>
                                <td>
                                    <?php 
                                        $query2 = "SELECT * FROM `book_issue` WHERE student_id = {$data['id']}";
                                        $result2 = mysqli_query($connection,$query2);
                                        $book_issue_content = "Yet not issued";
                                        while ($data2 = mysqli_fetch_assoc($result2)) {
                                            if($data2['book_id']){
                                                echo $book_issue_content = $data2['book_id'].",";
                                                $book_issue_content = '';
                                            }
                                        }
                                        echo $book_issue_content;
                                    ?> 
                                </td>
                                <td>
                                    <?php 
                                        $query2 = "SELECT * FROM `book_return` WHERE student_id = {$data['id']}";
                                        $result2 = mysqli_query($connection,$query2);
                                        $book_issue_content = "Has not returned anything yet";
                                        while ($data2 = mysqli_fetch_assoc($result2)) {
                                            if($data2['book_id']){
                                                echo $book_issue_content = $data2['book_id'].",";
                                                $book_issue_content = '';
                                            }
                                        }
                                        echo $book_issue_content;
                                    ?> 
                                </td>
                            </tr>
                            <?php
                            // }
                        }
                        mysqli_close($connection);
                    ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>