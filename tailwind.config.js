module.exports = {
  theme: {
    extend: {
      colors: {
        dot: "#C4C4C4",

        brand: {
          100: "#C0EBD2",
          900: "#22543D",
          primary: "#007A5E",
          facebook: "#435F9B",
          twitter: "#55ACEE",
          linkedin: "#007BB5",
          github: "#333",
        }
      },
      boxShadow: {
        smooth: '0 2px 20px 0 rgba(0, 0, 0, 0.05)',
        bigger: '0 10px 20px 0 rgba(0, 0, 0, 0.01)',
      },
      spacing: {
        '14': '3.5rem',
        '15': '3.75rem',
        '18': '4.5rem',
        '36': '9rem',
        '45': '11.25rem',
        '58': '14.5rem',
        '59': '14.75rem',
        '62': '15.5rem',
        '87': '21.75rem',
        '116': '29rem',
        '140': '35rem',
      },
      zIndex: {
        '100': '100',
      },
      fontFamily: {
        body: ["Poppins"],
      },
      gradients: theme => ({
        // Array definition (defaults to linear gradients).
        'gradient-white':  ['180deg', "rgba(255,255,255,1)", "rgba(246,249,252,1)"],
        'gradient-green':  ['60deg', theme('colors.brand.primary'), "rgba(5,184,143,1)"],
      }),
    },
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
    fontFamily: ['responsive', 'hover', 'focus'],
    zIndex: ['responsive', 'focus'],
    gradients: ['responsive', 'hover'],
    space: ['responsive']
  },
  plugins: [
    require('tailwindcss-plugins/gradients'),
    function({ addUtilities, theme, e, variants }) {
      const spaceX = Object.fromEntries(
        Object.entries(theme('spacing')).map(([k, v]) => [
          `.${e(`space-x-${k}`)} > * + *`,
          { marginLeft: v }
        ])
      )
      const spaceY = Object.fromEntries(
        Object.entries(theme('spacing')).map(([k, v]) => [
          `.${e(`space-y-${k}`)} > * + *`,
          { marginTop: v }
        ])
      )

      addUtilities({ ...spaceX, ...spaceY }, variants('space'))
    },
  ],
};
