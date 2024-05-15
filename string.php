<?php

$strings = ["Hello", "World", "PHP", "Programming"];

function countVowel( string $string ): int {
    $vowels = "aeiou";
    $loopLimit = strlen( $string );
    $found = 0;
    for ( $i = 0; $i < $loopLimit; $i++ ) {
        if ( stripos( $vowels, $string[$i] ) !== false ) {
            $found += 1;
        }
    }
    return $found;
}

foreach ( $strings as $value ) {
    echo "Original String: $value, Vowel Count: " . countVowel( $value ) . ", Reversed String: " . strrev( $value ) . "\n";
}