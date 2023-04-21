<?php
  require('connect.php');
  session_start();
  if(!isset($_SESSION['admin_login']))
        header('location:login.php');
  $sql = '
    SELECT * 
    FROM member;
    ';
  $objQuery = mysqli_query($conn, $sql);
  ?>

<!DOCTYPE HTML>
<html lang="en">
    <head>
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/grid.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;1,300&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <Title>member dashboard</Title>
    </head>
    
    <body>
      <section class="contact-form">
        <div class="row">
          <h2>Member Dashboard</h2>
        </div>
    </section>

    <?php if(isset($_SESSION['del_succ'])){?>
        <div class = "alert">
          <?php 
            echo $_SESSION['del_succ'];
            unset($_SESSION['del_succ']);
           ?>
          </div>
    <?php } ?>

    <?php if(isset($_SESSION['update_succ'])){?>
        <div class = "alert">
          <?php 
            echo $_SESSION['update_succ'];
            unset($_SESSION['update_succ']);
           ?>
          </div>
    <?php } ?>

  <table>
    <tr>
    <th width="100">
        <div>No</div>
      </th>

      <th width="150">
        <div>MemberID</div>
      </th>
   
      <th width="250">
        <div>Name</div>
      </th>

      <th width="250">
        <div>Email</div>
      </th>

      <th width="175">
        <div>Phone</div>
      </th>

      <th width="150">
      <div>Birth Date</div>
      </th>

      <th width="100">
      <div>Delete</div>
      </th>

      <th width="100">
      <div>Update</div>
      </th>
    </tr>
    
    <?php
    $i = 1;
    while ($objResult = mysqli_fetch_assoc($objQuery)) {
    ?>
      <tr>
        <td>
          <div><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["member_id"]; ?></td>
        <td class='left_a'><?php echo $objResult["member_name"]; ?></td>
        <td class='left_a'><?php echo $objResult["email"]; ?></td>
        <td><?php echo $objResult["phone"]; ?></td>
        <td><?php echo $objResult["birth_date"]; ?></td>
        <td class='btn-table'><a class='btn-table' href="member_delete.php?member_id=<?php echo $objResult["member_id"]; ?>">Delete</a></td>
        <td class='btn-table'>
          <a class='btn-table' href="member_update_page.php?member_id=<?php echo $objResult["member_id"];?>">Update</a>
        </td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <?php
  $objQuery->free_result();
  mysqli_close($conn);
  ?>
</body>
</html>
 
<div class="row">
  <div class="col span-2-of-3">
<!-- button for go to back view booking -->
       <a class="btn btn-std back_button" href="admin.php">Back</a>
  </div> 
</div>
</body>
</html>
 