Feature: User visits the Lyrics page
	In order to verify that the Lyrics page is functional
	As a user
	I want to complete various actions from the page

Scenario: Back to Song List from Lyrics
	Given that a word cloud has already been generated 
		And the lyrics from the specified song are displayed
	When I click the "Back" button
	Then I should see the Song List page for that word

Scenario: Back to Word Cloud from Lyrics
	Given that a word cloud has already been generated 
		And the lyrics from the specified song are displayed
	When I click the "Back to Cloud" button
	Then I should see the homepage with the original wordcloud