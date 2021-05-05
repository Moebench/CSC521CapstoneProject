<?php
require_once('connect.php');
// Fetch Vegetable
$stmtVegs = $pdo->prepare("SELECT * FROM Item WHERE Type ='Vegetables' ORDER BY Item_Id DESC LIMIT 10");
$stmtVegs->execute();
$resultVegs = $stmtVegs->fetchAll(PDO::FETCH_ASSOC);
// Fetch Vegetable Ends
// Fetch Fruits
$stmtFrts = $pdo->prepare("SELECT * FROM Item WHERE Type ='Fruits' ORDER BY Item_Id DESC LIMIT 10");
$stmtFrts->execute();
$resultFrts = $stmtFrts->fetchAll(PDO::FETCH_ASSOC);
// Fetch Fruits Ends
// Fetch Dairy
$stmtDairy = $pdo->prepare("SELECT * FROM Item WHERE Type ='Dairy' ORDER BY Item_Id DESC LIMIT 10");
$stmtDairy->execute();
$resultDairy = $stmtDairy->fetchAll(PDO::FETCH_ASSOC);
// Fetch Dairy Ends

?>
<HTML>

<HEAD>
    <META NAME="Author" CONTENT="">
    <META NAME="Keywords" CONTENT="">
    <META NAME="Description" CONTENT="">
    <link rel="stylesheet" href="home.css" />
    <script src="https://kit.fontawesome.com/6c45d783a1.js" crossorigin="anonymous"></script>
</HEAD>

