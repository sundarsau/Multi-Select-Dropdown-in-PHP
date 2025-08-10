 <?php
  $name = $email = "";
  $name_err = $email_err = $skill_err = "";
  $succ_msg = $err_msg = "";
  $error = false;
  $skill = array();

  if (isset($_POST['submit'])){
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    if (isset($_POST['skill']))
      $skill = $_POST['skill']; // array of skills

    if ($name == ""){
      $name_err = "Name is Required";
      $error = true;
    }

    // validate email 
    if ($email == "") {
      $email_err = "Email is Required";
      $error = true;
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $email_err = "Not a valid email address";
      $error = true;
    }
    else{   // check if email already exists
      $sql = "select * from candidates where email_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s",$email);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        $email_err = "Email Id already exists";
        $error = true;
      }
    }
    if (count($skill) == 0){
      $skill_err = "At least one skill is required";
      $error = true;
    }
    
    if (!$error) { 
      // all vaidations are successful
     $conn->begin_transaction();
      try{
        $curr_dt = date('Y-m-d');
        $sql = "insert into candidates (name,email_id,registration_dt) values (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $curr_dt);
        $stmt->execute();
        $candidate_id = $conn->insert_id;
        
        foreach ($skill as $value) {
          $skill_id = $value;

          $sql = "insert into candidate_skills (candidate_id,skill_id) values (?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("ii", $candidate_id, $skill_id);
          $stmt->execute();
        }   
        $conn->commit();
        $succ_msg = "Your Skill Registration Successful";
       
      } catch (Exception $e) {
        $conn->rollback();
        $err_msg = $e->getMessage();
      }
    }  
} 
?>