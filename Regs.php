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
          <div>
              <input type="text" placeholder="Search milestones by year" name="search-text" id="search_text_milestone">
              <button type="submit"><i class="fas fa-search"></i></button>
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
