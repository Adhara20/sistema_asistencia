document.addEventListener("DOMContentLoaded", () => {
  const appLayout = document.querySelector(".app-layout");
  const toggleButton = document.querySelector("#sidebar-toggle");
  const sidebarTop = document.querySelector("#sidebar-logo-trigger");

  const toggleSidebar = () => {
    appLayout.classList.toggle("sidebar-collapsed");
  };

  if (toggleButton) {
    toggleButton.addEventListener("click", (e) => {
      e.stopPropagation();
      toggleSidebar();
    });
  }

  // Permitir abrir haciendo clic en la zona del logo si está colapsado
  if (sidebarTop) {
    sidebarTop.addEventListener("click", () => {
      if (appLayout.classList.contains("sidebar-collapsed")) {
        toggleSidebar();
      }
    });
  }
});
