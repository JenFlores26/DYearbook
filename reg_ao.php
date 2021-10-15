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
      let addButton = document.querySelector('.add-btn-reg-ao');
      let addMember = document.querySelector('.addMember');
      let cancelButton = document.querySelector('.cancel-btn');

      addButton.addEventListener('click', function(){
          addMember.classList.add('form-active');
      });
      cancelButton.addEventListener('click', function(){
          addMember.classList.remove('form-active');
      });
      
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
