<?php

include 'header.php';

$completed = new DB();
$completedTask = $completed->getCompletedTasksSpec($_POST['id']);
$name = new DB();
if(count($completedTask)){
  $getName = $name->getName($completedTask[0]['assigned_by']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body class="body-right"> 
    <div>

    <?php

    foreach($completedTask as $task){
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
              <label class="tasks-box-label">Link:</label>
              <input type="text" name="link" class="tasks-box-area" required="required" value="<?php echo $task['link']?>">
          </div>
      </div>

        <?php
    }

    ?>

    </div>
</body>
</html>