<style>
    .form-group span {
        color: red;
    }
</style>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><?= $data['title'] ?></h3>
            <a class="btn btn-primary" href="<?= base ?>admin/showproduct&page=<?= $data["page"] ?>">Trở Về</a>
            <h4 class="text-success"><?php if (isset($data["notifi"]["addsuccess"])) {
                                            echo $data["notifi"]["addsuccess"];
                                        } ?></h4>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="x_content">
        <form class="" action="" method="post" novalidate enctype="multipart/form-data">
            <div class="row">
                <div class="col-5">
                    <div class="form-group">
                        <label for="">Tên Sản Phẩm<span>*</span></label>
                        <h6 class="text-danger"><?php if (isset($data["notifi"]["name"])) {
                                                    echo $data["notifi"]["name"];
                                                } ?> </h6>
                        <input id="name-product" type="text" class="form-control" name="product[name]" value="<?= $data["product"][0]["name"] ?>">
                        <span class="span-product"></span>

                    </div>

                    <div class="form-group">
                        <label for="">Chọn Danh Mục Sản Phẩm<span>*</span></label>
                        <h6 class="text-danger"><?php if (isset($data["notifi"]["category"])) {
                                                    echo $data["notifi"]["category"];
                                                } ?> </h6>
                        <select class="form-control" name="product[id_category]">
                            <option value="<?= $data["product"][0]["category_id"] ?>"><?= $data["product"][0]["name_category"] ?></option>
                            <?php foreach ($data["category"] as $key => $values) { ?>
                                <option value="<?= $values["id"] ?>"><?= $values["name"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label for="">Nhà Sản Xuất</label>
                        <input id="name" type="text" class="form-control" name="product[company]" value="<?= $data["product"][0]["production_company"] ?>">
                    </div> -->
                    <div class="form-group">
                        <label for="">Hình Ảnh <span>*</span></label>
                        <h6 class="text-danger"><?php if (isset($data["notifi"]["img"])) {
                                                    echo $data["notifi"]["img"];
                                                } ?> </h6>
                        <input id="name" type="file" accept=".jpg, .png" class="" name="img">

                    </div>

                </div>

                <!-- trong row chứa col , trong col chứa dc row -->
                <!-- col từ 1 -> 12 -->
                <div class="col-2">
                    <div class="form-group">
                        <label for="">Giá Sản Phẩm <span>*</span></label>
                        <h6 class="text-danger text-danger-price"><?php if (isset($data["notifi"]["price"])) {
                                                                        echo $data["notifi"]["price"];
                                                                    } ?> </h6>

                        <input id="" type="number" class="form-control quantity" name="product[price]" value="<?= $data["product"][0]["price"] ?>">
                        <span class="span-quantity"></span>

                    </div>
                    <div class="form-group">
                        <label for="">Giảm Giá <span>*</span></label>
                        <h6 class="text-danger text-danger-price"><?php if (isset($data["notifi"]["sale"])) {
                                                                        echo $data["notifi"]["sale"];
                                                                    } ?> </h6>
                        <input id="name" type="number" class="form-control quantity" name="product[sale]" value="<?= $data["product"][0]["sale_product"] ?>" placeholder="%">
                        <span class="span-quantity"></span>

                    </div>
                    <div class="form-group">
                        <label for="">Số Lượng <span>*</span></label>
                        <h6 class="text-danger text-danger-price"><?php if (isset($data["notifi"]["quantity"])) {
                                                                        echo $data["notifi"]["quantity"];
                                                                    } ?> </h6>
                        <input id="name" type="number" class="form-control quantity" name="product[quantity]" value="<?= $data["product"][0]["quantity"] ?>">
                        <span class="span-quantity"></span>

                    </div>
                </div>

                <div class="col-7">
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea style="height: 100px;" id="name" type="text" class="form-control" name="product[decs]"><?= $data["product"][0]["descrip"] ?></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit" name="submit">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    var a = document.querySelectorAll('.quantity');
    var span = document.querySelectorAll('.span-quantity');
    var text_danger_price = document.querySelectorAll('.text-danger-price');
    var product = document.getElementById('name-product');
    var span_product = document.querySelector('.span-product');
    product.onblur = function(e) {
        if (e.target.value == "") {
            span_product.innerHTML = "Không được để trống";
            product.style.border = "1px solid red";
        } else {
            span_product.innerHTML = "";
            product.style.border = "1px solid #ced4da";
        }
    }
    a[0].onblur = function(e) {
        text_danger_price[0].style.display = 'none';
        if (e.target.value == "") {
            span[0].innerHTML = "Không được để trống";
            a[0].style.border = '1px solid red';
        } else if (e.target.value < 0) {
            span[0].innerHTML = "Giá Sản Phẩm phải lớn hơn 0";
            a[0].style.border = '1px solid red';
        } else {
            span[0].innerHTML = "";
            a[0].style.border = '1px solid #ced4da';

        }
    }
    a[1].onblur = function(e) {
        text_danger_price[1].style.display = 'none';
        if (e.target.value == "") {
            span[1].innerHTML = "Không được để trống";
            a[1].style.border = '1px solid red';
        } else if (e.target.value < 0) {
            span[1].innerHTML = "Giảm Giá Không được âm";
            a[1].style.border = '1px solid red';
        } else {
            span[1].innerHTML = "";
            a[1].style.border = '1px solid #ced4da';

        }
    }
    a[2].onblur = function(e) {
        text_danger_price[2].style.display = 'none';
        if (e.target.value == "") {
            span[2].innerHTML = "Không được để trống";
            a[2].style.border = '1px solid red';
        } else if (e.target.value < 0) {
            span[2].innerHTML = "Số Lượng phải lớn hơn 0";
            a[2].style.border = '1px solid red';
        } else {
            span[2].innerHTML = "";
            a[2].style.border = '1px solid #ced4da';

        }
    }
</script>