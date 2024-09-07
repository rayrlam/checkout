const plugin = require('tailwindcss/plugin')

module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      // You can add custom theme extensions here
    },
  },
  plugins: [
    require('flowbite/plugin'),
    plugin(function({ addBase, theme }) {
      addBase({
        'ul.list-disc': { 
          margin: 'revert', 
          paddingLeft: 'revert' 
        },
        // You can add more element styles here
      })
    })
  ],
}