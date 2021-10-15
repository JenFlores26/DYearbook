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
      let addButtonMilestone = document.querySelector('.add-btn-m');
      let addMemberMilestone = document.querySelector('.addMember-m');
      let cancelButtonMilestone = document.querySelector('.cancel-btn-m');

      addButtonMilestone.addEventListener('click', function(){
          addMemberMilestone.classList.add('form-active');
      });
      cancelButtonMilestone.addEventListener('click', function(){
          addMemberMilestone.classList.remove('form-active');
      });

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
