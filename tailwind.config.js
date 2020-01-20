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
        '116': '29rem',
      },
      zIndex: {
        '100': '100',
      },
      fontFamily: {
        body: ["Poppins"],
      }
    }
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
    fontFamily: ['responsive', 'hover', 'focus'],
    zIndex: ['responsive', 'focus']
  },
  plugins: []
};
