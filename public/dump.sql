-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: 127.0.0.1	Database: chunaputi-ecom
-- ------------------------------------------------------
-- Server version 	5.5.5-10.4.11-MariaDB
-- Date: Mon, 28 Dec 2020 13:46:36 +0600

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `banners`
--

/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `banners` (`id`, `image_url`, `image`, `status`, `open_new_tab`, `orders`, `created_at`, `updated_at`) VALUES (2,NULL,'/uploads/banners/5fe98775f2066.banner-1.png',1,'_blank',NULL,'2020-12-28 07:21:26','2020-12-28 07:21:26'),(3,NULL,'/uploads/banners/5fe98cfdd0f79.banner-2.jpg',1,NULL,NULL,'2020-12-28 07:45:01','2020-12-28 07:45:01'),(4,NULL,'/uploads/banners/5fe98d0b66d70.banner-3.png',1,NULL,NULL,'2020-12-28 07:45:15','2020-12-28 07:45:15');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
COMMIT;

-- Dumped table `banners` with 3 row(s)
--

--
-- Dumping data for table `brands`
--

/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
COMMIT;

-- Dumped table `brands` with 0 row(s)
--

--
-- Dumping data for table `categories`
--

/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
COMMIT;

-- Dumped table `categories` with 0 row(s)
--

--
-- Dumping data for table `category`
--

/*!40000 ALTER TABLE `category` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `category` (`id`, `order`, `name`, `status`, `image`, `slug`, `created_at`, `updated_at`) VALUES (1,1,'Laptops',1,NULL,'laptops','2020-12-28 06:55:35','2020-12-28 06:55:35'),(2,1,'Cooking',1,NULL,'cooking','2020-12-28 06:55:35','2020-12-28 06:55:35'),(3,1,'Mobile Phones',1,NULL,'mobile-phones','2020-12-28 06:55:35','2020-12-28 06:55:35'),(4,1,'Tablets',1,NULL,'tablets','2020-12-28 06:55:35','2020-12-28 06:55:35'),(5,1,'Digital Cameras',1,NULL,'digital-cameras','2020-12-28 06:55:35','2020-12-28 06:55:35'),(6,1,'Appliances',1,NULL,'appliances','2020-12-28 06:55:35','2020-12-28 06:55:35'),(7,1,'Lighting',1,NULL,'lighting','2020-12-28 06:55:35','2020-12-28 06:55:35');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
COMMIT;

-- Dumped table `category` with 7 row(s)
--

--
-- Dumping data for table `category_product`
--

/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
COMMIT;

-- Dumped table `category_product` with 0 row(s)
--

--
-- Dumping data for table `coupons`
--

/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
COMMIT;

-- Dumped table `coupons` with 0 row(s)
--

--
-- Dumping data for table `customers`
--

/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
COMMIT;

-- Dumped table `customers` with 0 row(s)
--

--
-- Dumping data for table `customer_product`
--

/*!40000 ALTER TABLE `customer_product` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `customer_product` ENABLE KEYS */;
COMMIT;

-- Dumped table `customer_product` with 0 row(s)
--

--
-- Dumping data for table `migrations`
--

/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_02_15_204651_create_categories_table',1),(4,'2016_10_21_190000_create_settings_table',1),(5,'2017_12_11_054653_create_products_table',1),(6,'2018_01_11_060124_create_category_table',1),(7,'2018_01_11_060548_create_category_product_table',1),(8,'2018_01_14_215535_create_coupons_table',1),(9,'2018_02_25_005243_create_orders_table',1),(10,'2018_02_25_010522_create_order_product_table',1),(11,'2020_08_20_110123_create_students_table',1),(12,'2020_09_28_141241_create_customers_table',1),(13,'2020_10_06_111458_create_brands_table',1),(14,'2020_10_09_131638_create_sliders_table',1),(15,'2020_10_10_091101_create_subcategories_table',1),(16,'2020_10_25_155126_create_customer_product_table',1),(17,'2020_10_28_083346_create_reviews_table',1),(18,'2020_12_28_125330_create_banners_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
COMMIT;

-- Dumped table `migrations` with 18 row(s)
--

--
-- Dumping data for table `orders`
--

/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
COMMIT;

-- Dumped table `orders` with 0 row(s)
--

--
-- Dumping data for table `order_product`
--

/*!40000 ALTER TABLE `order_product` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `order_product` ENABLE KEYS */;
COMMIT;

-- Dumped table `order_product` with 0 row(s)
--

--
-- Dumping data for table `password_resets`
--

/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
COMMIT;

-- Dumped table `password_resets` with 0 row(s)
--

--
-- Dumping data for table `products`
--

/*!40000 ALTER TABLE `products` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
COMMIT;

-- Dumped table `products` with 0 row(s)
--

--
-- Dumping data for table `reviews`
--

/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
COMMIT;

-- Dumped table `reviews` with 0 row(s)
--

--
-- Dumping data for table `settings`
--

/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
COMMIT;

-- Dumped table `settings` with 0 row(s)
--

--
-- Dumping data for table `sliders`
--

/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sliders` (`id`, `image_url`, `image`, `status`, `open_new_tab`, `orders`, `created_at`, `updated_at`) VALUES (1,NULL,'/uploads/sliders/5fe98d2c4fbe3.slide-1.png',1,NULL,NULL,'2020-12-28 07:45:49','2020-12-28 07:45:49');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
COMMIT;

-- Dumped table `sliders` with 1 row(s)
--

--
-- Dumping data for table `students`
--

/*!40000 ALTER TABLE `students` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
COMMIT;

-- Dumped table `students` with 0 row(s)
--

--
-- Dumping data for table `subcategories`
--

/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES (1,1,'Dell','dell',1,'2020-12-28 06:55:35','2020-12-28 06:55:35'),(2,1,'Lenevo','lenevo',1,'2020-12-28 06:55:35','2020-12-28 06:55:35'),(3,2,'Rich Cooker','rich-cooker',1,'2020-12-28 06:55:35','2020-12-28 06:55:35'),(4,2,'Curry Cooker','curry-cooker',1,'2020-12-28 06:55:35','2020-12-28 06:55:35'),(5,3,'Walton Mobile','walton-mobile',1,'2020-12-28 06:55:35','2020-12-28 06:55:35'),(6,3,'Samsung Mobile','samsung-mobile',1,'2020-12-28 06:55:35','2020-12-28 06:55:35');
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
COMMIT;

-- Dumped table `subcategories` with 6 row(s)
--

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'Admin',NULL,'admin@mail.com','$2y$10$yLxYN05vVBpk4BKv0ZAN3Opkaba9zvl6tc5Cr37biCEy.8Cv4QDbe',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
COMMIT;

-- Dumped table `users` with 1 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Mon, 28 Dec 2020 13:46:37 +0600
