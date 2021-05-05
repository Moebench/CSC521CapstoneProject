<?php
require_once('connect.php');
// Fetch Itmes
$stmtSearch = $pdo->prepare("SELECT * FROM Item WHERE Item_Name LIKE :keywords LIMIT 10");
$stmtSearch->bindValue(':keywords', '%' . $_GET['search'] . '%');
$stmtSearch->execute();
$resultSearch = $stmtSearch->fetchAll(PDO::FETCH_ASSOC);
// Fetch Itmes Ends
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
            <a href="home.php#home" class="a-menu">
                <li>Home</li>
            </a>
            <a href="home.php#deals" class="a-menu">
                <li>Deals</li>
            </a>
            <a href="home.php#vegetables" class="a-menu">
                <li>Vegetables</li>
            </a>
            <a href="home.php#fruits" class="a-menu">
                <li>Fruits</li>
            </a>
            <a href="home.php#dairy" class="a-menu">
                <li>Dairy</li>
            </a>
            <a href="cart.php" class="a-menu">
                <li>Shopping Cart</li>
            </a>
        </ul>
        <div class="search-box">
            <form>
                <input type="text" placeholder="Search items..." name="search" class="search-input" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
    <!--Homepage Begins-->
    <!--Vegetable begins here-->
    <div class="deals-container" id="vegetables">
        <div class="parallax">
            <div class="title">Search Result</div>
        </div>

        <?php
        if(empty($resultSearch)) {
            echo "<p><b>No matching records found</b></p>";
        } else {

            foreach ($resultSearch as $keyVeg => $valueVeg)
            {
                $imgSrc = $valueVeg['Item_Pic'] ? 'images/'.$valueVeg['Item_Pic'] : '';

            ?>
            <div class="items">
                <div class="images">
                    <!--change link to SELECT statement coming from DB-->
                    <!-- <img src="<?php echo $valueVeg['Item_Pic'] ? $valueVeg['Item_Pic'] : 'images/pepper.jpg' ?>" class="item-image-size" /> -->
                    <img src="<?php echo $imgSrc ?>" class="item-image-size" />
                </div>
                <div class="description">
                    <b class="itm-name"><?php echo $valueVeg['Item_Name'] ?></b><br />
                    <div class="item-select">
                        Price: $<span class="itm-price"><?php echo $valueVeg['Unit_Price'] ?></span>/lbs
                    </div>
                    <label> Qty:</label>
                    <select class="item-select">
                        <option value="0.25" selected> 1/4 lbs</option>
                        <option value="0.5"> 1/2 lbs</option>
                        <option value="0.75"> 3/4 lbs</option>
                        <option value="1"> 1 lbs</option>
                    </select><br />
                    <button class="buynow-btn">Add to cart</button>
                </div>
            </div>
            <?php
            }
        }
        ?>
    </div>
    <!--Vegetable ends here-->
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