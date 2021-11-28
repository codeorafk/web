<?php include('../config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo Ppath ?>css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="<?php echo Ppath; ?>images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo view; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo view; ?>login-guess2.php">Login</a>
                    </li>
                    <li>
                        <button id="cart" type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal"> cart</button>
                    </li>
                </ul>
            </div>
           
            <div class="clearfix"></div>
        </div>
        
    </section>
    <div id="cartModal" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content" style="width: 80%; margin: auto; margin-top: 50px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>your cart</p>
                    <!-- <form action=""> -->
                    <div class="appendOrder">
                    <?php
                        if(isset($_COOKIE["cart"])) {
                            $total = 0;
                            $cookie_data = stripslashes($_COOKIE["cart"]);
                            $cart_data = json_decode($cookie_data, true);
                            foreach($cart_data as $key => $value){    
                                 
                    ?>
                        <div class="itemCartremove<?php echo $value["item_id"];?>">
                            <div class='d-flex mb-4' style="padding-left:20px;">
                                <img src="<?php echo Ppath ?>images/food/<?php echo $value["item_image_name"];?>" style='width:100px;height:100px;border-radius:5px;'>
                                <div class='w-75 ml-3 mr-3' style='overflow:hidden'>
                                    <div><strong><?php echo $value["item_title"];?></strong></div>
                                    <div class="price"><strong><?php echo $value["item_price"];?></strong></div>
                                    <form action="" class="remove<?php echo $value["item_id"];?>Form">
                                        <input type="hidden" value=<?php echo $value["item_id"];?> name="id-remove">
                                        <button class="btn btn-primary" id="remove<?php echo $value["item_id"];?>" onclick="removeCart(this.id)" name="removeBtn">Remove</button>
                                    </form>
                                </div>
                                <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                                    <div class="input-group" style='width:120px'>
                                        <div class="input-group-prepend" style='cursor:pointer' onclick="decTotal(this , <?php echo $value['item_price']; ?>)">
                                            <span class="input-group-text">-</span>
                                        </div>
                                        <input readonly="readonly" type="text" class="form-control quantity-item" value="<?php echo $value['item_quantity']; ?>" name="quantity[]">
                                        <form class="quantityForm">
                                            <input  type="hidden" value="<?php echo $value['item_id']; ?>" name="id">
                                        </form>
                                        <div class="input-group-append" style='cursor:pointer' onclick="incTotal(this , <?php echo $value['item_price']; ?>)">
                                            <span class="input-group-text">+</span>
                                        </div>
                                    </div>
                                </div>
                                <input class="item-id" type='hidden' value=<?php echo $value["item_id"];?> name="id[]">
                            </div>
                        </div>
                    <?php 
                            }
                        }
                    ?>
                        <!-- <div class='d-flex mb-4' style="padding-left:20px;">
                            <img src="<?php echo Ppath ?>images/bg.jpg" style='width:100px;height:100px;border-radius:5px;'>
                            <div class='w-75 ml-3 mr-3 row' style='overflow:hidden'>
                                <div><strong>name</strong></div>
                                <div class="price"><strong>price</strong></div>
                                <textarea name="descript[]" rows="2" cols="30" placeholder="Note for food"></textarea><br>
                                <a href="" id="remove-id">Remove</a>
                            </div>
                            <div class='w-25 mr-3 d-flex align-items-center justify-content-center'>
                                <div class="input-group" style='width:120px'>
                                    <div class="input-group-prepend" style='cursor:pointer' onclick="">
                                        <span class="input-group-text">-</span>
                                    </div>
                                    <input type="text" class="form-control" value='1' id="totalBuy" name="quantity[]">
                                    <div class="input-group-append" style='cursor:pointer' onclick="">
                                        <span class="input-group-text">+</span>
                                    </div>
                                </div>
                            </div>
                            <input type='hidden' value=${id} name="id[]">
                        </div> -->


                    </div>
                    <!-- </form>   -->

                </div>
                <div class="modal-footer">
                    <a href="order.php" class="btn btn-default">Confirm</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar Section Ends Here -->