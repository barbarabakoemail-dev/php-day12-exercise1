
<?php

class Book {
    public $title;
    public $author;
    public $pages;

    public function __construct($title, $author, $pages) {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
    }

    public function getSummary() {
        return $this->title . " by " . $this->author . " has " . $this->pages . " pages.";
    }

    public function isLong() {
        if ($this->pages > 300) {
            return "This is a long book.";
        } else {
            return "This is a short book.";
        }
    }
}

$book1 = new Book("Harry Potter", "J.K. Rowling", 450);
$book2 = new Book("The Alchemist", "Paulo Coelho", 208);
$book3 = new Book("The Hobbit", "J.R.R. Tolkien", 310);

echo $book1->getSummary() . "<br>";
echo $book1->isLong() . "<br><br>";

echo $book2->getSummary() . "<br>";
echo $book2->isLong() . "<br><br>";

echo $book3->getSummary() . "<br>";
echo $book3->isLong() . "<br>";
?>
