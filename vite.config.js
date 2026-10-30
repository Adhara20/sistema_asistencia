import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [tailwindcss()],
  root: "./",
  build: {
    outDir: "public/build",
    manifest: true,
    rollupOptions: {
      input: "resources/js/app.js",
    },
  },
});
