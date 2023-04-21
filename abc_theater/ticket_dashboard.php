<?php
  require('connect.php');
  session_start();
  if(!isset($_SESSION['admin_login']))
        header('location:login.php');

  $sql = '
    SELECT * 
    FROM ticket WHERE member_id IS NOT NULL;
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
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <Title>ticket dashboard</Title>
    </head>
    <section class="contact-form">
      <div class="row">
          <h2>Ticket Dashboard</h2>
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
    
    <body>
  <table>
    <tr>
      <th width="100">
        <div>No</div>
      </th>
      <th width="100">
        <div>Ticket ID</div>
      </th>
   
      <th width="125">
        <div>Pay Status</div>
      </th>

      <th width="175">
        <div>Anouncement ID</div>
      </th>
      <th width="125">
        <div>Slot Time</div>
      </th>
      <th width="100">
        <div>Seat ID</div>
      </th>
      <th width="100">
        <div>Hall ID</div>
      </th>
      <th width="125">
        <div>Member ID</div>
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
    while ($objResult = mysqli_fetch_array($objQuery)) {
    ?>
      <tr>
        <td>
          <div><?php echo $i; ?></div>
        </td>
        <td><?php echo $objResult["ticket_id"]; ?></td>
        <td><?php echo $objResult["pay_status"]; ?></td>
        <td><?php echo $objResult["annoucement_id"]; ?></td>
        <td><?php echo $objResult["slot_time_id"]; ?></td>
        <td><?php echo $objResult["seat_id"]; ?></td>
        <td><?php echo $objResult["hall_id"]; ?></td>
        <td><?php echo $objResult["member_id"]; ?></td>
        <td class='btn-table'><a href="ticket_delete.php?ticket_id=<?php echo $objResult["ticket_id"]; ?>">Delete</a></td>
        <td class='btn-table'><a href="ticket_update.php?ticket_id=<?php echo $objResult["ticket_id"]; ?>">Update</a></td>
      </tr>
    <?php
      $i++;
    }
    ?>
  </table>
  <?php
  mysqli_close($conn);
  ?>
  <div class="row">
        <div class="col span-1-of-3">
<!-- button for go to back view booking -->
            <a class="btn btn-std back_button" href="admin.php">Back</a>
        </div> 
</body>
</html>
 
