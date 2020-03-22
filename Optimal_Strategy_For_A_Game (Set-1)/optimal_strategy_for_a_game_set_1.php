//OPTIMAL STRATEGY FOR A GAME SET - 1
//Given Problem Statement : Problem statement: Consider a row of n coins of values v1 . . . //vn, where n is even.
//We play a game against an opponent by alternating turns. In each turn,
//a player selects either the first or last coin from the row,
//removes it from the row permanently and receives the value of the coin.
//Determine the maximum possible amount of money we can definitely win if we move first.
//Note - Note: The opponent is as clever as the user.



<?php 
// PHP program to find out maximum value 
// from a given sequence of coins 

// Returns optimal value possible that a 
// player can collect from an array of 
// coins of size n. Note than n must be even 
function optimalStrategyOfGame($arr, $n) 
{ 
	// Create a table to store solutions 
	// of subproblems 
	$table = array_fill(0, $n, 
			array_fill(0, $n, 0)); 

	// Fill table using above recursive formula. 
	// Note that the table is filled in diagonal 
	// fashion (similar to http://goo.gl/PQqoS), 
	// from diagonal elements to table[0][n-1] 
	// which is the result. 
	for ($gap = 0; $gap < $n; ++$gap) 
	{ 
		for ($i = 0, $j = $gap; $j < $n; ++$i, ++$j) 
		{ 

			// Here x is value of F(i+2, j), 
			// y is F(i+1, j-1) and z is F(i, j-2) 
			// in above recursive formula 
			$x = (($i + 2) <= $j) ? 
			$table[$i + 2][$j] : 0; 
			$y = (($i + 1) <= ($j - 1)) ? 
				$table[$i + 1][$j - 1] : 0; 
			$z = ($i <= ($j - 2)) ? 
			$table[$i][$j - 2] : 0; 

			$table[$i][$j] = max($arr[$i] + min($x, $y), 
								$arr[$j] + min($y, $z)); 
		} 
	} 

	return $table[0][$n - 1]; 
} 

// Driver Code 
$arr1 = array( 8, 15, 3, 7 ); 
$n = count($arr1); 
print(optimalStrategyOfGame($arr1, $n) . "\n"); 

$arr2 = array( 2, 2, 2, 2 ); 
$n = count($arr2); 
print(optimalStrategyOfGame($arr2, $n) . "\n"); 

$arr3 = array(20, 30, 2, 2, 2, 10); 
$n = count($arr3); 
print(optimalStrategyOfGame($arr3, $n) . "\n"); 

// This code is contributed by chandan_jnu 
?> 

// Input for test case 1:
// 8 15 3 7    // input taken in array
// Output for test case 1:
// 22

// Input for test case 2:
// 2 2 2 2    //input taken in array
// Output for test case 2:
// 4

// Input for test case 3:
// 20 30 2 2 2 10    //input taken in array
// Output for test case 3:
// 42
