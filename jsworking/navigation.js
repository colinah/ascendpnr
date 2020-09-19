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
