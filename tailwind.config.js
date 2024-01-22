import preset from "./vendor/filament/support/tailwind.config.preset";
import defaultTheme from "tailwindcss/defaultTheme";

export default {
    presets: [preset, require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["DM Sans", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
