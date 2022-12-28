<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Ajax Load More Pagination</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="main">
    <div id="header">
      <h1>PHP & Ajax Load More Pagination</h1>
    </div>

    <div id="table-data">
      <table id="loadData" border="1" width="100%" cellspacing="0" cellpadding="10px">
        <tr>
          <th>Id</th>
          <th>title</th>
        </tr>

      </table>

      <div class="text-center load-more-div" style="display: none;">
        <button type="button" class="btn btn-success load-more-btn" data-offset="5">Load More</button>
      </div>

    </div>

  </div>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script>
    $(document).ready(function() {
      // Load Data from Database with Ajax
      var limit = 5;
      function loadTable() {
        $.ajax({
          url: "ajax-pagination.php",
          type: "POST",
          dataType: "json",
          //  data : { offset : offset },
          success: function(data) {
            console.log(data);
            if (data) {
              $("#loadData").append(data.html);
            }

            if (data.count > limit) {
              $('.load-more-div').css('display', 'block');
            }

          }
        });

      }
      loadTable();

      // Add Click Event on ajaxbtn
      $(document).on("click", ".load-more-btn", function() {
        var offset = $(this).attr('data-offset');
       
        $.ajax({
          url: "ajax-pagination.php",
          type: "POST",
          dataType: "json",
          data: {
            offset: offset,
            limit: limit
          },
          success: function(data) {
            console.log(data);
            offset = parseInt(offset) + limit;
            if (data) {
              $("#loadData").append(data.html);
            }

            if (offset >= data.count) {
              $('.load-more-div').css('display', 'none');
            } else {
              //  alert(offset);
              $('.load-more-btn').attr('data-offset', offset);
              $('.load-more-div').css('display', 'block');
            }
          }
        });


      });

    });
  </script>

</body>

</html>