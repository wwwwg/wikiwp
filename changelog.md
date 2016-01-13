# Changelog

## 1.8.2

### Bug fixes

+ Removed unused text domain *label* from search form localization
+ Fixed problem with wrong assigned post comments

## 1.8.1

### Bug fixes

+ Fixed localization files + add Protuguese Brasil (pt_BR) language file - thanks to Mauro Mascarenhas
+ Fixed link style in custom navigation sidebar
+ Fixed mobile menu and sidebar button overflow hidden on Safari (Mac OSX & iOS)

## 1.8

### Bug fixes

+ All search results are shown as post meta in sidebar
+ New style for form input field for uploading files

### Enhancements

+ Ported readme.txt to Markdown
+ Ported license.txt to Markdown and moved license text from readme.md to this file
+ New link colors
+ Cleaner button styles
+ Cleaner styles for buttons and input highlighting on focus
+ Optimized style for default search widget
+ Optimized, cleaner typo
+ Blue color for button :hover
+ Set input field width to 100% in navigation custom sidebar
+ Removed background color and border from images
+ Code cleaning (removed closing php tags from all template files)
+ Better sidebar handling
+ Nested list with multiple lines
+ Order posts the way you want to
+ Sticky post support
+ Better semantic HTML5 structure

## 1.7

### Bug fixes

+ Headings in widgets have a negative indentation left and are cut off
+ Renamed "Primary Menu" with "Primary" and "Meta Menu" with "Meta" to avoid confusion
+ Removed extra decelerated font family for navigation
+ The footer has not the same width of the content
+ The footer sidebar columns are not set so widgets will float not the way they should
+ Footer search form widget optimized
+ Some HTML semantic issues

### Enhancements

+ Removed headline indent and underline h2 for better readability 
+ Ordered news and category excerpt by last modified
+ Removed post pagination for category "Wiki"
+ Better highlighting for current menu item (3rd level support)
+ Changed readme.txt to Markdown

## 1.6.2

+ Bug fix: renamed localization file into wikiwp.pot
+ Bug fix: not defined function for displaying category description only if it exists

## 1.6.1

+ Bug fix: Custom background support wrong function name
+ Bug fix: Removed multiple credit links in footer

## 1.6

+ Custom header support + theme tag "custom-header"
+ Custom background support (color and image) + theme tag "custom-background"
+ New screenshot
+ New styles for select boxes
+ New theme tags "responsive-layout", "right-sidebar", "featured-images" and "custom-menu"
+ Added border for images without caption and for thumbnails in excerpt
+ Optimized blog title and description if no logo image is set
+ Optimized navigation and sidebar for small device height (overflow scroll)
+ Optimized archives widget for navigation sidebar
+ Optimized script loading -> removed the jQuery enqueue because it's already being loaded with an array within the function script enqueue
+ Code cleaning and documentation for JavaScript 
+ Separated stylesheets for better child theme handling
+ New styles for active navigation link
+ Changed copyright in footer
+ Bug fix: Fixed problems with default and meta navigation on devices larger 1200px
+ Bug fix: header crashed on page reload for devices > 1200px
+ Bug fix: wiki page template shows default sidebar
+ Bug fix: removed multiple credit links from footer

### 1.5.1

+ Custom header support
+ Custom background support (color and image)
+ New screenshot
+ New styles for select boxes
+ New theme tags "responsive-layout", "right-sidebar", "featured-images" and "custom-menu"
+ Added border for images without caption and for thumbnails in excerpt
+ Optimized navigation and sidebar for small device height (overflow scroll)
+ Optimized archives widget for navigation sidebar
+ Optimized script loading -> removed the jQuery enqueue because it's already being loaded with an array within the function script enqueue
+ Code cleaning and documentation for JavaScript 
+ New styles for active navigation link
+ Changed copyright in footer
+ Bug fix: Fixed problems with default and meta navigation on devices larger 1200px
+ Bug fix: header crashed on page reload for devices > 1200px
+ Bug fix: wiki page template shows default sidebar

### 1.5.06

+ Removed accents on media upload
+ New mobile navigation icons
+ Optimised functions script

### 1.5.05

