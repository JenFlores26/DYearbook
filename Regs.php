<!--this is admin-style branch-->
<?php
    session_start();

    if(!isset($_SESSION['User']))
    {
      echo "<script>alert('You must login first.');window.location='logout.php';</script>";
    }
    isset($_SESSION['User']);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrar Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/style4.css">
  <link rel="stylesheet" type="text/css" href="styles/style5.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="shortcut icon" href="styles/CvSU/logo.ico">
<script src="styles/js/jquery-3.6.0.js"></script>
</head>
<body>
  <div class="sidenav" id="mySidenav">
    <header>
      <div><i class="fas fa-user"></i></div>
      <div>
        <h3><?php echo $_SESSION['User'] ?></h3>
        <h3>Registrar</h3>
      </div>
    </header>
    <ul class="nav">
      <li><a class="active" href="#reg-message">Message</a></li>
      <li><a class="active" href="#reg-yearbook">Yearbooks</a></li>
      <li><a class="active" href="#reg-ao">Administrative Officers</a></li>
      <li><a class="active" href="#reg-affairs">Academic Affairs</a></li>
      <li><a class="active" href="#reg-grad">Graduates</a></li>
      <li><a class="active" href="#reg-milestones-activities">Milestones & Activities</a></li>
      <li><a href="logout2.php">logout</a></li>
    </ul>
  </div>
  <div class="reg-container">
    <section class="reg-section" id="reg-message">
      <?php include 'db_connect.php';?>
      <table >
