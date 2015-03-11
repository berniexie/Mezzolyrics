Feature: User visits the Word Cloud page
	In order to verify that the Word Cloud is functional
	As a user
	I want to view the Word Cloud page

Scenario: Submit with empty text box
	Given that a word cloud has already been generated
			And the search bar is empty
	When I click "Submit"
	Then I should see "Invalid artist"

Scenario: Hit 'Enter' with empty text box
	Given that a word cloud has already been generated
			And the search bar is empty
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see "Invalid artist"
	
Scenario: Valid name, no autofill, hit 'Enter' (U2)
	Given that a word cloud has already been generated
	And I fill in "Enter an artist" with "U2"
	When I hit the 'Enter' key in the "Enter an artist" text box
	Then I should see a wordcloud

Scenario: Valid name, no autofill, click Submit (U2)
	Given that a word cloud has already been generated
	And I fill in "Enter an artist" with "U2"
	When I click "Submit"
	Then I should see a wordcloud

Scenario: Type in partial artist name (Adele)
	Given that a word cloud has already been generated
	When I fill in "Enter an artist" with "Adel"
	Then I should see the suggestion "Adele" appear

Scenario: Enter more text into text box (Adele)
	Given that a word cloud has already been generated
	And I fill in "Enter an artist" with "Ad"
	And I should not see the suggestion "Adele" appear
	When I fill in "Enter an artist" with "Adel"
	Then I should see the suggestion "Adele" appear
	
Scenario: 'Add to Cloud' with selected artist
	Given that a word cloud has already been generated
		And a valid artist has been selected
	When the user clicks the 'Add to Cloud' button
	Then a new word cloud is generated with both the previous and the new artist 
	
Scenario: 'Add to Cloud' with empty text box
	Given that a word cloud has already been generated
		And the search bar is empty
	When I click "Add to Cloud"
	Then I should see "Invalid artist"

Scenario: Share to Facebook
	Given that a word cloud has already been generated
	When the user clicks the 'Share' button
	Then the application should open a new window that prompts the user for their Facebook information
	
Scenario: Word is clicked in Word Cloud
		Given that a word cloud has already been generated 
		When the user clicks on a word in the word cloud
		Then the display should change to the Song List page for that word