<?php

include 'header.php';

$completed = new DB();
$completedTasks = $completed->getCompletedTasks();

foreach($currentUser as $user){
  if($user["authority_id"] == 1){
    header("Location: 404.php");
  }
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

<div class="department-body">
<?php
                      foreach($currentUser as $user){
                          if($user["authority_id"] !=3){
                          if($user["department_id"] == 1){
                            ?>
                            <div class="department-box">
                              <div class="department-header">
                                <h1 class="department-header-text">IT</h1>
                              </div>

                              <div class="department-info">
                                <table class="department-info-table">
                                  <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksIT as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                  
                                </table>
                              </div>
                            </div>
                            <?php
                          } else if ($user["department_id"] == 2){
                            ?>
                              <div class="department-box">
                                <div class="department-header">
                                  <h1 class="department-header-text">Developer</h1>
                                </div>

                                <div class="department-info">
                                  <table class="department-info-table">
                                  <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksDeveloper as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                    
                                  </table>
                                </div>
                              </div>
                            <?php
                          } else if ($user["department_id"] == 3){
                            ?>
                            <div class="department-box">
                              <div class="department-header">
                                <h1 class="department-header-text">Marketing</h1>
                              </div>

                              <div class="department-info">
                                <table class="department-info-table">
                                <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksMarketing as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                  
                                </table>
                              </div>
                            </div>
                            <?php
                          } else if ($user["department_id"] == 4){
                            ?>
                              <div class="department-box">
                                <div class="department-header">
                                  <h1 class="department-header-text">Accounting</h1>
                                </div>

                                <div class="department-info">
                                  <table class="department-info-table">
                                  <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksAccounting as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                    
                                  </table>
                                </div>
                              </div>
                            <?php
                          }
                        } else {
                          ?>

                            <div class="department-box">
                              <div class="department-header">
                                <h1 class="department-header-text">IT</h1>
                              </div>

                              <div class="department-info">
                                <table class="department-info-table">
                                <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php
                                      foreach($tasksIT as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                  
                                </table>
                              </div>
                            </div>

                            <div class="department-box">
                                <div class="department-header">
                                  <h1 class="department-header-text">Developer</h1>
                                </div>

                                <div class="department-info">
                                  <table class="department-info-table">
                                  <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksDeveloper as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                    
                                  </table>
                                </div>
                              </div>

                              <div class="department-box">
                              <div class="department-header">
                                <h1 class="department-header-text">Marketing</h1>
                              </div>

                              <div class="department-info">
                                <table class="department-info-table">
                                <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksMarketing as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                  
                                </table>
                              </div>
                            </div>

                            <div class="department-box">
                                <div class="department-header">
                                  <h1 class="department-header-text">Accounting</h1>
                                </div>

                                <div class="department-info">
                                  <table class="department-info-table">
                                  <tr class="department-info-table-header">
                                    <th class="department-info-table-header-text">Task Name</th>
                                    <th class="department-info-table-header-text">Assigned To</th>
                                    <th class="department-info-table-header-text">Deadline</th>
                                    <th class="department-info-table-header-text">Date Completed</th>
                                    <th class="department-info-table-header-text">Link</th>
                                    <th class="department-info-table-header-text">View Task</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($tasksAccounting as $task){
                                        $userName = new DB();
                                        $uName = $userName->getName($task['assigned_to']);
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="viewTask.php" method="POST">';
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$task[name]'>".$task['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='assigned_to' value='$task[assigned_to]'>".$uName[0]['name']." ".$uName[0]['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='deadline' value='$task[deadline]'>".$task['deadline']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='completed_date' value='$task[completed_date]'>".$task['completed_date']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='link' value='$task[link]'>".$task['link']."</td>";
                                          echo "<input type='hidden' name='id' value='$task[id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Task</button></td>';
                                          echo '</tr>';
                                        echo '</form>';
                                      }

                                    ?>
                                    
                                  </table>
                                </div>
                              </div>

                          <?php
                        }
                      }                      
                    ?>             

                      
    </div>
    
</body>
</html>