<tr>
<th>Sno.</th>
<th>User Id</th>
<th>User Name</th>
<th>Login Time</th>
</tr>
<?php
$query=mysqli_query($db_connect,"select * from userLog");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
<tr>
<td><?php echo $cnt;?></td>
<td><?php echo $row['Sid'];?></td>
<td><?php echo $row['usertype'];?></td>
<td><?php echo $row['loginTime'];?></td>
</tr>
<?php $cnt=$cnt+1;
} ?>
</table>
    </section>
    <section class="reg-section" id="reg-yearbook">
      <button><i class="fas fa-book-open"></i></button>
      <button style="float: right;" id="myBtn">+ New Database</button>
      <!-- The Modal -->
      <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <span class="close">&times;</span>
            <h2>New Data</h2>
          </div>
          <div class="modal-body">
              <form action="filem.php" method="post">
              Data Year:
              <?php $goose=date("Y"); ?>
            <input type="number" min='2018' max="<?php echo $goose; ?>" name="f1" style="width:100%">
          </div>
          <div class="modal-footer">
              <div>
            <button class="loc" name="sub">ADD</button>
          </div>
      </div>
      </form>
          </div>
        </div>
        <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
          modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
          modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
          if (event.target == modal) {
            modal.style.display = "none";
          }
        }
        </script>

        <form action="" method="get">
         <?php
      $db=mysqli_connect('localhost','root','','yearbook');
      $goo= 2021;
             $user_check_query = "SELECT * FROM folder ORDER BY year";
             $result = mysqli_query($db, $user_check_query);

             while ($row = mysqli_fetch_array($result)){
                echo "<div class='container' style='float:left;'>";
                echo "<div class='imgBx' style='border:none;'>";
                echo '<a href="sample.php?call='.$row['year'].'"><img name="nooo" class="pic" src="styles/CvSU/db-icon.png"/></a>';

                echo "<div class='contentt'>";
                echo "<center>".$row['year'].".sql</center>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
          }
      ?>
    </form>


      <?php
   $db=mysqli_connect('localhost','root','','yearbook');
   $goo= 2021;
          $user_check_query = "SELECT * FROM folder ORDER BY year";
          $result = mysqli_query($db, $user_check_query);

          while ($row = mysqli_fetch_array($result)){
             echo "<div class='container' style='float:left;'>";
             echo "<div class='imgBx' style='border:none;'>";
             echo '<a href="sample.php?call='.$row['year'].'"><img name="nooo" class="pic" src="styles/CvSU/db-icon.png"/></a>';

             echo "<div class='contentt'>";
             echo "<center>".$row['year'].".sql</center>";
             echo "</div>";
             echo "</div>";
             echo "</div>";
       }
   ?>

   <?php
   if (isset($_POST['sub'])) {
       $db=mysqli_connect('localhost', 'root', '', 'yearbook');
       $yr= mysqli_real_escape_string($db, $_POST['f1']);

            $user_check_query = "SELECT * FROM folder where year='$yr' LIMIT 1";
            $result = mysqli_query($db, $user_check_query);
            $user = mysqli_fetch_assoc($result);
            if ($user) { // if user exists
       if ($user['year'] === $yr) {
                 echo "<script>alert('Database already exist!'); window.location='filem.php';</script>";
            }
     }
            else{
               $adds="INSERT INTO folder (year) VALUES ('$yr')";
               mysqli_query($db, $adds);
               echo "<script>window.location='filem.php';</script>";
            }
   }

   ?>
    </section>
    <section class="reg-section" id="reg-ao">
      <div class="search-container">
          <div class="topButton">
              <button class="add-btn-reg-ao add-btn-r"><i class="fas fa-user-plus"></i>Add Member</button>
              <div class="addMember">
                  <form action="formFunction.php" method="post"  enctype="multipart/form-data">
                      <h2>Add Member</h2>

                      <div class="inputField">
                      <p>Select Image</p>
                      <input type="file" name="f1" required>

                      <p>Firstname</p>
                      <input type="text" name="Fname"required><br>

                      <p>Middle Initial</p>
                      <input type="text" name="Mname" maxlength="4" required><br>

                      <p>Lastname</p>
                      <input type="text" name="Lname"required><br>

                      <p>Position</p>
                      <input type="text" name="position"required><br>

                      <p>Year</p>
                      <input type="text" name="year" maxlength="4" required><br>

                      <button class="button button1" type="submit" name="submit1" >ADD</button>
                      <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
                      <button class="cancel-btn button">CANCEL</button>
                    </div>
                  </form>
              </div>
              <div class="input-icons">
                <input class="inp" type="text" placeholder="Search by name" name="search-text" id="search_text">
                <i class="fas fa-search"></i>
              </div>
          </div>
          <br>
          <div id="result"></div>
      </div>

      <script>
        $(document).ready(function(){
          load_data();
          function load_data(query)
          {
            $.ajax({
              url:"fetch.php",
              method:"post",
              data:{query:query},
              success:function(data)
              {
                $('#result').html(data);
              }
            });
          }

          $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              load_data(search);
            }
            else
            {
              load_data();
            }
          });
        });
      </script>
    </section>
    <section class="reg-section" id="reg-affairs">
      <div class="search-container">
        <div class="topButton">
            <button class="add-btn-reg-a"><i class="fas fa-user-plus"></i>Add Member</button>
            <div class="addMember-reg-a">
                <form action="formFunction.php" method="post"  enctype="multipart/form-data">
                    <h2>Add Member</h2>

                    <div class="inputField">
                    <p>Select Image</p>
                    <input type="file" name="f1" required>

                    <p>Firstname</p>
                    <input type="text" name="Fname"required><br>

                    <p>Middle Initial</p>
                    <input type="text" name="Mname" maxlength="4" required><br>

                    <p>Lastname</p>
                    <input type="text" name="Lname"required><br>

                    <p>Position</p>
                    <input type="text" name="position"required><br>

                    <p>Year</p>
                    <input type="text" name="year" maxlength="4" required><br>

                    <button class="button button1" type="submit" name="submit3" >ADD</button>
                    <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
                    <button class="cancel-btn-reg-a button">CANCEL</button>
                  </div>
                </form>
            </div>
            <div class="input-icons">
              <input class="inp" type="text" placeholder="Search by name" name="search-text" id="search_text_affair">
              <i class="fas fa-search"></i>
            </div>
        </div>
          <br>
          <div id="result_affair"></div>
      </div>

      <script>
        $(document).ready(function(){
          load_data();
          function load_data(affair_query)
          {
            $.ajax({
              url:"regAffairFetch.php",
              method:"post",
              data:{affair_query:affair_query},
              success:function(data)
              {
                $('#result_affair').html(data);
              }
            });
          }

          $('#search_text_affair').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              load_data(search);
            }
            else
            {
              load_data();
            }
          });
        });
      </script>
    </section>
    <section class="reg-section" id="reg-grad">
      <div class="search-container">
        <div class="topButton">
            <button class="add-btn-reg-grad"><i class="fas fa-user-plus"></i>Add Member</button>
            <div class="addMember-reg-grad">
                <form action="formFunction.php" method="post"  enctype="multipart/form-data">
                    <h2>Add Member</h2>

                    <div class="inputField">
                    <p>Select Image</p>
                    <input type="file" name="f1" required>

                    <p>Firstname</p>
                    <input type="text" name="Fname"required><br>

                    <p>Middle Initial</p>
                    <input type="text" name="Mname" maxlength="4" required><br>

                    <p>Lastname</p>
                    <input type="text" name="Lname"required><br>

                    <p>Year</p>
                    <input type="text" name="year" maxlength="4" required><br>

                    <button class="button button1" type="submit" name="submit3" >ADD</button>
                    <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
                    <button class="cancel-btn-reg-grad button">CANCEL</button>
                  </div>
                </form>
            </div>
            <div class="input-icons">
              <input class="inp" type="text" placeholder="Search by name" name="search-text" id="search_text_graduates">
              <i class="fas fa-search"></i>
            </div>
        </div>
          <br>
          <div id="result_graduates"></div>
      </div>

      <script>
        $(document).ready(function(){
          load_data();
          function load_data(graduates_query)
          {
            $.ajax({
              url:"regGraduateFetch.php",
              method:"post",
              data:{graduates_query:graduates_query},
              success:function(data)
              {
                $('#result_graduates').html(data);
              }
            });
          }

          $('#search_text_graduates').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              load_data(search);
            }
            else
            {
              load_data();
            }
          });
        });
      </script>
    </section>
    <section class="reg-section" id="reg-milestones-activities">
      <div class="search-container">
          <div class="topButton">
            <button class="add-btn-m"><i class="fas fa-user-plus"></i>Add Milestones</button>
            <div class="addMember-m">
                <form action="formFunction.php" method="post"  enctype="multipart/form-data">
                    <h2>Add Member</h2>

                    <div class="inputField">
                    <p>Select Image</p>
                    <input type="file" name="f1" required>

                    <p>Year</p>
                    <input type="text" name="year" maxlength="4" required><br>

                    <button class="button button1" type="submit" name="submit4" >ADD</button>
                    <!--<input type="submit" name="submit1" class="button button1" value="Add">-->
                    <button class="cancel-btn-m button">CANCEL</button>
                  </div>
                </form>
            </div>
            <div class="input-icons">
              <input class="inp" type="text" placeholder="Search milestones by year" name="search-text" id="search_text_milestone">
              <i class="fas fa-search"></i>
            </div>
          </div>
          <br>
          <div id="result_milestone"></div>
      </div>

      <script>
        $(document).ready(function(){
          load_data();
          function load_data(milestone_query)
          {
            $.ajax({
              url:"regMilestoneFetch.php",
              method:"post",
              data:{milestone_query:milestone_query},
              success:function(data)
              {
                $('#result_milestone').html(data);
              }
            });
          }

          $('#search_text_milestone').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
              load_data(search);
            }
            else
            {
              load_data();
            }
          });
        });
      </script>
    </section>
  </div>
  <script src="styles/js/reg.js"></script>
  <script src="styles/js/form.js"></script>
</body>
</html>
