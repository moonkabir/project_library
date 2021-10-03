<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="text-center">All Book List</h5>
            <table class="table table-hover" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">ID</th>
                        <th>Book Name</th>
                        <th>Author Name</th>
                        <th class="center">Edition</th>
                        <th>Publication</th>
                        <th>Book Issue</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $book_id_sql = "SELECT `book_id` FROM `book_issue` where `student_id` = $_student_id ";
                    $book_ids = mysqli_query($connection, $book_id_sql);
                    $book = null;
                    while ($book_id = mysqli_fetch_assoc($book_ids)) {
                        $book[] = $book_id["book_id"];
                    }
                    if ($book != null) {
                        $query = "SELECT * FROM `books`";
                        $result = mysqli_query($connection, $query);
                        while ($data = mysqli_fetch_assoc($result)) {
                            $value = $data['id'];
                            if (!in_array($value, $book)) {
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
                            <?php
                            }
                        }
                    } else {
                        $query = "SELECT * FROM `books`";
                        $result = mysqli_query($connection, $query);
                        while ($data = mysqli_fetch_assoc($result)) {
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
                        <?php
                        }
                    }
                    mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>