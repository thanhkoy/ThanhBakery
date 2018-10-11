<div class="modal fade" id="cart-modal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cart</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="cart-modal-content"></div>
            <div class="modal-footer">
                <div class="mx-auto d-block">
                    <button type="submit" class="btn btn-outline-success"
                            onclick="$('#item-coupon').css('display', 'flex')">Coupon code
                    </button>
                    <button type="reset" class="btn btn-outline-danger" data-dismiss="modal" data-toggle="modal"
                            data-target="<?php if (isset($_SESSION['username'])) {
                                echo '#checkout-modal';
                            } else {
                                echo '#login-modal';
                            } ?>">Checkout
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>