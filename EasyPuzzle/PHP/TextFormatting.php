<?php

/*
CodinGame Easy Community Puzzle :

TEXT FORMATTING
By Cezariusz

Goal
Format a text file using the following rules:

* Only a single space between words (remove excessive spaces);
* No spaces before punctuation marks;
* One space after each punctuation mark in front of a letter;
* Use only lowercase letters, except for the beginning of the sentence (after a dot);
* Remove repeated punctuation marks.

A punctuation mark is a character other than a space, a letter or a digit.

Example
Input: "when a father gives to his son,,, Both laugh; When a son gives to his father, , , Both cry...shakespeare"
Output: "When a father gives to his son, both laugh; when a son gives to his father, both cry. Shakespeare"

*/

$intext = strtolower(stream_get_line(STDIN, 999 + 1, "\n"));

$test = substr($intext, -1) == "." ? true : false; // Checks if the sentence finishes with a ".";
$intext = $intext.".";

$intext = preg_replace("/\s+(\W+)/","$1", $intext);
$intext = preg_replace("/\.+/",". ", $intext);
$intext = preg_match_all("/\w+[\s+\W+]/", $intext, $tableText);

$tableText = $tableText[0];

for($i = 1; $i < sizeof($tableText); $i++) // Initializes uppercase after each ".";
{
    if(preg_match("/\./", $tableText[$i-1]))
    {
        $tableText[$i] = ucfirst($tableText[$i]);
    }
}

$tableText[0] = ucfirst($tableText[0]);
$tableText = array_map('trim', $tableText);
$tableText = implode(' ', $tableText);
$test == false ? $tableText = substr($tableText,0,-1) : NULL; // if no "." at the end, removes it;

echo $tableText."\n";

?>