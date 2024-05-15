<?php

class Library {

    private $books;
    private $members;

    public function addBook(Book $book){
        $this->books[] = $book;
    }
    
    public function addMember(Member $member){
        $this->members[] = $member;
    }

    public function printAvailableCopies(){
        foreach ($this->books as $book){
            echo "Available Copies of '" . $book->getTitle() . "': " . $book->getAvailableCopies() . "\n";
        }
    }
}

class Book {
    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies){
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getAvailableCopies(){
        return $this->availableCopies;
    }

        public function borrowBook(){
        $this->availableCopies -= 1;
    }

    public function returnBook(){
        $this->availableCopies += 1;
    }
}

class Member {
    private $name;

    public function __construct($name){
        $this->name = $name;
    }
    
    public function getName(){
        return $this->name;
    }
    
    public function borrowBook(Book $book){
        $book->borrowBook();
    }
    public function returnBook(Book $book){
        $book->returnBook();
    }
}

$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");

$library = new Library;

$library->addBook($book1);
$library->addBook($book2);

$library->addMember($member1);
$library->addMember($member2);

$member1->borrowBook($book1);
// $member1->returnBook($book1);
$member2->borrowBook($book2);
// $member2->returnBook($book2);

$library->printAvailableCopies();