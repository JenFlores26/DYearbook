<div class="search-container">
    <div class="topButton">
        <button class="add-btn-reg-a add-btn-r"><i class="fas fa-user-plus"></i>Add Member</button>
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
