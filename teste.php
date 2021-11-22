<!-- 
    não seguro.
    criar checagem de valores regex em javascript.

-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste api</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("button").click(function(){
                $.post("http://localhost/api/",
                {
                nick: $("#nick").val(),
                message: $("#message").val()
                },
                function(data){
                console.log(data);
                });
            });
        });
    </script>
</head>
<body>
    <label for="nick">nickname:</label>
    <input id="nick" type="text" name="nick"><br>
    <label for="message">message</label>
    <input id="message" type="text" name="message">
    <button>send</button>
</body>
</html>