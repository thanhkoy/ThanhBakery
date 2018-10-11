<div class="modal fade" id="reg-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" id="reg-username" maxlength="30" autofocus>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" id="reg-pw" maxlength="30">
                </div>
                <div class="form-group">
                    <label>Repeat password</label>
                    <input type="password" class="form-control" id="reg-pw-2" maxlength="30">
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input type="number" class="form-control" id="reg-phone" maxlength="11">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" id="reg-email">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" id="reg-address">
                </div>
            </div>
            <div class="modal-footer">
                <div class="mx-auto d-block">
                    <button type="button" class="btn btn-outline-success" onclick="register()">Register</button>
                    <button type="reset" class="btn btn-outline-warning">Reset</button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>