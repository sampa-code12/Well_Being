/**
* Template Name: Arsha
* Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
* Updated: Feb 22 2025 with Bootstrap v5.3.3
* Author: BootstrapMade.com
* License: https://bootstrapmade.com/license/
*/

(function() {
  "use strict";

  /**
   * Apply .scrolled class to the body as the page is scrolled down
   */
  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  /**
   * Mobile nav toggle
   */
  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  if (mobileNavToggleBtn) {
    mobileNavToggleBtn.addEventListener('click', mobileNavToogle);
  }

  /**
   * Hide mobile nav on same-page/hash links
   */
  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  /**
   * Toggle mobile nav dropdowns
   */
  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  /**
   * Preloader
   */
  const preloader = document.querySelector('#preloader');
  function removePreloader() {
    if (preloader && preloader.parentNode) {
      preloader.parentNode.removeChild(preloader);
    }
  }

  if (preloader) {
    if (document.readyState === 'complete') {
      removePreloader();
    } else {
      window.addEventListener('load', removePreloader);
      document.addEventListener('DOMContentLoaded', removePreloader);
      // Fallback: ensure preloader removed after 2s if other scripts fail
      setTimeout(removePreloader, 2000);
    }
  }

  /**
   * Scroll top button
   */
  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  if (scrollTop) {
    scrollTop.addEventListener('click', (e) => {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });

    window.addEventListener('load', toggleScrollTop);
    document.addEventListener('scroll', toggleScrollTop);
  }

  /**
   * Animation on scroll function and init
   */
  function aosInit() {
    const aosElements = document.querySelectorAll('[data-aos]');
    if (typeof AOS !== 'undefined') {
      AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
        mirror: false
      });
      AOS.refresh();
    } else {
      aosElements.forEach((el) => el.classList.add('aos-animate'));
    }
  }
  window.addEventListener('load', aosInit);
  window.addEventListener('DOMContentLoaded', aosInit);

  /**
   * Initiate glightbox
   */
  const glightbox = GLightbox({
    selector: '.glightbox'
  });

  /**
   * Init swiper sliders
   */
  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);

  /**
   * Frequently Asked Questions Toggle
   */
  document.querySelectorAll('.faq-item h3, .faq-item .faq-toggle').forEach((faqItem) => {
    faqItem.addEventListener('click', () => {
      faqItem.parentNode.classList.toggle('faq-active');
    });
  });

  /**
   * Animate the skills items on reveal
   */
  let skillsAnimation = document.querySelectorAll('.skills-animation');
  skillsAnimation.forEach((item) => {
    new Waypoint({
      element: item,
      offset: '80%',
      handler: function(direction) {
        let progress = item.querySelectorAll('.progress .progress-bar');
        progress.forEach(el => {
          el.style.width = el.getAttribute('aria-valuenow') + '%';
        });
      }
    });
  });

  /**
   * Init isotope layout and filters
   */
  document.querySelectorAll('.isotope-layout').forEach(function(isotopeItem) {
    let layout = isotopeItem.getAttribute('data-layout') ?? 'masonry';
    let filter = isotopeItem.getAttribute('data-default-filter') ?? '*';
    let sort = isotopeItem.getAttribute('data-sort') ?? 'original-order';

    let initIsotope;
    imagesLoaded(isotopeItem.querySelector('.isotope-container'), function() {
      initIsotope = new Isotope(isotopeItem.querySelector('.isotope-container'), {
        itemSelector: '.isotope-item',
        layoutMode: layout,
        filter: filter,
        sortBy: sort
      });
    });

    isotopeItem.querySelectorAll('.isotope-filters li').forEach(function(filters) {
      filters.addEventListener('click', function() {
        isotopeItem.querySelector('.isotope-filters .filter-active').classList.remove('filter-active');
        this.classList.add('filter-active');
        initIsotope.arrange({
          filter: this.getAttribute('data-filter')
        });
        if (typeof aosInit === 'function') {
          aosInit();
        }
      }, false);
    });

  });

  /**
   * Correct scrolling position upon page load for URLs containing hash links.
   */
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });

  /**
   * Navmenu Scrollspy
   */
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

  function initChatbot() {
    try {
      const toggleButton = document.getElementById('chatbot-toggle');
      const panel = document.getElementById('chatbot-panel');
      const closeButton = document.getElementById('chatbot-close');
      const form = document.getElementById('chatbot-form');
      const input = document.getElementById('chatbot-input');
      const messages = document.getElementById('chatbot-messages');
      const subtitle = document.getElementById('chatbot-subtitle');
      const langButtons = document.querySelectorAll('.chatbot-lang-btn');

      if (!toggleButton || !panel || !closeButton || !form || !input || !messages) {
        return;
      }

      let currentLang = 'fr';
      let state = 'language';

      const phrases = {
        fr: {
          greeting: 'Bonjour ! Je suis votre assistant Well-Being. Veuillez choisir votre langue : 1 pour Français, 2 pour English.',
          chooseLang: 'Merci. Je peux maintenant vous répondre en français. Comment puis-je vous assister sur Well-Being ?',
          unknown: 'Je n’ai pas de réponse précise à cette question pour l’instant. Vous pouvez :<ul><li>utiliser le formulaire de contact sur la page Contact ;</li><li>aller dans la section Partenaires pour discuter d’un accompagnement ;</li><li>cliquer sur le bouton « Discuter du partenariat » pour nous envoyer un message.</li></ul>Notre équipe d’assistance client lira votre message et vous répondra dès que possible.',
          askLanguage: 'Merci de choisir : tapez 1 pour Français ou 2 pour English, ou cliquez sur FR / EN.',
          askAgain: 'Désolé, je n’ai pas compris. Tapez 1 pour Français ou 2 pour English, ou utilisez les boutons FR / EN.'
        },
        en: {
          greeting: 'Hello! I am your Well-Being assistant. Please choose your language: 1 for French, 2 for English.',
          chooseLang: 'Thank you. I can now answer you in English. How may I assist you with Well-Being?',
          unknown: 'I do not have an exact answer to that right now. You can :<ul><li>use the contact form on the Contact page;</li><li>visit the Partners section to discuss support;</li><li>click the "Discuss partnership" button to send us a message.</li></ul>Our customer support team will read your message and reply as soon as possible.',
          askLanguage: 'Please choose: type 1 for French or 2 for English, or click FR / EN.',
          askAgain: 'Sorry, I did not understand. Type 1 for French or 2 for English, or use the FR / EN buttons.'
        }
      };

      const knowledgeBase = [
        { lang: 'fr', keywords: ['bienetre', 'bien-être', 'association', 'mission', 'parle', 'moi', 'well being', 'well-being', 'wellbeing'], response: 'Well-Being est une association qui accompagne les populations vulnérables à travers le soutien social, la sensibilisation et l’accès aux services essentiels. Notre mission est d’offrir un accompagnement bien-être, des ateliers de résilience, et un soutien psychologique adapté aux besoins de la communauté.' },
        { lang: 'en', keywords: ['wellbeing', 'well-being', 'association', 'mission', 'tell me about', 'tell me', 'about', 'well being'], response: 'Well-Being is an association supporting vulnerable people through social assistance, awareness, and access to essential services. Our mission is to provide wellness support, resilience workshops, and psychological assistance tailored to community needs.' },
        { lang: 'fr', keywords: ['service', 'services', 'aide', 'soutien'], response: 'Nos services incluent l’écoute psychologique, le coaching bien-être, l’accompagnement social, les ateliers de résilience et l’aide d’urgence.' },
        { lang: 'en', keywords: ['service', 'services', 'help', 'support'], response: 'Our services include psychological listening, wellness coaching, social support, resilience workshops, and emergency assistance.' },
        { lang: 'fr', keywords: ['contact', 'formulaire', 'telephone', 'téléphone', 'email', 'mail'], response: 'Vous pouvez remplir le formulaire de contact sur la page Contact. Notre équipe priorise les demandes urgentes et vous répondra rapidement.' },
        { lang: 'en', keywords: ['contact', 'form', 'phone', 'email', 'mail'], response: 'You can fill out the contact form on the Contact page. Our team prioritizes urgent requests and will reply quickly.' },
        { lang: 'fr', keywords: ['partenaire', 'partenariat', 'collaborer'], response: 'Pour devenir partenaire, visitez la section Partenaires et utilisez le bouton « Discuter du partenariat ». Nous vous aiderons à définir une collaboration adaptée.' },
        { lang: 'en', keywords: ['partner', 'partnership', 'collaborate'], response: 'To become a partner, visit the Partners section and use the "Discuss partnership" button. We will help you define a suitable collaboration.' },
        { lang: 'fr', keywords: ['urgence', 'urgent', 'immédiat', 'secours'], response: 'En cas d’urgence, contactez d’abord les services locaux, puis envoyez-nous les détails via le formulaire de contact. Notre équipe d’assistance suivra votre demande.' },
        { lang: 'en', keywords: ['emergency', 'urgent', 'help now', 'rescue'], response: 'In case of emergency, contact local services first, then send details through the Contact form. Our support team will follow up on your request.' }
      ];

      function normalize(text) {
        return text.toLowerCase().normalize('NFD').replace(/[\u0300-\u036f]/g, '');
      }

      function findBotResponse(userText) {
        const normalized = normalize(userText);
        const matches = knowledgeBase.filter(entry => entry.lang === currentLang && entry.keywords.some(kw => normalized.includes(kw)));
        if (matches.length) {
          return matches[0].response;
        }
        return phrases[currentLang].unknown;
      }

      function appendMessage(text, sender) {
        const msgEl = document.createElement('div');
        msgEl.className = `chatbot-message ${sender === 'user' ? 'user' : 'bot'}`;
        msgEl.innerHTML = sender === 'bot' ? text : text.replace(/</g, '&lt;').replace(/>/g, '&gt;');
        messages.appendChild(msgEl);
        messages.scrollTop = messages.scrollHeight;
      }

      function updateSubtitle() {
        if (!subtitle) return;
        subtitle.textContent = currentLang === 'en' ? 'Customer support assistant' : 'Assistant service client';
      }

      function setLanguage(lang) {
        currentLang = lang;
        state = 'chat';
        updateSubtitle();
        langButtons.forEach(button => {
          button.classList.toggle('active', button.dataset.lang === lang);
        });
        appendMessage(phrases[lang].chooseLang, 'bot');
      }

      function handleLanguageAnswer(text) {
        const normalized = normalize(text);
        const trimmed = normalized.trim();
        const isFrench = /(^|\s)(1|fr|franc|français|francais)(?=$|\s)/i.test(trimmed);
        const isEnglish = /(^|\s)(2|en|english)(?=$|\s)/i.test(trimmed);

        if (isFrench) {
          setLanguage('fr');
          return;
        }
        if (isEnglish) {
          setLanguage('en');
          return;
        }
        appendMessage(phrases['fr'].askAgain, 'bot');
      }

      function openPanel() {
        panel.classList.add('active');
        panel.setAttribute('aria-hidden', 'false');
        toggleButton.setAttribute('aria-expanded', 'true');
        input.focus();
      }

      function closePanel() {
        panel.classList.remove('active');
        panel.setAttribute('aria-hidden', 'true');
        toggleButton.setAttribute('aria-expanded', 'false');
      }

      toggleButton.addEventListener('click', () => {
        if (panel.classList.contains('active')) closePanel(); else openPanel();
      });

      closeButton.addEventListener('click', closePanel);

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        const text = input.value.trim();
        if (!text) return;

        if (state === 'language') {
          appendMessage(text, 'user');
          input.value = '';
          handleLanguageAnswer(text);
          return;
        }

        appendMessage(text, 'user');
        input.value = '';
        setTimeout(() => {
          appendMessage(findBotResponse(text), 'bot');
        }, 350);
      });

      // close with Escape
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && panel.classList.contains('active')) closePanel();
      });

      updateSubtitle();
      messages.innerHTML = '';
      appendMessage(phrases['fr'].greeting + '<br><br>' + phrases['fr'].askLanguage, 'bot');

    } catch (err) {
      console.error('Chatbot init failed:', err);
    }
  }

  window.addEventListener('DOMContentLoaded', initChatbot);
})();