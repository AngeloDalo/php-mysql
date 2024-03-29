<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container" style="max-width: 50%">
        <div class="text-center mt-5 mb-4">
            <h2>PHP MySql Live Search</h2>
        </div>
        <input type="text" class="form-control" id="live_search" autocomplete="off" placeholder="Search...">
    </div>

    <div id="searchresult">

    </div>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function(){
            $("#live_search").keyup(function(){
                var input = $(this).val();
                console.log(input);
                
                if(input != ""){
                    $.ajax({
                        url:"livesearch.php",
                        method:"POST",
                        data:{input:input},

                        success: function(data){
                            $("#searchresult").html(data);
                            $('#searchresult').css("display", "block");
                        }
                    });
                } else {
                    $("#searchresult").css("display", "none");
                }
            });
        });
    </script>
</body>

</html>