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
  should have_content artist
  #find artist
end

When(/^I click "(.*?)"$/) do |button_name|
  click_button button_name
end

When(/^I hit the 'Enter' key in the "(.*?)" text box$/) do |text_box|
  fill_in text_box, with: (find_field(text_box).value + '\n')
end

Given(/^I should not see the suggestion "(.*?)" appear$/) do |artist|
  should have_no_content artist
end

Then(/^I should see a wordcloud$/) do
  expect(page).to have_css('a', count: 251) # 250 word links and another for another purpose
  #find('a', :count => 251)
  #page.should have_css("div.cloud a", :count => 250)
end

Then(/^I should see artist suggestions for "(.*?)"$/) do |artist|
  should have_content artist
end

When(/^I click on the artist suggestion "(.*?)"$/) do |arg1|
  click_on arg1
end


