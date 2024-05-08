/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        softblack: '#333333',
        charcoalgray: '#484848',
        dustyblue: '#6c7a89',
        warmbeige: '#DAD2C3',
        whisperwhite: '#f5f5f5',
        background: "#D8D8D8",
        beige: '#FAEDDD',
        mygray: "#333333",
      },
      boxShadow: {
        customshadow: '0px 0px 26px 0px rgba(0, 0, 0, 0.8)',
      },
      animation: {
        'spin-fast': 'spin 1s linear infinite',
      },
      fontSize: {
        sm: '0.8rem',
        base: '1rem',
        xl: '1.25rem',
        '2xl': '1.563rem',
        '3xl': '1.953rem',
        '4xl': '2.441rem',
        '5xl': '3.052rem',
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}
