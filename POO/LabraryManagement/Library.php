<?php
require 'book.php';

$book1 = new Book("Inlock It", "Dan Lok", 2019, 200, "English", 100);
$book2 = new Book("The Millionaire Fastlane", "MJ DeMarco", 2011, 200, "English", -50); 
$book3 = new Book("The 4-Hour Workweek", "Tim Ferriss", 2007, 200, "English", 75);
$book4 = new Book("The 4-Hour Body", "Tim Ferriss", 2010, 200, "English", 0); 

$book1->displayBookInfo();
$book2->displayBookInfo();
$book3->displayBookInfo();
$book4->displayBookInfo();
?>