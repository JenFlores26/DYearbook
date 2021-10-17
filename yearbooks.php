<div class="nav-sort">
      <div class="btns">
          <button id="myBtn" class=""><i class="fas fa-book-open"></i>Add Yearbook</button>
          <div class="modal" id="myModal">
            <div class="modal-content">
              <div class="modal-header">
                <span class="close">&times</span>
                <h2 class="h2">New Yearbook</h2>
              </div>
              <div class="modal-body">
                <form class="addYear" action="formFunction.php" method="post" enctype="multipart/form-data">
                   <p class="p">Enter Year:</p>
                  <input class="int" type="number" name="f1" required>
                  <p>Select Cover Photo</p>
                  <input type="file" name="c1" required>
                  <button class="addbtnY" type="submit" name="submitYear">ADD</button>
                </form>
              </div>
            </div>
          </div>
          <div class="input-icons">
            <input class="inp"type="number" placeholder="Search by year" name="search-text" id="search_text">
            <i class="fas fa-search"></i>
          </div>
      </div>
      <br>
      <hr>
      <br><h3>Available Yearbook(s)</h3><br>
       <!--<form action="" method="get">-->
       <div class="contain">
      <?php
     $db=mysqli_connect('localhost','root','','yearbook');
     $goo= 2021;
            $user_check_query = "SELECT * FROM folder ORDER BY year";
            $result = mysqli_query($db, $user_check_query);

            while ($row = mysqli_fetch_array($result)){
               echo "<div class='img-wrapper'>";
               echo "<center>".$row['year']."</center>";
               echo '<a href="sample.php?call='.$row['year'].'"><img class="pic" src="data:image/jpeg;base64,'.base64_encode($row['photo']).'"/></a>';
               echo '<span><button><i class="fas fa-edit yb"></i></button><button><i class="fas fa-trash-alt yb"></i></button></span>';
               echo "</div>";
         }
         ?>
      <!-- </form>-->
    </div>
  </div>
