<div class="container content">
    <div class="row">
        <div class="col-sm-12">
            <ul>
                <?php foreach ($data as $item) { ?>
                    <li class="mx-auto d-block product-menu">
                        <img class="mx-auto d-block"
                             src="views/assets/images/product/<?php echo $item['prd_image']; ?>"
                             alt="<?php echo $item['prd_name']; ?>" data-toggle="modal"
                             data-target="#image-modal"
                             onclick="imageShow(<?php echo "'{$item['prd_image']}'"; ?>)">
                        <p>
                            <a href="?f=menu/detail&id=<?php echo $item['prd_id']; ?>"><?php echo $item['prd_name']; ?></a>
                        </p>
                        <p><?php echo $item['prd_price']; ?><sup>đ</sup></p>
                        <button class="btn btn-danger mx-auto d-block"
                                onclick="addCart(<?php echo $item['prd_id']; ?>)" data-toggle="modal"
                                data-target="#addCart-modal"><i
                                    class="fas fa-dollar-sign"></i>Buy
                        </button>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>