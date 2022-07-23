<?php
  session_start();
  $count = 0;
  // connecto database
  
  $title = "Index";
  require_once "./template/header.php";
  require_once "./functions/database_functions.php";
  $conn = db_connect();
  $row = select4LatestBook($conn);
?>
      <!-- Example row of columns -->
      <p class="lead text-center text-muted">Latest books</p>
      <div class="row">
        <?php foreach($row as $book) { ?>
      	<div class="col-md-3">
      		<a href="book.php?bookisbn=<?php echo $book['book_isbn']; ?>">
           <img class="img-responsive img-thumbnail" src="./bootstrap/img/<?php echo $book['book_image']; ?>">
          </a>
      	</div>
        <?php } ?>
      </div>

      <!-- Modal start-->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="z-index: 9999999999;">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title ml-auto" id="exampleModalLongTitle">Get Started</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row text-center">                
                <div class="col-6 p-2 mb-3 border-left">
                  <p><h3><span class="glyphicon glyphicon-flash"></span>&nbsp; Lets Get Started</h3></p>
                  <p>Register with your email id : </p>
                  <div class="p-2 m-1">
                    <button class="btn btn-primary" onclick="window.location = 'register.php';">Register</button>
                  </div>
                  <br>
                  <p>Or Login if laready done :</p>
                  <div class="p-2 m-1">
                    <button class="btn btn-primary" onclick="window.location = 'userLogin.php';">Already done?</button>
                  </div>
                  <hr class="d-sm-none">
                </div>
              </div>
            </div>
            <!--<div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>-->
          </div>
        </div>
      </div>
      <!-- Modal end-->
<?php
  if(isset($conn)) {mysqli_close($conn);}
  require_once "./template/footer.php";
?>