<?php
class Book {
    public $title;
    public $author;
    public $publicationDate;
    public $numberOfPages;
    public $language;
    private $price;
     
    public function __construct($title, $author, $publicationDate, $numberOfPages, $language, $price) {
        $this->title = $title;
        $this->author = $author;
        $this->publicationDate = $publicationDate;
        $this->numberOfPages = $numberOfPages;
        $this->language = $language;
        $this->setPrice($price);
    }

    public function setPrice($price) {
        if ($price > 0) {
            $this->price = $price; 
        } else {
            $this->price = "Price must be greater than 0";
        }
    }

    public function getPrice() {
        return $this->price;
    }

    public function displayBookInfo() {
        echo "Title: " . $this->title . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Publication Date: " . $this->publicationDate . "<br>";
        echo "Number of Pages: " . $this->numberOfPages . "<br>";
        echo "Language: " . $this->language . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "-----------------------------------------------------<br>";
    }
}
?>