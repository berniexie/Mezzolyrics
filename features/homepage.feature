Feature: User visits the homepage
	In order to verify that the application is running
	As a user
	I want to view the homepage

Scenario: View homepage
	When I enter the URL in a browser
	Then I should see "Mezzolyrics"

Scenario: Type in partial artist name (Paramore)
	Given I am on the homepage
	When I fill in "Enter an artist" with "Param"
	Then I should see the suggestion "Paramore" appear

Scenario: Type in partial artist name (Adele)
	Given I am on the homepage
	When I fill in "Enter an artist" with "Adel"
	Then I should see the suggestion "Adele" appear

Scenario: Submit with empty text box
	Given I am on the homepage
	When I click "Submit"
	Then I should see "Invalid artist"

Scenario: Hit 'Enter' with empty text box
	Given I am on the homepage
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see "Invalid artist"

Scenario: Enter more text into text box (Paramore)
	Given I am on the homepage
	And I fill in "Enter an artist" with "Pa"
	And I should not see the suggestion "Paramore" appear
	When I fill in "Enter an artist" with "Param"
	Then I should see the suggestion "Paramore" appear

Scenario: Enter more text into text box (Adele)
	Given I am on the homepage
	And I fill in "Enter an artist" with "Ad"
	And I should not see the suggestion "Adele" appear
	When I fill in "Enter an artist" with "Adel"
	Then I should see the suggestion "Adele" appear

Scenario: Not enough for autofill, hit 'Enter' with invalid artist name (Paramore)
	Given I am on the homepage
	And I fill in "Enter an artist" with "Pa"
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see "Invalid artist"

Scenario: Not enough for autofill, submit with invalid artist name (q)
	Given I am on the homepage
	And I fill in "Enter an artist" with "q"
	When I click "Submit"
	Then I should see "Invalid artist"

Scenario: Valid name, add more text
	Given I am on the homepage
	And I fill in "Enter an artist" with "a"
	When I fill in "Enter an artist" with "ade"
	Then I should see artist suggestions for "Adele"

Scenario: Valid name, no autofill, hit 'Enter' (U2)
	Given I am on the homepage
	And I fill in "Enter an artist" with "U2"
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see a wordcloud

Scenario: Valid name, no autofill, click Submit (U2)
	Given I am on the homepage
	And I fill in "Enter an artist" with "U2"
	When I click "Submit"
	Then I should see a wordcloud

Scenario: Autofill but invalid name, then add text
	Given I am on the homepage
	And I fill in "Enter an artist" with "q"
	When I fill in "Enter an artist" with "quee"
	Then I should see artist suggestions for "Queen"

Scenario: Autofill but invalid name, click on suggestion
	Given I am on the homepage
	And I fill in "Enter an artist" with "adel"
	When I click on the artist suggestion "Adele"
	Then I should see artist suggestions for "Adele"

Scenario: Autofill but invalid name, hit 'Enter'
	Given I am on the homepage
	And I fill in "Enter an artist" with "adel"
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see "Invalid artist"

Scenario: Autofill but invalid name, click Submit
	Given I am on the homepage
	And I fill in "Enter an artist" with "adel"
	When I click "Submit"
	Then I should see "Invalid artist"


