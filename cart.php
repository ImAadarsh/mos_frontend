<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Magic Of Skills | Designed To Learn More</title>
    <?php include "include/session.php" ;  include "include/meta.php" ?>
</head>

<body>

    <?php include "include/header.php" ?>




    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="assets/img/bg/breadcrumb_bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb__content">
                            <h3 class="title">Cart</h3>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="index.php">Home</a>
                                </span>
                                <span class="breadcrumb-separator"><i class="fas fa-angle-right"></i></span>
                                <span property="itemListElement" typeof="ListItem">Cart</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="breadcrumb__shape-wrap">
                <img src="assets/img/others/breadcrumb_shape01.svg" alt="img" class="alltuchtopdown">
                <img src="assets/img/others/breadcrumb_shape02.svg" alt="img" data-aos="fade-right" data-aos-delay="300">
                <img src="assets/img/others/breadcrumb_shape03.svg" alt="img" data-aos="fade-up" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape04.svg" alt="img" data-aos="fade-down-left" data-aos-delay="400">
                <img src="assets/img/others/breadcrumb_shape05.svg" alt="img" data-aos="fade-left" data-aos-delay="400">
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- cart-area -->
        <div class="cart__area section-py-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <table class="table cart__table">
                            <thead>
                                <tr>
                                    <th class="product__thumb">&nbsp;</th>
                                    <th class="product__name">Product</th>
                                    <th class="product__price">Price</th>
                               
                                   
                                    <th class="product__remove">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $cart_id = $_SESSION['cart_id'];
                                $sql = "SELECT workshops.icon as icon, workshops.name as title, workshops.id as workshop_id, items.price as price, items.id as items_id, items.coupon_code as coupon_code, items.discount  FROM items, workshops WHERE items.workshop_id = workshops.id and items.cart_id = $cart_id";
                                $t_price = 0;
                                    $results = $connect->query($sql);
                                    while ($final = $results->fetch_assoc()) {
                                        $coupon = $final['coupon_code'];
                                        
                                    ?>
                                <tr>
                                    <td class="product__thumb">
                                        <a href="course-details.php?id=<?php echo $final['workshop_id'] ?>"><img src="<?php echo $uri.$final['icon'] ?>" alt=""></a>
                                    </td>
                                    <td class="product__name">
                                        <a href="course-details.php?id=<?php echo $final['workshop_id'] ?>"><?php echo $final['title'] ?></a>
                                    </td>
                               
                                   <?php if($final['coupon_code']!=NULL){
                                    ?>
                                    <td class="product__price">₹<?php $t_price = $final['price']+$t_price; echo $final['price']-$final['discount'] ?> <small><del><?php echo $final['price']?></del></small> </td>
                                    <?php
                                   }else{
                                    ?>
                                    <td class="product__price">₹<?php echo $final['price'] ?></td>
                                    <?php
                                   } ?>
                                    
                                    <td class="product__remove">
                                        <a href="controller/removeItem.php?workshop_id=<?php echo $final['workshop_id'] ?>">×</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                
                                <tr>
                                    <td colspan="6" class="cart__actions">
                                        <form action="controller/couponapply.php" method="post" enctype="multipart/form-data" class="cart__actions-form">
                                            <input name="coupon_code" type="text" value="<?php echo $coupon; ?>" placeholder="Coupon code">
                                            <button type="submit" class="btn">Apply coupon</button>
                                        </form>
                                        <div class="update__cart-btn text-end f-right">
                                            <button type="submit" class="btn">Add more workshops</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <div class="cart__collaterals-wrap">
                            <h2 class="title">Cart totals</h2>
                            <ul class="list-wrap">
                            <?php 
                               
                                $sql = "SELECT * FROM carts where id = $cart_id";
                                $results = $connect->query($sql);
                                $final = $results->fetch_assoc();
                                    ?>
                                <li>Subtotal <span>₹<?php echo $t_price; ?></span></li>
                                <li>Discount <span>₹<?php echo $final['discount'] ?></span></li>
                                <?php if ($final['coupon_code']!=NULL){ ?>
                                    <li>Coupon Code <span><b><?php  echo $final['coupon_code'] ?></b></span></li>
                                <?php } ?>
                                <li>Total <span class="amount">₹<?php echo $final['price'] ?></span></li>
                            </ul>
                            <form action="controller/cartpayment.php" method="post" enctype="multipart/form-data" class="cart__actions-form">
                                            <input hidden name="cart_id" type="text" value="<?php echo $cart_id; ?>" placeholder="Coupon code">
                                            <button type="submit" class="btn">Pay Now</button>
                                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-area-end -->

    </main>
    <!-- main-area-end -->



    <!-- footer-area -->
        <?php include "include/footer.php" ?>
    <!-- footer-area-end -->


    <?php include "include/script.php" ?>
</body>

</html>