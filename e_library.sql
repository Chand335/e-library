-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2017 at 06:39 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_page`
--

DROP TABLE IF EXISTS `about_page`;
CREATE TABLE IF NOT EXISTS `about_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_1` varchar(225) NOT NULL,
  `title_2` varchar(225) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `about_page`
--

INSERT INTO `about_page` (`id`, `title_1`, `title_2`, `text`) VALUES
(1, 'Our Mission', 'To provide the most actionable website.', 'A E-library is a special library with a collection of digital objects that can include text, visual\r\nmaterial, audio material, video material, stored as electronic media formats (as opposed to print,\r\nor other media. ), along with means for organizing, storing, and retrieving the files and media\r\ncontained in the library collection. Digital libraries can vary immensely in size and scope, and\r\ncan be maintained by individuals, organizations, or affiliated with established physical library\r\nbuildings or institutions, or with academic institutions.The digital content may be stored locally,\r\nor accessed remotely via computer networks. An electronic library is a type of information\r\nretrieval system.'),
(2, 'Our Mission', 'To provide the most actionable website.', 'A E-library is a special library with a collection of digital objects that can include text, visual material, audio material, video material, stored as electronic media formats (as opposed to print, or other media. ), along with means for organizing, storing, and retrieving the files and media contained in the library collection. Digital libraries can vary immensely in size and scope, and can be maintained by individuals, organizations, or affiliated with established physical library buildings or institutions, or with academic institutions.The digital content may be stored locally, or accessed remotely via computer networks. An electronic library is a type of information retrieval system.');

--
-- Triggers `about_page`
--
DROP TRIGGER IF EXISTS `restiction`;
DELIMITER $$
CREATE TRIGGER `restiction` BEFORE DELETE ON `about_page` FOR EACH ROW INSERT INTO perserve_permissions (permission_id) VALUES (1234)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `books_plus_categories_and_tags`
--

DROP TABLE IF EXISTS `books_plus_categories_and_tags`;
CREATE TABLE IF NOT EXISTS `books_plus_categories_and_tags` (
  `book_id` bigint(225) NOT NULL,
  `category_id` bigint(225) NOT NULL,
  `tag_id` bigint(225) NOT NULL,
  PRIMARY KEY (`book_id`,`category_id`,`tag_id`),
  KEY `category_to_category` (`category_id`),
  KEY `tag_id` (`tag_id`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `books_plus_categories_and_tags`
--

INSERT INTO `books_plus_categories_and_tags` (`book_id`, `category_id`, `tag_id`) VALUES
(12, 14, 3),
(13, 14, 3),
(14, 14, 3),
(15, 14, 3),
(16, 14, 3),
(17, 14, 5),
(18, 14, 5),
(17, 20, 5),
(18, 20, 5),
(12, 22, 3),
(13, 22, 3),
(14, 22, 3),
(15, 22, 3),
(16, 22, 3),
(1, 39, 1),
(2, 39, 1),
(3, 39, 1),
(4, 39, 1),
(12, 76, 3),
(13, 76, 3),
(14, 76, 3),
(15, 76, 3),
(16, 76, 3),
(5, 160, 2),
(6, 160, 2),
(7, 160, 3),
(8, 160, 3),
(9, 160, 3),
(10, 160, 3),
(11, 160, 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

DROP TABLE IF EXISTS `book_details`;
CREATE TABLE IF NOT EXISTS `book_details` (
  `book_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn-13` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isbn-10` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `authors` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher_name` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher_url` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publiction_year` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paperback` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `book_files` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_pic` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online_pic_url` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flipkart_link` text COLLATE utf8mb4_unicode_ci,
  `amazon_link` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `isbn` (`isbn-10`),
  UNIQUE KEY `name_3` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`book_id`, `name`, `isbn-13`, `isbn-10`, `authors`, `language`, `publisher_name`, `publisher_url`, `publiction_year`, `paperback`, `description`, `book_files`, `book_pic`, `online_pic_url`, `flipkart_link`, `amazon_link`) VALUES
(1, 'COMPREHENSIVE GUIDE FOR NURSING COMPETITIVE EXAM', '978-9380205083', '9380205082', 'R.S. SHARMA VINOD GUPTA PREETI AGARWAL', 'English', 'Vardhan Publishers &amp; Distributors', '', '', '952', 'All Nursing subjects covered adequately. , Include more than 8500 Multiple Choice Questions(MCQs). , Subject wise extremely important and relevant 6200 Key Point. , Also include Important Tables and Flow charts. , Questions from previous year examination of AIIMS, PGIMER, ILBS, RPSC, RAK, RML, RUHS, KERALA PSC, DSSSB, JIPMER ESIC, RRB are included on the basis of memory. , Detailed rationales for correct &amp; incorrect answer are provided with questions. , Correct answer of the objectives questions which are referenced from standard text books. , Saves precious time and energy. , It will help in quick review before examination.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/61EiQNs1B-L._SX377_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/COMPREHENSIVE-GUIDE-NURSING-COMPETITIVE-EXAM/dp/9380205082/ref=sr_1_2?ie=UTF8&amp;qid=1509124144&amp;sr=8-2&amp;keywords=nursing+books'),
(2, 'Fundamentals of Nursing', '9789380222028', '9380222025', 'Sanjeev Singh', 'English', 'Gen Next Publication', '', '2009', '', 'The Book Is Well Written At A Level That Will Be Easily Understood By The Intended Audience. One Of The Best Features Of This Book Is The Manner In Which The Material Is Organized And Presented. The Author Has Made The Content Visually Appealing By Using Text And Illustrations Wherever Required. Fundamentals Of Nursing, Presents The Fundamentals Of Nursing Care Within The Framework Of The Nursing Process. It Is Ideal For Quick Reference Or For Use During Clinical. An Accessible Writing Style Presents All The Material Essential For Mastery. Subsequent Units Are Organized According To The Steps Of The Nursing Process Providing The Essentials Of Assessment And Diagnosis, Planning And Implementation, And Documentation And Evaluation. A Vast Crowd Of Nurses And Health Care Professionals And Their Learning Requirements Have Been Kept In Consideration And Duly Implemented In This Book.,Content:- Contents, Preface Ix,', '', '', 'https://rukminim1.flixcart.com/image/832/832/book/0/2/8/fundamentals-of-nursing-original-imaech2uuwvhyjwn.jpeg?q=70', 'https://www.flipkart.com/fundamentals-of-nursing/p/itme4pz5f4hutqbf?pid=9789380222028&amp;srno=s_1_11&amp;otracker=search&amp;lid=LSTBOK9789380222028UADRJY&amp;fm=SEARCH&amp;iid=3cd74ba6-bb92-47d3-9f53-46fd57549687.9789380222028.SEARCH&amp;qH=57c97d6988dfcdc8', ''),
(3, 'Essentials of Community Health Nursing', '9789382219088', '9382219080', 'Banarsidas Bhanot', 'English', 'Banarsidas Bhanot', '', '2015', '', '', '', '', 'https://rukminim1.flixcart.com/image/832/832/book/0/8/8/essentials-of-community-health-nursing-original-imaedtgyhckffdzd.jpeg?q=70', 'https://www.flipkart.com/essentials-community-health-nursing/p/itmdyv6mc6h5zzfs?pid=9789382219088&amp;srno=s_1_10&amp;otracker=search&amp;lid=LSTBOK9789382219088ZL6BW0&amp;fm=SEARCH&amp;iid=6e8c8515-d523-48ac-a76e-67dc7c420f6e.9789382219088.SEARCH&amp;qH=57c97d6988dfcdc8', ''),
(4, 'Management of Nursing Services and Education', '978-8131239919', '8131239918', 'Clement', 'English', 'Elsevier Health', '', '2015', '', 'Salient FeaturesProviding quality content on management and education in the current health care settings this book is particularly useful for the students of B.Sc. nursing 4th year where the nurses have to manage patients and simultaneously provide nursing services in an effective manner. This text provides comprehensive coverage of all the important processes and techniques that are important for training and development of nurses as good administrators. New to the Second EditionNew concepts techniques of management added in several chaptersUpdated information added in a number of chaptersOutdated content has been replaced with new up-to-date informationAn altogether new look and feel provided to the book About the AuthorDr Clement is currently Principal V.S.S. College of Nursing Bangalore Karnataka. A Ph.D. in nursing he has obtained M.Sc. Nursing M.A. in sociology M.A. in childcare and education M.Phil. in education and P.G. diploma in hospital administration. He is the life member of The Nursing Association of India the Indian Hospital Association Indian Society of Psychiatric Nurses Catholic Health Association of India the Indian Red Cross Society and the National Research Society of India. He has contributed articles to the Nightingale Nursing Times the Nursing Journal of India the Journal of the Christian Medical Association of India the Nurses of India the Journal of Holistic Nursing the Indian Journal of Nursing and the Asian Journal of Cardiac Nursing and has several books to his credit. He has organized many workshops and presented research papers in seminars.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51-kwW5Eb5L._SX377_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/Management-Nursing-Services-Education-Clement/dp/8131239918/ref=sr_1_4?ie=UTF8&amp;qid=1509124144&amp;sr=8-4&amp;keywords=nursing+books'),
(5, 'GATE 2018: Mechanical Engineering Solved Papers', '978-9351472575', '9351472574', 'Made Easy Editorial Board', 'English', 'Made Easy Publications', '', '1 May 2017', '810', 'The new edition of \'GATE 2018 : Mechanical Engineering Solved Papers\' has been fully revised, updated and edited. The whole book has been divided into topic wise sections. At the beginning of each subject, analysis of previous papers are given to improve the understanding of subject. This book also contains the conventional questions asked in GATE before 2003.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/31mu4AUBFrL._SY198_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/GATE-2018-Mechanical-Engineering-Solved/dp/9351472574/ref=sr_1_1?ie=UTF8&amp;qid=1509126520&amp;sr=8-1&amp;keywords=gate+2018'),
(6, 'GATE 2018: Computer Science &amp; IT Engineering Solved Papers', '978-9351472605', '9351472604', 'Made Easy Editorial Board', 'English', 'Made Easy Publications', '', '1 May 2017', '', 'The new edition of GATE 2018 Solved Papers : Computer Science and IT has been fully revised, updated and edited. The whole book has been divided into topic wise sections. At the beginning of each subject, analysis of previous papers are given to improve the understanding of subject. This book also contains the conventional questions asked in GATE before 2003.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/31HQYCbtBAL._SY198_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/GATE-2018-Computer-Science-Engineering/dp/9351472604/ref=sr_1_2?ie=UTF8&amp;qid=1509126520&amp;sr=8-2&amp;keywords=gate+2018'),
(7, 'GATE 2018: Civil Engineering Solved Papers', '978-9351472568', '9351472566', 'Made Easy Editorial Board', 'English', 'Made Easy Publications', '', '1 May 2017', '584', '', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51Bl1o%2Bh1zL._SX366_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/GATE-2018-Engineering-Solved-Papers/dp/9351472566/ref=sr_1_3?ie=UTF8&amp;qid=1509126520&amp;sr=8-3&amp;keywords=gate+2018'),
(8, 'GATE Guide Electronics &amp; Communication Engineering 2018', '978-9386309761', '9386309769', 'GKP', 'English', 'G.K. Pub', '', '14 Feb 2017', '', 'GKPâ€™s GATE Electronics and Communication Engineering 2018 has become one of the most popularbooks for GATE prep since its inception in 1994. The current edition is thoroughly updated andrevised as per the syllabus prescribed by GATE conducting body IIT, Roorkee in 2017. In order tohelp the students thoroughly equip them for the exam, this book provides 24x7 access to premiumcontent through an android app and a web portal.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/518IfJnlkPL._SX385_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/GATE-Guide-Electronics-Communication-Engineering/dp/9386309769/ref=sr_1_5?ie=UTF8&amp;qid=1509126520&amp;sr=8-5&amp;keywords=gate+2018'),
(9, 'GATE Guide Mechanical Engineering 2018', '978-9386309778', '9386309777', 'GKP', 'English', 'G.K. Pub', '', '14 Feb 2017', '1268', 'GKPâ€™s GATE Mechanical Engineering 2018 has become one of the most popular books for GATEprep since its inception in 1994. The current edition is thoroughly updated and revised as per thesyllabus prescribed by GATE conducting body IIT, Roorkee in 2017. In order to help the studentsthoroughly equip them for the exam, this book provides 24x7 access to premium content through an android app and a web portal.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51UtLJuc8lL._SX374_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/GATE-Guide-Mechanical-Engineering-2018/dp/9386309777/ref=sr_1_6?ie=UTF8&amp;qid=1509126520&amp;sr=8-6&amp;keywords=gate+2018'),
(10, 'GATE 2018: Electronics Engineering Solved Papers', '978-9351472599', '9351472590', 'Made Easy Editorial Board', 'English', 'Made Easy Publications', '', 'May 2017', '664', 'The new edition of GATE 2018 Solved Papers : Electronics Engineering has been fully revised, updated and edited. The whole book has been divided into topic wise sections. At the beginning of each subject, analysis of previous papers are given to improve the understanding of subject. This book also contains the conventional questions asked in GATE before 2003.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/31kOa1Bw9aL.jpg', '', 'https://www.amazon.in/GATE-2018-Electronics-Engineering-Solved/dp/9351472590/ref=sr_1_9?ie=UTF8&amp;qid=1509126520&amp;sr=8-9&amp;keywords=gate+2018'),
(11, 'GATE 2018: Engineering Mathematics', '978-9351472735', '9351472736', 'Made Easy Editorial Board', 'English', 'Made Easy Publications', '', '1 May 2017', '432', 'The new edition of Engineering Mathematics for GATE 2018 and ESE : 2018 (Prelims) has been fully revised, updated and edited. The whole book has been divided into topic wise sections with both Theory and Previous Year Solved Question Papers all subjects.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/41FYfKbgDfL._SX373_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/GATE-2018-Made-Editorial-Board/dp/9351472736/ref=sr_1_10?ie=UTF8&amp;qid=1509126520&amp;sr=8-10&amp;keywords=gate+2018'),
(12, 'C++: The Complete Reference', '978-0070532465', '007053246X', 'Herbert Schildt', 'English', 'McGraw Hill Education', '', '1 Jul 2017', '1026', 'Master programmer and best-selling author Herb Schildt has updated and expanded his classic reference to C++. Using expertly crafted explanations, insider tips, and hundreds of examples, Schildt explains and demonstrates every aspect of C++. Inside you\'ll find details on the entire C++ language, including its keywords, operators, preprocessor directives, and libraries. There is even a synopsis of the extended keywords used for .NET programming. Of course, everything is presented in the clear, crisp, uncompromising style that has made Herb Schildt the choice of millions. Whether you\'re a beginning programmer or a seasoned pro, the answers to all your C++ questions can be found in this lasting resource.\r\n\r\nDetailed coverage includes:\r\n\r\nData types and operators\r\nControl statements\r\nFunctions\r\nClasses and objects\r\nConstructors and destructors\r\nFunction and operator overloading\r\nInheritance\r\nVirtual functions\r\nNamespaces\r\nTemplates\r\nException handling\r\nThe I/O library\r\nThe Standard Template Library (STL)\r\nContainers, algorithms, and iterators\r\nPrinciples of object-oriented programming (OOP)\r\nRuntime type ID (RTTI)\r\nThe preprocessor', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51Uqe5PHbML._SX381_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/C-Complete-Reference-Herbert-Schildt/dp/007053246X/ref=sr_1_2?ie=UTF8&amp;qid=1509128193&amp;sr=8-2&amp;keywords=c%2B%2B'),
(13, 'Object-Oriented Programming with C++', '978-9352607990', '9352607996', 'E Balagurusamy', 'English', 'McGraw Hill Education', '', '20 Sep 2017', '576', 'The book aims at providing an all-round enrichment of knowledge in the area of object-oriented programming with C++ as the implementation of language. The author has used simple language to explain critical concepts of object-oriented programming and for better understanding of the readers. The same concepts have been implemented in solved examples using C++ programming language. Retaining is original style of lucid writing, the books has ample solved examples, programming exercises and new practice questions. This revised edition has new projects and incorporates a couple of new elements like Learning Objectives and Limitations. The topic on Polymorphism has been revised and expanded for better understanding.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/41LBD-XtzYL._SX377_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/Object-Oriented-Programming-C-Balagurusamy/dp/9352607996/ref=sr_1_1?ie=UTF8&amp;qid=1509128193&amp;sr=8-1&amp;keywords=c%2B%2B'),
(14, 'Object Oriented Programming in C++', '978-8131722824', '8131722821', 'Lafore', 'English', 'Pearson Education India', '', '2008', '1040', 'Object Oriented Programming in C++ is a comprehensive solution for teaching object-oriented programming using the features of ANSI/ISO C++. It covers the basic concepts of object-oriented programming, why those concepts exist and how to make them work effectively. The Fourth Edition is updated and revised to include more UML coverage, inter-file communication and use-cases analysis to explain software design. The book covers object-oriented programming through task-oriented examples and figures to conceptualize the techniques and approaches used. It also contains questions and exercises to reinforce the concepts students have learned.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/41VygKzfYdL._SX360_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/Object-Oriented-Programming-C-4e/dp/8131722821/ref=sr_1_4?ie=UTF8&amp;qid=1509128193&amp;sr=8-4&amp;keywords=c%2B%2B'),
(15, 'The C++ Programming Language', '978-8131705216', '8131705218', 'STROUSTRUP', 'English', 'Pearson Education India', '', '', '1040', 'One book has always set the standard for C++ programmers: The C++ Programming Language, by Bjarne Stroustrup, the Bell Laboratories developer who created C++. Now, Stroustrup has updated this classic with clarifications based on reader feedback and new information in two brand-new appendices on ISO/ANSI C++: internationalization and exception safety. This makes The C++ Programming Language: Special Edition the only book with authoritative coverage of every important element of C++.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/41hm-3rQSdL._SX425_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/Programming-Language-1e-third/dp/8131705218/ref=sr_1_3?ie=UTF8&amp;qid=1509128193&amp;sr=8-3&amp;keywords=c%2B%2B'),
(16, 'Object Oriented Programming with C++', '978-1259029936', '125902993X', 'E Balagurusamy', 'English', 'McGraw Hill Education; Sixth edition', '', '1 June 2013', '584', 'Its always advisable to rely on a particular book when you are learning something new on your own. As the name suggests, Object Orients Programming with C++, the book introduces its readers with concepts of Object Oriented Programming using the programming language C++. However, it is essential that the reader should have basic knowledge of the programming language C, however it is not mandatory for the reader to have a certain sense of proficiency in programming before picking up this book.', '', '', 'https://images-na.ssl-images-amazon.com/images/I/514GBnvTDwL._SX376_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/Object-Oriented-Programming-C-Balagurusamy/dp/125902993X/ref=sr_1_5?ie=UTF8&amp;qid=1509128193&amp;sr=8-5&amp;keywords=c%2B%2B'),
(17, 'PHP: The Complete Reference', '978-0070223622', '0070223629', 'Steven Holzner', 'English', 'McGraw Hill Education', '', '1 Jul 2017', '', 'uild dynamic, cross-browser Web applications with PHP--the server-side programming language that\'s taken the Internet by storm. Through detailed explanations and downloadable code examples, this comprehensive guide shows you, step-by-step, how to configure PHP, create PHP-enabled Web pages, and put every advanced development tool to work.\r\n\r\nPHP: The Complete Reference explains how to personalize the PHP work space, define operators and variables, manipulate strings and arrays, deploy HTML forms and buttons, and process user input. You\'ll learn how to access database information, track client-side preferences using cookies, execute FTP and e-mail transactions, and publish your applications to the Web. You\'ll also get in-depth coverage of PHP\'s next-generation Web 2.0 design features, including AJAX, XML, and RSS.\r\n\r\nInstall PHP and set up a customized development environment\r\nWork with variables, operators, loops, strings, arrays, and functions\r\nIntegrate HTML controls, text fields, forms, radio buttons, and checkboxes\r\nAccept and validate user-entered data from Web pages\r\nSimplify programming using PHP\'s object-oriented tools\r\nBuild blogs, guest books, and feedback pages with server-side file storage\r\nWrite MySQL scripts that retrieve, modify, and update database information\r\nSet cookies, perform FTP transactions, and send e-mails from PHP sessions\r\nBuild AJAX-enabled Web pages\r\nDraw graphics on the server\r\nCreate XML components and add RSS feeds', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51vrHzkpt%2BL._SX382_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/PHP-Complete-Reference-Steven-Holzner/dp/0070223629/ref=sr_1_1?ie=UTF8&amp;qid=1509129096&amp;sr=8-1&amp;keywords=php'),
(18, 'PHP and MySQL Web Development', '978-9332582736', '9332582734', 'Laura Thomson', 'English', 'Pearson Education', '', '2016', '688', 'Long acknowledged as the clearest and most practical guide to PHP/MySQL web development, the brand-new Fifth Edition of PHP and MySQL Web Development fully reflects the latest versions of PHP and MySQL to help your students master today\'s best practices for succeeding with PHP 7 and MySQL 5.7 web database development. New coverage of security, cloud and mobile development and using the PEAR repository\'s massive resources have been added to this edition. The authors teach all these things while maintaining the clarity and character that thousands of readers have found so appealing in the book\'s first four editions\r\n1. The definitive, best-selling book on combining these two open source tools to create dynamic Web sited -- updated for PHP 7 and MySQL 5.7\r\n2. Clear, practical, down to earth and now extensively updated for today\'s best practices\r\n3. Includes a brand-new chapter on PHP cloud development, plus all-new mobile web app projects\r\n4. Now focuses on security issues throughout and contains an all-new chapter on Web security\r\n5. Adds new coverage of using the indispensable PEAR repository of PHP extensions and applications\r\nContents\r\n\r\nPart I: Using PHP\r\n1 PHP Crash Course\r\n2 Storing and Retrieving Data\r\n3 Using Arrays\r\n4 String Manipulation and Regular Expressions\r\n5 Reusing Code and Writing Functions\r\n6 Object-Oriented PHP\r\n7 Error and Exception Handling\r\n\r\nPart II: Using MySQL\r\n8 Designing Your Web Database\r\n9 Creating Your Web Database\r\n10 Working with Your MySQL Database\r\n11 Accessing Your MySQL Database from the Web with PHP\r\n12 Advanced MySQL Administration\r\n13 Advanced MySQL Programming\r\n\r\nPart III: Web Application Security\r\n14 Web Application Security Risks\r\n15 Building a Secure Web Application\r\n16 Implementing Authentication Methods with PHP\r\n\r\nPart IV: Advanced PHP Techniques\r\n17 Interacting with the File System and the Server\r\n18 Using Network and Protocol Functions\r\n19 Managing the Date and Time\r\n20 Internationalization and Localization\r\n21 Generating Images\r\n22 Using Session Control in PHP\r\n23 Integrating JavaScript and PHP\r\n24 Other Useful Features\r\n\r\nPart V: Building Practical PHP and MySQL Projects\r\n25 Using PHP and MySQL for Large Projects\r\n26 Debugging and Logging\r\n27 Building User Authentication and Personalization\r\n\r\nPart VI: Appendix\r\nA Installing Apache, PHP and MySQL', '', '', 'https://images-na.ssl-images-amazon.com/images/I/51se-6XKeaL._SX361_BO1,204,203,200_.jpg', '', 'https://www.amazon.in/PHP-MySQL-Development-Luke-Welling/dp/9332582734/ref=sr_1_2?ie=UTF8&amp;qid=1509129096&amp;sr=8-2&amp;keywords=php');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `main_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `parent_id` bigint(225) DEFAULT NULL,
  `sub_cat_id` bigint(225) DEFAULT NULL,
  `cat_name` varchar(225) NOT NULL,
  PRIMARY KEY (`main_id`),
  UNIQUE KEY `cat_name` (`cat_name`),
  KEY `parent_id` (`parent_id`),
  KEY `sub_cat_id` (`sub_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8mb4 COMMENT='Book Categories (Parent With Sub-Categories)' ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`main_id`, `parent_id`, `sub_cat_id`, `cat_name`) VALUES
(1, NULL, NULL, 'Action & Adventure'),
(2, NULL, NULL, 'Computer Books'),
(3, NULL, NULL, 'Cooking, Food & Recipe'),
(4, NULL, NULL, 'Health, Mind & Body'),
(5, NULL, NULL, 'Competition books'),
(6, NULL, NULL, 'Arts & Photography'),
(7, NULL, NULL, 'Competivities Exam'),
(8, NULL, NULL, 'Technical'),
(9, NULL, NULL, 'Medical'),
(10, NULL, NULL, 'References'),
(11, NULL, NULL, 'Entertainment'),
(12, NULL, NULL, 'Science Book'),
(13, NULL, NULL, 'Sports'),
(14, 2, NULL, 'Computer programming'),
(15, 2, NULL, 'Web design'),
(16, 2, NULL, 'Mobile phones'),
(17, 2, NULL, 'Computer hardware'),
(18, 2, NULL, 'operating systems'),
(19, 2, NULL, 'Html Books'),
(20, 2, NULL, 'PHP books'),
(21, 2, NULL, 'Java Books'),
(22, 2, NULL, 'c++ Books'),
(23, 2, NULL, 'Security & encription Books'),
(24, 2, NULL, 'networking'),
(25, 2, NULL, 'Database'),
(26, 2, NULL, 'Project management'),
(27, NULL, NULL, 'Engineering'),
(28, 8, NULL, 'Automotive'),
(29, 8, NULL, ' Electronics & Telecommunications'),
(30, 8, NULL, 'Energy & Nuclear'),
(31, 8, NULL, 'Biochemistry'),
(32, 8, NULL, 'Clinical Chemistry'),
(34, 8, NULL, ' General'),
(35, 9, NULL, 'Medicine & Nursing'),
(36, 9, NULL, ' Basic Medical Science'),
(37, 9, NULL, ' Medical Ethics & Legal Issues'),
(38, 9, NULL, 'Hospital Administration & Management'),
(39, 9, NULL, ' Nursing'),
(40, 9, NULL, ' Internal Medicine'),
(41, 9, NULL, 'Veterinary Medicine'),
(42, 9, NULL, ' Renal Medicine'),
(43, 9, NULL, 'Surgery'),
(44, 9, NULL, ' Nuclear Medicine'),
(45, 9, NULL, 'Public Health & Preventive Medicine'),
(46, 9, NULL, ' Fertilisation & Infertility'),
(47, 9, NULL, 'Physiology'),
(75, 27, NULL, 'Automobile Engineering'),
(76, 27, NULL, 'Computer Science Engineering'),
(77, 27, NULL, 'Electrical Engineering '),
(78, 27, NULL, 'Bio Engineering '),
(79, 27, NULL, 'Civil Engineering '),
(80, 27, NULL, 'Geotechnical Engineering '),
(81, 27, NULL, 'Chemical Engineering '),
(82, 27, NULL, 'Industrial Production Engineering'),
(83, NULL, 27, 'Electronics & Telecomm Engineering'),
(84, 27, NULL, 'Metallurgical Engineering'),
(85, 27, NULL, 'Information techonology'),
(86, 27, NULL, 'Electrical & Electronics Engineering'),
(87, 27, NULL, 'Mechanical Engineering'),
(88, 5, NULL, 'SSC/CGL/CHSL'),
(89, 5, NULL, 'NDA'),
(90, 5, NULL, 'CDS'),
(91, 5, NULL, 'Medical entrance'),
(92, 5, NULL, 'Banking exam'),
(93, 5, NULL, 'SBI PO'),
(94, 5, NULL, 'IBPS'),
(152, 7, NULL, 'Banking'),
(153, 7, NULL, 'SBI Clerk'),
(154, 7, NULL, 'IBPS PO'),
(155, 7, NULL, 'General Exams'),
(156, 7, NULL, 'Railways'),
(157, 7, NULL, 'Teacher Recruitment'),
(158, 7, NULL, 'Civil Services'),
(159, 7, NULL, 'M.Ed Exams'),
(160, 7, NULL, 'GATE'),
(161, 7, NULL, 'International Exams'),
(162, 7, NULL, 'GMAT'),
(163, 7, NULL, 'CAT'),
(164, 7, NULL, 'CFA'),
(165, 7, NULL, 'Law Exam'),
(166, 7, NULL, 'AIPMT'),
(167, 7, NULL, 'AMCAT'),
(168, 7, NULL, 'E-litmus'),
(169, 7, NULL, 'MAT');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `comment` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `subject` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `status`, `subject`) VALUES
(54, 'bvbc', 1, 'bvcvc'),
(55, 'bvccbbcv', 1, 'bnbnc'),
(56, 'vxcxcv', 1, 'vcxvxc'),
(57, 'bvcbcv', 1, 'vbv'),
(58, '', 1, 'Wants to contact you'),
(59, '', 1, 'Wants to contact you'),
(60, 'GG', 1, 'Wants to contact you');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(225) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mob` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `messaage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `submit_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPRESSED;

--
-- Triggers `contact_us`
--
DROP TRIGGER IF EXISTS `nofity_comment`;
DELIMITER $$
CREATE TRIGGER `nofity_comment` AFTER INSERT ON `contact_us` FOR EACH ROW BEGIN
INSERT INTO `comments`
        (comment,subject) VALUES (NEW.name,'Wants to contact you');
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `current_active_users`
--

DROP TABLE IF EXISTS `current_active_users`;
CREATE TABLE IF NOT EXISTS `current_active_users` (
  `user_login_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `last_active` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_session_value` varchar(225) DEFAULT NULL,
  `is_user_register` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`user_login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `current_active_users`
--

INSERT INTO `current_active_users` (`user_login_id`, `user_id`, `last_active`, `user_session_value`, `is_user_register`) VALUES
(19, 1, '2017-10-27 19:53:11', 'amk9b1m2fj47i9jshr363g8c47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` bigint(225) NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(225) NOT NULL,
  PRIMARY KEY (`tag_id`,`tag_title`),
  UNIQUE KEY `tag_title` (`tag_title`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_title`) VALUES
(3, 'c++'),
(2, 'gate'),
(1, 'nursing'),
(5, 'php');

-- --------------------------------------------------------

--
-- Table structure for table `users_register`
--

DROP TABLE IF EXISTS `users_register`;
CREATE TABLE IF NOT EXISTS `users_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oauth_uid` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `is_admin` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT 'no_admin',
  `password` varbinary(225) NOT NULL,
  `link` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_pic` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneno` bigint(11) DEFAULT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `fill_full_details` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPRESSED;

--
-- Dumping data for table `users_register`
--

INSERT INTO `users_register` (`id`, `name`, `username`, `oauth_provider`, `oauth_uid`, `email`, `gender`, `date_of_birth`, `is_admin`, `password`, `link`, `user_pic`, `phoneno`, `state`, `address`, `fill_full_details`, `created`, `modified`) VALUES
(1, 'Tushar', '1', NULL, '', 'a@a.a', NULL, NULL, 'no_admin', 0x9373aa220b053c629efff1e9a60ca056, NULL, NULL, 12, 'NULL', 'ss', 'Y', '2017-10-14 20:01:05', NULL),
(2, 'gdgdfgdf', 'gffgf', '', '', 'a@a.afgvfg', NULL, NULL, 'no_admin', 0x9373aa220b053c629efff1e9a60ca056, NULL, NULL, 4534534, 'NULL', '553534453', 'Y', '2017-10-14 20:01:05', NULL),
(3, 'Administrator', 'admin', '', '', 'admin@admin.admin', NULL, NULL, 'YES_admin', 0x915b2dfc2ff00b9d15e7d39b0199478a, NULL, 'hghjgj', 9752503914, 'NULL', 'I am Admin', 'Y', '2017-10-14 20:01:05', NULL),
(13, '', '', 'facebook', '', '', '', '1970-01-01', 'no_admin', 0x2fab2e5c78b981570c6e55cfb1fe1b36, '', '', NULL, NULL, NULL, 'N', '2017-10-15 15:26:09', '2017-10-15 16:35:29'),
(14, NULL, 'ffdgd', NULL, NULL, 'a@a.atyfgghgfgf', NULL, NULL, 'no_admin', 0x9373aa220b053c629efff1e9a60ca056, NULL, NULL, NULL, NULL, NULL, 'N', '2017-10-15 21:14:07', NULL),
(15, NULL, 'dsadsfsdf', NULL, NULL, 'a@a.afdfgdfd', NULL, NULL, 'no_admin', 0x9373aa220b053c629efff1e9a60ca056, NULL, NULL, NULL, NULL, NULL, 'N', '2017-10-15 21:50:26', NULL),
(18, 'Tushar Kanti', 'tkparial1', 'facebook', '763627850505949', 'tkparial1@gmail.com', 'male', '1996-09-17', 'no_admin', 0x2fab2e5c78b981570c6e55cfb1fe1b36, 'https://www.facebook.com/app_scoped_user_id/763627850505949/', 'https://fb-s-a-a.akamaihd.net/h-ak-fbx/v/t1.0-1/c8.0.50.50/p50x50/18882174_704498319752236_8043411949623386002_n.jpg?oh=dfcb54b908a015e95a13f41e6ec908a8&oe=5A63256D&__gda__=1518252148_b2411852990694039fe0a7b092ea200c', 9752503914, NULL, '', 'Y', '2017-10-15 17:02:36', '2017-10-25 12:14:18'),
(19, NULL, 'dgfgfd', NULL, NULL, 'hhhh@f.fdgd', NULL, NULL, 'no_admin', 0x81e657c1ff2aafaefb4a0a1cee2930b4, NULL, NULL, NULL, NULL, NULL, 'N', '2017-10-21 19:45:27', NULL);

--
-- Triggers `users_register`
--
DROP TRIGGER IF EXISTS `user_password_encrypt`;
DELIMITER $$
CREATE TRIGGER `user_password_encrypt` BEFORE INSERT ON `users_register` FOR EACH ROW IF EXISTS (SELECT NEW.password) 
    THEN 
SET NEW.password = AES_ENCRYPT(NEW.password, 'user_password_encrytion_542540');     
    END IF
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details` ADD FULLTEXT KEY `publisher_name` (`publisher_name`);
ALTER TABLE `book_details` ADD FULLTEXT KEY `isbn-13` (`isbn-13`);
ALTER TABLE `book_details` ADD FULLTEXT KEY `authors` (`authors`);
ALTER TABLE `book_details` ADD FULLTEXT KEY `isbn-10` (`isbn-10`);
ALTER TABLE `book_details` ADD FULLTEXT KEY `description` (`description`);
ALTER TABLE `book_details` ADD FULLTEXT KEY `name` (`name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_plus_categories_and_tags`
--
ALTER TABLE `books_plus_categories_and_tags`
  ADD CONSTRAINT `book_to_book` FOREIGN KEY (`book_id`) REFERENCES `book_details` (`book_id`),
  ADD CONSTRAINT `category_to_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`main_id`),
  ADD CONSTRAINT `tag_to_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `parent-to-sub_categories` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`main_id`),
  ADD CONSTRAINT `sub-to-sub_categories` FOREIGN KEY (`sub_cat_id`) REFERENCES `categories` (`main_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
