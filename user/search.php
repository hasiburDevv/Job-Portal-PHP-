<?php
  if (isset($_POST['search'])) {
    $response = "<ul class='ul'><li>No data found!</li></ul>";

    $connection = new mysqli('localhost', 'root', '', 'jobportal');
    $q = $connection->real_escape_string($_POST['q']);

    $sql = $connection->query("SELECT jobTitle FROM jobpost WHERE jobTitle LIKE '%$q%'");
    if ($sql->num_rows > 0) {
      $response = "<ul class='ul'>";

      while ($data = $sql->fetch_array())
      //  $response = "<div>".$data['jobTitle']."</div>";
        $response .= "<li class='li'>".$data['jobTitle']."</li>";

      $response .= "</ul>";
    }


    exit($response);
  }
?>

 

  <style type="text/css">

          .ul{
               
                margin-left: 230px;
                border: 1px solid black;
            }

            input, .ul {
               font-size: 1.35em;
                width: 500px;
                margin-bottom:-40px; 
            }

            .li:hover {
                color:LightGray;
                background: #0088cc;
            }
        </style>
 


<div class="row"> 

<div class="col-md-8 offset-md-2 bg-light p-4 mt-3 rounded">
  <form action="" method="post" class="form-inline p-3">
    <input type="text"  id="searchBox" name="searchBox" 
class="form-control form-control-lg rounded-0 border-info" 
   placeholder="Search by Job Title" style="width:80%;">
    
    <input type="submit" name="submit" value="Search" class="btn btn-info btn-lg rounded-0" style="width:20%;">
  </form>
 </div>


  <div class="col-md-8 col-lg-6" id="response"></div>

</div>

      <script src="http://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#searchBox").keyup(function () {
                    var query = $("#searchBox").val();

                    if (query.length > 0) {
                        $.ajax(
                            {
                                url: 'search.php',
                                method: 'POST',
                                data: {
                                    search: 1,
                                    q: query
                                },
                                success: function (data) {
                                    $("#response").html(data);
                                },
                                dataType:'text'
                            }
                        );
                    }
                });

                $(document).on('click', 'li', function () {
                    var country = $(this).text();
                    $("#searchBox").val(country);
                    $("#response").html(" ");
                });
            });
        </script>