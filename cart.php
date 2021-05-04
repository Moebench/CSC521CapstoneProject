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
            <a href="home.php#cart" class="a-menu">
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
    <!--Deals begins-->
    <div class="deals-container" id="cartContainer">
        <p id="noProds">
            There is no products in the cart.
        </p>
        <div id="tblDiv">
            <table id="productsTbl">
                <thead>
                    <tr>
                        <th align="center">Name</th>
                        <th align="center">Image</th>
                        <th align="center">Price</th>
                        <th align="center">Quantity</th>
                        <th align="center">Total Price</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>
                <tbody id="tblBody">
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4"><b>Grand Total</b></th>
                        <th id="grTotal" colspan="2"></th>
                    </tr>
                </tfoot>
            </table>
            <button id="clrCart" class="button button3" onclick="clearCart()">Clear cart</button>
            <a href="checkout.php" id="clrCart" class="button button2">Checkout</a>
        </div>
    </div>

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
    <script src="js/cart.js"></script>
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