<?php
include "header.php";
include "db.php";

//set empty value so no error
 $student_name = "";
 $matric_no = "";
 $subject_name = "";
 $subject_code = "";
 $test1 = "";
 $test2 = "";
 $final_exam = "";

if(isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $matric_no = $_POST['matric_no'];
    $subject_name = $_POST['subject_name'];
    $subject_code = $_POST['subject_code'];
    $test1 = $_POST['test1'];
    $test2 = $_POST['test2'];
    $final_exam = $_POST['final_exam'];
    
    $total = $test1 + $test2 + $final_exam;

    if ($total >= 80)
        $grade = 'A';
    else if ($total >= 65)
        $grade = 'B';
    else if ($total >= 50)
        $grade = 'C';
    else if ($total >= 40)
        $grade = 'D';
    else
        $grade = 'E';


$sql = $conn->prepare("INSERT INTO results
 (student_name,matric_no,subject_name,subject_code,test1,test2,final_exam,total_marks,grade) VALUES
 (?,?,?,?,?,?,?,?,?)");
$sql->bind_param("ssssdddds", $student_name, $matric_no, $subject_name, $subject_code, $test1, $test2,  $final_exam, $total, $grade);
    if($sql->execute ()) {
        header("Location: index.php");
}

    }
?>

<h2>Add Results</h2>


<?php

include "form.php";
include "footer.php";

?>