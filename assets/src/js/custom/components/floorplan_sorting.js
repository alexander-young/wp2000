const sortForm = document.getElementById( 'floorplan_sorting' );
const archiveLoop = document.getElementById( 'floorplan_archive_loop' );


sortForm.addEventListener( 'change', e => {
	const target = e.currentTarget;
	const orderby =  target.options[target.selectedIndex].value;

	fetch( `/api/floorplan_sorting/${orderby}` ).then( response => {

		response.json().then( HTML => {

			if ( HTML ) {
				archiveLoop.innerHTML = HTML;
			}

		});

	});


});
