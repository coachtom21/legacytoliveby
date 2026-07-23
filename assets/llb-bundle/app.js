(function () {
  "use strict";

  var menu = document.querySelector("#menu");
  var side = document.querySelector("#sidebar");
  var overlay = document.querySelector("#sidebar-overlay");

  function setSidebarOpen(open) {
    if (!side || !menu) {
      return;
    }
    side.classList.toggle("open", open);
    menu.setAttribute("aria-expanded", open ? "true" : "false");
    menu.setAttribute("aria-label", open ? "Close menu" : "Open menu");
    document.body.classList.toggle("llb-sidebar-open", open);

    if (overlay) {
      overlay.hidden = !open;
      overlay.classList.toggle("is-visible", open);
    }
  }

  if (menu && side) {
    menu.addEventListener("click", function () {
      setSidebarOpen(!side.classList.contains("open"));
    });
  }

  if (overlay) {
    overlay.addEventListener("click", function () {
      setSidebarOpen(false);
    });
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && side && side.classList.contains("open")) {
      setSidebarOpen(false);
    }
  });

  if (side) {
    side.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        setSidebarOpen(false);
      });
    });
  }

  document.querySelectorAll(".filters button").forEach(function (b) {
    b.addEventListener("click", function () {
      document.querySelectorAll(".filters button").forEach(function (x) {
        x.classList.remove("selected");
      });
      b.classList.add("selected");
      document.querySelectorAll(".resource").forEach(function (r) {
        r.hidden = b.dataset.filter !== "all" && r.dataset.type !== b.dataset.filter;
      });
    });
  });

  document.querySelectorAll(".pentagon-branches button").forEach(function (b) {
    b.addEventListener("click", function () {
      document.querySelectorAll(".pentagon-branches button").forEach(function (x) {
        x.classList.remove("selected");
      });
      b.classList.add("selected");
      var hidden = document.querySelector("#pentagon-branch-value");
      if (hidden) {
        hidden.value = b.dataset.branch;
      }
    });
  });
})();
