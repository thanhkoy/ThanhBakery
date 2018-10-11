<div class="modal fade" id="checkout-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your payment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="pay-receiver">Full name</label>
                    <input type="text" class="form-control" id="pay-receiver">
                </div>
                <div class="form-group">
                    <label for="pay-address">Address</label>
                    <input type="text" class="form-control" id="pay-address">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="checkout()">Checkout</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>