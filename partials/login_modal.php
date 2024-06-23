<!-- Modal -->
<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="loginmodalLabel">Login-RAKSforum</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action='partials\handle_login.php' method='post'>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="Email">Email address</label>
                        <input type="email" class="form-control" id="loginEmail" placeholder="Enter email"  name = "loginEmail" >
                    </div>
                    <div class="form-group">
                        <label for="ePassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" placeholder="Password" name = "loginPassword">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Login</button>

                </div>
            </form>
        </div>
    </div>
</div>