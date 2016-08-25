// Add page title to blog page template
// Genesis does not include the title of the blog page
// and it must be added with a function
// get_title() doesn't really work, but this function will.

// In WordPress is_home() refers to whichever page is the blog index, not the front page.
// If the site is using a static front page, then is_home() will affect the blog index.
// To modify the static front page, you would use is_front_page

// If a blog is set as the HOME page of your site, then it appears that either
// is_home or is_front_page would work, but I prefer to use is_home to remove all doubt as 
// to which page I want the function to affect.

// The genesis_before hook executes immediately after the opening body tag.
// The genesis_before_content hook executes immediately before the content column (outside the #content div) 

add_action( 'genesis_before', 'pss_blog_page_title' ); 
function pss_blog_page_title() {
    if ( is_home() ) {
	
        add_action( 'genesis_before_content', 'pss_show_blog_page_title_text', 2 );
    }
}

// get_the_title(get_option( 'page_for_posts' ) gets the title for the page specified in the settings
// as the page for posts. Using get_the_title() alone only returns the most recent blog post title.
// The page title is then wrapped in h1 tags and given the class of entry-title for styling.

function pss_show_blog_page_title_text() {
    echo '<h1 class="entry-title">' . get_the_title(get_option( 'page_for_posts' ) )  . '</h1>';
}
