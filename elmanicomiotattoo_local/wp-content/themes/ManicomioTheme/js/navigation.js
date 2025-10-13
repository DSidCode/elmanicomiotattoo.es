( function() {
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation don't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button = siteNavigation.getElementsByTagName( 'button' )[0];

	// Return early if the button don't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[0];

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
        document.body.classList.toggle('mobile-menu-open'); // Bloquea el scroll del body

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
            document.body.classList.remove('mobile-menu-open');
			button.setAttribute( 'aria-expanded', 'false' );
		}
	} );

    // Trap keyboard navigation in the menu modal.
    document.addEventListener( 'keydown', function( event ) {
        if (!document.body.classList.contains('mobile-menu-open')) {
            return;
        }

        const modal = siteNavigation;
        const selectors = 'a, button';
        const elements = modal.querySelectorAll( selectors );
        const firstEl = elements[0];
        const lastEl = elements[elements.length - 1];
        const tabKey = event.keyCode === 9;
        const shiftKey = event.shiftKey;
        const escKey = event.keyCode === 27;

        if ( escKey ) {
            event.preventDefault();
            siteNavigation.classList.remove( 'toggled' );
            document.body.classList.remove('mobile-menu-open');
            button.setAttribute( 'aria-expanded', 'false' );
            button.focus();
        }

        if ( ! shiftKey && tabKey && lastEl === document.activeElement ) {
            event.preventDefault();
            firstEl.focus();
        }

        if ( shiftKey && tabKey && firstEl === document.activeElement ) {
            event.preventDefault();
            lastEl.focus();
        }
    } );

} )();