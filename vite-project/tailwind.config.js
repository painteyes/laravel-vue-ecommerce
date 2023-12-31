/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

export default {
  content: [
    "./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        // serif: [...defaultTheme.fontFamily.serif],
        // mono:[...defaultTheme.fontFamily.mono]
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}

