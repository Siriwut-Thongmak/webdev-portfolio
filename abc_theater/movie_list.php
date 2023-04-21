<?php
  require('connect.php');
  session_start();
  if(!isset($_SESSION['admin_login'])) header('location:login.php');
  $title = '';
  if(!empty($_GET['title']))
    $title = $_GET['title'];
  $sql = "SELECT * FROM movie WHERE movie_name LIKE '%".$title."%'";

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
        <Title>Movie List</Title>
    </head>
    <body>
      <div class="row">
         <h2>Movie List</h2>
      </div>
      <?php if(isset($_SESSION['update_succ'])){?>
          <div class = "alert">
      <?php 
          echo $_SESSION['update_succ'];
          unset($_SESSION['update_succ']);
      ?>
          </div>
      <?php } ?>

      <?php if(isset($_SESSION['add_succ'])){?>
          <div class = "alert">
      <?php 
          echo $_SESSION['add_succ'];
          unset($_SESSION['add_succ']);
      ?>
          </div>
      <?php } ?>

      <?php if(isset($_SESSION['del_succ'])){?>
        <div class = "alert">
          <?php 
            echo $_SESSION['del_succ'];
            unset($_SESSION['del_succ']);
           ?>
          </div>
    <?php } ?>

      <div class="row">
        <form method="get" action="movie_list.php?title=<?php echo $title ?>" class="contact-form">
          <div class="row">
          <div class="col span-1-of-3">
              <label></label>
            </div>
            <div class="col span-1-of-3">
              <input type="text" name="title" placeholder="Search movie title">
            </div>
          </div>
        </form>
        </div>
        <table>
          <tr>
            <th width="75">
              <div>No</div>
            </th>

            <th width="100">
              <div>MovieID</div>
            </th>
        
            <th width="300">
              <div>Movie Title</div>
            </th>

            <th width="100">
              <div>Duration</div>
            </th>

            <th width="150">
              <div>Get In Date</div>
            </th>

            <th width="150">
              <div>Get Out Date</div>
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
        <td><?php echo $objResult["movie_id"]; ?></td>
        <td class='left_a'><?php echo $objResult["movie_name"]; ?></td>
        <td><?php echo $objResult["duration"]; ?></td>
        <td><?php echo $objResult["get_in_date"]; ?></td>
        <td><?php echo $objResult["get_out_date"]; ?></td>
        <td class='btn-table'><a href="movie_delete.php?movie_id=<?php echo $objResult["movie_id"]; ?>">Delete</a></td>
        <td class='btn-table'><a href="movie_update_page.php?movie_id=<?php echo $objResult["movie_id"]; ?>">Update</a></td>
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
  <div class="row">
        <div class="col span-1-of-3">
<!-- button for go to back view booking -->
            <a class="btn btn-std back_button" href="admin.php">Back</a>
            <a class="btn btn-std back_button" href="movie_add.php">Add Movie</a>
        </div> 
    </div>
</body>
</html>
 
