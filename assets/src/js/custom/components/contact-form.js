const ContactForm = () => {

	const contactForm = document.getElementById( 'contact-form' );

	if ( contactForm ) {

		const responseContainer = document.getElementById( 'form-response' );

		contactForm.addEventListener( 'submit',  ( e ) => {
			e.preventDefault();

			responseContainer.style.display = 'none';
			responseContainer.classList.remove( 'bg-red-500', 'bg-green-500' );

			fetch( '/wp-admin/admin-ajax.php?action=send_contact_form', {
				method: 'POST',
				headers: {
					'Content-Type': 'application/x-www-form-urlencoded'
				},
				body: new URLSearchParams( new FormData( contactForm ) )
			}).then( response => {

				return response.json();

			}).then( jsonResponse => {

				if ( jsonResponse.success ) {
					responseContainer.classList.add( 'bg-green-500' );
					responseContainer.innerHTML = 'We have received your message and will be in touch shortly.';
					contactForm.reset();
				} else {
					responseContainer.classList.add( 'bg-red-500' );
					responseContainer.innerHTML = jsonResponse.data.toString();
				}

				responseContainer.style.display = 'block';

			});

		});
	}

}

export default ContactForm;
