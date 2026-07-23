(function () {
  "use strict";

  var STORAGE_KEY = "hgr_participants_v1";

  function uuidv4() {
    if (window.crypto && crypto.randomUUID) {
      return crypto.randomUUID();
    }
    return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function (c) {
      var r = (Math.random() * 16) | 0;
      var v = c === "x" ? r : (r & 0x3) | 0x8;
      return v.toString(16);
    });
  }

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#39;");
  }

  function normalizePhone(value) {
    return String(value).replace(/\D/g, "");
  }

  function loadParticipants() {
    try {
      var raw = sessionStorage.getItem(STORAGE_KEY);
      return raw ? JSON.parse(raw) : [];
    } catch (e) {
      return [];
    }
  }

  function saveParticipants(list) {
    try {
      sessionStorage.setItem(STORAGE_KEY, JSON.stringify(list));
    } catch (e) {
      // Ignore quota errors in testnet mode.
    }
  }

  var root = document.querySelector(".hgr-page");
  if (!root) {
    return;
  }

  var participants = loadParticipants();
  var tabs = root.querySelectorAll(".hgr-tab[data-tab]");
  var panels = {
    join: root.querySelector("#panel-join"),
    login: root.querySelector("#panel-login"),
  };

  if (tabs.length && panels.join && panels.login) {
    tabs.forEach(function (tab) {
      tab.addEventListener("click", function () {
        tabs.forEach(function (t) {
          t.classList.remove("active");
          t.setAttribute("aria-selected", "false");
        });
        tab.classList.add("active");
        tab.setAttribute("aria-selected", "true");
        Object.keys(panels).forEach(function (k) {
          panels[k].classList.remove("visible");
        });
        panels[tab.getAttribute("data-tab")].classList.add("visible");
      });
    });
  }

  var joinForm = root.querySelector("#form-join");
  if (joinForm) {
    joinForm.addEventListener("submit", function (e) {
      e.preventDefault();
      var name = root.querySelector("#join-name").value.trim();
      var phone = root.querySelector("#join-phone").value.trim();
      var id = uuidv4();
      var participant = {
        id: id,
        name: name,
        phone: phone,
        level: 0,
        stonesClaimed: 0,
      };
      participants.push(participant);
      saveParticipants(participants);
      root.querySelector("#join-result").innerHTML =
        '<div class="hgr-result success">Claim staked. Welcome, ' +
        escapeHtml(name) +
        ".<br>" +
        'Participant ID: <span class="pid">' +
        escapeHtml(id) +
        "</span><br>" +
        "Save this ID — a real deployment would text it to you. " +
        "<code>Level 0 &middot; 0 stones claimed</code></div>";
    });
  }

  var loginForm = root.querySelector("#form-login");
  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      participants = loadParticipants();
      var phone = normalizePhone(root.querySelector("#login-phone").value.trim());
      var id = root.querySelector("#login-id").value.trim();
      var found = participants.find(function (p) {
        return normalizePhone(p.phone || p.email || "") === phone && p.id === id;
      });
      var box = root.querySelector("#login-result");
      if (found) {
        box.innerHTML =
          '<div class="hgr-result success">Welcome back, ' +
          escapeHtml(found.name) +
          ".<br>" +
          "Level " +
          found.level +
          " &middot; " +
          found.stonesClaimed +
          " stones claimed</div>";
      } else {
        box.innerHTML =
          '<div class="hgr-result error">No record found in this testnet session. Join first, or check your phone and ID — ' +
          "this demo only remembers participants added in this browser session.</div>";
      }
    });
  }
})();
