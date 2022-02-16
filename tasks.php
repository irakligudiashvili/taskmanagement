<?php

include "header.php";

$userTask = new DB();
$tasks = $userTask->getTask($currentUser[0]['id']);
$name = new DB();
if(count($tasks)){
  $getName = $name->getName($tasks[0]['assigned_by']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body class="body-right">
    
    <div class="tasks-box">
  
    <?php

    foreach($tasks as $task){
      if($task['completed'] == 0){
      ?>
      <div class="tasks-box">
          <div class="tasks-box-top">
              <div>
                <h1 class="tasks-box-top-name"><?php echo $task['name']?></h1>
              </div>

              <div>
                <h1 class="tasks-box-top-assign">Assigned by: <?php echo $getName[0]['name'].' '.$getName[0]['surname'] ?></h1>
              </div>
          </div>

          <div class="tasks-box-mid">
            <div>
              <p class="tasks-box-mid-desc"><?php echo $task['description']?></p>
            </div>

            <div class="tasks-box-mid-deadline">
              <div>
                <p class="tasks-box-mid-deadline-title">Deadline</p>
              </div>
              <div>
                <p class="tasks-box-mid-deadline-date"><?php echo $task['deadline']?></p>
              </div>
            </div>
          </div>

          <div class="tasks-box-bot">
            <form action='actions/completeTask.php' method="POST">
              <label class="tasks-box-label">Link:</label>
              <input type="text" name="link" class="tasks-box-area" required="required">
              <input type="submit" value="Complete" class="tasks-box-button">
              <input type="hidden" name="id" value="<?php echo $task['id']?>"> 
              <input type="hidden" name="time" value="<?php echo date('Y/m/d', time())?>"> 
            </form>
          </div>
      </div>
      <?php
      }
}
?>

      

    </div>



</body>
</html>