<?php

  include "header.php";

  

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
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
                                    <th class="department-info-table-header-text">Position</th>
                                    <th class="department-info-table-header-text">Name</th>
                                    <th class="department-info-table-header-text">Surname</th>
                                    <th class="department-info-table-header-text">Gender</th>
                                    <th class="department-info-table-header-text">Email</th>
                                    <th class="department-info-table-header-text">Tasks</th>
                                    <th class="department-info-table-header-text">Edit</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($usersIT as $user){
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                      <th class="department-info-table-header-text">Position</th>
                                      <th class="department-info-table-header-text">Name</th>
                                      <th class="department-info-table-header-text">Surname</th>
                                      <th class="department-info-table-header-text">Gender</th>
                                      <th class="department-info-table-header-text">Email</th>
                                      <th class="department-info-table-header-text">Tasks</th>
                                      <th class="department-info-table-header-text">Edit</th>
                                    </tr>
                                    
                                      <?php

                                        foreach($usersDeveloper as $user){
                                          echo '<tr class="department-info-table-info">';
                                          echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                    <th class="department-info-table-header-text">Position</th>
                                    <th class="department-info-table-header-text">Name</th>
                                    <th class="department-info-table-header-text">Surname</th>
                                    <th class="department-info-table-header-text">Gender</th>
                                    <th class="department-info-table-header-text">Email</th>
                                    <th class="department-info-table-header-text">Tasks</th>
                                    <th class="department-info-table-header-text">Edit</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($usersMarketing as $user){
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                      <th class="department-info-table-header-text">Position</th>
                                      <th class="department-info-table-header-text">Name</th>
                                      <th class="department-info-table-header-text">Surname</th>
                                      <th class="department-info-table-header-text">Gender</th>
                                      <th class="department-info-table-header-text">Email</th>
                                      <th class="department-info-table-header-text">Tasks</th>
                                      <th class="department-info-table-header-text">Edit</th>
                                    </tr>
                                    
                                      <?php

                                        foreach($usersAccounting as $user){
                                          echo '<tr class="department-info-table-info">';
                                          echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                    <th class="department-info-table-header-text">Position</th>
                                    <th class="department-info-table-header-text">Name</th>
                                    <th class="department-info-table-header-text">Surname</th>
                                    <th class="department-info-table-header-text">Gender</th>
                                    <th class="department-info-table-header-text">Email</th>
                                    <th class="department-info-table-header-text">Tasks</th>
                                    <th class="department-info-table-header-text">Edit</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($usersIT as $user){
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                      <th class="department-info-table-header-text">Position</th>
                                      <th class="department-info-table-header-text">Name</th>
                                      <th class="department-info-table-header-text">Surname</th>
                                      <th class="department-info-table-header-text">Gender</th>
                                      <th class="department-info-table-header-text">Email</th>
                                      <th class="department-info-table-header-text">Tasks</th>
                                      <th class="department-info-table-header-text">Edit</th>
                                    </tr>
                                    
                                      <?php

                                          foreach($usersDeveloper as $user){
                                            echo '<tr class="department-info-table-info">';
                                            echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                    <th class="department-info-table-header-text">Position</th>
                                    <th class="department-info-table-header-text">Name</th>
                                    <th class="department-info-table-header-text">Surname</th>
                                    <th class="department-info-table-header-text">Gender</th>
                                    <th class="department-info-table-header-text">Email</th>
                                    <th class="department-info-table-header-text">Tasks</th>
                                    <th class="department-info-table-header-text">Edit</th>
                                  </tr>
                                  
                                    <?php

                                      foreach($usersMarketing as $user){
                                        echo '<tr class="department-info-table-info">';
                                        echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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
                                      <th class="department-info-table-header-text">Position</th>
                                      <th class="department-info-table-header-text">Name</th>
                                      <th class="department-info-table-header-text">Surname</th>
                                      <th class="department-info-table-header-text">Gender</th>
                                      <th class="department-info-table-header-text">Email</th>
                                      <th class="department-info-table-header-text">Tasks</th>
                                      <th class="department-info-table-header-text">Edit</th>
                                    </tr>
                                    
                                      <?php

                                        foreach($usersAccounting as $user){
                                          echo '<tr class="department-info-table-info">';
                                          echo '<form action="userEdit.php" method="POST">';
                                          if($user['authority_id'] == 1){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='1'>Employee</td>";
                                          } else if ($user['authority_id'] == 2){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='2'>Manager</td>";
                                          } else if ($user['authority_id'] == 3){
                                            echo "<td class='department-info-table-info-text'><input type='hidden' name='authority' value='3'>Admin</td>";
                                          }
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='name' value='$user[name]'>".$user['name']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='surname' value='$user[surname]'>".$user['surname']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='gender' value='$user[gender]'>".$user['gender']."</td>";
                                          echo "<td class='department-info-table-info-text'><input type='hidden' name='email' value='$user[email]'>".$user['email']."</td>";
                                          echo "<input type='hidden' name='department_id' value='$user[department_id]'>";
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="view">View Tasks</button></td>';
                                          echo '<td class="department-info-table-info-edit"><button class="department-info-table-info-button" name="action" value="edit">Edit</button></td>';
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