Feature: User visits the homepage
	In order to verify that the application is running
	As a user
	I want to view the homepage

Scenario: View homepage
	When I enter the URL in a browser
	Then I should see "Mezzolyrics"

Scenario: Type in partial artist name
	Given I am on the homepage
	When I fill in "Enter an artist" with "Param"
	Then I should see the suggestion "Paramore" appear

Scenario: Submit with empty text box
	Given I am on the homepage
	When I click "Submit"
	Then I should see "Invalid artist"

Scenario: Hit 'Enter' with empty text box
	Given I am on the homepage
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see "Invalid artist"
