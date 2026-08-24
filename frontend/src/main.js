"use strict";

// ننتظر تحميل الـ DOM عشان نضمن إن العناصر موجودة قبل ما نتعامل معها.
document.addEventListener("DOMContentLoaded", function () {
  // عناصر الهيدر والموبايل منيو الأساسية.
  const mainHeader = document.querySelector("#header");
  const menuBtn = document.querySelector("#menu-btn");
  const mobilePanel = document.querySelector("#mobile-menu-panel");
  const closeMenuControls = document.querySelectorAll("[data-mobile-menu-close]");
  const focusableSelector = 'a[href], button:not([disabled]), textarea:not([disabled]), input:not([disabled]):not([type="hidden"]), select:not([disabled]), [tabindex]:not([tabindex="-1"])';

  const getFocusableElements = function (container) {
    return Array.from(container.querySelectorAll(focusableSelector)).filter(function (element) {
      return element.offsetParent !== null || element.getClientRects().length > 0;
    });
  };

  const createFocusTrap = function (container, fallbackFocus) {
    let previousFocus = null;

    if (!container.hasAttribute("tabindex")) {
      container.setAttribute("tabindex", "-1");
    }

    const focusTarget = function (target) {
      if (target && typeof target.focus === "function") {
        target.focus({ preventScroll: true });
      }
    };

    const handleKeydown = function (event) {
      if (event.key !== "Tab") return;

      const focusableElements = getFocusableElements(container);
      if (!focusableElements.length) {
        event.preventDefault();
        focusTarget(fallbackFocus || container);
        return;
      }

      const firstElement = focusableElements[0];
      const lastElement = focusableElements[focusableElements.length - 1];

      if (event.shiftKey && document.activeElement === firstElement) {
        event.preventDefault();
        focusTarget(lastElement);
      } else if (!event.shiftKey && document.activeElement === lastElement) {
        event.preventDefault();
        focusTarget(firstElement);
      }
    };

    return {
      activate: function () {
        previousFocus = document.activeElement && typeof document.activeElement.focus === "function" ? document.activeElement : null;
        document.addEventListener("keydown", handleKeydown);

        window.setTimeout(function () {
          const focusableElements = getFocusableElements(container);
          focusTarget(focusableElements[0] || fallbackFocus || container);
        }, 0);
      },
      deactivate: function (options) {
        document.removeEventListener("keydown", handleKeydown);
        if (!(options && options.restoreFocus === false)) {
          focusTarget(previousFocus);
        }
        previousFocus = null;
      },
    };
  };

  let isMobileMenuOpen = false;
  const mobileMenuTrap = mobilePanel ? createFocusTrap(mobilePanel, closeMenuControls[0] || menuBtn) : null;

  // دالة واحدة مسؤولة عن فتح/قفل الموبايل منيو وتحديث حالات الـ accessibility.
  const setMobileMenuState = function (isOpen) {
    // لو الهيدر غير موجود في الصفحة، نخرج بدون أخطاء.
    if (!mainHeader) return;

    const wasOpen = isMobileMenuOpen;
    isMobileMenuOpen = isOpen;

    // نخزن حالة المنيو على الهيدر ونضيف class على body لمنع/تعديل سلوك الصفحة وقت الفتح.
    mainHeader.dataset.state = isOpen ? "active" : "closed";
    document.body.classList.toggle("aw-mobile-menu-open", isOpen);

    // aria-expanded يوضح لقارئات الشاشة هل زر المنيو فاتح القائمة أم لا.
    if (menuBtn) {
      menuBtn.setAttribute("aria-expanded", String(isOpen));
    }

    // aria-hidden يوضح لقارئات الشاشة هل لوحة الموبايل مخفية أم ظاهرة.
    if (mobilePanel) {
      mobilePanel.setAttribute("aria-hidden", String(!isOpen));
      if ("inert" in mobilePanel) {
        mobilePanel.inert = !isOpen;
      }

      if (isOpen && !wasOpen && mobileMenuTrap) {
        mobileMenuTrap.activate();
      } else if (!isOpen && wasOpen && mobileMenuTrap) {
        mobileMenuTrap.deactivate({ restoreFocus: false });
        if (menuBtn) {
          menuBtn.focus({ preventScroll: true });
        }
      }
    }
  };

  if (mobilePanel && "inert" in mobilePanel) {
    mobilePanel.inert = true;
  }

  // فتح/قفل الموبايل منيو عند الضغط على زر القائمة.
  if (menuBtn && mainHeader) {
    menuBtn.addEventListener("click", function () {
      setMobileMenuState(mainHeader.dataset.state !== "active");
    });
  }

  // أي عنصر عليه data-mobile-menu-close يقفل الموبايل منيو، مثل زر الإغلاق أو الخلفية.
  closeMenuControls.forEach(function (control) {
    control.addEventListener("click", function () {
      setMobileMenuState(false);
    });
  });

  // زر Escape يقفل الموبايل منيو لتحسين تجربة الكيبورد.
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      setMobileMenuState(false);
    }
  });

  // تفعيل مكتبة AOS لو موجودة، مع احترام إعداد تقليل الحركة في الجهاز.
  if (typeof AOS !== "undefined") {
    const motionOK = window.matchMedia("(prefers-reduced-motion: no-preference)").matches;
    AOS.init({
      duration: motionOK ? 600 : 0,
      once: true,
      offset: 60,
    });
  }

  // إخفاء شاشة التحميل بعد جاهزية الـ DOM، لو عنصر loader موجود.
  const loader = document.getElementById("loader");
  if (loader) loader.style.display = "none";

  // تثبيت شكل الهيدر حسب موضع الاسكرول بنفس فكرة Arqam Ascend.
  if (mainHeader) {
    let lastHeaderScrolledState = null;
    let headerScrollFrame = 0;

    const updateHeaderScrollState = function () {
      const isScrolled = window.pageYOffset > 12;
      if (isScrolled !== lastHeaderScrolledState) {
        mainHeader.classList.toggle("is-scrolled", isScrolled);
        lastHeaderScrolledState = isScrolled;
      }
      headerScrollFrame = 0;
    };

    const requestHeaderScrollUpdate = function () {
      if (headerScrollFrame) return;
      headerScrollFrame = window.requestAnimationFrame(updateHeaderScrollState);
    };

    updateHeaderScrollState();
    window.addEventListener("scroll", requestHeaderScrollUpdate, { passive: true });
  }

  // أزرار فتح/قفل القوائم الفرعية داخل القوائم.
  document.querySelectorAll(".submenu-toggle").forEach(function (btn) {
    btn.addEventListener("click", function (event) {
      // نمنع الرابط/العنصر الأب من تنفيذ سلوك إضافي أثناء فتح القائمة الفرعية.
      event.preventDefault();
      event.stopPropagation();

      const li = this.closest("li");
      const submenu = li ? li.querySelector(":scope > ul.custom-submenu-class") : null;
      if (!submenu) return;

      // لو القائمة مفتوحة نخفيها، ولو مخفية نظهرها.
      const isOpen = !submenu.classList.contains("hidden");

      submenu.classList.toggle("hidden", isOpen);
      this.setAttribute("aria-expanded", String(!isOpen));
    });
  });

  // فتح القائمة الفرعية تلقائيًا لو الصفحة الحالية داخل هذا الفرع من القائمة.
  document.querySelectorAll("#primary-menu-mobile .current-menu-ancestor").forEach(function (li) {
    const submenu = li.querySelector(":scope > ul.custom-submenu-class");
    const toggle = li.querySelector(":scope > .aw-mobile-menu__row > .submenu-toggle");

    if (submenu && toggle) {
      submenu.classList.remove("hidden");
      toggle.setAttribute("aria-expanded", "true");
    }
  });

  // عند الضغط على أي لينك في موبايل منيو نقفل اللوحة.
  document.querySelectorAll("#primary-menu-mobile a").forEach(function (link) {
    link.addEventListener("click", function () {
      setMobileMenuState(false);
    });
  });

  // عند الرجوع لحجم الديسكتوب نقفل الموبايل منيو ونرجع القوائم الفرعية لحالتها المغلقة.
  window.addEventListener("resize", function () {
    if (window.innerWidth >= 1024) {
      setMobileMenuState(false);

      document.querySelectorAll("#primary-menu-mobile .custom-submenu-class").forEach(function (ul) {
        ul.classList.add("hidden");
      });

      document.querySelectorAll("#primary-menu-mobile .submenu-toggle").forEach(function (btn) {
        btn.setAttribute("aria-expanded", "false");
      });
    }
  }, { passive: true });

  // تنعيم الانتقال لأي anchor link يشير لعنصر داخل نفس الصفحة.
  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener("click", function (event) {
      const targetId = this.getAttribute("href");
      if (targetId === "#") return;

      const target = document.querySelector(targetId);
      if (target) {
        event.preventDefault();
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // نقرأ إعداد تقليل الحركة مرة واحدة ونستخدمه في كل الأنيميشنات المخصصة.
  const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // عناصر reveal تظهر عند دخولها في شاشة المستخدم.
  const revealItems = document.querySelectorAll(".reveal");
  if (revealItems.length) {
    // IntersectionObserver يشغل الظهور فقط عند اقتراب العنصر، بدل تحميل كل الأنيميشن مرة واحدة.
    if ("IntersectionObserver" in window && !reducedMotion) {
      const revealObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            // بعد ظهور العنصر مرة واحدة نوقف مراقبته لتقليل الشغل على المتصفح.
            entry.target.classList.add("is-visible");
            revealObserver.unobserve(entry.target);
          }
        });
      }, { rootMargin: "0px 0px -12% 0px", threshold: 0.14 });

      revealItems.forEach(function (item) {
        revealObserver.observe(item);
      });
    } else {
      // لو المتصفح لا يدعم IntersectionObserver أو المستخدم مفعّل تقليل الحركة، نظهر العناصر فورًا.
      revealItems.forEach(function (item) {
        item.classList.add("is-visible");
      });
    }
  }

  // تشغيل خلفية الهيرو المرسومة بالـ canvas لو العنصر موجود في الصفحة.
  const heroCanvas = document.querySelector("[data-arqam-hero-canvas]");
  if (heroCanvas) {
    initArqamHeroCanvas(heroCanvas, reducedMotion);
  }

  // تشغيل mockup السلايدر داخل الهيرو لو موجود.
  const heroMockup = document.querySelector("[data-arqam-hero-mockup]");
  if (heroMockup) {
    initHeroMockup(heroMockup, reducedMotion);
  }

  // تشغيل كلمة الهيرو المتغيرة بنمط كتابة/حذف.
  const heroWord = document.querySelector("[data-arqam-hero-word]");
  if (heroWord) {
    initHeroWordRotator(heroWord, reducedMotion);
  }

  const founderVideoButton = document.querySelector("[data-founder-video-open]");
  if (founderVideoButton) {
    initFounderVideo(founderVideoButton);
  }

  const frontpageFeaturedProject = document.querySelector("[data-frontpage-featured-project]");
  if (frontpageFeaturedProject) {
    initFrontpageFeaturedProject(frontpageFeaturedProject, reducedMotion);
  }

  const countUpSection = document.querySelector("[data-count-up-section]");
  if (countUpSection) {
    initCountUpStats(countUpSection, reducedMotion);
  }

  initViewportAnimationPauses(reducedMotion);

  const videoTestimonialButtons = document.querySelectorAll("[data-video-testimonial-open]");
  if (videoTestimonialButtons.length) {
    initVideoTestimonials(videoTestimonialButtons, reducedMotion);
  }

  function initViewportAnimationPauses(shouldReduceMotion) {
    const animatedItems = document.querySelectorAll(".animate-marquee, .animate-drift, .animate-float, .hero-sweep, .hero-ghost-cursor, .hero-slide-progress, .animate-pulse, .animate-ping, .pulse-green, .aw-video-testimonials__item");
    if (!animatedItems.length) return;

    const setPaused = function (item, shouldPause) {
      item.style.animationPlayState = shouldPause ? "paused" : "";
    };

    if (shouldReduceMotion) {
      animatedItems.forEach(function (item) {
        setPaused(item, true);
      });
      return;
    }

    if (!("IntersectionObserver" in window)) return;

    const observedStates = new Map();
    const syncVisibility = function () {
      const pageHidden = document.visibilityState === "hidden";
      observedStates.forEach(function (isVisible, item) {
        setPaused(item, pageHidden || !isVisible);
      });
    };

    const animationObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        observedStates.set(entry.target, entry.isIntersecting);
      });
      syncVisibility();
    }, { rootMargin: "140px 0px", threshold: 0 });

    animatedItems.forEach(function (item) {
      observedStates.set(item, false);
      animationObserver.observe(item);
    });

    document.addEventListener("visibilitychange", syncVisibility);
    syncVisibility();
  }

  function initVideoTestimonials(buttons, shouldReduceMotion) {
    const modal = document.querySelector("[data-video-testimonial-modal]");
    const frame = modal ? modal.querySelector("[data-video-testimonial-frame]") : null;
    const iframe = modal ? modal.querySelector("[data-video-testimonial-iframe]") : null;
    const closeControls = modal ? modal.querySelectorAll("[data-video-testimonial-close]") : [];
    let activeButton = null;
    let iframeLoadTimer = 0;
    let hasYoutubePreconnect = false;

    if (!modal || !frame || !iframe) return;

    const modalTrap = createFocusTrap(modal, closeControls[0] || frame);

    const warmYoutubeConnection = function () {
      if (hasYoutubePreconnect) return;
      hasYoutubePreconnect = true;

      ["https://www.youtube-nocookie.com", "https://www.youtube.com"].forEach(function (href) {
        const link = document.createElement("link");
        link.rel = "preconnect";
        link.href = href;
        link.crossOrigin = "anonymous";
        document.head.appendChild(link);
      });
    };

    const closeModal = function () {
      modal.classList.remove("is-open");
      document.body.classList.remove("aw-video-modal-open");
      if (iframeLoadTimer) {
        window.clearTimeout(iframeLoadTimer);
        iframeLoadTimer = 0;
      }
      iframe.setAttribute("src", "");
      modalTrap.deactivate({ restoreFocus: false });

      window.setTimeout(function () {
        if (!modal.classList.contains("is-open")) {
          modal.hidden = true;
          frame.classList.remove("is-short");
        }
      }, 250);

      if (activeButton) {
        activeButton.focus({ preventScroll: true });
        activeButton = null;
      }
    };

    const openModal = function (button) {
      const youtubeId = button.dataset.youtubeId;
      if (!youtubeId) return;

      activeButton = button;
      frame.classList.toggle("is-short", button.dataset.videoShort === "true");
      modal.hidden = false;
      document.body.classList.add("aw-video-modal-open");
      modalTrap.activate();

      window.requestAnimationFrame(function () {
        modal.classList.add("is-open");
        iframeLoadTimer = window.setTimeout(function () {
          iframeLoadTimer = 0;
          iframe.setAttribute("src", "https://www.youtube-nocookie.com/embed/" + encodeURIComponent(youtubeId) + "?autoplay=1&rel=0&modestbranding=1&playsinline=1&color=white");
        }, 100);
      });
    };

    buttons.forEach(function (button) {
      button.addEventListener("click", function () {
        openModal(button);
      });

      button.addEventListener("pointerenter", warmYoutubeConnection);
      button.addEventListener("pointerdown", warmYoutubeConnection, { passive: true });

      if (!shouldReduceMotion) {
        let buttonRect = null;
        let tiltFrameId = 0;
        let tiltEvent = null;

        const updateButtonRect = function () {
          buttonRect = button.getBoundingClientRect();
        };

        const applyButtonTilt = function () {
          tiltFrameId = 0;
          if (!tiltEvent || !buttonRect) return;

          const x = (tiltEvent.clientX - buttonRect.left) / buttonRect.width - 0.5;
          const y = (tiltEvent.clientY - buttonRect.top) / buttonRect.height - 0.5;

          button.style.setProperty("--tilt-x", (x * 8).toFixed(2) + "deg");
          button.style.setProperty("--tilt-y", (y * -8).toFixed(2) + "deg");
        };

        button.addEventListener("pointerenter", function () {
          updateButtonRect();
        });

        button.addEventListener("pointermove", function (event) {
          tiltEvent = event;
          if (!buttonRect) updateButtonRect();
          if (!tiltFrameId) {
            tiltFrameId = window.requestAnimationFrame(applyButtonTilt);
          }
        });

        button.addEventListener("pointerleave", function () {
          buttonRect = null;
          tiltEvent = null;
          if (tiltFrameId) {
            window.cancelAnimationFrame(tiltFrameId);
            tiltFrameId = 0;
          }
          button.style.setProperty("--tilt-x", "0deg");
          button.style.setProperty("--tilt-y", "0deg");
        });

        window.addEventListener("resize", function () {
          if (buttonRect) updateButtonRect();
        }, { passive: true });

        window.addEventListener("scroll", function () {
          if (buttonRect) updateButtonRect();
        }, { passive: true });
      }
    });

    closeControls.forEach(function (control) {
      control.addEventListener("click", closeModal);
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && !modal.hidden) {
        closeModal();
      }
    });
  }

  function initFrontpageFeaturedProject(card, shouldReduceMotion) {
    const images = Array.from(card.querySelectorAll("[data-frontpage-featured-project-image]"));
    const dots = Array.from(card.querySelectorAll("[data-frontpage-featured-project-dot]"));
    const panels = Array.from(card.querySelectorAll("[data-frontpage-featured-project-panel]"));
    const category = card.querySelector("[data-frontpage-featured-project-category]");
    if (panels.length <= 1) return;

    let activeIndex = 0;
    let intervalId = 0;
    let isVisible = false;

    const setProject = function (nextIndex) {
      activeIndex = nextIndex % panels.length;
      const activePanel = panels[activeIndex];

      images.forEach(function (image, index) {
        const isActive = index === activeIndex;
        image.classList.toggle("opacity-100", isActive);
        image.classList.toggle("scale-100", isActive);
        image.classList.toggle("opacity-0", !isActive);
        image.classList.toggle("scale-105", !isActive);
      });

      dots.forEach(function (dot, index) {
        const isActive = index === activeIndex;
        dot.className = "h-1.5 rounded-full transition-all duration-500 " + (isActive ? "w-8 bg-primary" : "w-1.5 bg-white/50");
      });

      panels.forEach(function (panel, index) {
        const isActive = index === activeIndex;
        panel.classList.toggle("relative", isActive);
        panel.classList.toggle("absolute", !isActive);
        panel.classList.toggle("inset-0", !isActive);
        panel.classList.toggle("opacity-100", isActive);
        panel.classList.toggle("translate-y-0", isActive);
        panel.classList.toggle("opacity-0", !isActive);
        panel.classList.toggle("translate-y-2", !isActive);
        panel.classList.toggle("pointer-events-none", !isActive);
        panel.setAttribute("aria-hidden", String(!isActive));
      });

      card.setAttribute("href", activePanel.dataset.projectLink || "#");
      if (category) category.textContent = activePanel.dataset.projectCategory || "";
    };

    const start = function () {
      if (shouldReduceMotion || intervalId || !isVisible || document.visibilityState === "hidden") return;
      intervalId = window.setInterval(function () {
        setProject(activeIndex + 1);
      }, 3500);
    };

    const stop = function () {
      if (!intervalId) return;
      window.clearInterval(intervalId);
      intervalId = 0;
    };

    if ("IntersectionObserver" in window) {
      const projectObserver = new IntersectionObserver(function (entries) {
        const entry = entries[0];
        isVisible = Boolean(entry && entry.isIntersecting);
        if (isVisible) start();
        else stop();
      }, { rootMargin: "120px 0px", threshold: 0.12 });

      projectObserver.observe(card);
    } else {
      isVisible = true;
      start();
    }

    document.addEventListener("visibilitychange", function () {
      if (document.visibilityState === "hidden") stop();
      else start();
    });
  }

  function initCountUpStats(section, shouldReduceMotion) {
    const counters = Array.from(section.querySelectorAll("[data-count-up]"));
    if (!counters.length || shouldReduceMotion) return;

    let hasStarted = false;
    const duration = 1800;
    const easeOutCubic = function (progress) {
      return 1 - Math.pow(1 - progress, 3);
    };

    const runCounter = function (counter) {
      const target = Number(counter.dataset.countUpValue || counter.textContent || 0);
      const decimals = Number(counter.dataset.countUpDecimals || 0);
      const startTime = performance.now();

      const tick = function (now) {
        const progress = Math.min(1, (now - startTime) / duration);
        const value = target * easeOutCubic(progress);
        counter.textContent = decimals > 0 ? value.toFixed(decimals) : String(Math.round(value));

        if (progress < 1) {
          window.requestAnimationFrame(tick);
        } else {
          counter.textContent = decimals > 0 ? target.toFixed(decimals) : String(Math.round(target));
        }
      };

      counter.textContent = decimals > 0 ? (0).toFixed(decimals) : "0";
      window.requestAnimationFrame(tick);
    };

    const startCounters = function () {
      if (hasStarted) return;
      hasStarted = true;
      counters.forEach(runCounter);
    };

    if ("IntersectionObserver" in window) {
      const observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            startCounters();
            observer.disconnect();
          }
        });
      }, { threshold: 0.3 });

      observer.observe(section);
    } else {
      startCounters();
    }
  }

  function initFounderVideo(button) {
    const modal = document.querySelector("[data-founder-video-modal]");
    const frame = modal ? modal.querySelector("[data-founder-video-frame]") : null;
    const iframe = modal ? modal.querySelector("[data-founder-video-iframe]") : null;
    const closeControls = modal ? modal.querySelectorAll("[data-founder-video-close]") : [];
    const videoId = "R5rtMGK6F3I";
    let hasYoutubePreconnect = false;

    if (!modal || !frame || !iframe) return;

    const modalTrap = createFocusTrap(modal, closeControls[0] || frame);

    const warmYoutubeConnection = function () {
      if (hasYoutubePreconnect) return;
      hasYoutubePreconnect = true;

      ["https://www.youtube-nocookie.com", "https://www.youtube.com"].forEach(function (href) {
        const link = document.createElement("link");
        link.rel = "preconnect";
        link.href = href;
        link.crossOrigin = "anonymous";
        document.head.appendChild(link);
      });
    };

    const closeModal = function () {
      modal.classList.remove("is-open");
      document.body.classList.remove("aw-founder-video-open");
      iframe.setAttribute("src", "");
      modalTrap.deactivate({ restoreFocus: false });

      window.setTimeout(function () {
        if (!modal.classList.contains("is-open")) {
          modal.hidden = true;
        }
      }, 250);

      button.focus({ preventScroll: true });
    };

    const openModal = function () {
      warmYoutubeConnection();
      modal.hidden = false;
      document.body.classList.add("aw-founder-video-open");
      modalTrap.activate();

      window.requestAnimationFrame(function () {
        modal.classList.add("is-open");
        iframe.setAttribute("src", "https://www.youtube-nocookie.com/embed/" + videoId + "?autoplay=1&rel=0&modestbranding=1&playsinline=1&color=white");
      });
    };

    button.addEventListener("click", openModal);
    button.addEventListener("pointerenter", warmYoutubeConnection);
    button.addEventListener("pointerdown", warmYoutubeConnection, { passive: true });

    closeControls.forEach(function (control) {
      control.addEventListener("click", closeModal);
    });

    modal.addEventListener("click", function (event) {
      if (!frame.contains(event.target)) {
        closeModal();
      }
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape" && !modal.hidden) {
        closeModal();
      }
    });
  }

  // يبدّل الكلمات في الهيرو بحركة كتابة وحذف.
  function initHeroWordRotator(wordElement, shouldReduceMotion) {
    let words;
    try {
      words = JSON.parse(wordElement.dataset.words || "[]");
    } catch (parseError) {
      words = [];
    }
    if (!words.length) words = ["Grow.", "Scale.", "Convert."];
    let wordIndex = 0;
    let phase = "typing";
    let text = "";
    let timeoutId = 0;

    // لو المستخدم يفضل تقليل الحركة، نترك النص الثابت كما هو.
    if (shouldReduceMotion) return;

    wordElement.textContent = "";

    // tick هي دورة واحدة من الكتابة/الانتظار/الحذف.
    const tick = function () {
      const word = words[wordIndex % words.length];
      let delay = 95;

      // مرحلة الكتابة: نزيد حرف واحد كل مرة.
      if (phase === "typing") {
        if (text.length < word.length) {
          text = word.slice(0, text.length + 1);
          delay = 95;
        } else {
          // بعد اكتمال الكلمة ننتظر قبل الحذف.
          phase = "holding";
          delay = 1300;
        }
      } else if (phase === "holding") {
        // نبدأ مرحلة الحذف بعد فترة الانتظار.
        phase = "deleting";
        delay = 55;
      } else if (text.length > 0) {
        // مرحلة الحذف: نقلل حرف واحد كل مرة.
        text = word.slice(0, text.length - 1);
        delay = 55;
      } else {
        // بعد حذف الكلمة بالكامل ننتقل للكلمة التالية.
        wordIndex = (wordIndex + 1) % words.length;
        phase = "typing";
        delay = 180;
      }

      // \u00A0 يحافظ على مساحة الكلمة أثناء الحذف حتى لا يتحرك التصميم.
      wordElement.textContent = text || "\u00A0";
      timeoutId = window.setTimeout(tick, delay);
    };

    tick();

    // تنظيف الـ timeout عند مغادرة الصفحة.
    window.addEventListener("beforeunload", function () {
      window.clearTimeout(timeoutId);
    }, { once: true });
  }

  // يدير سلايدر صور الـ mockup في الهيرو مع النقاط والـ hover pause.
  function initHeroMockup(card, shouldReduceMotion) {
    const image = card.querySelector("[data-arqam-hero-slide]");
    const path = card.querySelector("[data-arqam-hero-path]");
    const caption = card.querySelector("[data-arqam-hero-caption]");
    const title = card.querySelector("[data-arqam-hero-title]");
    const copy = card.querySelector("[data-arqam-hero-copy]");
    const dots = Array.from(card.querySelectorAll("[data-arqam-hero-dot]"));
    // الصورة هي العنصر الأساسي للسلايدر، لذلك نوقف الدالة لو مش موجودة.
    if (!image) return;

    let slides = [];
    try {
      // الصور تأتي من data-slide-images كـ JSON من القالب.
      slides = JSON.parse(card.dataset.slideImages || "[]");
    } catch (error) {
      // لو الـ JSON غير صالح، نعتبر أنه لا توجد slides بدل ما نكسر الصفحة.
      slides = [];
    }

    if (!slides.length) return;

    // نبدأ من الصورة الحالية الموجودة في الـ HTML إن أمكن.
    let activeIndex = Math.max(0, slides.findIndex(function (slide) {
      return slide.src === image.getAttribute("src");
    }));
    let intervalId = 0;
    let slideTimeoutId = 0;
    let autoplayDelayId = 0;
    let isPaused = false;
    let isVisible = false;
    let autoplayReady = false;
    let preloadedIndex = activeIndex;

    const preloadSlide = function (index) {
      const normalizedIndex = index % slides.length;
      if (normalizedIndex === preloadedIndex || !slides[normalizedIndex]) return;

      const preload = new Image();
      preload.decoding = "async";
      preload.loading = "lazy";
      preload.src = slides[normalizedIndex].src;
      preloadedIndex = normalizedIndex;
    };

    // تحديث شكل نقاط السلايدر وإعادة تشغيل شريط التقدم للنقطة النشطة.
    const updateDots = function () {
      dots.forEach(function (dot, index) {
        const isActive = index === activeIndex;
        const fill = dot.querySelector("span");

        dot.style.width = isActive ? "28px" : "8px";
        if (!fill) return;

        // Tailwind classes هنا بتغير لون النقطة حسب كونها نشطة أو لا.
        fill.className = "absolute inset-y-0 left-0 " + (isActive ? "bg-[color:var(--brand-primary)]" : "bg-white/15");
        fill.classList.toggle("hero-slide-progress", isActive && !shouldReduceMotion && !isPaused);
        fill.style.width = "100%";

        fill.style.animation = "";
      });
    };

    // تغيير الصورة والنصوص المصاحبة لها.
    const setSlide = function (nextIndex) {
      activeIndex = nextIndex % slides.length;
      const current = slides[activeIndex];
      if (slideTimeoutId) {
        window.clearTimeout(slideTimeoutId);
      }
      // نعمل fade خفيف فقط قبل تغيير الصورة لتقليل تكلفة الرسم وقت LCP/INP.
      image.style.opacity = "0";
      if (caption) caption.classList.remove("animate-fade-in");

      slideTimeoutId = window.setTimeout(function () {
        slideTimeoutId = 0;
        // بعد بداية الانتقال نبدل بيانات الصورة والنص.
        image.src = current.src;
        image.alt = current.title || "";
        image.style.objectPosition = current.focus || "center 30%";
        image.style.opacity = "1";
        if (path) path.textContent = current.path || "";
        if (title) title.textContent = current.title || "";
        if (copy) copy.textContent = current.caption || "";
        if (caption) {
          caption.classList.add("animate-fade-in");
        }
        updateDots();
        preloadSlide(activeIndex + 1);
      }, 160);
    };

    // بدء التشغيل التلقائي للسلايدر.
    const start = function () {
      if (shouldReduceMotion || !autoplayReady || slides.length <= 1 || intervalId || isPaused || !isVisible || document.visibilityState === "hidden") return;
      intervalId = window.setInterval(function () {
        setSlide(activeIndex + 1);
      }, 2800);
    };

    // إيقاف التشغيل التلقائي للسلايدر.
    const stop = function () {
      if (intervalId) {
        window.clearInterval(intervalId);
        intervalId = 0;
      }
      if (slideTimeoutId) {
        window.clearTimeout(slideTimeoutId);
        slideTimeoutId = 0;
        image.style.opacity = "1";
      }
    };

    const markAutoplayReady = function () {
      autoplayReady = true;
      start();
      updateDots();
    };

    autoplayDelayId = window.setTimeout(function () {
      autoplayDelayId = 0;
      if ("requestIdleCallback" in window) {
        window.requestIdleCallback(markAutoplayReady, { timeout: 1200 });
      } else {
        markAutoplayReady();
      }
    }, 5000);

    updateDots();
    preloadSlide(activeIndex + 1);

    if ("IntersectionObserver" in window) {
      const mockupObserver = new IntersectionObserver(function (entries) {
        const entry = entries[0];
        isVisible = Boolean(entry && entry.isIntersecting);
        if (isVisible) start();
        else stop();
        updateDots();
      }, { rootMargin: "120px 0px", threshold: 0.12 });

      mockupObserver.observe(card);
    } else {
      isVisible = true;
      start();
    }

    document.addEventListener("visibilitychange", function () {
      if (document.visibilityState === "hidden") stop();
      else start();
      updateDots();
    });

    // على الأجهزة التي تدعم الحركة، نوقف السلايدر عند hover ونضيف tilt خفيف للكارت.
    if (!shouldReduceMotion && slides.length > 1) {
      let tiltFrameId = 0;
      let tiltEvent = null;
      let cardRect = null;

      const updateCardRect = function () {
        cardRect = card.getBoundingClientRect();
      };

      card.addEventListener("pointerenter", function () {
        isPaused = true;
        updateCardRect();
        card.classList.add("is-paused");
        stop();
        updateDots();
      });

      card.addEventListener("pointerleave", function () {
        // عند خروج المؤشر نرجع الكارت لوضعه الطبيعي ونكمل السلايدر.
        isPaused = false;
        card.classList.remove("is-paused");
        card.style.transform = "";
        tiltEvent = null;
        cardRect = null;
        if (tiltFrameId) {
          window.cancelAnimationFrame(tiltFrameId);
          tiltFrameId = 0;
        }
        updateDots();
        start();
      });

      const updateTilt = function () {
        if (!tiltEvent) {
          tiltFrameId = 0;
          return;
        }

        // نحسب مكان المؤشر داخل الكارت لتحويله لزاوية ميل خفيفة.
        if (!cardRect) updateCardRect();
        const x = (tiltEvent.clientX - cardRect.left) / cardRect.width - 0.5;
        const y = (tiltEvent.clientY - cardRect.top) / cardRect.height - 0.5;

        card.style.transform = "perspective(1200px) rotateX(" + (-y * 6).toFixed(2) + "deg) rotateY(" + (x * 6).toFixed(2) + "deg)";
        tiltFrameId = 0;
      };

      card.addEventListener("pointermove", function (event) {
        tiltEvent = event;
        if (!tiltFrameId) {
          tiltFrameId = window.requestAnimationFrame(updateTilt);
        }
      });

      window.addEventListener("resize", function () {
        if (cardRect) updateCardRect();
      }, { passive: true });

      window.addEventListener("scroll", function () {
        if (cardRect) updateCardRect();
      }, { passive: true });
    }

    window.addEventListener("beforeunload", function () {
      if (autoplayDelayId) window.clearTimeout(autoplayDelayId);
      stop();
    }, { once: true });
  }

  // يرسم أرقام ومؤشرات متحركة في خلفية الهيرو باستخدام canvas.
  function initArqamHeroCanvas(canvas, shouldReduceMotion) {
    const ctx = canvas.getContext("2d");
    if (!ctx) return;
    if (shouldReduceMotion) {
      canvas.setAttribute("aria-hidden", "true");
    }

    // دالة عشوائية ثابتة حسب index حتى توزيع العناصر يفضل متناسق بين مرات التحميل.
    const seed = function (index) {
      const x = Math.sin(index * 9301 + 49297) * 233280;
      return x - Math.floor(x);
    };

    // تعيين قيمة هدف جديدة لكل metric حسب نوعها.
    const rerollTarget = function (item) {
      if (item.kind === "pct") item.target = Math.floor(Math.random() * 230) + 10;
      else if (item.kind === "mult") item.target = Math.round((1.2 + Math.random() * 3.2) * 10) / 10;
      else if (item.kind === "score") item.target = Math.floor(Math.random() * 12) + 88;
      else if (item.kind === "plus") item.target = Math.floor(Math.random() * 240) + 10;
      else item.target = Math.round((4.5 + Math.random() * 0.5) * 10) / 10;

      item.current = item.target * (0.05 + Math.random() * 0.25);
    };

    // تحويل قيمة metric لشكل نص مناسب للعرض على canvas.
    const formatMetric = function (item) {
      const value = item.current;
      if (item.kind === "pct") return "+" + Math.floor(value) + "%";
      if (item.kind === "mult") return (Math.round(value * 10) / 10).toFixed(1) + "x";
      if (item.kind === "score") return Math.floor(value) + "/100";
      if (item.kind === "plus") return "+" + Math.floor(value);
      return (Math.round(value * 10) / 10).toFixed(1) + "★";
    };

    // إنشاء العناصر المرسومة: أماكنها، أحجامها، سرعاتها، وطبقاتها.
    const makeItems = function () {
      const isSmallScreen = window.matchMedia("(max-width: 767px)").matches;
      const cols = isSmallScreen ? 4 : 7;
      const rows = isSmallScreen ? 3 : 5;
      const items = [];

      // نوزع العناصر على grid وهمي حتى الخلفية تكون متوازنة.
      for (let row = 0; row < rows; row += 1) {
        for (let col = 0; col < cols; col += 1) {
          const index = row * cols + col;
          // layer يحدد حجم/شفافية/سرعة العنصر.
          const layerRoll = seed(index + 11);
          const layer = layerRoll < 0.22 ? 0 : layerRoll < 0.65 ? 1 : 2;
          // kind يحدد شكل القيمة: نسبة، مضاعف، score، رقم زائد، أو rating.
          const kindRoll = seed(index + 23);
          const kind = kindRoll < 0.45 ? "pct" : kindRoll < 0.65 ? "mult" : kindRoll < 0.82 ? "score" : kindRoll < 0.93 ? "plus" : "rating";
          const size = layer === 0 ? 86 + seed(index + 81) * 70 : layer === 1 ? 30 + seed(index + 81) * 20 : 14 + seed(index + 81) * 8;
          const baseOpacity = layer === 0 ? 0.08 + seed(index + 91) * 0.05 : layer === 1 ? 0.13 + seed(index + 91) * 0.07 : 0.18 + seed(index + 91) * 0.07;
          const speed = layer === 0 ? 22 + seed(index + 101) * 14 : layer === 1 ? 42 + seed(index + 101) * 22 : 70 + seed(index + 101) * 30;
          const item = {
            kind,
            layer,
            cellX: (col + 0.5) / cols,
            cellY: (row + 0.5) / rows,
            jitterX: (seed(index + 111) - 0.5) * (0.7 / cols),
            jitterY: (seed(index + 121) - 0.5) * (0.55 / rows),
            offset: seed(index + 131),
            speed,
            size,
            baseOpacity,
            target: 0,
            current: 0,
            countSpeed: 0.6 + seed(index + 141) * 1.2,
            phase: seed(index + 151),
            lifeSpeed: 0.18 + seed(index + 161) * 0.22,
          };
          // ندي كل عنصر قيمة أولية قبل الرسم.
          rerollTarget(item);
          items.push(item);
        }
      }

      return items;
    };

    let items = makeItems();
    let width = 0;
    let height = 0;
    let lastTime = performance.now();
    let animationFrameId = 0;
    let frameTimeoutId = 0;
    let isVisible = false;
    let targetFrameMs = window.matchMedia("(max-width: 767px)").matches ? 84 : 50;

    // ضبط canvas حسب حجم العنصر وكثافة شاشة الجهاز.
    const resize = function () {
      const rect = canvas.getBoundingClientRect();
      const isSmallScreen = window.matchMedia("(max-width: 767px)").matches;
      const dpr = Math.min(window.devicePixelRatio || 1, isSmallScreen ? 1 : 1.5);
      targetFrameMs = isSmallScreen ? 84 : 50;
      width = rect.width;
      height = rect.height;
      canvas.width = width * dpr;
      canvas.height = height * dpr;
      ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
    };

    const scheduleNextFrame = function () {
      if (shouldReduceMotion || !isVisible || document.visibilityState === "hidden") return;
      frameTimeoutId = window.setTimeout(function () {
        frameTimeoutId = 0;
        animationFrameId = window.requestAnimationFrame(draw);
      }, targetFrameMs);
    };

    // حلقة الرسم المستمرة للـ canvas.
    const draw = function (now) {
      animationFrameId = 0;
      if (!isVisible || document.visibilityState === "hidden") {
        return;
      }

      // delta يحافظ على سرعة الحركة مستقرة حتى لو frame rate اختلف.
      const delta = Math.min(64, now - lastTime) / 1000;
      lastTime = now;

      // مسح الإطار السابق قبل رسم الإطار الجديد.
      ctx.clearRect(0, 0, width, height);

      items.forEach(function (item) {
        // لو تقليل الحركة غير مفعل، نحرك العناصر ونقرب القيمة الحالية من الهدف.
        if (!shouldReduceMotion) {
          item.offset += (item.speed * delta) / Math.max(width, 1);
          if (item.offset >= 1) {
            // عندما يخرج العنصر من الشاشة يرجع من البداية بقيمة جديدة.
            item.offset -= 1;
            rerollTarget(item);
            item.phase = 0;
          }

          // easing بسيط للأرقام حتى تزيد تدريجيًا بدل القفز.
          const countEase = Math.min(1, item.countSpeed * delta);
          item.current += (item.target - item.current) * countEase;
          item.phase = (item.phase + item.lifeSpeed * delta) % 1;
        }

        // حساب مكان العنصر الحقيقي داخل canvas.
        const baseX = item.cellX + item.jitterX;
        const x = ((baseX + item.offset) % 1.1) - 0.05;
        const px = x * width;
        const py = (item.cellY + item.jitterY) * height;
        // لا نرسم العنصر لو خارج الشاشة بمسافة واضحة.
        if (px < -120 || px > width + 120) return;

        // حساب الشفافية والحجم حسب قرب العنصر من الأطراف وقرب الرقم من هدفه.
        const edgeFade = Math.min(1, (x + 0.05) * 6) * Math.min(1, (1.05 - x) * 6);
        const lifeFade = 0.55 + 0.45 * Math.sin(item.phase * Math.PI * 2);
        const alpha = item.baseOpacity * Math.max(0.1, edgeFade) * (0.6 + lifeFade * 0.4);
        const closeness = item.target === 0 ? 1 : Math.min(1, item.current / item.target);
        const fontSize = item.size * (0.9 + closeness * 0.18);

        ctx.globalAlpha = Math.max(0, Math.min(0.3, alpha));

        // كل layer لها لون وظل مختلف لعمل عمق بصري.
        if (item.layer === 0) {
          ctx.shadowColor = "#3198d4";
          ctx.shadowBlur = 22;
          ctx.fillStyle = "#3474b4";
        } else if (item.layer === 1) {
          ctx.shadowColor = "#3198d4";
          ctx.shadowBlur = 8;
          ctx.fillStyle = "#3198d4";
        } else {
          ctx.shadowBlur = 0;
          ctx.fillStyle = "#1f4e7a";
        }

        // رسم النص النهائي للـ metric على canvas.
        ctx.font = (item.layer === 0 ? "700 " : "600 ") + fontSize + "px Space Grotesk, Dubai, Inter, sans-serif";
        ctx.textBaseline = "middle";
        ctx.fillText(formatMetric(item), px, py);
      });

      // إعادة القيم الافتراضية للـ canvas context قبل الإطار التالي.
      ctx.globalAlpha = 1;
      ctx.shadowBlur = 0;

      scheduleNextFrame();
    };

    const startDrawing = function () {
      if (animationFrameId || frameTimeoutId || document.visibilityState === "hidden") return;
      isVisible = true;
      lastTime = performance.now();
      animationFrameId = window.requestAnimationFrame(draw);
    };

    const stopDrawing = function () {
      isVisible = false;
      if (animationFrameId) {
        window.cancelAnimationFrame(animationFrameId);
        animationFrameId = 0;
      }
      if (frameTimeoutId) {
        window.clearTimeout(frameTimeoutId);
        frameTimeoutId = 0;
      }
    };

    // تشغيل الرسم ومراقبة تغيير حجم الشاشة.
    resize();
    if (shouldReduceMotion) {
      isVisible = true;
      draw(performance.now());
      isVisible = false;
    } else if ("IntersectionObserver" in window) {
      const canvasObserver = new IntersectionObserver(function (entries) {
        const entry = entries[0];
        if (entry && entry.isIntersecting) startDrawing();
        else stopDrawing();
      }, { rootMargin: "0px", threshold: 0 });

      canvasObserver.observe(canvas);
    } else {
      startDrawing();
    }

    window.addEventListener("resize", function () {
      const wasSmallSet = items.length <= 12;
      resize();
      if (wasSmallSet !== window.matchMedia("(max-width: 767px)").matches) {
        items = makeItems();
      }
    }, { passive: true });

    document.addEventListener("visibilitychange", function () {
      if (document.visibilityState === "hidden") stopDrawing();
      else if (!shouldReduceMotion) {
        const rect = canvas.getBoundingClientRect();
        if (rect.bottom > 0 && rect.top < window.innerHeight) startDrawing();
      }
    });
  }
});
