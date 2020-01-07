const archiveOrderby = document.getElementById( 'archive-orderby' );
const archiveOrder = document.getElementById( 'archive-order' );

if ( archiveOrderby && archiveOrder ) {

	archiveOrderby.addEventListener( 'change', () => {

		const orderBy = archiveOrderby.options[archiveOrderby.selectedIndex].value;

		if ( 'date' === orderBy ) {
			archiveOrder.value = 'DESC';
		} else {
			archiveOrder.value = 'ASC';
		}

	});

}
