<div class="search-container">
    <div class="topButton">
        <button class="add-btn-reg-grad"><i class="fas fa-user-plus"></i>Add Graduate</button>
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
      let addButtonGrad = document.querySelector('.add-btn-reg-grad');
      let addMemberGrad = document.querySelector('.addMember-reg-grad');
      let cancelButtonGrad = document.querySelector('.cancel-btn-reg-grad');

      addButtonGrad.addEventListener('click', function(){
          addMemberGrad.classList.add('form-active');
      });
      cancelButtonGrad.addEventListener('click', function(){
          addMemberGrad.classList.remove('form-active');
      });
      
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
