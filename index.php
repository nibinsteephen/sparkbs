<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
  <link rel="stylesheet" type="text/css" href="css/socialmedia.css">
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/d2747108de.js" crossorigin="anonymous"></script>
  <title>Spark's Bank</title>
  <style>body {
    background-image: url("images/banksplash.webp");
    background-size: cover;
    height: 100%;
    width: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    }</style>
</head>
<body>

  <div id="title">
     <ul class="nav nav-pills nav-fill">
          <li class="nav-item">
            <a href="index.php" class="btn btn-outline-success active" tabindex="-1" role="button" >Home</a>
          </li>
      </ul>
  </div>
  <div class="functions">
    <form action="">
      <br>
      <button id="vcustomer" class="btn-danger btn-lg btn-block active" name="Customers" value="Customers"
        formaction="include/customer.php">Customers List</button><br>
      <button id="vhistory" class="btn btn-primary btn-lg btn-block active" name="Transaction History"
        value="Transaction History" formaction="include/history.php">Transaction History</button>
    </form>
  </div>
</body>
<footer id="footer">
<div class="social-media">
            <div class="social">
              </button><button class="icon-btn gmail"> 
              <a class="link" href="mailto:nibinsteephen27.ns@gmail.com" target="_blank">
                <i class="fa fa-envelope"></i> 
              </a>              
              </button><button class="icon-btn github"> 
              <a class="link" href="https://github.com/nibinsteephen" target="_blank">
                <i class="fa fa-github"></i>
              </a>
            </button></div>
          </div>
</footer>
	
</html>