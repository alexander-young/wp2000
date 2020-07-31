module.exports = {
	purge: [
		'./**/*.php',
		'./assets/src/**/*.js'
	],
	theme: {
		extend: {
			inset: {
				'-16': '-4rem'
			},
			colors: {
				primary: {
					light: '#f29544',
					default: '#F4821E',
					dark: '#d66400'
				}
			},
			fontFamily: {
				'display': 'Lato, sans-serif',
				'body': 'Lato, sans-serif'
			}
		},
		typography: (theme) => ({
			default: {
				css: {
					a: {
						color: theme('colors.primary.default'),
					},
					h2: {
						color: theme('colors.gray.700'),
					},
					h3: {
						color: theme('colors.gray.700'),
					},
					h4: {
						color: theme('colors.gray.700'),
					},
				}
			}
		})
	},
	plugins: [
		require('@tailwindcss/typography')
	]
};
