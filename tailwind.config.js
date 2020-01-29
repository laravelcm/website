module.exports = {
  theme: {
    extend: {
      colors: {
        brand: {
          100: "#C0EBD2",
          900: "#22543D",
          primary: "#007A5E",
          facebook: "#435F9B",
          twitter: "#55ACEE",
          linkedin: "#007BB5",
          github: "#333",
          laravel: "#FF2D20",
          design: "#FFD039",
          javascript: "#F7DF1E",
          typescript: "#007ACC",
          react: "#53C1DE",
          vue: "#41B883",
          php: "#777BB3",
          feedback: "#FBDAC1",
          docker: "#1D91B4",
          'digital-ocean': "#0080FF",
          'html-css': "#F16529"
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
        '85': '21.25rem',
        '87': '21.75rem',
        '96': '24rem',
        '116': '29rem',
        '120': '30rem',
        '125': '31.25rem',
        '140': '35rem',
        '162': '40.5rem',
      },
      zIndex: {
        '100': '100',
      },
      fontFamily: {
        body: ["Poppins"],
      },
      gradients: theme => ({
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
