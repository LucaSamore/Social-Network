/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        quicksand: ["Quicksand", "sans-serif"],
        montserrat: ["Montserrat", "sans-serif"],
        lobster: ["Lobster", "cursive"]
      },
      colors: {
        transparent: 'transparent',
        current: 'currentColor',
        'dark-mode-2': '#252526',
        'dark-mode-3': '#2d2d30',
        'dark-mode-4': '#3e3e42',
        'lavanda': '#9795F0',
        'rosy': '#FBC8D4',
        'dark-lavanda': '#8481f0'
      },
    },
  },
  plugins: [require("daisyui")],
}