+ Tested up to WordPress 4.4.1
+ Added dynamic sidebar to navigation
+ Added small device support (320px - 480px) for navigation and sidebar
+ Bug fix: margin top to cat title for first excerpt

### 1.5.04

+ Optimised sidebar and navigation for responsive view > 480px

### 1.5.03

+ Added fallback for custom menu (main menu)
+ Added meta menu with empty fallback
+ Fixed menu and sidebar with overflow scroll when opened on mobile view
+ Bug fix: optimised header, navigation and sidebar for logged in users which have activated admin bar

### 1.5.02
+ Added new media query brake point for devices larger then 1920px
+ Bug fix: optimised input text fields width for full responsive view
+ Bug fix: optimised Search input field width in the header for full responsive view
+ Bug fix: fixed problem for content width on open sidebar for mobile devices larger then 768 px
+ Bug fix: post info has been floating by images with position left at the end of post or page content

### 1.5.0

+ Show tagline beneath the logo/blog name and front page title if it exists
+ Added wiki page template
+ New post excerpt
+ New styles for buttons
+ New styles for Forms
+ New styles for iframes: max width is set to 100%
+ Sidebar navigation highlights current status
+ Added hyphens support for content
+ Updated text for custom logo update in dashboard
+ Updated translation dummy file
+ Updated german translation
+ Plugin support: Now supporting "Table of Contents Plus" and it's different presentations with optimized styles for WikiWP
+ Plugin support: Now supporting "Contact form 7"
+ Bug fix: list style was not removed for custom menu in sidebar
+ Bug fix: multiple border have been shown for custom menu in sidebar
+ Bug fix: no hover effect for visited links
+ Bug fix: no visited status for pagination links
+ Bug fix: to much padding for no linked images with captions
+ Code cleaning
+ Updated code documentation

### 1.4.7

+ Tested up to WordPress 4.0.1
+ New RSS icon in footer
+ Show blog name if no custom logo is set
+ Bug fix: Gallery items didn't float

### 1.4.6

+ New logo
+ Supporting comments for pages
+ Added Styling for comments pagination
+ Removed meta and OG tags from header (plugin territory)
+ New words for translation dummy file: 
    + "Page not found" (Located in 404 error template)
+ Bug fix: 404 page title had to much padding to the top
+ Bug fix: heading 4 was smaller than heading 5
+ Bug fix: Functions should not be nested within wikiwp_s_setup
+ Bug fix: Date and author not shown in post meta box
+ Bug fix: Title attr. of related post link in post meta & post info has shown the excerpt
+ Bug fix: Header search form was cut in webkit browser

### 1.4.5

+ Bug fix: Removed Whitespace at the end of comments.php
+ Bug fix: Removed text domain from header.php (duplicate of text domain in functions.php)
+ Bug fix: Using get_serch_form in header.php instead of custom form and added custom searchform.php (for localisation)
+ Bug fix: Removed SEO meta elements in head
+ Bug fix: Image with caption was smaller than image of same size without caption
+ Bug fix: Added padding to post navigation because of problems with titles which are too long for floating

### 1.4.4

+ function "_s_setup" should be prefixed with the theme slug "wikiwp_setup"
+ load_theme_textdomain should use the theme slug
+ function "new_excerpt_more" should be prefixed with the theme slug
+ "?>" should be removed from the end of functions.php (whitespace after can cause issues)
+ Any instances of "theme_name" should changed to your theme slug (i.e. "wikiwp")
+ Added thumbnails to excerpt on category pages

### 1.4.3

