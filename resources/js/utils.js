import resolveConfig from "tailwindcss/resolveConfig";

export const tailwindConfig = () => {
    // Tailwind config
    return resolveConfig("./tailwind.config.js");
};

export const hexToRGB = (h) => {
    let r = 0;
    let g = 0;
    let b = 0;
    if (h.length === 4) {
        r = `0x${h[1]}${h[1]}`;
        g = `0x${h[2]}${h[2]}`;
        b = `0x${h[3]}${h[3]}`;
    } else if (h.length === 7) {
        r = `0x${h[1]}${h[2]}`;
        g = `0x${h[3]}${h[4]}`;
        b = `0x${h[5]}${h[6]}`;
    }
    return `${+r},${+g},${+b}`;
};

export const formatValue = (value) => {
    // Utiliza Intl.NumberFormat para formatear el valor como número
    const numberFormatter = new Intl.NumberFormat("es-PE", {
        style: "decimal",
        maximumFractionDigits: 2, // Ajusta el número de decimales si es necesario
    });

    // Formatea el valor como número
    const formattedNumber = numberFormatter.format(value);

    // Devuelve el valor formateado con el prefijo "S/"
    return `S/ ${formattedNumber}`;
};

export const formatThousands = (value) =>
    Intl.NumberFormat("en-US", {
        maximumSignificantDigits: 3,
        notation: "compact",
    }).format(value);
