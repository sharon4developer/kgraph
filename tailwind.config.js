/** @type {import('tailwindcss').Config} */
export default {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            'black-semi': '#000000bd',
        },
        borderOpacity: {
            '15': '0.15', // Example: 15% opacity
            '85': '0.85', // Example: 85% opacity
        },
        translate: {
            '-42p': '-42%',
        },
        backgroundImage: {
          'custom-gradient': 'linear-gradient(270deg, #000000 0%, rgba(0, 0, 0, 0) 100%)',
        },
      },
    },
    plugins: [],
  }