+ Optimised title 
+ New styles for numeric and unordered lists
+ Numeric list with nested counters
+ New styles for heading 4 to 6
+ New styles for numeric lists
+ New styles for non floating images
+ New styling for blockquotes
+ New styles for tables
+ New styles for links - using #rebeccapurple for visited links as tribute to Rebecca Alison Meyer, Eric Meyer's
daughter who recently passed away ... (http://lists.w3.org/Archives/Public/www-style/2014Jun/0316.html)
+ Displaying all authors on author page with number of written posts
+ Supporting custom menus - first is the main menu in the sidebar under the logo
+ Removed blog description from sidebar and set smaller size for the blog title because of long title problems
+ Added blog description to front page
+ Using after_theme_setup hook
+ Added post and page pagination
+ New words for translation dummy file:
    + "Search" (Located in header > main search form)
    + "Sections" (Located in pagination for posts and pages)
    + Updated german translation
+ Bug fix: Text in pre tags (code) is now wrapping
+ Bug fix: Headings had different negative text indent
+ Bug fix: Headings 4 to 6 had no negative text indent
+ Bug fix: Image with align center was behaving like an non floating image
+ Bug fix: Wide image not sized properly
+ Bug fix: Logo was partially obscured when wp menu is visible (while user is logged in)
+ Bug fix: Added Comments styling for comments reply level tree deeper than 2
+ Bug fix: Added translation for date ("on") in post info

### 1.4.2

+ Bug fix: Replaced old theme screenshot

### 1.4.1

+ Changed style because it was to close to the look and feel of Wikipedia (WordPress.org theme requirements)
+ Added thumbnail support (default: 100x100, 150x150, 300x300, 640x640 and full size)
+ Added post meta information for articles and post meta with further information for the Category "Wiki"
+ Added author template including a list of all authors, who have written posts for the website
+ Styled Comments
+ New words for translation dummy file:
    + "read more" (Located in post excerpt)
    + "Last posts" (Located beneath single post)
    + "Other posts" (Located in post info beneath single post)
+ Updated german translation

+ Bug fix: the welcome title was shown in a few templates (tag search, archives etc.) instead of the real title of the page
+ Bug fix: in post info of excerpt a separator for comments was shown, even if there where no comments opened
+ Bug fix: Fixed broken comment number. The number of comments was always 0, even if the post had comments

### 1.4.0

+ Localised theme (multi language support)
+ Added translation dummy file "translate-in-your-language.po" with the following Words:
  - "Add post" (Located in header for logged in users next to main search form)
  - "Author" (Located in post info for home post excerpt, posts and search results)
  - "Categories" (Located in post info for home post excerpt, posts and search results)
  - "Comment" (Located in post info for home post excerpt, posts and search results)
  - "Comments"(Located in post info for home post excerpt, posts and search results)
  - "edit" (Located in post info for home post excerpt, posts, pages and search results)
  - "Logo" (Located in dashboard > Appearance > Customize for choosing your own logo file)
  - "Newer entries" (Located in home)
  - "Older entries" (Located in home)
  - "Replace the default WikiWP logo with your own brand." (Located in dashboard > Appearance > Customize for choosing your own logo file)
  - "results found for %s" (Located in search page title)
  - "Set your own logo (Located in dashboard > Appearance > Customize for choosing your own logo file)
  - "Tags" (Located in post info for home post excerpt, posts, pages and search results)
  - "So empty here ... leave a comment!" (Located in single posts over comments form if no comments where left so far)
  - "By" (Located in post info for home post excerpt and search results)
  - "on" (Located in post info for home post excerpt and search results)
+ Added German translation
+ Code cleaning
+ PHP request optimization
+ Optimized 404 Template
+ New styles for sidebar navigation
+ New styles for image alignment and capiton
+ Added search form in header
+ Added "Add post" button next to the main search form in header for logged in users
+ Updated german translation
+ New theme tags:
  - translation-ready
  - full-width-template 
+ Added category description support for category template
+ Added other post navigation to post info
+ Added related posts (by most shared tags) to post info
+ New Button style
+ Show comment form only if comments are opened
+ Request users to leave a comment, if comments are opened but there are no comment so far ("So empty here ... leave a comment!")

### 1.3

+ Theme update for upload requirements to the official theme repository
+ Requires WordPress 3+
+ HTML validation
+ Code cleaning
+ PHP request optimization
+ Added more code documentation
+ New logo + alt text for logo image
+ Prepared header for dynamic sidebar
+ Updated post info
+ New look depending on Wikipedia
+ New colors 

### 1.2
+ Tested up to WordPress 3.9.1
+ New header and meta data
+ Optimized Stylesheet loading
+ New link color
+ First HTML5 tags
+ Optimized footer
+ Optimized Sidebar