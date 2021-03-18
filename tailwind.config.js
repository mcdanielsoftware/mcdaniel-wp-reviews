module.exports = {
  purge: {
    content: ['./*.html'],

    options: {
      safelist: ['hidden'],
      blocklist: [/^debug-/],
      keyframes: true,
      fontFace: true,
    },
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
