const archiveOrderby = document.getElementById( 'archive-orderby' );
const archiveOrder = document.getElementById( 'archive-order' );

if ( archiveOrderby && archiveOrder ) {

	archiveOrderby.addEventListener( 'change', () => {

		const orderBy = archiveOrderby.options[archiveOrderby.selectedIndex].value;

		if ( 'title' === orderBy ) {
			archiveOrder.value = 'ASC';
		} else {
			archiveOrder.value = 'DESC';
		}

	});

}
