const menuToggle = document.querySelector( '.menu-toggle' );
const mainMenu = document.querySelector( '.main-menu' );

menuToggle.addEventListener( 'click', ( e ) => {
	e.preventDefault();

	mainMenu.classList.toggle( 'mobile' );

});
