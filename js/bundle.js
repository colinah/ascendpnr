
const ajaxLoadMore = () => {

    const button = document.querySelector('.load-more');

    if (typeof (button) !== 'undefined' && button !== null) {
        button.addEventListener('click', (e) => {

            let current_page = document.querySelector('.posts-list').dataset.page;
            let max_pages = document.querySelector('.posts-list').dataset.max;

            let params = new URLSearchParams();
            params.append('action', 'load_more_posts');
            params.append('current_page', current_page);
            params.append('max_pages', max_pages);

            axios.post('/wp-admin/admin-ajax.php', params)
                .then(res =>{

                    let posts_lists = document.querySelector('.posts-list');

                    posts_lists.innerHTML += res.data.data;

                    document.querySelector('.posts-list').dataset.page++;

                    if (document.querySelector('.posts-list').dataset.page === document.querySelector('.posts-list').dataset.max) {
                        button.parentNode.removeChild(button);
                    }

                    
                })

        });
    }
}

ajaxLoadMore();


// /* global wp, jQuery */
// /**
//  * File customizer.js.
//  *
//  * Theme Customizer enhancements for a better user experience.
//  *
//  * Contains handlers to make Theme Customizer preview reload changes asynchronously.
//  */

// ( function( $ ) {
// 	// Site title and description.
// 	wp.customize( 'blogname', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-title a' ).text( to );
// 		} );
// 	} );
// 	wp.customize( 'blogdescription', function( value ) {
// 		value.bind( function( to ) {
// 			$( '.site-description' ).text( to );
// 		} );
// 	} );

// 	// Header text color.
// 	wp.customize( 'header_textcolor', function( value ) {
// 		value.bind( function( to ) {
// 			if ( 'blank' === to ) {
// 				$( '.site-title, .site-description' ).css( {
// 					clip: 'rect(1px, 1px, 1px, 1px)',
// 					position: 'absolute',
// 				} );
// 			} else {
// 				$( '.site-title, .site-description' ).css( {
// 					clip: 'auto',
// 					position: 'relative',
// 				} );
// 				$( '.site-title a, .site-description' ).css( {
// 					color: to,
// 				} );
// 			}
// 		} );
// 	} );
// }( jQuery ) );



/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
// My personal functions

// The debounce function receives our function as a parameter
const debounce = (fn) => {

    // This holds the requestAnimationFrame reference, so we can cancel it if we wish
    let frame;
  
    // The debounce function returns a new function that can receive a variable number of arguments
    return (...params) => {
      
      // If the frame variable has been defined, clear it now, and queue for next frame
      if (frame) { 
        cancelAnimationFrame(frame);
      }
  
      // Queue our function call for the next frame
      frame = requestAnimationFrame(() => {
        
        // Call our function and pass any params we received
        fn(...params);
      });
  
    } 
  };
  
  
  // Reads out the scroll position and stores it in the data attribute
  // so we can use it in our stylesheets
  const storeScroll = () => {
    document.documentElement.dataset.scroll = window.scrollY;
  }
  
  // Listen for new scroll events, here we debounce our `storeScroll` function
  document.addEventListener('scroll', debounce(storeScroll), { passive: true });
  
  // Update scroll position for first time
  storeScroll();

const toggleMenuSwitch = document.querySelector('.nav-mobile__toggle');
const toggleMenuSwitchModal = document.querySelector('#nav-mobile__modal-1');

function switchMenu() {
	function updateId(id1,id2) {
		var el = document.getElementById(id1);
		
		if (el) {
		el.id = id2;
		} else {
		el = document.getElementById(id2);
		el.id = id1;
		}
		
		return el;
	}
	updateId('nav-mobile__modal-1','nav-mobile__modal-2');
	updateId('nav-menu-1','nav-menu-2');

}

toggleMenuSwitch.addEventListener('click', switchMenu, false);
toggleMenuSwitchModal.addEventListener('click', switchMenu, false);


const toggleSearchSwitch = document.querySelectorAll('.search-button');
// const toggleSearchSwitch2 = document.querySelector('#search-button2');

function switchSearch() {
	//Change Inned Html and styles
	const el = document.querySelectorAll('.search-button');
	el.forEach( item =>{
		if(item.classList.contains('search-button1')){
			item.classList.add('search-button2');
			item.classList.remove('search-button1');
			item.innerHTML = "X";
		} else {
			item.classList.add('search-button1');
			item.classList.remove('search-button2');
			item.innerHTML = "<i class='fa fa-search search-icon'></i>";
		}
	})
	// Role out/hide search form interface
	const searchEl = document.querySelectorAll('.search-form');
	searchEl.forEach( item => {
		if(item.classList.contains('search-form1')){
			item.classList.add('search-form2');
			item.classList.remove('search-form1');
		} else {
			item.classList.add('search-form1');
			item.classList.remove('search-form2');
		}
	})

}

if(toggleSearchSwitch){
	toggleSearchSwitch
		.forEach(item => {
			item.addEventListener('click', switchSearch, false)
		});
}

const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
		document.documentElement.setAttribute('data-theme', 'dark');
		localStorage.setItem('theme', 'dark');
    }
    else {
		document.documentElement.setAttribute('data-theme', 'light');
		localStorage.setItem('theme', 'light');
	}
	// Darken Images Toggle
	const images = document.querySelectorAll('.image-darken')
	console.log(images);
	images.forEach( item => {
		if(document.querySelector('html').dataset.theme === 'dark'){
			console.log('dark')
			item.classList.add('image-darken__added');
		} else {
			console.log('light')
			item.classList.remove('image-darken__added');
		}
	})
}

toggleSwitch.addEventListener('change', switchTheme, false);

const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
		toggleSwitch.checked = true;
		// Darken Images Toggle
		const images = document.querySelectorAll('.image-darken');
		images.forEach( item => {
				item.classList.add('image-darken__added');
		});
    }
}




 //Underscores Functions
( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		button.style.display = 'none';
		return;
	}

	if ( ! menu.classList.contains( 'nav-menu' ) ) {
		menu.classList.add( 'nav-menu' );
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', function() {
		siteNavigation.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}
	} );

	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {
		const isClickInside = siteNavigation.contains( event.target );

		if ( ! isClickInside ) {
			siteNavigation.classList.remove( 'toggled' );
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	// Toggle focus each time a menu link is focused or blurred.
	for ( const link of links ) {
		link.addEventListener( 'focus', toggleFocus, true );
		link.addEventListener( 'blur', toggleFocus, true );
	}

	// Toggle focus each time a menu link with children receive a touch event.
	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	/**
	 * Sets or removes .focus class on an element.
	 */
	function toggleFocus() {
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( ! self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		
		if ( event.type === 'touchstart' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
}() );

//Photo Banner

var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("photobanner-block");
  var dots = document.getElementsByClassName("demo");
  if(dots.className){
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" photobanner-button__dots-white", "");
    }
    x[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " photobanner-button__dots-white";
  }

}
function updateSearchIdButton(id1,id2) {
	var el = document.getElementById(id1);
	
	if (el) {
    el.id = id2;
    el.innerHTML = "X";
	} else {
	el = document.getElementById(id2);
    el.id = id1;
    el.innerHTML = "<i class='fa fa-search search-icon'></i>";
	}
	
	return el;
}