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
          primary: {
            DEFAULT: '#1e40af', // dark blue for navbar
          },
          secondary: {
            DEFAULT: '#ca8a04', // yellow for buttons
          }
        }
      },
    },
    plugins: [],
  }