<div class="list-group">
    <?php
    $i = 0;
    if (isset($data_item)) {
        foreach ($data_item as $value) { ?>
            <a class="list-group-item list-group-item-action">
                <ul>
                    <li style="width: 55%">
                        <img src="views/assets/images/product/<?php echo $value['prd_image']; ?>"
                             class="d-block float-left">
                        <p class="d-block float-left"><?php echo $value['prd_name'] . " - " . $value['prd_price']; ?>
                            <sup>đ</sup></p>
                    </li>
                    <li style="width: 30%">
                        <div class="input-group mb-3">
                            <input id="item-value-<?php echo $i; ?>" type="number" class="form-control"
                                   value="<?php echo $_SESSION['cart'][$value['prd_id']]; ?>" min="0"
                                   onchange="changeItem(<?php echo $value['prd_id']; ?>,$('#item-value-<?php echo $i; ?>').val())">
                            <div class="input-group-append">
                                <button class="btn btn-danger" onclick="changeItem(<?php echo $value['prd_id']; ?>,0)">
                                    <i
                                            class="fas fa-trash-alt"></i></button>
                            </div>
                        </div>
                    </li>
                    <li style="width: 15%">
                        <p class="mx-auto d-block"><?php echo number_format($_SESSION['cart'][$value['prd_id']] * $value['prd_price'], 0); ?>
                            <sup>đ</sup></p>
                    </li>
                </ul>
            </a>
            <?php $i++;
        }
    } ?>
</div>
<div>
    <p class="font-weight-bold text-center">Total cost: <?php if (isset($_SESSION['code'])) {
            echo number_format($_SESSION['total'] - ($_SESSION['total'] * $_SESSION['code'] / 100), 0);
        } else {
            echo number_format($_SESSION['total'], 0);
        } ?><sup>đ</sup><?php if (isset($_SESSION['code'])) {
            echo "<span class='badge badge-success'>Coupon code applied!</span>";
        } else {
            echo '';
        } ?></p>
</div>

<div class="input-group mb-3" id="item-coupon" style="display: none">
    <div class="input-group-prepend">
        <span class="input-group-text">Coupon code</span>
    </div>
    <input type="text" class="form-control" id="coupon-value">
    <div class="input-group-append">
        <button class="btn btn-info" type="button" onclick="applyCode()"><i class="fas fa-check"></i>Apply</button>
    </div>
</div>