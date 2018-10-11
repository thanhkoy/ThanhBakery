<div class="container content">
    <div class="row">
        <div class="col-sm-2">
            <ul class="nav flex-column nav-pills" role="tablist">
                <?php
                if (isset($data_cat)) {
                    for ($i = 0; $i < sizeof($data_cat); $i++) {
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php if ($i == 0) {
                                echo 'active';
                            } ?>" data-toggle="tab"
                               href="#a<?php echo $i ?>"><?php echo $data_cat[$i]['cat_name'] ?></a>
                        </li>
                    <?php }
                } else {
                    echo "Empty!";
                } ?>
            </ul>
        </div>
        <div class="col-sm-9">
            <div class="tab-content">
                <?php
                if (isset($data_prd)) {
                    for ($i = 0; $i < sizeof($data_prd); $i++) { ?>
                        <div id="a<?php echo $i; ?>" class="container tab-pane <?php if ($i == 0) {
                            echo 'active';
                        } else {
                            echo 'fade';
                        } ?>"><br>
                            <ul>
                                <?php foreach ($data_prd[$i] as $item) { ?>
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
                    <?php }
                } else {
                    echo "Empty!";
                } ?>
            </div>
        </div>
    </div>
</div>