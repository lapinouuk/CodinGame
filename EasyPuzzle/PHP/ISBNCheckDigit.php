<?php
/**
CodinGame Community EasyPuzzle

ISBN CHECK DIGIT
By java_coffee_cup

Goal
International Standard Book Number (ISBN) is a unique numeric commercial book identifier.

Before year 2007 ISBNs were 10-digit long. After that year ISBNs extended to 13 digits. In both ISBN-10 and ISBN-13 standards, the last digit is the check digit, for error detection.

ISBN-10 check digit is calculated by Modulus 11 with decreasing weights on the first 9 digits.
Example: 030640615?
0×10 + 3×9 + 0×8 + 6×7 + 4×6 + 0×5 + 6×4 + 1×3 + 5×2 = 130.
130 / 11 = 11 remainder 9.
Check digit is the value needed to add to the sum to make it dividable by 11. In this case it is 2.
So the valid ISBN is 0306406152.
In case 10 being the value needed to add to the sum, we use X as the check digit instead of 10.

ISBN-13 check digit is calculated by Modulus 10 with alternate weights of 1 and 3 on the first 12 digits.
Example: 978030640615?
9×1 + 7×3 + 8×1 + 0×3 + 3×1 + 0×3 + 6×1 + 4×3 + 0×1 + 6×3 + 1×1 + 5×3 = 93.
93 / 10 = 9 remainder 3.
Check digit is the value needed to add to the sum to make it dividable by 10. So the check digit is 7. The valid ISBN is 9780306406157.

Your task is to validate a list of ISBNs.

A valid ISBN should contain the digits 0 to 9 only, except for the check digit which is determined as explained above. X or other improper characters appearing in the wrong place will render an ISBN invalid.
 **/

fscanf(STDIN, "%d",
    $N
);

for ($i = 0; $i < $N; $i++)
{
    $ISBN = stream_get_line(STDIN, 20 + 1, "\n");
    $len = strlen($ISBN);
    if (preg_match("/^([0-9]{9})([0-9]|X)$/", $ISBN))
    {
        $newISBN = str_split($ISBN, 1);
        $sum = 0;
        for ($j = 10; $j > 1; $j--)
        {
            $sum += $newISBN[10-$j]*$j;
        }
        $checkD = 11 - ($sum % 11);
        $sum % 11 == 0 ? $checkD = 0 : NULL;
        $checkD == 10 ? $checkD = "X" : NULL;
        $checkD != end($newISBN) ? $invalid[] = $ISBN : NULL;
    }
    else if (preg_match("/^[0-9]{13}$/", $ISBN))
    {
        $newISBN = str_split($ISBN, 1);
        $sum = 0;
        for ($j = 13; $j > 1; $j--)
        {
            $s = ($j % 2 != 0) ? 1 : 3;
            $sum += $newISBN[13-$j]*$s;
        }
        $checkD = 10 - ($sum % 10);
        $sum % 10 == 0 ? $checkD = 0 : NULL;
        $checkD != end($newISBN) ? $invalid[] = $ISBN : NULL;
    }
    else
    {
        $invalid[] = $ISBN;        
    }
}
echo count($invalid)." invalid:\n";
foreach($invalid as $code)
{
    echo $code."\n";   
}

?>