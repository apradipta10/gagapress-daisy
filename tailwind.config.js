/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./**/*.php', './src/**/*.js'],
  theme: {
    extend: {
      container: {
        center: true,
        padding: '1rem',
        screens: {
          sm: '100%',
          md: '100%',
          lg: '768px',
          xl: '1024px',
        },
      },
      colors: {
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            h1: {
              lineHeight: 1.5,
              fontSize: theme('fontSize.3xl'),
              marginBottom: theme('spacing.4'),
            },
            h2: {
              fontSize: theme('fontSize.2xl'), // Atur ukuran font untuk h2
              marginBottom: theme('spacing.4'),
            },
            p: {
              fontSize: theme('fontSize.base'), // Atur ukuran font untuk paragraf
              marginBottom: theme('spacing.4'),
            },
            // Tambahkan elemen lainnya sesuai kebutuhan
          },
        },
      }),
    },
  },
  daisyui: {
    themes: ['light'],
  },
  plugins: [require('@tailwindcss/typography'), require('daisyui')],
};
