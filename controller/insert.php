<?php 
    session_start();
    include_once "config.php";
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $year = mysqli_real_escape_string($conn, $_POST['year']);

    if(!empty($id) && !empty($name) && !empty($year)){
        $pattern1 = "/^[0-9]+$/i";
        if(preg_match($pattern1, $id) && strlen($name) >= 1 && strlen($name) <= 40 && preg_match($pattern1, $year) && $year >= 0 && $year <= 2021){
            $sql = mysqli_query($conn, "SELECT id FROM cars WHERE id='{$id}'");
            if(mysqli_num_rows($sql) > 0){
                echo "$id - this id already exist!";
            }else{
                $random_id = rand(time(), 1000000);
                $sql2 = mysqli_query($conn, "INSERT INTO cars (id, name, year) VALUES ({$id}, '{$name}', '{$year}')");
                if($sql2){
                    echo "success";
                }else{
                    echo "Something is wrong";
                }
            }
        }else{
            echo "Input form is wrong";
        }
    }else{
        echo "All input field are required!";
    }
?>

