module.exports = {
  future: {
    // removeDeprecatedGapUtilities: true,
    // purgeLayersByDefault: true,
  },
  purge: [],
  theme: {
    extend: {
        fontFamily: {
            serif: ['Old Standard TT', 'serif'],
            sans: ['din_regular', 'sans-serif'],
            sansBold: ['din_bold', 'sans-serif']
        },
        colors: {
            dg: '#7BA982',
            lg: '#DFEDC5',
            warning: '#C90606',
        }
    },
  },
  variants: {},
  plugins: [],
}
