@homepage
Feature:
	As a learner
	I wish to test the Laravel Home Page for a phrase
	In order to prove that Behat is correctly installed and working

	Scenario: Home Page Test
		When I am on the homepage
		Then I should see "Laravel"
		
	Scenario: Laravel framework interaction Test
		When I am on the homepage
		Then I should see "Home"
		And I can do something with Laravel