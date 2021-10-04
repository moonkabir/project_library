<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="text-center">Issued Book</h5>
            <table class="table table-hover" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">ID</th>
                        <th>Book Name</th>
                        <th>Book Author</th>
                        <th>Book Edition</th>
                        <th>Book Publication</th>
                        <th>Issue Date</th>
                        <th>return Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        if ('1' == $data['book_edition']) {
                            $edition = $data['book_edition'] . "st";
                        } elseif ('2' == $data['book_edition']) {
                            $edition = $data['book_edition'] . "nd";
                        } elseif ('3' == $data['book_edition']) {
                            $edition = $data['book_edition'] . "rd";
                        } else {
                            $edition = $data['book_edition'] . "th";
                        }
                    ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['book_name']; ?></td>
                            <td><?php echo $data['book_author']; ?></td>
                            <td><?php echo $edition; ?></td>
                            <td><?php echo $data['book_publication']; ?></td>
                            <td><?php echo $data['issue_date']; ?></td>
                            <td><?php echo $data['return_date']; ?></td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="issues_book_id" value="<?php echo $data['id']; ?>">
                                    <input type="hidden" name="return_book_id" value="<?php echo $data['book_id']; ?>">
                                    <input type="hidden" name="book_name" value="<?php echo $data['book_name']; ?>">
                                    <input type="hidden" name="book_author" value="<?php echo $data['book_author']; ?>">
                                    <input type="hidden" name="edition" value="<?php echo $edition; ?>">
                                    <input type="hidden" name="book_publication" value="<?php echo $data['book_publication']; ?>">
                                    <input type="hidden" name="student_id" value="<?php echo $_student_id ?>">
                                    <input type="hidden" name="issue_date" value="<?php echo $data['issue_date']; ?>">
                                    <input type="hidden" name="return_date" value="<?php echo $data['return_date']; ?>">
                                    <input type="hidden" name="action" value="student-book-return">
                                    <div class="form-actions">
                                        <button type="submit" class="btn pull-right" name="submit">Returned</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    <?php
                        $i++;
                    }
                    mysqli_close($connection);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>