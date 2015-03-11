Feature: User visits the Song List page
	In order to verify that the Song List page is functional
	As a user
	I want to complete various actions from the page

Scenario: Song title is clicked
	Given I am on the Song List page
		And the songs and frequencies for specified word are displayed
	When I click on a song title in the Song List
	Then I should see the lyrics page for that song

Scenario: Back to Cloud from Song List
	Given that a word cloud has already been generated
		And I am on the Song List page
		And the songs and frequencies for the specified word are displayed
	When I click the "Back" button
	Then I should see the homepage with the original wordcloud