<div class="col-lg-4">
    <div class="panel text-center">
        <h2 class="StepTitle">Manage Profile</h2>
        <a class="total" href="student-profile.php">Click me</a>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel text-center">
        <h2 class="StepTitle">Manage Book Issue</h2>
        <a class="total" href="student-book-issue-manage.php">Click me</a>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panelDiff text-center">
        <h2 class="StepTitle">All Book List</h2>
        <a class="total" href="student-book-list.php">Click me</a>
    </div>
</div>
<div class="col-lg-4">
    <div class="panel panelDiff text-center">
        <h2 class="StepTitle">Total Fine</h2>
        <a class="total" href="student-book-return-list.php">
            <?php
            global $total_fine;
            while ($data = mysqli_fetch_assoc($result)) {
                $total_fine += $data['fine'];
            }
            echo $total_fine; 
            ?>
        </a>
    </div>
</div>