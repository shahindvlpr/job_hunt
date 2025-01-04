<script>
        function showUser(str) {
            if (str=="") {
                document.getElementById("txtHint").innerHTML="";
                return;
            }
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function() {
                if (this.readyState==4 && this.status==200) {
                    document.getElementById("txtHint").innerHTML=this.responseText;
                }
            }
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }
    </script>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background blur Popup</title>
</head>
    <link rel="stylesheet" href="getuser.css">
<body>
    <div class="container" id="blur">
        <div class="content">
            <h2>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente, 
                neque reiciendis. Blanditiis, asperiores molestias sed
            </h2>
           
            <a href="#" onclick="toggle()">Readmore</a>
        </div>
    </div>
    <div id="popup">
        <h2>Hello World!!!</h2>
        <p>Lorem ipsum dolor sit, amet  exercitationem dolorem 
        provident ullam quibusdam facere fugit aperiam recusandae accusantium!</p>
        <a href="#" onclick="toggle()">Close</a>
    </div>
    <script>
        function toggle() {
            var blur=document.getElementById('blur');
            blur.classList.toggle('active');
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
    </script>
</body>
</html>