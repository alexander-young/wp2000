const sortForm = document.getElementById( 'floorplan_sorting' );

if ( null !== sortForm ) {

	sortForm.addEventListener( 'change', e => {

		const target = e.currentTarget;
		const orderby =  target.options[target.selectedIndex].value;
		const query = new URLSearchParams( window.location.search );

		query.delete( 'orderby' );
		query.delete( 'order' );

		if ( 'title' === orderby ) {
			query.set( 'orderby', 'title' );
			query.set( 'order', 'ASC' );
		} else {
			query.set( 'orderby', 'date' );
			query.set( 'order', 'DESC' );
		}
		window.location.href = '?' + query.toString();

	});
}
