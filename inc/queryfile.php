<?php
if(!isset($_SESSION)){ 
    session_start();
}
include_once( 'config.php' );
$action = $_POST['action'] ?? '';
$connection = mysqli_connect( DB_SERVER, DB_USER, DB_PASS, DB_NAME );
if (!$connection) {
    throw new Exception( "Cannot connect to database" );
}else{
    if('admin-login' == $action) {
        $email = $_POST['email']??'';
        $password = $_POST['password']??'';
        if($email && $password){
            $query = "SELECT id,password FROM `admin` WHERE email = '{$email}'";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_id = $data['id'];
                if(password_verify($password,$_password)){
                    $_SESSION['id'] = $_id;
                    header("Location: admin-dashboard.php");
                    die();
                }
            }
        }
    }elseif('student-registration' == $action){
        $full_name = $_POST['full_name']??'';
        $address = $_POST['address']??'';
        $city = $_POST['city']??'';
        $gender = $_POST['gender']??'';
        $email = $_POST['email']??'';
        $password = $_POST['password']??'';
        $password_again = $_POST['password_again']??'';
        if($password == $password_again){
            $hash_pass = password_hash($password,PASSWORD_BCRYPT);
        }
        if($full_name && $address && $city && $gender && $email && $hash_pass){
            $query = "INSERT INTO `registration`(`full_name`, `address`, `city`, `gender`,`email`, `password`) VALUES ('{$full_name}','{$address}','{$city}','{$gender}','{$email}','{$hash_pass}')";
            mysqli_query($connection,$query);
        }
        header('Location: index.php');
    }elseif('admin-student-registration' == $action){
        $full_name = $_POST['full_name']??'';
        $address = $_POST['address']??'';
        $city = $_POST['city']??'';
        $gender = $_POST['gender']??'';
        $email = $_POST['email']??'';
        $password = $_POST['password']??'';
        $password_again = $_POST['password_again']??'';
        if($password == $password_again){
            $hash_pass = password_hash($password,PASSWORD_BCRYPT);
        }
        if($full_name && $address && $city && $gender && $email && $hash_pass){
            $query = "INSERT INTO `registration`(`full_name`, `address`, `city`, `gender`,`email`, `password`) VALUES ('{$full_name}','{$address}','{$city}','{$gender}','{$email}','{$hash_pass}')";
            mysqli_query($connection,$query);
        }
        header('Location: admin-manage-students.php');
    }elseif('student-login' == $action) {
        $email = $_POST['email']??'';
        $password = $_POST['password']??'';
        if($email && $password){
            $query = "SELECT id,password FROM `registration` WHERE email = '{$email}'";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $_password = $data['password'];
                $_id = $data['id'];
                if(password_verify($password,$_password)){
                    $_SESSION['id'] = $_id;
                    header("Location: student-dashboard.php");
                    die();
                }
            }
        }
    }elseif('student-edit-profile' == $action){
        $_student_id = $_SESSION['id'];
        $query = "SELECT * FROM `registration` WHERE id = '{$_student_id}'";
          $result = mysqli_query($connection,$query);
        while($data = mysqli_fetch_assoc($result)){
            if($_POST['editstudentname']){
                $editstudentname = $_POST['editstudentname'];
            }else{
                $editstudentname = $data['full_name'];
            }
            if ($_POST['editstudentaddress']) {
                $editstudentaddress = $_POST['editstudentaddress'];
            }else{
                $editstudentaddress=$data['address'];
            }
            if ($_POST['editstudentcity']) {
                $editstudentcity = $_POST['editstudentcity'];
            }else{
                $editstudentcity=$data['city'];
            }
            if ($_POST['editstudentpassword']) {
                $editstudentpassword = password_hash($_POST['editstudentpassword'],PASSWORD_BCRYPT) ;
            }
            else{
                $editstudentpassword=$data['password'];
            }
        }
        $updatedata = ($editstudentname|| $editstudentaddress || $editstudentcity || $editstudentpassword);
        if($_student_id && $updatedata){
            $query = "UPDATE `registration` SET `full_name`='{$editstudentname}',`address`='{$editstudentaddress}',`city`='{$editstudentcity}',`password`='{$editstudentpassword}' WHERE `id` = '{$_student_id}'";
            $result = mysqli_query($connection,$query);
        }
        header( 'Location: student-profile.php' );
    }elseif('admin-student-edit-profile' == $action){
        $studentid = $_POST['studentid'] ?? '';
        $query = "SELECT * FROM `registration` WHERE id = '{$studentid}'";
        $result = mysqli_query($connection,$query);
        while($data = mysqli_fetch_assoc($result)){
            if($_POST['editstudentname']){
                $editstudentname = $_POST['editstudentname'];
            }else{
                $editstudentname = $data['full_name'];
            }
            if ($_POST['editstudentaddress']) {
                $editstudentaddress = $_POST['editstudentaddress'];
            }else{
                $editstudentaddress=$data['address'];
            }
            if ($_POST['editstudentcity']) {
                $editstudentcity = $_POST['editstudentcity'];
            }else{
                $editstudentcity=$data['city'];
            }
            if ($_POST['editstudentpassword']) {
                $editstudentpassword = password_hash($_POST['editstudentpassword'],PASSWORD_BCRYPT) ;
            }
            else{
                $editstudentpassword=$data['password'];
            }
        }
        $updatedata = ($editstudentname|| $editstudentaddress || $editstudentcity || $editstudentpassword);
        if($studentid && $updatedata){
            $query = "UPDATE `registration` SET `full_name`='{$editstudentname}',`address`='{$editstudentaddress}',`city`='{$editstudentcity}',`password`='{$editstudentpassword}' WHERE `id` = '{$studentid}'";
            $result = mysqli_query($connection,$query);
        }
        header( 'Location: admin-manage-students.php' );
    }elseif('admin-student-delete' == $action){
        $studentid = $_POST['studentid'] ?? '';
        if($studentid){
            $query = "DELETE FROM `registration` WHERE id = '{$studentid}'";
            $result = mysqli_query($connection,$query);
        }
        header( 'Location: admin-student-delete.php' );
    }elseif('add-book' == $action){
        $book_name = $_POST['book_name']??'';
        $author_name = $_POST['author_name']??'';
        $edition = $_POST['edition']??'';
        $publication = $_POST['publication']??'';
        if($book_name && $author_name && $edition && $publication){
            $query = "INSERT INTO `books`(`book_name`, `author`, `edition`, `publication`) VALUES ('{$book_name}','{$author_name}','{$edition}','{$publication}')";
            mysqli_query($connection,$query);
        }
        header('Location: admin-books-manage.php');
    }elseif('admin-book-issue' == $action){
        $book_id = $_POST['book_id']??'';
        if($book_id ){
            $query = "SELECT * FROM `books` WHERE id = '{$book_id}'";
            $result = mysqli_query($connection,$query);
            while($data = mysqli_fetch_assoc($result)){
                $book_name = $data['book_name'];
                $author = $data['author'];
                $edition = $data['edition'];
                $publication = $data['publication'];
            }
        }
        $student_mail = $_POST['student_mail']??'';
        $book_issue_date = strtotime("now")+(strtotime("+10days 6 hours")-strtotime("now"));
        $adate = date("jS M, Y", $book_issue_date);
        if($book_id && $student_mail){
            $query = "INSERT INTO `book_issue`( `book_name`, `book_id`, `book_author`, `book_edition`, `book_publication`, `student_mail`, `return_date`) VALUES ('{$book_name}','{$book_id}','{$author}','{$edition}','{$publication}','{$student_mail}','{$adate}')";
            mysqli_query($connection,$query);
        }

        header('Location: admin-book-issue-manage.php');
    }elseif('student-book-issue' == $action){
        $book_id = $_POST['book_id']??'';
        if($book_id ){
            $query = "SELECT * FROM `books` WHERE id = '{$book_id}'";
            $result = mysqli_query($connection,$query);
            while($data = mysqli_fetch_assoc($result)){
                $book_name = $data['book_name'];
                $author = $data['author'];
                $edition = $data['edition'];
                $publication = $data['publication'];
            }
        }
        $_student_id = $_SESSION['id'];
        if($_student_id){
            $query = "SELECT email FROM `registration` WHERE id = '{$_student_id}'";
            $result = mysqli_query($connection,$query);
            while($data = mysqli_fetch_assoc($result)){
                $student_mail = $data['email'];
            }
        }
        $issue_date = date("jS M, Y", strtotime("now"));
        $book_return_date = strtotime("now")+(strtotime("+10days 6 hours")-strtotime("now"));
        $return_date = date("jS M, Y", $book_return_date);
        if($book_id && $_student_id){
            $query = "INSERT INTO `book_issue`( `book_name`, `book_id`, `book_author`, `book_edition`, `book_publication`, `student_id`, `student_mail`, `issue_date`, `return_date`) VALUES ('{$book_name}','{$book_id}','{$author}','{$edition}','{$publication}','{$_student_id}','{$student_mail}','{$issue_date}','{$return_date}')";
            mysqli_query($connection,$query);
        }
        header('Location: student-book-issue-manage.php');
    }elseif('student-book-return' == $action){
        $issues_book_id = $_POST['issues_book_id']??'';
        $return_book_id = $_POST['return_book_id']??'';
        $book_name = $_POST['book_name']??'';
        $book_author = $_POST['book_author']??'';
        $edition = $_POST['edition']??'';
        $book_publication = $_POST['book_publication']??'';
        $student_id = $_POST['student_id']??'';
        $issue_date = $_POST['issue_date']??'';
        $return_date = $_POST['return_date']??'';
        $sudent_return_book = date("jS M, Y", strtotime("now"));
        $query = "DELETE FROM `book_issue` WHERE `id` = '{$issues_book_id}'";
        mysqli_query($connection, $query);
        if($return_book_id){
            $query = "INSERT INTO `book_return`(`book_id`, `book_name`, `book_author`, `edition`, `book_publication`, `student_id`, `issue_date`, `return_date`, `sudent_return_book`) VALUES ('{$return_book_id}','{$book_name}','{$book_author}','{$edition}','{$book_publication}','{$student_id}','{$issue_date}','{$return_date}','{$sudent_return_book}')";
            mysqli_query($connection, $query);
            header('Location: student-book-issue-manage.php');
        }
    }
}




// echo "<pre>Debug: $query</pre>\n";
// $result = mysqli_query($connection, $query);
// if ( false===$result ) {
//     printf("error: %s\n", mysqli_error($connection));
// }
// else {
//     echo 'done.';
// }
// die();