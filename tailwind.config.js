/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './node_modules/flowbite/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#EA8F02',
        secondary: '#FFF4D1',
      },
    },
  },
  plugins: [require('flowbite/plugin')],
}
