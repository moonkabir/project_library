<div class="container-fluid container-fullw bg-white doctor-specialization">
    <div class="row">
        <div class="col-md-12 doctor-specialization-list">
            <h5 class="text-center">Returned Book</h5>
            <table class="table table-hover" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">ID</th>
                        <th>Book Name</th>
                        <th>Book Author</th>
                        <th>Book Edition</th>
                        <th>Book Publication</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Student return Date</th>
                        <th>Fine</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                        if ('1' == $data['edition']) {
                            $edition = $data['edition'] . "st";
                        } elseif ('2' == $data['edition']) {
                            $edition = $data['edition'] . "nd";
                        } elseif ('3' == $data['edition']) {
                            $edition = $data['edition'] . "rd";
                        } else {
                            $edition = $data['edition'] . "th";
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
                            <td><?php echo $data['sudent_return_book']; ?></td>
                            <td><?php echo $data['fine']; ?></td>

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