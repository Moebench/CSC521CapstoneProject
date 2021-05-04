<?php
$con = new PDO("mysql:host=localhost;dbname=S0329939",'root','');

?>
<HTML>

<HEAD>
    <META NAME="Author" CONTENT="">
    <META NAME="Keywords" CONTENT="">
    <META NAME="Description" CONTENT="">
    <link rel="stylesheet" href="home.css" />
    <script src="https://kit.fontawesome.com/6c45d783a1.js" crossorigin="anonymous"></script>
    <script>
        function stickyMenu(){
        var sticky=document.gerElementById('sticky');
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
            <a href="#cart" class="a-menu">
                <li>Shopping Cart</li>
            </a>
        </ul>
        <div class="search-box">
            <form method="post">
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
            Save 20% on min-purchase of $149 on vegetables<br />
            <Button class="coupon-btn">Add Coupon</Button>
        </div>
        <div class="deal">
            Save 20% on min-purchase of $129 on fruits<br />
            <Button class="coupon-btn">Add Coupon</Button>
        </div>
        <div class="deal">
            Save 20% on min-purchase of $119 on dairy<br />
            <Button class="coupon-btn">Add Coupon</Button>
        </div>
    </div>
    <!--Deals ends-->
    <!--Vegetable begins here-->
    <div class="deals-container" id="vegetables">
        <div class="parallax">
            <div class="title">VEGETABLES</div>
        </div>
        <div class="items">
            <div class="images">
                <!--change link to SELECT statement coming from DB-->
                <img src="images/carrots.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Carrots</b><br />
                <div class="item-select">
                    Price: $0.79/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/tomatoes.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Tomatoes</b><br />
                <div class="item-select">
                    Price: $0.99/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/greenpepper.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Green Pepper</b><br />
                <div class="item-select">
                    Price: $1.49/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/onions.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Onions</b><br />
                <div class="item-select">
                    Price: $1.29/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/spinach.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Spinach</b><br />
                <div class="item-select">
                    Price: $2.99/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
    </div>
    <!--Vegetable ends here-->
    <!--Fruits begins here-->
    <div class="deals-container" id="fruits">
        <div class="parallax">
            <div class="title">FRUITS</div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/strawberries.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Strawberries</b><br />
                <div class="item-select">
                    Price: $2.29/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/banana.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Bananas</b><br />
                <div class="item-select">
                    Price: $0.49/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/pineapple.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Pineapples</b><br />
                <div class="item-select">
                    Price: $3.49/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/apples.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Apples</b><br />
                <div class="item-select">
                    Price: $0.99/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/oranges.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Oranges</b><br />
                <div class="item-select">
                    Price: $0.99/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
    </div>
    <!--Fruits ends here-->
    <!--Dairy begins here-->
    <div class="deals-container" id="dairy">
        <div class="parallax">
            <div class="title">DAIRY</div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/galbani.png" class="item-image-size" />
            </div>
            <div class="description">
                <b>Mozarella Cheese - Galbani</b><br />
                <div class="item-select">
                    Price: $3.69/each
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1 piece</option>
                    <option> 2 pieces</option>
                    <option> 3 pieces</option>
                    <option> 4 pieces</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/oikos.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Yogurt</b><br />
                <div class="item-select">
                    Price: $1.00/each
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1 cup</option>
                    <option> 2 cups</option>
                    <option> 3 cups</option>
                    <option> 4 cups</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/pineapple.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Pineapples</b><br />
                <div class="item-select">
                    Price: $3.49/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/apples.webp" class="item-image-size" />
            </div>
            <div class="description">
                <b>Apples</b><br />
                <div class="item-select">
                    Price: $0.99/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
        <div class="items">
            <div class="images">
                <img src="images/oranges.jpg" class="item-image-size" />
            </div>
            <div class="description">
                <b>Oranges</b><br />
                <div class="item-select">
                    Price: $0.99/lbs
                </div>
                <label> Qty:</label>
                <select class="item-select">
                    <option> 1/4 lbs</option>
                    <option> 1/2 lbs</option>
                    <option> 3/4 lbs</option>
                    <option> 1 lbs</option>
                </select><br />
                <button class="buynow-btn">Buy Now</button>
            </div>
        </div>
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
</BODY>

</HTML>
<?php


if (isset($_POST["submit"])){


    //$con = new mysqli('localhost', 'S0329939', 'BenchaterMarouane2020', 'S0329939');


    $str = $_POST["search"];
    $sth = $con->prepare("SELECT * FROM 'Item' WHERE Item_Name = '$str'");

    $sth->setFetchMode(FETCH_OBJ);
    $sth -> execute();

    if ($row = $sth ->fetch())
    {
        ?>
<br><br><br>
<table>
    <tr>
        <th>Name</th>
        <th>Brand<th>
    </tr>
    <tr>
        <td>
            <?php echo $row->Item_Name; ?>
        </td>
        <td>
            <?php echo $row->Item_Brand; ?>
        </td>
    </tr>
</table>
<?php

    }
        else{
            echo "Name doesn't exist";
        }



}

?>