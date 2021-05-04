-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2021 at 06:17 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s0329939`
--

-- --------------------------------------------------------

--
-- Table structure for table `aisle`
--

CREATE TABLE `aisle` (
  `Aisle_Number` int(11) NOT NULL,
  `Aisle_Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aisle`
--

INSERT INTO `aisle` (`Aisle_Number`, `Aisle_Description`) VALUES
(1, 'Milk, Juice, Yogurt, Cheese, Hot Dogs, Luncheon Meats, Bacon, Eggs'),
(2, 'Tuna Fish, Can Meat, Ketchup, Mustard, Cooking Oil, Salad Dressing , Pickles, Beans'),
(3, 'Cereal, Corn Flakes, Frosted Flakes, Rice Krispies, Pop Tarts, OatMeal, Granola Bars, Rice Cakes'),
(4, 'Spaghetti Sauce, Soup, Ramen Noodles, Can Tomatoes, Pasta, Tomato Paste, Chowder, Boboli'),
(5, 'Brazilian Food, Rice, Mac and Cheese, Salsa, Asian Food, Tortilla Chips, Skillet Dinners, Goya Foods'),
(6, 'Coffee, Tea, Cocoa, Evaporated Milk, Spice, Flour and Sugar, Baking Needs, Jello and Pudding'),
(7, 'Apple Juice, Cranberry Juice, Vitamin Water, Box Juice, Can Vegetable, Can Potatoes, Gravy, Juice Drinks'),
(8, 'Sparkling Water, Seltzer, Gallon Water, Bottled Water, Flavored Water, Kool Aid, Drink Mixes'),
(9, 'Can Fruit, Crackers, Imported Crackers, Jams and Jellies, Cookies, Pancake Mix, Candy, Peanut Butter'),
(10, 'Foils & Wraps, Paper Cups, Paper Plates, Snack Nuts, Diapers, Baby Food, Raisins, Popcorn'),
(11, 'Bar Soap, Vitamins, Health Care, Dental Care, Energy Bars, Shaving Needs, Deodorant, Hair Care'),
(12, 'Bath Tissue, Dinner Napkins, Cutlery, Straws, Facial Tissue, Paper Towels, Moisturizing Wipes, Stationery'),
(13, 'Cat Food, Cat Treats, Cat Litter, Cat Toys, Dog Food, Dog Bones, Light Bulbs, Automotive'),
(14, 'Laundry Detergent, Dish Detergent, Bleach, Fabric Softener, Air Fresheners, Ammonia, Household Cleaners, Brooms and Mops'),
(15, 'Coke, Pepsi, Arizona Iced Tea, Energy Drinks, Diet Soda, Snapple, Tonic Water'),
(16, 'Pretzels, Potato Chips, Snack Packs, Natural Foods, Austin Crackers, Single Serve, Cheese Puffs, Snacks'),
(17, 'Frozen Chicken, Frozen Beef Patties, Frozen Pizza, Frozen Appetizers, Frozen Sausage, Frozen Juice, Frozen Waffles, Frozen Bagels'),
(18, 'Frozen Entrees, Frozen Pasta, Frozen Fish Dinners, Frozen Potatoes, Frozen Dinners, Frozen Vegetables, Frozen Corn, Ice Cream Toppings'),
(19, 'Bread, Rolls, English Muffins, Bagels, Produce, Floral, Ice Cream, Ice Cream Novelties');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `Invoice_Id` int(11) NOT NULL,
  `Item_Id` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Invoice_Date` varchar(50) NOT NULL,
  `Time` varchar(50) DEFAULT NULL,
  `Quantity_Purchased` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_Id`, `Item_Id`, `UserId`, `Invoice_Date`, `Time`, `Quantity_Purchased`) VALUES
(3, 11, 2, '02/23/2020', '8am', 12);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_Id` int(11) NOT NULL,
  `Item_Name` varchar(50) NOT NULL,
  `Item_Pic` varchar(255) DEFAULT NULL,
  `Unit_Price` decimal(10,2) DEFAULT NULL,
  `Item_Brand` varchar(25) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Aisle_Number` int(11) NOT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`Item_Id`, `Item_Name`, `Item_Pic`, `Unit_Price`, `Item_Brand`, `Quantity`, `Aisle_Number`, `Type`) VALUES
(2, 'Bar Soap', NULL, '4.29', 'Irish Spring', 20, 11, 'Other'),
(3, 'Shampoo', NULL, '5.99', 'Pantene', 30, 11, 'Other'),
(4, 'Whey Protein', NULL, '23.19', 'Body Fortress', 50, 11, 'Other'),
(5, 'Toothpaste', NULL, '2.69', 'Crest', 60, 11, 'Other'),
(6, 'Organic Whole Milk', NULL, '4.89', 'Stonyfield', 180, 1, 'Dairy'),
(8, 'Air Freshener Lavender and Vanilla', NULL, '1.89', 'Glade', 140, 14, NULL),
(9, 'Dish Detergent', NULL, '3.29', 'Dawn', 110, 14, NULL),
(10, 'Bleach', NULL, '3.09', 'Clorox', 95, 14, NULL),
(11, 'Ginger Ale 2L', NULL, '1.89', 'Canada Dry', 150, 15, NULL),
(12, 'Coke 2L', NULL, '1.89', 'Coca Cola', 300, 15, NULL),
(13, 'Pepsi 12 cans', NULL, '4.89', 'Pepsi Cola', 90, 15, NULL),
(14, 'Root Beer 2L', NULL, '2.39', 'A&W', 170, 15, NULL),
(15, 'Potato Chips', NULL, '3.09', 'UTZ', 120, 16, NULL),
(16, 'Pretzels extra thin', NULL, '4.29', 'UTZ', 180, 16, NULL),
(17, 'Snack Mix Family Size', NULL, '3.09', 'Chex Mix', 150, 16, NULL),
(18, 'Pop Corn White Cheddar', NULL, '3.09', 'PopCorners', 130, 16, NULL),
(19, 'Frozen Pizza', NULL, '3.29', 'Ellio\'s', 23, 17, NULL),
(20, 'Frozen Burger Patties', NULL, '20.79', 'Bubba Burger', 65, 17, NULL),
(21, 'Frozen Waffles', NULL, '2.99', 'Kellogg\'s Eggo', 250, 17, NULL),
(22, 'Frozen Grilled Chicken Dinner', NULL, '3.09', 'Healthy Choice', 25, 18, NULL),
(23, 'Frozen Sweet Potato Fries', NULL, '3.69', 'Alexia', 20, 18, NULL),
(24, 'Frozen Blueberries', NULL, '3.69', 'Dole', 100, 18, NULL),
(25, 'Broccoli', NULL, '2.49', 'MB Brand', 70, 19, NULL),
(26, 'Cilantro', NULL, '1.59', 'MB Brand', 30, 19, NULL),
(27, 'Green Beans', NULL, '3.09', 'Eat Smart', 45, 19, NULL),
(28, 'Organic Spinach', NULL, '3.69', 'Olivia\'s', 32, 19, NULL),
(29, 'Flowers Bouquet', NULL, '12.49', 'MB Brand', 15, 19, NULL),
(30, 'Chocolate Ice Cream', NULL, '4.29', 'Haagen-Dazs', 30, 19, NULL),
(31, 'Espresso Coffee', NULL, '8.59', 'Cafe Bustelo', 35, 6, NULL),
(32, 'Green Tea', NULL, '3.69', 'Lipton', 55, 6, NULL),
(33, 'Natural Spring Water', NULL, '4.89', 'Poland Spring', 100, 8, NULL),
(34, 'Seltzer Water', NULL, '3.99', 'Polar', 320, 8, NULL),
(35, 'Wild Berry Flavored Water', NULL, '2.49', 'Nestle', 150, 8, NULL),
(36, 'Baby Wipes', NULL, '12.99', 'Pampers', 120, 10, NULL),
(37, 'Head-to-toe baby wash', NULL, '4.89', 'Johnson & Johnson', 96, 10, NULL),
(38, 'Apple Sauce', NULL, '3.69', 'GoGo Squeez', 100, 10, NULL),
(39, 'Baby Diapers', NULL, '10.38', 'Pampers', 150, 10, NULL),
(40, 'Pop Corn, Blast O Butter', NULL, '2.19', 'Jolly Time', 80, 10, NULL),
(41, 'Peanuts, Lightly Salted', NULL, '3.69', 'Planters', 150, 10, NULL),
(42, 'Raisins', NULL, '3.09', 'Sun-Maid', 120, 10, NULL),
(43, 'Pistachios, Roasted', NULL, '4.89', 'Market Basket', 130, 10, NULL),
(44, 'Sunflower Seeds', NULL, '1.89', 'River Queen', 110, 10, NULL),
(45, 'Almonds', NULL, '8.59', 'Blue Diamond', 126, 10, NULL),
(46, 'Paper Plates, 8.5 inches', NULL, '3.09', 'Dixie', 85, 10, NULL),
(47, 'Plastic Cups', NULL, '3.69', 'Solo', 130, 10, NULL),
(48, 'Plastic Spoons', NULL, '1.59', 'Diamond Daily', 80, 10, NULL),
(49, 'Aluminum Foil', NULL, '4.59', 'Reynolds Wrap', 90, 10, NULL),
(50, 'Tuna, in water', NULL, '1.89', 'Bumble Bee', 210, 2, NULL),
(51, 'Chicken Breast, Canned in water', NULL, '2.09', 'Swanson', 200, 2, NULL),
(52, 'Chopped Clams, Canned', NULL, '1.49', 'Snow\'s', 150, 2, NULL),
(53, 'Olive Oil, Extra Virgin', NULL, '6.09', 'Filippo Berio', 70, 2, NULL),
(54, 'Canola Oil', NULL, '9.19', 'Wesson', 120, 2, NULL),
(55, 'White Vinegar, Distilled', NULL, '1.49', 'Heinz', 76, 2, NULL),
(56, 'Ranch Dressing', NULL, '3.99', 'Hidden Valley', 92, 2, NULL),
(57, 'Balsamic Vinaigrette', NULL, '3.69', 'Newman\'s Own', 67, 2, NULL),
(58, 'Ketchup', NULL, '2.49', 'Heinz', 100, 2, NULL),
(59, 'Mustard, Yellow', NULL, '1.29', 'French\'s', 87, 2, NULL),
(60, 'Mayonnaise', NULL, '3.89', 'Hellmann\'s', 79, 2, NULL),
(61, 'Pickle Spears, Kosher Dill', NULL, '3.69', 'Claussen', 80, 2, NULL),
(62, 'Olives', NULL, '2.49', 'Pearls', 140, 2, NULL),
(63, 'Cereal, Oats', NULL, '3.49', 'Cheerios', 86, 3, NULL),
(64, 'Granola, Vanilla Almond', NULL, '4.59', 'Bear Naked', 66, 3, NULL),
(65, 'Pop-Tarts', NULL, '4.29', 'Kellogg\'s', 125, 3, NULL),
(66, 'Protein Bars', NULL, '3.09', 'Fiber One', 92, 3, NULL),
(67, 'Pasta Sauce, Basil Sauce', NULL, '3.09', 'Classico', 95, 4, NULL),
(68, 'Pasta, Thin Spaghetti', NULL, '1.59', 'Barilla', 150, 4, NULL),
(69, 'Ramen Noodle Soup, Chicken', NULL, '2.49', 'Maruchan', 89, 4, NULL),
(70, 'Shells & Cheese', NULL, '3.09', 'Kraft', 200, 4, NULL),
(71, 'Taco Dinner Kit', NULL, '2.49', 'Old El Paso', 129, 5, NULL),
(72, 'Chili Garlic Sauce', NULL, '1.69', 'Huy Fong', 65, 5, NULL),
(73, 'Wafer, Chocolate', NULL, '1.00', 'Bauducco', 50, 5, NULL),
(74, 'Soft Tacos', NULL, '2.49', 'Mission', 100, 5, NULL),
(75, 'Coffee, Keurig Cups', NULL, '7.39', 'Dunkin', 110, 6, NULL),
(76, 'Coffee, Medium Roast', NULL, '10.99', 'Peet\'s', 95, 6, NULL),
(77, 'Green Tea', NULL, '8.59', 'Twinnings of London', 86, 6, NULL),
(78, 'Camomile, Honey and Vanilla Herb', NULL, '3.69', 'Twinnings of London', 48, 6, NULL),
(79, 'Nesquik Chocolate Flavored Powder', NULL, '5.49', 'Nestle', 76, 6, NULL),
(80, 'Cocoa, Milk Chocolate', NULL, '4.59', 'Swiss Miss', 70, 6, NULL),
(81, 'Salt, Iodized', NULL, '1.09', 'Morton', 180, 6, NULL),
(82, 'Black Pepper', NULL, '2.49', 'Mcormick', 129, 6, NULL),
(83, 'Sugar', NULL, '2.79', 'Domino', 220, 6, NULL),
(84, 'Flour, All Purpose', NULL, '1.99', 'Gold Medal', 250, 6, NULL),
(85, 'Baking Powder', NULL, '2.79', 'Davis', 120, 6, NULL),
(86, 'Condensed Milk, Sweetened', NULL, '3.09', 'Nestle', 90, 6, NULL),
(87, 'Jello, Strawberry', NULL, '0.49', 'Royal Gelatin', 300, 6, NULL),
(88, 'Instant Pudding, Vanilla', NULL, '1.09', 'Jell-O', 300, 6, NULL),
(89, 'Apple Juice', NULL, '2.69', 'Apple & Eve', 80, 7, NULL),
(90, 'Juice Cocktail, Cranberry', NULL, '3.09', 'Ocean Spray', 75, 7, NULL),
(91, 'Electrolyte Enhanced Water, 6 pack', NULL, '6.99', 'Glaceau xxx', 55, 7, NULL),
(92, 'Sweet Peas, Canned', NULL, '1.09', 'Del Monte', 135, 7, NULL),
(93, 'Whole Kernel Corn, Canned', NULL, '1.00', 'Del Monte', 120, 7, NULL),
(94, 'Sliced Carrots, Canned', NULL, '1.09', 'Del Monte', 99, 7, NULL),
(95, 'Crackers', NULL, '3.99', 'Wheat Thins', 134, 9, NULL),
(96, 'Toilet Paper, 6 Rolls', NULL, '9.79', 'Charmin', 100, 12, NULL),
(97, 'Cat food', NULL, '8.59', 'IAMS', 72, 13, NULL),
(98, 'Dog Food, Dry', NULL, '18.29', 'Purina', 56, 13, NULL),
(99, 'Orange Juice, with pulp', NULL, '3.49', 'Tropicana', 210, 1, 'Other'),
(100, 'Fruit Juice Cocktail', NULL, '3.99', 'Welch\'s', 120, 1, NULL),
(101, 'Eggs, 18 ct', NULL, '2.69', 'Market Basket', 300, 1, 'Dairy'),
(102, 'Turkey Bacon, Organic', NULL, '6.99', 'Applegate', 230, 1, 'Other'),
(103, 'Classic Jumbo Franks', NULL, '1.59', 'Bar S', 100, 1, NULL),
(104, 'Kielbasa Sausage', NULL, '3.69', 'Hillshire Farms', 92, 1, NULL),
(105, 'Chicken Sausage', NULL, '6.69', 'Coleman', 140, 1, NULL),
(106, 'Mozarella Cheese', NULL, '3.69', 'Galbani', 75, 1, 'Dairy'),
(107, 'Instant Oatmeal, Maple & Brown Sugar', NULL, '3.09', 'Quaker', 190, 3, NULL),
(108, 'Frosted Flakes', NULL, '4.69', 'Kellogg\'s', 100, 3, NULL),
(109, 'Granola bars', NULL, '4.29', 'Nature Valley', 150, 3, NULL),
(110, 'Chewy Dips', NULL, '3.09', 'Quaker', 120, 3, NULL),
(111, 'Rice Crisps, Apple Cinnamon', NULL, '2.39', 'Quaker', 94, 3, NULL),
(112, 'Froot Loops', NULL, '4.69', 'Kellogg\'s', 200, 3, NULL),
(113, 'Chicken Stock', NULL, '4.09', 'Kitchen Basics', 70, 4, NULL),
(114, 'Noodles, Chicken', NULL, '2.49', 'Progresso', 200, 4, NULL),
(117, 'Red Pepper & Tomato Soup', NULL, '4.89', 'Pacific Foods', 120, 4, NULL),
(118, 'New England Clam Chowder, Canned', NULL, '3.09', 'Campbell\'s', 125, 4, NULL),
(119, 'Tomato Paste', NULL, '1.09', 'Cento', 76, 4, NULL),
(120, 'Pastina', NULL, '1.29', 'Prince', 65, 4, NULL),
(121, 'Fruit Cocktail', NULL, '2.49', 'Del Monte', 120, 9, NULL),
(122, 'Mandarin Oranges, Canned', NULL, '3.69', 'Dole', 90, 9, NULL),
(123, 'Saltine Crackers', NULL, '4.89', 'Premium', 79, 9, NULL),
(124, 'Baked Whole Grain Wheat', NULL, '3.99', 'Triscuit', 87, 9, NULL),
(125, 'Peanut Butter', NULL, '3.99', 'Skippy', 124, 9, NULL),
(126, 'Raspberry Jam', NULL, '2.99', 'Smucker\'s', 200, 9, NULL),
(127, 'Fig Chewy Cookies', NULL, '3.69', 'Newton\'s', 180, 9, NULL),
(128, 'Cookies', NULL, '3.99', 'Oreo', 130, 9, NULL),
(129, 'Pancake Mix, Buttermilk', NULL, '4.99', 'Aunt Jemima', 123, 9, NULL),
(130, 'Chocolate Bar, Family Size', NULL, '5.99', 'Snickers', 109, 9, NULL),
(131, 'Candy, Strawberry', NULL, '3.99', 'Twizzlers', 300, 9, NULL),
(132, 'Jelly, Grape', NULL, '1.29', 'Welch\'s', 90, 9, NULL),
(133, 'Strawberries', 'http://weblab.salemstate.edu/~S0329939/MB/images/strawberries.jpg', '2.99', 'Discoll', 500, 19, 'Fruits'),
(134, 'Carrots', 'http://weblab.salemstate.edu/~S0329939/MB/images/carrots.jpg', '0.79', 'Bolthouse', 300, 19, 'Vegetables'),
(135, 'Onions', NULL, '0.99', 'Market Basket', 250, 19, 'Vegetables'),
(136, 'Spinach', NULL, '2.99', 'Market Basket', 320, 19, 'Vegetables'),
(137, 'Green Pepper', NULL, '0.99', 'Market Basket', 186, 19, 'Vegetables'),
(138, 'Tomatoes', NULL, '0.99', 'Market Basket', 140, 19, 'Vegetables'),
(139, 'Bananas', NULL, '0.34', 'Chiquita', 289, 19, 'Fruits'),
(140, 'Pineapple', NULL, '3.49', 'Market Basket', 80, 19, 'Fruits'),
(141, 'Oranges', NULL, '0.99', 'Market Basket', 120, 19, 'Fruits'),
(142, 'Apples', NULL, '0.99', 'Market Basket', 220, 19, 'Fruits'),
(146, 'banana', '1616209023Phone-1.png', '11.00', 'bbb', 11, 10, 'Vegetables'),
(147, 'banana', '16161574643+Small.jpg', '11.00', 'bbb', 11, 10, 'Dairy'),
(148, 'banana', '1616162723', '11.00', 'bbb', 11, 10, 'Vegetables'),
(149, 'banana', '1616162731', '11.00', 'bbb', 11, 10, 'Vegetables'),
(150, 'banana', '161616274315535193_674770382702683_6855036398785789952_n.jpg', '11.00', 'bbb', 11, 10, 'Vegetables'),
(151, 'banana', '1616162758', '11.00', 'bbb', 11, 10, 'Vegetables'),
(152, 'banana', '1616208368', '11.00', 'bbb', 11, 10, 'Vegetables'),
(153, 'banana', '1616208374', '11.00', 'bbb', 112, 10, 'Vegetables'),
(154, 'banana', '1616208385Phone-1.png', '11.00', 'bbb', 112, 10, 'Vegetables'),
(155, 'banana', '1616208423', '11.00', 'bbb', 11, 10, 'Vegetables'),
(156, 'banana', '1616208446', '11.00', 'bbb', 11, 10, 'Vegetables'),
(157, 'banana', NULL, '11.00', 'bbb', 11, 10, 'Vegetables'),
(158, 'banana', NULL, '11.00', 'bbb', 11, 10, 'Vegetables'),
(159, 'banana', NULL, '11.00', 'bbb', 11, 10, 'Vegetables'),
(160, 'banana', NULL, '11.00', 'bbb', 11, 10, 'Vegetables'),
(161, 'banana', NULL, '11.00', 'bbb', 11, 10, 'Vegetables'),
(162, 'banana', '16161574383+Small.jpg', '11.00', 'bbb', 11, 10, 'Vegetables'),
(163, 'banana', '16161574383+Small.jpg', '11.00', 'bbb', 11, 10, 'Vegetables'),
(164, 'banana', '1616208653Phone-1.png', '11.00', 'bbb', 11, 10, 'Vegetables');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `verified` tinyint(4) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `username`, `email`, `verified`, `token`, `password`) VALUES
(2, 'randomUser', 'random@user.com', NULL, NULL, '123456'),
(3, NULL, 'moemoe@gmail.com', NULL, NULL, '$2y$07$A4gmhQb3UD842bbynea.1OrPQBQx3t1vaT5ktxnnvkWVrPgWQgWUS'),
(4, NULL, 'example@gmail.com', NULL, NULL, '$2y$07$4wnu90xXsY0fhlmpkcJ9/eiGu4AcZSzePj9MiEPn5.VPthYQkl5xO'),
(5, NULL, 'example2@gmail.com', NULL, NULL, '$2y$07$HQNvCNawbLlEUTiwcPZuZ.Y3Eg2HDct7bfCkeWsQyldPiloNpdxsu'),
(6, NULL, 'example3@gmail.com', NULL, NULL, '$2y$07$xrvPo/sHVQ8ADpT3Y61F9eCqNKOhTlp243JVUoGQRO/or.IYWVcES'),
(7, NULL, 'moe.benchater@gmail.com', NULL, NULL, '$2y$07$sjQnER9OvikO3EwT/G7ZmO88BidmZgQy2FxjDIsXQ9nV7olKnVcxa'),
(8, NULL, 'moe1.benchater@gmail.com', NULL, NULL, '$2y$07$3yud5w9KAr3eiVFcWgeKv.RD9S9jo8eHnC6gOXZd4jUVB9GyljGqu'),
(9, NULL, 'mo.benchater@gmail.com', NULL, NULL, '$2y$07$vV0HcwOoOfP0BEGtrwof4ea8kyIxDuP54WtxmEtzopvpDSjUHHy5W'),
(11, NULL, 'hello@gmail.com', NULL, NULL, '$2y$07$RQs7ta0H6pNMjObJUmr.1uID4ObeCjkaG2bFUmoEdKeOZNND45XDy'),
(12, NULL, 'welcome@gmail.com', NULL, NULL, '$2y$07$OYzbU5BpdQd3gsZDRW.Jgecjy2gHZ6z9Qm9F5SUWroFpEBUNpsjVm'),
(19, NULL, 's0329939@gmail.com', NULL, NULL, '$2y$07$Q2puPXi.YXnXr17dUt0hJOEtPgRc/6KurdFeX5gTIkFDeb73EAb0.'),
(26, 'moebench', 'm2.bench@gmail.com', 0, '0f18c0218a78fe764065427453098dbbcd49389798613c27b0a86f07ef7afa74af032860244c7bf995e4e6171447c7b5d310', '$2y$10$uPdWYtO3s7eVJhDUR0ppHe5.aWQtncNFWU11lbkY.zFyMrEKixeDG'),
(47, 'bhatfield', 'bhatfield@salemstate.edu', 1, '', '$2y$10$zFRk/bX3KEbwu.nP62zmJeUbpDCRvSz0i0iNSDL60wQaz.SRrpDK.'),
(50, 'MarouaneBenchater', 'm1.benchater@gmail.com', 1, '', '$2y$10$kcJT5FJHXXa2kZ1hDGScsuwcKyL48R3kTGzhcEQn8vDOXexWfZdiO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aisle`
--
ALTER TABLE `aisle`
  ADD PRIMARY KEY (`Aisle_Number`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`Invoice_Id`),
  ADD KEY `FK_Invoice_Item` (`Item_Id`),
  ADD KEY `FK_Invoice_User` (`UserId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_Id`),
  ADD KEY `FK_Item_Aisle` (`Aisle_Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD UNIQUE KEY `User_Email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aisle`
--
ALTER TABLE `aisle`
  MODIFY `Aisle_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `Invoice_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `Item_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `FK_Invoice_Item` FOREIGN KEY (`Item_Id`) REFERENCES `item` (`Item_Id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_Invoice_User` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `FK_Item_Aisle` FOREIGN KEY (`Aisle_Number`) REFERENCES `aisle` (`Aisle_Number`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
