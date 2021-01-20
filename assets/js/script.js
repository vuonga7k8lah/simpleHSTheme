window.addEventListener("load", function () {
  _toogleNightMode();
  _handleToggleDropdown();
  _newGlideCarousel();
  _toogleWilModal();
  _setBgColorForAvatar();
  //
});

const avatarColors = [
  "#ffdd00",
  "#fbb034",
  "#ff4c4c",
  "#c1d82f",
  "#f48924",
  "#7ac143",
  "#30c39e",
  "#06BCAE",
  "#0695BC",
  "#037ef3",
  "#146eb4",
  "#8e43e7",
  "#ea1d5d",
  "#fc636b",
  "#ff6319",
  "#e01f3d",
  "#a0ac48",
  "#00d1b2",
  "#472f92",
  "#388ed1",
  "#a6192e",
  "#4a8594",
  "#7B9FAB",
  "#1393BD",
  "#5E13BD",
  "#E208A7",
];

function _toogleNightMode() {
  // On page load or when changing themes, best to add inline in `head` to avoid FOUC
  const switchN = document.querySelector("#wil-switch-night-mode");
  const toDark = () => {
    document.querySelector("html").classList.add("dark");
    if (!switchN) return;
    document.querySelector("#wil-switch-night-mode-text").innerHTML = "Light";
    localStorage.theme = "dark";
  };
  const toLight = () => {
    document.querySelector("html").classList.remove("dark");
    if (!switchN) return;
    document.querySelector("#wil-switch-night-mode-text").innerHTML = "Dark";
    localStorage.theme = "light";
  };

  //   Check nightMode from localStore
  if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
      window.matchMedia("(prefers-color-scheme: dark)").matches)
  ) {
    toDark();
  } else {
    toLight();
  }

  if (!switchN) return;
  //   toogle nightMode from swicthNightMode
  switchN.addEventListener("click", function () {
    if (!document.querySelector("html").classList.contains("dark")) {
      toDark();
    } else {
      toLight();
    }
  });
}

function _toogleWilModal() {
  const btnOpens = [...document.querySelectorAll(`[wil-open-modal]`)];
  if (!btnOpens || !btnOpens.length) return;
  btnOpens.forEach((elment) => {
    const modalId = elment.getAttribute("wil-open-modal");
    const modalNode = document.querySelector(`#${modalId}`);

    if (!modalNode) return;

    elment.addEventListener("click", () => {
      modalNode.classList.toggle("hidden");
      //=== When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target === modalNode) {
          modalNode.classList.add("hidden");
        }
      };
    });

    // === Close modal function
    const btnCloses = document.querySelectorAll(
      `[wil-close-modal='${modalId}']`
    );
    if (!btnCloses) return;
    btnCloses.forEach((el) => {
      el.addEventListener("click", () => {
        modalNode.classList.add("hidden");
      });
    });
  });
}

function _handleToggleDropdown() {
  const btns = [...document.querySelectorAll(".wil-dropdown__btn")];
  const dropdowns = [...document.querySelectorAll(".wil-dropdown__panel")];
  if (!btns || !btns.length) return;
  btns.forEach((element, key, parent) => {
    const panel = element.nextElementSibling;
    const panelClass = panel.classList;

    if (!panel) return;
    element.addEventListener("click", () => {
      // if (panel.getBoundingClientRect().left < 20) {
      //   panelClass.remove("origin-top-right");
      //   panelClass.remove("right-0");
      //   panelClass.value = panelClass.value + " origin-top-left left-0";
      // }
      panelClass.toggle("hidden");
    });
  });

  // === hidden all dropdow if windown click outside dropdown
  document.addEventListener("click", (event) => {
    if (btns.some((btn) => btn.contains(event.target))) {
      return;
    } else {
      dropdowns.forEach(
        (panel) =>
          !panel.classList.contains("hidden") && panel.classList.add("hidden")
      );
    }
  });
}

function _newGlideCarousel() {
  setTimeout(() => {
    const sliders = document.querySelectorAll(".glide");
    const sliderFades = document.querySelectorAll(".glide-fade");
    if (sliders) {
      sliders.forEach((element) => {
        const glide = new Glide(element, {});
        glide.mount();
      });
    }
    if (sliderFades) {
      sliderFades.forEach((element) => {
        const glide = new Glide(element, {
          animationDuration: 1,
          rewindDuration: 1,
          throttle: 1,
          rewind: true,
        });
        glide.mount();
      });
    }
  }, 1000);
}

function _setBgColorForAvatar() {
  const avatars = document.querySelectorAll(".wil-avatar-no-img");
  if (!avatars || !avatars.length) return;
  avatars.forEach((element, key, parent) => {
    const text = element.innerText;
    const backgroundIndex = Math.floor(
      text.charCodeAt(0) % avatarColors.length
    );
    const backgroundColor = avatarColors[backgroundIndex];
    //
    element.style.backgroundColor = backgroundColor;
  });
}
