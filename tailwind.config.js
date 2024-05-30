/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './src/**/*.{html,js,jsx,ts,tsx,php}',
    './*.{html,js,jsx,ts,tsx,php}',
    './**/*.{html,js,jsx,ts,tsx,php}',
    './wp-content/themes/travel-explore/**/*.php'
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
