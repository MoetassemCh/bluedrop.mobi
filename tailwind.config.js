/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.{vue,js,ts,jsx,tsx}",
    "./templates/**/*.{html,twig}",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    screens: {
      sm: "375px",
      md: "820px",
      lg: "1020px",
      xl: "1440px",
    },
    extend: {
      fontFamily: {
        sans: ["Grotesk", "sans-serif"],
      },
    },
  },
  plugins: [require("@tailwindcss/aspect-ratio"), require("flowbite/plugin")],
};
