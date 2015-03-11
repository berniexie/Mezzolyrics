When(/^I enter the URL in a browser$/) do
  visit ui_url ''
end

Then(/^I should see "(.*?)"$/) do |header|
  page.should have_content header
end

Given(/^I am on the homepage$/) do
  visit ui_url ''
end

When(/^I fill in "(.*?)" with "(.*?)"$/) do |element, text|
  fill_in element, with: text
end

Then(/^I should see the suggestion "(.*?)" appear$/) do |artist|
  find artist
end

When(/^I click "(.*?)"$/) do |button_name|
  click_button button_name
end

When(/^I hit the 'Enter' key in the "(.*?)" text box$/) do |text_box|
  fill_in text_box, with: "\n"
end

