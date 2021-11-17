
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Transactions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <style>body {
    background-size: cover;
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    }</style>
</head>

<body>
    
<?php
  include 'navhome.php';
?>
    <div class="container">
        <form method="POST">
            <?php
                include 'config.php';
                $sid=$_GET['id'];
                $result=mysqli_query($sql,"SELECT * FROM customers where id=$sid");
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
                <div>
                <table class="table table-hover table-sm table-striped table-borderless">
                            <caption>Benefactor Details</caption>
                                <thread class="thread-dark">
                                    <tr>
                                    <th scope="col" class="text-center py-2">Id</th>
                                    <th scope="col" class="text-center py-2">Name</th>
                                    <th scope="col" class="text-center py-2">E-Mail</th>
                                    <th scope="col" class="text-center py-2">Balance</th>
                                    </tr>
                                </thread>
                        <tr>
                    <td class="py-2"><?php echo $rows['id'] ?></td>
                    <td class="py-2"><?php echo $rows['Name'] ?></td>
                    <td class="py-2"><?php echo $rows['Email'] ?></td>
                    <td class="py-2"><?php echo $rows['Balance'] ?></td>                    
                </tr>
                </table>
                </div>
            <div class="container" style="width:50%">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Receiver</span>
                        </div>
                        <select id="rec" name="rec" class="form-control" aria-label="Default"
                            aria-describedby="inputGroup-sizing-default">
                        <?php
                        include 'config.php';
                        $sid=$_GET['id'];
                        $query = "SELECT * FROM customers where id!=$sid";
                        $result=mysqli_query($sql,$query);
                        if(!$result)
                        {
                            echo "Error ".$sql."<br>".mysqli_error($conn);
                        }
                        while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                        <option value="<?php echo $rows['id'];?>" >
                        
                            <?php echo $rows['Name'] ;?>
                    
                            <?php 
                        } 
                    ?>
                </select>
                    </div>
                    <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">₹</span>
                </div>
                <input type="number" name="amount" class="form-control" aria-label="Default"
                    aria-describedby="inputGroup-sizing-default" required placeholder="Enter Amount here"
                    oninvalid="this.setCustomValidity('Please Enter Price')" oninput="this.setCustomValidity('')">
            </div>
            <button class="btn btn-dark btn-lg btn-block active" name="send" value="Transfer">Send Money</button>
        </form>
    </div>
</body>
</html>


<?php
include 'config.php';

if(isset($_POST['send']))
{
    $from = $_GET['id'];
    $to = $_POST['rec'];
    $amount = $_POST['amount'];

    $command = "SELECT * from customers where id=$from";
    $query = mysqli_query($sql,$command);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $command = "SELECT * from customers where id=$to";
    $query = mysqli_query($sql,$command);
    $sql2 = mysqli_fetch_array($query);

    // constraint to check input of negative value by user
    if (($amount)<0)
   {
        echo '<script type="text/javascript">';
        echo ' alert("Input a positiive value")';  // showing an alert box.
        echo '</script>';
    }


  
    // constraint to check insufficient balance.
    else if($amount > $sql1['Balance']) 
    {
        
        echo '<script type="text/javascript">';
        echo ' alert("Your account will be overdrawn with this amount. Input lesser amount.")';  // showing an alert box.
        echo '</script>';
    }
    


    // constraint to check zero values
    else if($amount == 0){

         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }
    
     else {
        
        // deducting amount from sender's account
        $newbalance = $sql1['Balance'] - $amount;
        $query = "UPDATE customers set Balance=$newbalance where id=$from";
        mysqli_query($sql,$query);
     

        // adding amount to reciever's account
        $newbalance = $sql2['Balance'] + $amount;
        $query = "UPDATE customers set Balance=$newbalance where id=$to";
        mysqli_query($sql,$query);
        
        $sender = $sql1['Name'];
        $receiver = $sql2['Name'];
        $query = "INSERT INTO transactions(`patron`, `recipient`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query=mysqli_query($sql,$query);

        if($query){
             echo "<script> alert('Transaction Successful');
                             window.location='../index.php';
                   </script>";
            
        }

        $newbalance= 0;
        $amount =0;
}
}
?>