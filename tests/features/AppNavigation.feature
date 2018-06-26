@AppNavigation
Feature:
	As a user
	I want to see the main navigation items
	So that I can navigate from one page to another within the application

	#TODO improve this later using this generic regex /<a\s+href=\"([^\"]*)\">(.*)<\/a>/
	#TODO Hide complexity by extracting pattern to Context File
	Scenario: Index page navigation menus as guest
		When I am on the homepage
		Then I should see "Main"
		And page should contain the URL '<a\s+href=\"([^\"]*)\">(\s*main\s*)<\/a>'
		
		Then I should see "Tasks"
		And page should contain the URL '<a\s+href=\"([^\"]*)\">(\s*tasks\s*)<\/a>'
		
		Then I should see "Page404"
		And page should contain the URL '<a\s+href=\"([^\"]*)\">(\s*.*404\s*)<\/a>'
		
		Then I should see "Access-Keys"
		And page should contain the URL '<a\s+href=\"([^\"]*)\">(\s*access-keys\s*)<\/a>'
		
		Then I should see "Settings"
		And page should contain the URL '<a\s+href=\"([^\"]*)\">(\s*settings\s*)<\/a>'
		
		Then I should see "About"
		And page should contain the URL '<a\s+href=\"([^\"]*)\">(\s*about\s*)<\/a>'
		
	
