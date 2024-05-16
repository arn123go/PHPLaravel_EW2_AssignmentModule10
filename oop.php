<?php

class Book {
    private $title;
    private $availableCopies;

    public function __construct( string $title = '', int $availableCopies = 0 ) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ( $this->availableCopies ) {
            $this->availableCopies -= 1;
        }
    }

    public function returnBook() {
        $this->availableCopies += 1;
    }
}

class Member {
    private $name;

    public function __construct( string $name = '' ) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook( Book $book ) {
        $book->borrowBook();
    }
    
    public function returnBook( Book $book ) {
        $book->returnBook();
    }
}

class Library {
    private static $books = [];
    private static $members = [];

    public static function addBook( Book ...$books ) {
        foreach ( $books as $book ) {
            self::$books[] = $book;
        }
    }

    public static function addMember( Member ...$members ) {
        foreach ( $members as $member ) {
            self::$members[] = $member;
        }
    }

    public static function displayAvailableBooks() {
        foreach ( self::$books as $book ) {
            echo "Available Copies of '" . $book->getTitle() . "': " . $book->getAvailableCopies() . "\n";
        }
    }
}

$book1 = new Book( "The Great Gatsby", 5 );
$book2 = new Book( "To Kill a Mockingbird", 3 );

$member1 = new Member( "John Doe" );
$member2 = new Member( "Jane Smith" );

Library::addBook( $book1, $book2 );
Library::addMember( $member1, $member2 );

$member1->borrowBook( $book1 );
$member2->borrowBook( $book2 );

Library::displayAvailableBooks();
