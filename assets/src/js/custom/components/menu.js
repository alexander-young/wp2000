const Menu = () => {

	const menuToggle = document.querySelector( '.menu-toggle' );
	const mainMenu = document.querySelector( '.main-menu' );

	if(menuToggle && mainMenu){

	menuToggle.addEventListener( 'click', ( e ) => {
		e.preventDefault();

		mainMenu.classList.toggle( 'mobile' );

	});

	}

}

export default Menu;
