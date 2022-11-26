/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./public/**/*.{html,js,php}'],
  theme: {
    extend: {
      fontFamily: {
        archivo: ['Archivo'],
      },
      boxShadow: {
        btn: '0 4px rgba(0, 0, 0, 0.3)',
        'btn-lg': '0 6px rgba(0, 0, 0, 0.3)',
      },
    },
  },
  plugins: [require('daisyui')],
};
