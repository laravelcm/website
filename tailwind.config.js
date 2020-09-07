const defaultTheme = require('tailwindcss/defaultTheme');
const rgba = require('hex-to-rgba');

module.exports = {
  purge: {
    content: [
      './Themes/backend/views/**/*.blade.php',
      './Modules/Blog/Resources/views/**/*.blade.php',
      './Modules/Tutorial/Resources/views/**/*.blade.php',
      './Modules/Dashboard/Resources/views/**/*.blade.php',
      './Modules/Forum/Resources/views/**/*.blade.php',
      './Modules/Job/Resources/views/**/*.blade.php',
      './Modules/User/Resources/views/**/*.blade.php',
      './resources/views/**/*.blade.php',
      './resources/assets/ts/**/*.ts',
      './resources/assets/ts/**/*.tsx',
    ],
    options: {
      defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
      whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
    },
  },
  theme: {
    extend: {
      colors: {
        brand: {
          100: "#C0EBD2",
          200: "#38A169",
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
          feedback: "#c0916f",
          docker: "#1D91B4",
          'digital-ocean': "#0080FF",
          'html-css': "#F16529",
        },
      },
      boxShadow: (theme) => ({
        smooth: '0 2px 20px 0 rgba(0, 0, 0, 0.05)',
        bigger: '0 10px 20px 0 rgba(0, 0, 0, 0.01)',
        'outline-brand': `0 0 0 3px ${rgba(theme('colors.brand.primary'), 0.45)}`,
      }),
      spacing: {
        18: '4.5rem',
        45: '11.25rem',
        57: '14.25rem',
        58: '14.5rem',
        59: '14.75rem',
        62: '15.5rem',
        85: '21.25rem',
        87: '21.75rem',
        100: '25rem',
        116: '29rem',
        120: '30rem',
        125: '31.25rem',
        140: '35rem',
        162: '40.5rem',
      },
      zIndex: {
        60: '60',
        70: '70',
        80: '80',
        90: '90',
        100: '100',
      },
      inset: {
        '-22': '-5.5rem',
      },
      minHeight: {
        sm: '20rem',
      },
      maxHeight: {
        xs: '20rem',
        sm: '30rem',
        md: '40rem',
        '(screen-16)': 'calc(100vh - 4rem)',
      },
      fontFamily: {
        body: ["Poppins", ...defaultTheme.fontFamily.sans],
      },
      gradients: (theme) => ({
        'gradient-green': ['60deg', theme('colors.brand.primary'), "rgba(5,184,143,1)"],
      }),
    },
    customForms: (theme) => ({
      default: {
        'input, textarea, select, multiselect, checkbox, radio': {
          borderWidth: defaultTheme.borderWidth[2],
          '&:focus': {
            outline: 'none',
            boxShadow: 'none',
            borderColor: theme('colors.brand.primary'),
          },
        },
      },
    }),
    spinner: (theme) => ({
      default: {
        color: theme('colors.brand.primary'), // color you want to make the spinner
        size: '1em', // size of the spinner (used for both width and height)
        border: '2px', // border-width of the spinner (shouldn't be bigger than half the spinner's size)
        speed: '500ms', // the speed at which the spinner should rotate
      },
    }),
  },
  variants: {
    backgroundColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within', 'disabled'],
    textColor: ['responsive', 'hover', 'focus', 'group-hover', 'focus-within'],
    fontFamily: ['responsive', 'hover', 'focus'],
    zIndex: ['responsive', 'focus'],
    gradients: ['responsive', 'hover'],
    spinner: ['responsive'],
  },
  plugins: [
    require('tailwindcss-plugins/gradients'),
    require('@tailwindcss/ui'),
    require('tailwindcss-spinner')(),
  ],
};
