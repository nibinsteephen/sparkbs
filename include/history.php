<!DOCTYPE html>
<html lang="en">

<head>
  <title>All Customers</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="../css/styles.css">
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/d2747108de.js" crossorigin="anonymous"></script>
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
        
       <br>
       <div class="table-responsive-sm">
    <table class="table table-striped table-condensed table-bordered table-success">
    <caption>History</caption>
        <thead>
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
                <th class="text-center">Date & Time</th>
            </tr>
        </thead>
        <tbody>
        <?php

            include 'config.php';

            $query =mysqli_query($sql,"Select * from transactions");

            while($rows = mysqli_fetch_assoc($query))
            {
        ?>

            <tr>
            <td class="py-2"><?php echo $rows['nid']; ?></td>
            <td class="py-2"><?php echo $rows['patron']; ?></td>
            <td class="py-2"><?php echo $rows['recipient']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>
            <td class="py-2"><?php echo $rows['loctime']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</body>
<footer id="footer">
  <i class="social-icon fas fa-phone-square-alt"></i>
  <i class="social-icon fab fa-twitter-square"></i>
  <i class="social-icon fas fa-envelope-square"></i>
  <p>© Copyright 2021 Keval's Bank</p>
</footer>

</html>