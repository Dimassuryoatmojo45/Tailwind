import defaultTheme from 'tailwindcss/defaultTheme'
import forms from '@tailwindcss/forms'

/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'class',
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['var(--font-outfit)', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        current: 'var(--color-current)',
        transparent: 'var(--color-transparent)',
        white: 'var(--color-white)',
        black: 'var(--color-black)',

        brand: {
          50:  '#ecf3ff',
          100: '#dde9ff',
          200: '#c2d6ff',
          300: '#9cb9ff',
          400: '#7592ff',
          500: '#465fff',
          600: '#3641f5',
          700: '#2a31d8',
          800: '#252dae',
          900: '#262e89',
          950: '#161950',
        },

        'blue-light': {
          25: 'var(--color-blue-light-25)',
          50: 'var(--color-blue-light-50)',
          100: 'var(--color-blue-light-100)',
          200: 'var(--color-blue-light-200)',
          300: 'var(--color-blue-light-300)',
          400: 'var(--color-blue-light-400)',
          500: 'var(--color-blue-light-500)',
          600: 'var(--color-blue-light-600)',
          700: 'var(--color-blue-light-700)',
          800: 'var(--color-blue-light-800)',
          900: 'var(--color-blue-light-900)',
          950: 'var(--color-blue-light-950)',
        },

        gray: {
          25: 'var(--color-gray-25)',
          50: 'var(--color-gray-50)',
          100: 'var(--color-gray-100)',
          200: 'var(--color-gray-200)',
          300: 'var(--color-gray-300)',
          400: 'var(--color-gray-400)',
          500: 'var(--color-gray-500)',
          600: 'var(--color-gray-600)',
          700: 'var(--color-gray-700)',
          800: 'var(--color-gray-800)',
          900: 'var(--color-gray-900)',
          950: 'var(--color-gray-950)',
          dark: 'var(--color-gray-dark)',
        },

        orange: {
          25: 'var(--color-orange-25)',
          50: 'var(--color-orange-50)',
          100: 'var(--color-orange-100)',
          200: 'var(--color-orange-200)',
          300: 'var(--color-orange-300)',
          400: 'var(--color-orange-400)',
          500: 'var(--color-orange-500)',
          600: 'var(--color-orange-600)',
          700: 'var(--color-orange-700)',
          800: 'var(--color-orange-800)',
          900: 'var(--color-orange-900)',
          950: 'var(--color-orange-950)',
        },

        success: {
          25: 'var(--color-success-25)',
          50: 'var(--color-success-50)',
          100: 'var(--color-success-100)',
          200: 'var(--color-success-200)',
          300: 'var(--color-success-300)',
          400: 'var(--color-success-400)',
          500: 'var(--color-success-500)',
          600: 'var(--color-success-600)',
          700: 'var(--color-success-700)',
          800: 'var(--color-success-800)',
          900: 'var(--color-success-900)',
          950: 'var(--color-success-950)',
        },

        error: {
          25: 'var(--color-error-25)',
          50: 'var(--color-error-50)',
          100: 'var(--color-error-100)',
          200: 'var(--color-error-200)',
          300: 'var(--color-error-300)',
          400: 'var(--color-error-400)',
          500: 'var(--color-error-500)',
          600: 'var(--color-error-600)',
          700: 'var(--color-error-700)',
          800: 'var(--color-error-800)',
          900: 'var(--color-error-900)',
          950: 'var(--color-error-950)',
        },

        warning: {
          25: 'var(--color-warning-25)',
          50: 'var(--color-warning-50)',
          100: 'var(--color-warning-100)',
          200: 'var(--color-warning-200)',
          300: 'var(--color-warning-300)',
          400: 'var(--color-warning-400)',
          500: 'var(--color-warning-500)',
          600: 'var(--color-warning-600)',
          700: 'var(--color-warning-700)',
          800: 'var(--color-warning-800)',
          900: 'var(--color-warning-900)',
          950: 'var(--color-warning-950)',
        },

        pink: {
          500: 'var(--color-theme-pink-500)',
        },

        purple: {
          500: 'var(--color-theme-purple-500)',
        },
      },

      boxShadow: {
        'theme-xs': 'var(--shadow-theme-xs)',
        'theme-sm': 'var(--shadow-theme-sm)',
        'theme-md': 'var(--shadow-theme-md)',
        'theme-lg': 'var(--shadow-theme-lg)',
        'theme-xl': 'var(--shadow-theme-xl)',
        'datepicker': 'var(--shadow-datepicker)',
        'focus-ring': 'var(--shadow-focus-ring)',
        'slider-navigation': 'var(--shadow-slider-navigation)',
        'tooltip': 'var(--shadow-tooltip)',
        '4xl': 'var(--drop-shadow-4xl)',
      },

      zIndex: {
        1: 'var(--z-index-1)',
        9: 'var(--z-index-9)',
        99: 'var(--z-index-99)',
        999: 'var(--z-index-999)',
        9999: 'var(--z-index-9999)',
        99999: 'var(--z-index-99999)',
        999999: 'var(--z-index-999999)',
      },

      fontSize: {
        'title-2xl': ['var(--text-title-2xl)', { lineHeight: 'var(--text-title-2xl--line-height)' }],
        'title-xl': ['var(--text-title-xl)', { lineHeight: 'var(--text-title-xl--line-height)' }],
        'title-lg': ['var(--text-title-lg)', { lineHeight: 'var(--text-title-lg--line-height)' }],
        'title-md': ['var(--text-title-md)', { lineHeight: 'var(--text-title-md--line-height)' }],
        'title-sm': ['var(--text-title-sm)', { lineHeight: 'var(--text-title-sm--line-height)' }],
        'theme-xl': ['var(--text-theme-xl)', { lineHeight: 'var(--text-theme-xl--line-height)' }],
        'theme-sm': ['var(--text-theme-sm)', { lineHeight: 'var(--text-theme-sm--line-height)' }],
        'theme-xs': ['var(--text-theme-xs)', { lineHeight: 'var(--text-theme-xs--line-height)' }],
      },
    },
  },

  plugins: [forms],
}
