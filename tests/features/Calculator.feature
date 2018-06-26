@calculator
Feature:
	As a developer
	I need to get the correct output/results from the calculator
	In order to ensure it is functioning correctly

Scenario: Summing two integers
	Given the method "sum" receives the numbers 7 and 5
	Then it should output the calculated value of 12

Scenario: Summing a single integer
	Given the method "sum" receives the number 7
	Then it should output the calculated value of 7

Scenario: Using the previous result in the next calculation
	Given the method "sum" receives the numbers 7 and 5
	Then it should output the calculated value of 12
	And when I pass the number 8 to "sum"
	Then it should output the calculated value of 20
	
Scenario: Summing various numbers in a chain
	Given the method "sum" receives the numbers 7 and 5
	Then it should output the calculated value of 12
	And when I pass the numbers 1 and 2 and 3 and 4 and 5 to "sum"
	Then it should output the calculated value of 27
	
Scenario: Multiply two numbers
	Given the method "multiply" receives the numbers 7 and 5
	Then it should output the calculated value of 35
	
Scenario: Multiply various numbers in a chain
	Given the method "multiply" receives the numbers 7 and 5
	Then it should output the calculated value of 35
	And when I pass the numbers 1 and 2 and 3 and 4 and 5 to "multiply"
	Then it should output the calculated value of 4200
	
Scenario: Using multiple operations in a chain
	Given the method "multiply" receives the numbers 7 and 5
	Then it should output the calculated value of 35
	And when I pass the number 15 to "sum"
	Then it should output the calculated value of 50
	
