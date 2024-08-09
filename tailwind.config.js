module.exports = {
  content: [
    './*.php',
    './**/*.php' ,
    './src/js/**/*.js' ,
    './**/*.twig' ,
    './views/**/*.twig' ,
    './views/templates/*.twig' ,
    './views/modules/*.twig' 
  ],
  safelist: [
    'grid-cols-2',
    'grid-cols-3',
    'grid-cols-4',
    'grid-cols-5',
    'grid-cols-6',
    'md:grid-cols-2',
    'md:grid-cols-3',
    'md:grid-cols-4',
    'md:grid-cols-5',
    'md:grid-cols-6',
    'lg:grid-cols-2',
    'lg:grid-cols-3',
    'lg:grid-cols-4',
    'lg:grid-cols-5',
    'lg:grid-cols-6',
    'max-w-screen-xl',
    'max-w-7xl',
    'max-w-screen-lg',
  ],
  theme: {
    extend: {
      maxWidth: {
        '1440': '90rem',
        '1384':'86.5rem',
        '330': '20.625rem'
      },
      maxHeight: {
        '200': '12.5rem'
      },
      colors: {
        black: "#000000",
        white: {
          100: "#FFFFFF",
          99: "#FFFBFF"
        },
        
        brown: {
          800: "#291808",
          750: "#412C1B",
          700: "#59422F",
          650: "#735945",
          600: "#8D725C",
          550: "#A98B74",
          500: "#C5A58D",
          450: "#E1C0A7",
          400: "#FFDCC2",
          350: "#FFEDE2"
        },
        red: {
          800: "#410002",
          750: "#690005",
          700: "#93000A",
          650: "#BA1A1A",
          600: "#DE3730",
          550: "#FF5449",
          500: "#FF897D",
          450: "#FFB4AB",
          400: "#FFDAD6",
          350: "#FFEDEA"
        },
        grey: {
          800: "#1D1B1A",
          750: "#32302E",
          700: "#494645",
          650: "#615E5C",
          600: "#7A7674",
          550: "#94908E",
          500: "#AFAAA8",
          450: "#CBC5C3",
          400: "#E7E1DF",
          350: "#F6EFED",
          300: "#51606F"
        },
        'neutral-variant': {
          800: "#1E1B18",
          750: "#34302D",
          700: "#4B4643",
          650: "#635D5A",
          600: "#7C7672",
          550: "#968F8C",
          500: "#B1AAA6",
          450: "#CDC5C1",
          400: "#E9E1DD",
          350: "#F8EFEB"
        },
        light: {
          p40: "#88511D",
          p30: "#745944",
          p10: "#2E1500",
          p80: "#FFB77B",
          s30: "#6B3A05",
          n87: "#E7D7CD",
          n98: "#FFF8F5",
          n96: "#FFF1E8",
          n94: "#FBEBE1",
          n92: "#F5E5DB",
          n90: "#EFE0D6",
          n10: "#221A14",
          nv30: "#51443B",
          nv50: "#847469",
          nv80: "#D6C3B6",
          n20: "#382F28",
          n95: "#FEEEE4",
          hover: "#ECEEF3"
        },
        dark: {
          p80: "#FFBD86",
          p20: "#4C2700",
          p30: "#6B3A05",
          p90: "#FFDCC2",
          p10: "#2E1500",
          e80: "#690005",
          s30: "#6B3A05",
          n6: "#19120C",
          n24: "#413731",
          n4: "#140D08",
          n10: "#221A14",
          n12: "#261E18",
          n17: "#312822",
          n22: "#3C332C",
          n90: "#EFE0D6",
          nv80: "#D6C3B6",
          nv60: "#9E8E82",
          nv30: "#51443B",
          n20: "#382F28",
          n30: "#292524"
        },
        blue: {
          800: "#001D33",
          750: "#003353",
          700: "#0E4A73",
          650: "#2F628C",
          600: "#4A7BA7",
          550: "#6595C2",
          500: "#80B0DE",
          450: "#9BCBFB",
          400: "#CEE5FF",
          350: "#E8F2FF",
          300: "#009696"
        },
        green: {
          800: "#062100",
          750: "#163808",
          700: "#2C4F1D",
          650: "#436833",
          600: "#5B8149",
          550: "#749B60",
          500: "#8EB679",
          450: "#A8D292",
          400: "#C4EFAC",
          350: "#D2FDB9"
        }
      },
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
      },
      fontSize: {
        '45': '2.8125rem',
        '32': '2rem',
        '14': '0.875rem'
      },
      spacing: {
        '166': '10.375rem',  
        '666': '41.625rem',      
        '215': '13.4375rem', 
        '67' : '4.1875rem',
        '681': '42.5625rem',
        '40': '2.5rem', 
        '67': '4.1875rem',
        '260': '16.25rem',
        '339': '21.1875rem',
        '72': '4.5rem',
        '10-': '-0.625rem'
      },
        lineHeight: {
        none: 1,
        tight: 1.25,
        snug: 1.375,
        normal: 1.5,
        relaxed: 1.625,
        loose: 2, 
        '40': '2.5rem',
        '52': '3.25rem',
        '24': '1.5rem',
        '32': '2rem',
        '20': '1.25rem'
      },
      letterSpacing: {
        tighter: '-0.05em',
        tight: '-0.025em',
        normal: '0em',
        wide: '0.025em',
        wider: '0.05em',
        widest: '0.1em',
        '0.5': '0.03125rem',
        '0.25': '0.016rem'
      },
      width: {
        '311': '19.4375rem',  
        '599': '37.4375rem',
        '681': '42.5625rem',
        '614': '38.375rem',
        '520': '32.5rem',
        '343': '21.438rem',
        '121': '7.563rem',
        '330': '20.625rem',
        '280':'17.5rem',
        '30': '1.875rem',
        '27': '1.688rem'
      },
      height: {
        '376': '23.5rem',    
        '587': '36.6875rem',   
        '88': '5.5rem',
        '412': '25.75rem',
        '212': '13.25rem',
        '200': '12.5rem',
        '220': '13.75rem',
        '30': '1.875rem',
        '150': '9.375rem',
        '500': '31.25rem',
        '450': '28.125rem'
      },
      borderRadius: {
        '20': '1.25rem',      
        '32': '2rem',
        '16': '1rem',
        '40': '2.5rem'
      }
    },
  },
};
