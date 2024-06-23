
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header ">
        <h5 class="modal-title " id="signupModalLabel">Signup-RAKSforum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="partials/handlu_sign_up.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Name">User Name</label>
                        <input type="text" class="form-control" id="signupname" name="signupname"placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail"placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="signupPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="cPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="signupcPassword" name="signupcPassword" placeholder="Confirm Password">
                    </div>
                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Signup</button>
                    <!--<a  type="submit" data-toggle="modal" href="#myModal2" class="btn btn-primary close" data-dismiss="modal">Open modal2</a>-->
                </div>
            </form>
    </div>
  </div>
</div>
<?php //include 'alert_modal.php'?>
