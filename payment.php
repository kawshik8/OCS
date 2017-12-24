<html>
    <head>
        <script>
            function onreg()
            {
                var p1  = document.getElementById("div4");
                var p2  = document.getElementById("div5");
                p1.style.display = "none";
                p2.style.display = "block";
            }
            function onlog()
            {
                var p1  = document.getElementById("div4");
                var p2  = document.getElementById("div5");
                p2.style.display = "none";
                p1.style.display = "block";
            }
        </script>
        <style>
            body
            {
                background-color:powderblue;
            }
            #div1
            {
                background-color: lightslategray;

                width: 550px;
                border: 5px solid maroon;
                margin-top:0px;
                margin-left:330px;
                height:500px;
                padding:20px;
                float:left;
                left:45%;
            }
            input
            {
                width : 200px;
                height:30px;
            }
            #div2
            {
                background-color:powderblue;
                width:200px;
                height:500px;
                float:left;
            }
            #div3
            {
                background-color:lightgreen;
                width:340px;
                height:500px;
                float:right;
            }
            #div4
            {
                display:none;
            }
            #div5
            {
                display:block;
            }
            #b1
            {
                background-color:teal;
                color:#63D1F4;
                display:inline-block;
                width:150px;
                height:30px;

                border:none;
                font-size:15px;
            }
        </style>
    </head>
    <body>
  
        <center><h1> PAYMENT </h1></center>
        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "kawshik8";
        $dbname = "mydb";
        // Create connection
        $conn = new mysqli($servername , $username, $password , $dbname); 
        // Check connection
        if ($conn->connect_error) 
        {
        die("Connection failed: " . $conn->connect_error);
        }
        $cname = $_POST["course"];
        $q = $_POST["quota"];
        $id = $_POST["user"];
        $clg = $_POST["college"];
        $sql = "UPDATE transcript set course = '$cname', quota = '$q' where lid = $id";
        //echo $sql;
        $conn->query($sql);
        $sql = "UPDATE courses set $q = $q-1 where course = '$cname' and clgid = '$clg';";
        //echo $sql;
        $result = $conn->query($sql);
        
        ?>
        <center>
        <div id = "div1">
            <div id = "div2">
                <br><br>
                <button id = "b1" onclick = "onlog()">CARD PAYMENT</button>
                <br><br><br><br><br><br><br><br><br><br><br><br>
                <button id = "b1" onclick = "onreg()">E-WALLETS</button>
            </div>
                <div id = "div3">
                    <div id = "div4">
                        <form method = "POST" action="validcard.php"> 
                        <br><br>
                        <br><br><br>
                        <?php 
                        $id = $_POST["user"];
                        //echo $id;
                        echo "<input type = 'hidden' name = 'user' value = $id>";
                        ?>
                        <input type = "text" name = "cardno" placeholder = "CARD NO" pattern=[0-9]{16}><br><br><br>
                        <input type = "password" name = "cvv" placeholder = "CVV" pattern=[0-9]{3}><br><br><br>
                        <input type = "date" name = "expiry"><br><br><br><br>
                        <input type = "submit" value = "Confirm Payment">

                        </form>
                    </div>
                    <div id = "div5">
                        <form method = "POST" action="validwal.php">
                        <br><br>
                        <br><br><br>
                        <?php 
                        $id = $_POST["user"];
                        //echo $id;
                        echo "<input type = 'hidden' name = 'user' value = $id>";
                        ?>
                        PayTM<input type = "radio" name = "wallet" value="paytm"><br><br>
                        CITRUS<input type = "radio" name = "wallet" value="citrus"><br><br><br>
                        <input type = "text" name = "phno" placeholder = "PHONE NO" pattern=[0-9]{10}><br><br><br>
                        <input type = "submit" value = "Confirm Payment">

                        </form>
                    </div>  
                </div>
            <div >
                <form>
                    
                </form>
            <br><br>
            

        </div>
        </center>