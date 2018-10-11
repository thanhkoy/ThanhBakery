<div class="container content detail">
    <div class="row">
        <div class="col-sm-5">
            <img src="views/assets/images/product/<?php echo $data['prd_image']; ?>"
                 alt="<?php echo $data['prd_name']; ?>" data-toggle="modal"
                 data-target="#image-modal"
                 onclick="imageShow(<?php echo "'{$data['prd_image']}'"; ?>)">
        </div>
        <div class="col-sm-7">
            <h4><?php echo $data['prd_name']; ?></h4>
            <p>Price: <?php echo $data['prd_price']; ?><sup>đ</sup></p>
            <div id="rateYo"></div>
            <input type="hidden" id="star-value" value="<?php foreach ($star as $value) {
                if ($value['tbc'] == '') {
                    echo 0;
                } else {
                    echo $value['tbc'];
                }
            } ?>" status="<?php if (isset($_SESSION['username'])) {
                echo 0;
            } else {
                echo 1;
            } ?>" product="<?php echo $_GET['id']; ?>">
            <button class="btn btn-danger"
                    onclick="addCart(<?php echo $data['prd_id']; ?>)" data-toggle="modal"
                    data-target="#addCart-modal"><i
                        class="fas fa-dollar-sign"></i>Buy now
            </button>
            <p><?php echo $data['prd_description']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="fb-comments"
             data-href="http://localhost/Bakery/index.php?f=menu/detail&id=<?php echo $data['prd_id']; ?>"
             data-numposts="10"></div>
    </div>
</div>