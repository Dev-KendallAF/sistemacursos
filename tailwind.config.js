/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  darkMode: 'class', 
  theme: {
    
    extend: {

      colors:
      {
        primary: 'var(--color-primary)',
        secondary: 'var(--color-secondary)'
      },
    },
  },
  plugins: [],
}

