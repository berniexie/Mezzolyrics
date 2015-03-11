Feature: User visits the Song List page
	In order to verify that the Song List page is functional
	As a user
	I want to complete various actions from the page

Scenario: Song title is clicked
	Given that the Song List page is on display
		And the songs and frequencies for specified word are displayed
	When the user clicks on a song title in the Song List
	Then the display should change to the lyrics page for that song

Scenario: Back to Cloud from Song List
	Given that a word cloud has already been generated
		And the Song List page is on display
		And the songs and frequencies for the specified word are displayed
	When the user clicks the 'Back' button on the application
	Then the display should change back to the homepage with the word cloud