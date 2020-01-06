const sortForm = document.getElementById( 'floorplan_sorting' );

if ( sortForm ) {

	sortForm.addEventListener( 'submit', e => {

		e.preventDefault();

		const homeTypes = sortForm.querySelectorAll( 'input[name="home_type[]"]:checked' );
		const query = new URLSearchParams( window.location.search );

		let orderBy = sortForm.querySelector( 'select' );
		orderBy = orderBy.options[orderBy.selectedIndex].value;

		query.delete( 'orderby' );
		query.delete( 'order' );
		query.delete( 'home_type[]' );

		if ( 'title' === orderBy ) {
			query.set( 'orderby', 'title' );
			query.set( 'order', 'ASC' );
		} else {
			query.set( 'orderby', 'date' );
			query.set( 'order', 'DESC' );
		}

		homeTypes.forEach( type => {
			query.append( 'home_type[]', type.value );
		});

		const urlParams = query.toString();

		if ( 0 < urlParams.length ) {
			window.location.href = '/floorplans/?' + query.toString();
		} else {
			window.location.href = '/floorplans/';
		}


	});

}
