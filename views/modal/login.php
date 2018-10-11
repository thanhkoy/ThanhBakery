<div class="modal fade" id="login-modal">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <form action="?f=account/login" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Sign in</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter username" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="mx-auto d-block">
                        <button type="submit" class="btn btn-outline-success">Sign in</button>
                        <button type="reset" class="btn btn-outline-warning">Reset</button>
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>