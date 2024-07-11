le
    $sql = "INSERT INTO `admit`.`admit_cards` (`name`, `father' name`, `mother's name`, `exam center`, `date and time`, `email`) 
    VALUES ($name = htmlspecialchars($_POST['name']);
    $father_name = htmlspecialchars($_POST['father_name']);
    $mother_name = htmlspecialchars($_POST['mother_name']);
    $exam_center = htmlspecialchars($_POST['exam_center']);
    $datetime = htmlspecialchars($_POST['datetime']);
    $email = htmlspecialchars($_POST['email']););";


// use exec() because no results are returned
$conn->exec($sql);
echo "Admit card created successfully";
}
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
