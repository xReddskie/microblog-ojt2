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
        softblack: '#333333',
        charcoalgray: '#484848',
        dustyblue: '#6c7a89',
        warmbeige: '#DAD2C3',
        whisperwhite: '#f5f5f5',
        beige: '#FAEDDD',
      },
      boxShadow: {
        customshadow: '0px 0px 26px 0px rgba(0, 0, 0, 0.8)',
      },
    },
  },
  plugins: [],
}