<BODY>
    <div class="parallax">
        <div class="page-title">Market Basket WebApp</div>
    </div>
    <div class="menu" id="sticky">
        <ul class="menu-ul">
            <a href="#home" class="a-menu">
                <li>Home</li>
            </a>
            <a href="#deals" class="a-menu">
                <li>Deals</li>
            </a>
            <a href="#vegetables" class="a-menu">
                <li>Vegetables</li>
            </a>
            <a href="#fruits" class="a-menu">
                <li>Fruits</li>
            </a>
            <a href="#dairy" class="a-menu">
                <li>Dairy</li>
            </a>
            <a href="cart.php" class="a-menu">
                <li>Shopping Cart</li>
            </a>
        </ul>
        <div class="search-box">
            <form action="search.php" method="get">
                <input type="text" placeholder="Search items..." name="search" class="search-input" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <!--Homepage Begins-->
    <div class="container">
        <a href="#fruits">
            <div class="categories">
                <img src="images/fruits.jpg" class="item-image" />
                <div class="image-title">Fruits</div>
            </div>
        </a>
        <a href="#vegetables">
            <div class="categories">
                <img src="images/pepper.jpg" class="item-image" />
                <div class="image-title">Vegetables</div>
            </div>
        </a>
        <a href="#dairy">
            <div class="categories">
                <img src="images/dairy.webp" class="item-image" />
                <div class="image-title">Dairy</div>
            </div>
        </a>
        <a href="#deals">
            <div class="categories">
                <img src="images/deals.jpg" class="item-image" />
                <div class="image-title">Deals</div>
            </div>
        </a>
    </div>
    <!--Deals begins-->
    <div class="deals-container" id="deals">
        <div class="parallax">
            <div class="title">DEALS</div>
        </div>
        <div class="deal">
            Save 20% on min-purchase of $149 on vegetables with the code below<br />
            <Button class="coupon-btn">Veggies20</Button>
        </div>
        <div class="deal">
            Save 20% on min-purchase of $129 on fruits with the code below<br />
            <Button class="coupon-btn">Fruits20</Button>
        </div>
        <div class="deal">
            Save 20% on min-purchase of $119 on dairy with the code below<br />
            <Button class="coupon-btn">Dairy20</Button>
        </div>
    </div>
    <!--Deals ends-->
    <!--Vegetable begins here-->
    <div class="deals-container" id="vegetables">
        <div class="parallax">
            <div class="title">VEGETABLES</div>
        </div>
        <?php
        foreach ($resultVegs as $keyVeg => $valueVeg)
        {
            $imgSrc = $valueVeg['Item_Pic'] ? 'images/'.$valueVeg['Item_Pic'] : '';
        ?>
        <div class="items">
            <div class="images">
                <!--change link to SELECT statement coming from DB-->
                <img src="<?php echo $imgSrc ?>" class="item-image-size" />
            </div>
            <div class="description">
                <b class="itm-name"><?php echo $valueVeg['Item_Name'] ?></b><br />
                <div class="item-select">
                    Price: $<span class="itm-price"><?php echo $valueVeg['Unit_Price'] ?></span>/lbs
                </div>
                <div class="item-select">
                    Aisle Number: <span class="itm-price"><?php echo $valueVeg['Aisle_Number'] ?></span>
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option value="0.25" selected> 1/4 lbs</option>
                    <option value="0.5"> 1/2 lbs</option>
                    <option value="0.75"> 3/4 lbs</option>
                    <option value="1"> 1 lbs</option>
                </select><br />
                <input type="hidden" class="item-id" value="<?php echo $valueVeg['Item_Id'] ?>">
                <button class="buynow-btn">Add to cart</button>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!--Vegetable ends here-->
    <!--Fruits begins here-->
    <div class="deals-container" id="fruits">
        <div class="parallax">
            <div class="title">FRUITS</div>
        </div>
        <?php
        foreach ($resultFrts as $keyFrt => $valueFrt)
        {
            $imgSrc = $valueFrt['Item_Pic'] ? 'images/'.$valueFrt['Item_Pic'] : '';

        ?>
        <div class="items">
            <div class="images">
                <!--change link to SELECT statement coming from DB-->
                <img src="<?php echo $imgSrc ?>" class="item-image-size" />

            </div>
            <div class="description">
                <b class="itm-name"><?php echo $valueFrt['Item_Name'] ?></b><br />
                <div class="item-select">
                    Price: $<span class="itm-price"><?php echo $valueFrt['Unit_Price'] ?></span>/lbs
                </div>
                <div class="item-select">
                    Aisle Number: <span class="itm-price"><?php echo $valueFrt['Aisle_Number'] ?></span>
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option value="0.25" selected> 1/4 lbs</option>
                    <option value="0.5"> 1/2 lbs</option>
                    <option value="0.75"> 3/4 lbs</option>
                    <option value="1"> 1 lbs</option>
                </select><br />
                <input type="hidden" class="item-id" value="<?php echo $valueVeg['Item_Id'] ?>">
                <button class="buynow-btn">Add to cart</button>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
    <!--Fruits ends here-->
    <!--Dairy begins here-->
    <div class="deals-container" id="dairy">
        <div class="parallax">
            <div class="title">DAIRY</div>
        </div>
        <?php
        foreach ($resultDairy as $keyDairy => $valueDairy)
        {
            $imgSrc = $valueDairy['Item_Pic'] ? 'images/'.$valueDairy['Item_Pic'] : '';

        ?>
        <div class="items">
            <div class="images">
                <!--change link to SELECT statement coming from DB-->
                <img src="<?php echo $imgSrc ?>" class="item-image-size" />

            </div>
            <div class="description">
                <b class="itm-name"><?php echo $valueDairy['Item_Name'] ?></b><br />
                <div class="item-select">
                    Price: $<span class="itm-price"><?php echo $valueDairy['Unit_Price'] ?></span>/lbs
                </div>
                <div class="item-select">
                    Aisle Number: <span class="itm-price"><?php echo $valueDairy['Aisle_Number'] ?></span>
                </div>
                <label> Qty:</label>
                <select class="item-select" id="smth">
                    <option value="0.25" selected> 1/4 lbs</option>
                    <option value="0.5"> 1/2 lbs</option>
                    <option value="0.75"> 3/4 lbs</option>
                    <option value="1"> 1 lbs</option>
                </select><br />
                <input type="hidden" class="item-id" value="<?php echo $valueVeg['Item_Id'] ?>">
                <button class="buynow-btn">Add to cart</button>
            </div>
        </div>
        <?php
        }
        ?>

    </div>
    <!--Dairy ends here-->
    <!--Homepage ends-->
    <!-- footer starts here-->
    <div class="parallax1">
        <div class="footer">
            <div class="quick-links">
                <div>Locations</div>
                <ul>
                    <li><a href="https://www.bing.com/maps?q=gps%20market%20basket%20reading&FORM=AFTW01&PC=AFTW" class="a-links">1 General Way, Reading, MA 01867</a></li>
                </ul>
            </div>
            <div class="quick-links">
                <div>Quick Links</div>
                <ul>
                    <li><a href="https://marketbasketfoods.com/contact-us/" class="a-links"><i class="fas fa-phone"> Contact Us</i></a></li>
                    <li><a href="https://www.shopmarketbasket.com/covid-19-faq" class="a-links"><i class="fas fa-question"></i>FAQ</a></li>
                    <li><a href="https://www.shopmarketbasket.com/main-office" class="a-links"><i class="fas fa-bookmark"> Information</i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <i class="far fa-copyright"> Marouane M Benchater - CSC521</i>
    </div>
    <!-- footer ends here-->

    <script src="js/jquery.min.js"></script>
    <script src="js/add-to-cart.js"></script>
    <script>
        function stickyMenu(){
            var sticky=document.getElementById('sticky');
            if(window.pageYOffset > 220){
                sticky.classList.add('sticky');
            } else {
                sticky.classList.remove('sticky');
            }
        }
        window.onscroll = function(){
            stickyMenu();
        }
    </script>
</BODY>

</HTML>