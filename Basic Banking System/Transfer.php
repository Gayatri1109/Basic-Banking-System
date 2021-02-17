<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Money Transfer</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" type="text/css" href="css/Customers.css">
    <style type="text/css">
        body{
            background-image: url('images/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            image-rendering: pixelated;
        }

        /* Internal Style sheet */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .bg-light {
            background-color: #dbe4f0!important;
            height: 45px;
        }
        

        .wrapper {
            margin: auto;
            margin-top: 20px;
            width: 40%;
            height: 370px;
            box-shadow: 0 27px 87px rgba(256, 256, 256, 5);
            padding: 10px;
            background-color:#ffe4e1 ;
            border-radius: 5px;
            font-family: sans-serif;
            border:dotted #000080;
        }

        .tab {
            margin-right: 15px;
            display: inline-block;
            font-family: "serif";
        }

        .para {
            margin-left: 15%;
            font-family: "serif";
            color: black;
        }

        .value {
            margin-left: 15%;
            margin-top:5%;
            font-family: "serif";
            color: black;
        }



        .my-info {
            margin-top: -7%;
            font-family: 'serif', sans-serif;
            text-decoration: none;
        }

        .transact {
            margin-top: 9%;
            padding: 12px 10px;
            background-color: #33FFCC !important;
            margin-left: 1px;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 15px;
            font-family: "Sans-serif";
            cursor: pointer;
            text-align: center;
            border-radius:0.5rem;
        }

        .transact:hover {
            background-color: #ffcccc !important;
            text-decoration: none;
        }

        .submitButton {
            margin-top: 8%;
            padding: 8px 15px;
            border-radius: 4px;
            background: #f5f5f5;
            color: black;
            font-size: 15px;
            font-family: "Roboto";
            cursor: pointer;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- navbar starts here  -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="./index.html"><b>GMM  BANK</b></a>
      <img src="https://www.flaticon.com/svg/static/icons/svg/1138/1138038.svg" width="25px" height="25px" alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home </a>
                </li>
                    <a class="nav-link" href="History.php">History</a>
                </li>

            </ul>
        </div>
    </nav>
    <!-- navbar ends here  -->

    <div class="my-info text-center">
        <button class="btn transact" data-toggle="modal" data-target="#sendMoney"><a class="transact" href="Customers.php">Customer Details</a></button>
    </div>
    <script type="text/javascript">
        const currentLocation = location.href;
        const menuItem = document.querySelectorAll('a');
        const menuLength = menuItem.length;
        for (let i = 0; i < menuLength; i++) {
            if (menuItem[i].href === currentLocation) {
                menuItem[i].className = "active"
            }
        }
    </script>
    <!-- Navigation Bar code ends here -->
    <div class="wrapper">
        <p>&nbsp</p>
        <p><span class="tab"></span><strong style="margin-left: 27%; font-size : 125%;">Transfer Money</strong></p>
        <div>
            <form method="post" name='tcredit'>
                <p class="para"><b>Sender-</b> <span class="tab">
                        <select style="margin-left:20px;width:200px" name="Sender" class="form-control" required>
                            <option value="" disabled selected>Select Name</option>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "bank_details";
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM customer_details ORDER BY customer_name ASC";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo "Error " . $sql . "<br>" . mysqli_error($conn);
                            }
                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <option class="table" value="<?php echo $rows['customer_ID']; ?>">

                                    <?php echo $rows['customer_name']; ?> (Balance:
                                    <?php echo "₹ " . $rows['Bank_balance']; ?> )

                                </option>
                            <?php
                            }
                            ?>
                            </option>
                        </select>
                </p>
                <p class="para"><b>Receiver-</b> <span style="margin-left:10px;width:200px;" class="tab">
                        <select name="Receiver" class="form-control" required>
                            <option value="" disabled selected>Select Name</option>
                            <?php
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "bank_details";
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            $sql = "SELECT * FROM customer_details ORDER BY customer_name ASC";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo "Error " . $sql . "<br>" . mysqli_error($conn);
                            }

                            while ($rows = mysqli_fetch_assoc($result)) {
                            ?>
                                <option class="table" value="<?php echo $rows['customer_ID']; ?>">

                                    <?php echo $rows['customer_name']; ?>

                                </option>
                            <?php
                            }
                            ?>
                            </option>
                        </select>
                </p>
                <label for="Amount" class="value"><b>Amount-</b> <span class="tab"></span></label>


                <input type="number" name="amount" required>
                <div class="text-center">
                    <button class="submitButton" type="submit" name="submit" id="myBtn"><b>Submit</b></button>
                </div>
            </form>
        </div>
    </div>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank_details";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['submit'])) {
        $from = $_POST['Sender'];
        $to = $_POST['Receiver'];
        $amount = $_POST['amount'];

        $sql = "SELECT * from customer_details where customer_ID=$from";
        $query = mysqli_query($conn, $sql);
        $sql1 = mysqli_fetch_array($query);

        $sql = "SELECT * from customer_details where customer_ID=$to";
        $query = mysqli_query($conn, $sql);
        $sql2 = mysqli_fetch_array($query);
        // constraint to check if both the sender and receiver are same
        if ($sql1 == $sql2) {
            echo "<script> alert('Sender and Receiver name cannot be same.Please Check.');
                      window.location='Transfer.php';</script>";
        }
        // constraint to check input of negative value or zero by user
        if (($amount) <= 0) {
            echo '<script type="text/javascript">';
            echo ' alert("Please Enter a valid Amount")';
            echo '</script>';
        }

        // constraint to check insufficient balance.
        else if ($amount > $sql1['Bank_balance']) {
            echo '<script type="text/javascript">';
            echo ' alert("Insufficient Balance For Transaction.")';
            echo '</script>';
        } 
        else {
            // deducting amount from sender's account
            $newbalance = $sql1['Bank_balance'] - $amount;
            $sql = "UPDATE customer_details set Bank_balance=$newbalance where customer_ID=$from";
            mysqli_query($conn, $sql);

            // adding amount to reciever's account
            $newbalance = $sql2['Bank_balance'] + $amount;
            $sql = "UPDATE customer_details set Bank_balance=$newbalance where customer_ID=$to";
            mysqli_query($conn, $sql);

            $sender = $sql1['customer_name'];
            $receiver = $sql2['customer_name'];
            date_default_timezone_set("Asia/Kolkata");
            $t = time();
            $time = (date("Y-m-d H:i:s", $t));
            $sql = "INSERT INTO transaction_history VALUES ('" . $sender . "','" . $receiver . "','" . $amount . "','" . $time . "')";
            $query = mysqli_query($conn, $sql);

            if ($query) {
                echo "<script> alert('Transaction Successful!!');
                      window.location='History.php';</script>";
            }
            $newbalance = 0;
            $amount = 0;
        }
    }
    ?>
</body>

</html>