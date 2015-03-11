Feature: User visits the Lyrics page
	In order to verify that the Lyrics page is functional
	As a user
	I want to complete various actions from the page

Scenario: Back to Song List from Lyrics
	Given that a word cloud has already been generated 
		And the lyrics from the specified song are displayed
	When the user clicks the 'Back' button on the application
	Then the display should change back to the Song List page for that word

Scenario: Back to Word Cloud from Lyrics
	Given that a word cloud has already been generated 
		And the lyrics from the specified song are displayed
	When the user clicks the 'Back to Cloud' button on the application
	Then the display changes to the homepage with the Word Cloud