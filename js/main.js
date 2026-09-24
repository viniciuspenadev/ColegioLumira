document.addEventListener('DOMContentLoaded', () => {

    // --- Mobile Menu Toggle ---
    const mobileMenuButton = document.getElementById('mobile-menu-btn');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const header = document.querySelector('header');

    if (mobileMenuButton && mobileMenuOverlay) {
        mobileMenuButton.addEventListener('click', () => {
            const isOpen = mobileMenuOverlay.classList.contains('opacity-100');
            toggleMenu(!isOpen);
        });

        // Close when clicking a link
        document.querySelectorAll('.mobile-menu-link').forEach(link => {
            link.addEventListener('click', () => toggleMenu(false));
        });
    }

    function toggleMenu(show) {
        const iconMenu = document.getElementById('icon-menu');
        const iconClose = document.getElementById('icon-close');

        if (show) {
            mobileMenuOverlay.classList.remove('opacity-0', 'pointer-events-none');
            mobileMenuOverlay.classList.add('opacity-100', 'pointer-events-auto');
            iconMenu?.classList.add('hidden');
            iconClose?.classList.remove('hidden');

            mobileMenuOverlay.querySelectorAll('.mobile-item').forEach((link, idx) => {
                setTimeout(() => {
                    link.classList.remove('-translate-x-10', 'opacity-0');
                    link.classList.add('translate-x-0', 'opacity-100');
                }, idx * 50);
            });
        } else {
            mobileMenuOverlay.classList.remove('opacity-100', 'pointer-events-auto');
            mobileMenuOverlay.classList.add('opacity-0', 'pointer-events-none');
            iconMenu?.classList.remove('hidden');
            iconClose?.classList.add('hidden');

            mobileMenuOverlay.querySelectorAll('.mobile-item').forEach(link => {
                link.classList.add('-translate-x-10', 'opacity-0');
                link.classList.remove('translate-x-0', 'opacity-100');
            });
        }
    }

    // --- Header Scroll Effect ---
    window.addEventListener('scroll', () => {
        const logoWhite = document.querySelector('.logo-white');
        const logoOriginal = document.querySelector('.logo-original');

        if (window.scrollY > 20) {
            header.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'py-2');
            header.classList.remove('bg-transparent', 'py-4');

            document.querySelectorAll('.header-link').forEach(link => {
                link.classList.remove('md:text-white', 'md:mix-blend-overlay');
                link.classList.add('text-lumira-dark');
            });
            document.querySelector('button[aria-label="Menu"]')?.classList.remove('text-white');
            document.querySelector('button[aria-label="Menu"]')?.classList.add('text-lumira-dark');

            // Switch to Original Logo
            if (logoWhite) logoWhite.classList.add('opacity-0');
            if (logoOriginal) logoOriginal.classList.remove('opacity-0');

        } else {
            header.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'py-2');
            header.classList.add('bg-transparent', 'py-4');

            document.querySelectorAll('.header-link').forEach(link => {
                link.classList.add('md:text-white', 'md:mix-blend-overlay');
                link.classList.remove('text-lumira-dark');
            });
            document.querySelector('button[aria-label="Menu"]')?.classList.add('text-white');
            document.querySelector('button[aria-label="Menu"]')?.classList.remove('text-lumira-dark');

            // Switch to White Logo
            if (logoWhite) logoWhite.classList.remove('opacity-0');
            if (logoOriginal) logoOriginal.classList.add('opacity-0');
        }
    });

    // --- Mega Menu Image Hover ---
    document.querySelectorAll('.nav-item-group').forEach(item => {
        const previewImage = item.querySelector('.mega-menu-image');
        const previewText = item.querySelector('.mega-menu-text');

        item.querySelectorAll('[data-image]').forEach(link => {
            link.addEventListener('mouseenter', () => {
                const imageUrl = link.getAttribute('data-image');
                const description = link.getAttribute('data-description');

                if (previewImage && imageUrl) previewImage.src = imageUrl;
                if (previewText && description) previewText.textContent = description;
            });
        });
    });

    // --- Hero: parallax das nuvens ---
    const heroLayers = document.querySelectorAll('#home .hero-layer');
    const semMovimento = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (heroLayers.length > 0 && !semMovimento) {
        let scrollY = 0;
        let mouseX = 0;
        let mouseY = 0;
        let agendado = false;

        const aplicar = () => {
            agendado = false;
            heroLayers.forEach(layer => {
                const depth = parseFloat(layer.dataset.depth) || 0.2;
                // scroll manda no eixo Y; o mouse só tempera
                const y = scrollY * depth * -0.35 + mouseY * depth * 14;
                const x = mouseX * depth * 26;
                layer.style.setProperty('--px', x.toFixed(1) + 'px');
                layer.style.setProperty('--py', y.toFixed(1) + 'px');
            });
        };

        const pedir = () => {
            if (agendado) return;
            agendado = true;
            requestAnimationFrame(aplicar);
        };

        const hero = document.getElementById('home');
        window.addEventListener('scroll', () => {
            // Só custa enquanto o hero está na tela
            if (window.scrollY > hero.offsetHeight) return;
            scrollY = window.scrollY;
            pedir();
        }, { passive: true });

        // Mouse apenas onde faz sentido (aponta e clica não combina com hover)
        if (window.matchMedia('(pointer: fine)').matches) {
            hero.addEventListener('mousemove', e => {
                const r = hero.getBoundingClientRect();
                mouseX = (e.clientX - r.width / 2) / r.width;
                mouseY = (e.clientY - r.height / 2) / r.height;
                pedir();
            });
            hero.addEventListener('mouseleave', () => {
                mouseX = 0;
                mouseY = 0;
                pedir();
            });
        }

        aplicar();
    }

    // --- About Video ---
    const playBtn = document.getElementById('play-video-btn');
    if (playBtn) {
        playBtn.addEventListener('click', () => {
            document.getElementById('video-cover').classList.add('opacity-0', 'pointer-events-none');
            document.getElementById('video-playing').classList.remove('opacity-0');
        });
    }

    // --- School Life Tabs ---
    const activityTabs = Array.from(document.querySelectorAll('.activity-tab'));
    if (activityTabs.length > 0) {
        const activate = (index, focus = false) => {
            activityTabs.forEach((tab, i) => {
                const on = i === index;
                const number = tab.querySelector('.activity-number');
                const title = tab.querySelector('.activity-title');
                const body = tab.querySelector('.activity-body');
                const arrow = tab.querySelector('.activity-arrow');

                tab.classList.toggle('is-active', on);
                tab.setAttribute('aria-selected', on ? 'true' : 'false');
                tab.tabIndex = on ? 0 : -1;

                // Cartoes no mobile; no desktop as abas sao apenas linhas
                tab.classList.toggle('bg-lumira-light/70', on);
                tab.classList.toggle('border-lumira-blue/20', on);
                tab.classList.toggle('bg-slate-50', !on);
                tab.classList.toggle('border-slate-100', !on);
                tab.classList.toggle('hover:bg-lumira-light/40', !on);

                number.classList.toggle('text-lumira-orange', on);
                number.classList.toggle('text-slate-400', !on);

                title.classList.toggle('text-lumira-dark', on);
                title.classList.toggle('text-slate-500', !on);
                title.classList.toggle('lg:group-hover:text-lumira-dark', !on);

                body.classList.toggle('grid-rows-[1fr]', on);
                body.classList.toggle('opacity-100', on);
                body.classList.toggle('grid-rows-[0fr]', !on);
                body.classList.toggle('opacity-0', !on);

                if (arrow) {
                    arrow.classList.toggle('rotate-45', on);
                    arrow.classList.toggle('text-lumira-orange', on);
                    arrow.classList.toggle('rotate-0', !on);
                    arrow.classList.toggle('text-slate-300', !on);
                }

                if (on && focus) tab.focus();

                // Faixa deslizante no mobile: traz a aba ativa para a vista
                if (on) {
                    const strip = document.getElementById('activity-strip');
                    if (strip && strip.scrollWidth > strip.clientWidth) {
                        strip.scrollTo({
                            left: tab.offsetLeft - strip.offsetLeft - 16,
                            behavior: 'smooth'
                        });
                    }
                }
            });

            const id = activityTabs[index].getAttribute('data-id');
            document.querySelectorAll('.activity-content').forEach(panel => {
                const on = panel.id === `activity-${id}`;
                panel.classList.toggle('opacity-100', on);
                panel.classList.toggle('z-10', on);
                panel.classList.toggle('opacity-0', !on);
                panel.classList.toggle('z-0', !on);
                panel.classList.toggle('invisible', !on);
            });
        };

        // Swipe sobre a foto troca de vivencia
        const stage = document.querySelector('.activity-content')?.parentElement;
        if (stage) {
            let startX = null;
            stage.addEventListener('touchstart', e => { startX = e.changedTouches[0].clientX; }, { passive: true });
            stage.addEventListener('touchend', e => {
                if (startX === null) return;
                const delta = e.changedTouches[0].clientX - startX;
                startX = null;
                if (Math.abs(delta) < 60) return;
                const atual = activityTabs.findIndex(t => t.getAttribute('aria-selected') === 'true');
                const passo = delta < 0 ? 1 : -1;
                activate((atual + passo + activityTabs.length) % activityTabs.length);
            }, { passive: true });
        }

        activityTabs.forEach((tab, index) => {
            tab.addEventListener('click', () => activate(index));
            tab.addEventListener('keydown', e => {
                const keys = ['ArrowRight', 'ArrowLeft', 'ArrowDown', 'ArrowUp', 'Home', 'End'];
                if (!keys.includes(e.key)) return;
                e.preventDefault();

                let next = index;
                if (e.key === 'Home') next = 0;
                else if (e.key === 'End') next = activityTabs.length - 1;
                else if (e.key === 'ArrowRight' || e.key === 'ArrowDown') next = (index + 1) % activityTabs.length;
                else next = (index - 1 + activityTabs.length) % activityTabs.length;

                activate(next, true);
            });
        });
    }

    // --- Gallery (bento + ver mais + lightbox) ---
    const galleryGrid = document.getElementById('gallery-grid');
    if (galleryGrid) {
        const STEP = 8;
        const allItems = Array.from(galleryGrid.querySelectorAll('.gallery-item'));
        const filterBtns = document.querySelectorAll('.gallery-filter');
        const moreBtn = document.getElementById('gallery-more');
        const moreLabel = document.getElementById('gallery-more-label');
        const moreIcon = document.getElementById('gallery-more-icon');
        const counter = document.getElementById('gallery-counter');
        const emptyMsg = document.getElementById('gallery-empty');

        let activeFilter = 'todos';
        let visibleCount = STEP;
        let visibleItems = [];

        const matchesFilter = item =>
            activeFilter === 'todos' || item.getAttribute('data-category') === activeFilter;

        function render() {
            const matching = allItems.filter(matchesFilter);
            visibleItems = matching.slice(0, visibleCount);

            allItems.forEach(item => {
                const show = visibleItems.includes(item);
                item.classList.toggle('hidden', !show);
                if (!show) item.classList.remove('is-revealed');
            });

            // Reindexa para o lightbox navegar apenas no que esta na tela
            visibleItems.forEach((item, idx) => item.setAttribute('data-index', idx));

            reveal(visibleItems);

            const remaining = matching.length - visibleItems.length;
            emptyMsg.classList.toggle('hidden', matching.length > 0);

            if (matching.length <= STEP) {
                moreBtn.classList.add('hidden');
            } else {
                moreBtn.classList.remove('hidden');
                const isExpanded = remaining === 0;
                moreLabel.textContent = isExpanded ? 'Ver menos' : 'Ver mais fotos';
                moreIcon.classList.toggle('rotate-180', isExpanded);
            }

            counter.textContent = matching.length
                ? visibleItems.length + ' de ' + matching.length + ' fotos'
                : '';
        }

        // Entrada escalonada dos cards
        function reveal(items) {
            items.forEach((item, idx) => {
                if (item.classList.contains('is-revealed')) return;
                item.classList.add('is-revealed');
                item.style.opacity = '0';
                item.style.transform = 'translateY(20px) scale(0.97)';
                item.style.transition = 'opacity 600ms ease-out, transform 600ms ease-out';
                setTimeout(() => {
                    item.style.opacity = '1';
                    item.style.transform = 'none';
                }, Math.min(idx, 8) * 70);
            });
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                activeFilter = btn.getAttribute('data-filter');
                visibleCount = STEP;

                filterBtns.forEach(b => {
                    const on = b === btn;
                    b.setAttribute('aria-pressed', on ? 'true' : 'false');
                    b.classList.toggle('bg-lumira-blue', on);
                    b.classList.toggle('text-white', on);
                    b.classList.toggle('shadow-md', on);
                    b.classList.toggle('shadow-lumira-blue/20', on);
                    b.classList.toggle('bg-lumira-light/60', !on);
                    b.classList.toggle('text-slate-500', !on);
                    b.classList.toggle('hover:bg-lumira-light', !on);
                    b.classList.toggle('hover:text-lumira-blue', !on);
                });

                render();
            });
        });

        moreBtn?.addEventListener('click', () => {
            const total = allItems.filter(matchesFilter).length;
            if (visibleCount >= total) {
                visibleCount = STEP;
                galleryGrid.scrollIntoView({ behavior: 'smooth', block: 'start' });
            } else {
                visibleCount += STEP;
            }
            render();
        });

        // Lightbox
        const lightbox = document.getElementById('lightbox-modal');
        const lightboxImg = document.getElementById('lightbox-image');
        const lightboxCap = document.getElementById('lightbox-caption');
        const lightboxDesc = document.getElementById('lightbox-desc');
        const lightboxPos = document.getElementById('lightbox-position');
        let currentIndex = 0;

        function showPhoto(index) {
            if (!visibleItems.length) return;
            currentIndex = (index + visibleItems.length) % visibleItems.length;
            const item = visibleItems[currentIndex];

            lightboxImg.style.opacity = '0';
            const next = new Image();
            next.src = item.getAttribute('data-src');
            next.onload = () => {
                lightboxImg.src = next.src;
                lightboxImg.alt = item.getAttribute('data-caption');
                lightboxImg.style.opacity = '1';
            };

            lightboxCap.textContent = item.getAttribute('data-caption');
            lightboxDesc.textContent = item.getAttribute('data-desc');
            lightboxPos.textContent = (currentIndex + 1) + ' / ' + visibleItems.length;
        }

        function openLightbox(index) {
            showPhoto(index);
            lightbox.classList.remove('hidden');
            void lightbox.offsetWidth; // commita o estado inicial para a transicao rodar
            lightbox.classList.remove('opacity-0');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            lightbox.classList.add('opacity-0');
            document.body.style.overflow = '';
            setTimeout(() => {
                lightbox.classList.add('hidden');
                lightboxImg.src = '';
            }, 300);
        }

        galleryGrid.addEventListener('click', e => {
            const item = e.target.closest('.gallery-item');
            if (item) openLightbox(parseInt(item.getAttribute('data-index'), 10));
        });

        document.getElementById('lightbox-close')?.addEventListener('click', closeLightbox);
        document.getElementById('lightbox-prev')?.addEventListener('click', () => showPhoto(currentIndex - 1));
        document.getElementById('lightbox-next')?.addEventListener('click', () => showPhoto(currentIndex + 1));

        // Clicar no fundo fecha (a imagem e a legenda tem pointer-events-auto)
        lightbox?.addEventListener('click', e => {
            if (e.target === lightbox) closeLightbox();
        });

        document.addEventListener('keydown', e => {
            if (!lightbox || lightbox.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') showPhoto(currentIndex - 1);
            if (e.key === 'ArrowRight') showPhoto(currentIndex + 1);
        });

        // Swipe no mobile
        let touchX = null;
        lightbox?.addEventListener('touchstart', e => { touchX = e.changedTouches[0].clientX; }, { passive: true });
        lightbox?.addEventListener('touchend', e => {
            if (touchX === null) return;
            const delta = e.changedTouches[0].clientX - touchX;
            if (Math.abs(delta) > 60) showPhoto(currentIndex + (delta < 0 ? 1 : -1));
            touchX = null;
        }, { passive: true });

        render();
    }

    // --- FAQ Accordion ---
    document.querySelectorAll('.faq-toggle').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const isExpanded = toggle.getAttribute('aria-expanded') === 'true';

            // Close all first (optional, for accordion style)
            // document.querySelectorAll('.faq-toggle').forEach(t => {
            //     t.setAttribute('aria-expanded', 'false');
            //     t.nextElementSibling.style.maxHeight = '0px';
            //     t.nextElementSibling.classList.remove('opacity-100');
            //     t.querySelector('.faq-question').classList.remove('text-lumira-blue');
            //     t.querySelector('.faq-icon').classList.remove('rotate-180');
            // });

            if (!isExpanded) {
                toggle.setAttribute('aria-expanded', 'true');
                const answer = toggle.nextElementSibling;
                answer.style.maxHeight = answer.scrollHeight + "px";
                answer.classList.add('opacity-100');
                toggle.querySelector('.faq-question').classList.add('text-lumira-blue');
                toggle.querySelector('.faq-icon').classList.add('rotate-180');
            } else {
                toggle.setAttribute('aria-expanded', 'false');
                const answer = toggle.nextElementSibling;
                answer.style.maxHeight = '0px';
                answer.classList.remove('opacity-100');
                toggle.querySelector('.faq-question').classList.remove('text-lumira-blue');
                toggle.querySelector('.faq-icon').classList.remove('rotate-180');
            }
        });
    });

    // --- Contact Form ---
    // --- Mapa: destrava a interacao so no clique ---
    const mapaTrava = document.getElementById('mapa-destravar');
    mapaTrava?.addEventListener('click', () => mapaTrava.remove());

    // --- Contato: valida, monta a mensagem e entrega pelo WhatsApp ---
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        const whatsapp = contactForm.dataset.whatsapp;
        const campoNome = document.getElementById('contact-name');
        const campoTel = document.getElementById('contact-phone');
        const campoIdade = document.getElementById('contact-child');
        const campoMsg = document.getElementById('contact-message');
        const consent = document.getElementById('privacy-consent');
        const isca = document.getElementById('contact-site');
        const sucesso = document.getElementById('contact-success');

        // Mascara: (11) 90000-0000
        campoTel?.addEventListener('input', () => {
            const d = campoTel.value.replace(/\D/g, '').slice(0, 11);
            let v = d;
            if (d.length > 2) v = '(' + d.slice(0, 2) + ') ' + d.slice(2);
            if (d.length > 6) {
                const corte = d.length > 10 ? 7 : 6;
                v = '(' + d.slice(0, 2) + ') ' + d.slice(2, corte) + '-' + d.slice(corte);
            }
            campoTel.value = v;
        });

        const mostrarErro = (campo, texto) => {
            const alvo = campo.id === 'privacy-consent'
                ? document.getElementById('consent-erro')
                : campo.parentElement.querySelector('.erro-campo');
            if (!alvo) return;
            alvo.textContent = texto;
            alvo.classList.remove('hidden');
            campo.setAttribute('aria-invalid', 'true');
            if (campo.classList.contains('rounded-xl')) campo.classList.add('border-red-400');
        };

        const limparErros = () => {
            contactForm.querySelectorAll('.erro-campo').forEach(p => {
                p.textContent = '';
                p.classList.add('hidden');
            });
            contactForm.querySelectorAll('[aria-invalid]').forEach(c => {
                c.removeAttribute('aria-invalid');
                c.classList.remove('border-red-400');
            });
        };

        contactForm.addEventListener('submit', e => {
            e.preventDefault();
            limparErros();

            // Robo preencheu o campo escondido: encerra sem avisar
            if (isca && isca.value.trim() !== '') return;

            const digitos = (campoTel?.value || '').replace(/\D/g, '');
            let primeiro = null;

            if (!campoNome.value.trim()) {
                mostrarErro(campoNome, 'Precisamos do seu nome para responder.');
                primeiro = primeiro || campoNome;
            }
            if (digitos.length < 10) {
                mostrarErro(campoTel, 'Digite o telefone com DDD, como (11) 90000-0000.');
                primeiro = primeiro || campoTel;
            }
            if (!campoMsg.value.trim()) {
                mostrarErro(campoMsg, 'Escreva sua mensagem para a escola.');
                primeiro = primeiro || campoMsg;
            }
            if (!consent.checked) {
                mostrarErro(consent, 'É preciso aceitar a Política de Privacidade.');
                primeiro = primeiro || consent;
            }

            if (primeiro) {
                primeiro.focus();
                primeiro.scrollIntoView({ behavior: 'smooth', block: 'center' });
                return;
            }

            const idade = campoIdade?.value ? `\nIdade da criança: ${campoIdade.value}` : '';
            const texto =
                `Olá! Meu nome é ${campoNome.value.trim()}.` +
                `\nTelefone: ${campoTel.value.trim()}` + idade +
                `\n\n${campoMsg.value.trim()}`;

            window.open(`https://wa.me/${whatsapp}?text=${encodeURIComponent(texto)}`, '_blank', 'noopener');

            contactForm.classList.add('hidden');
            sucesso.classList.remove('hidden');
        });

        document.getElementById('contact-reset')?.addEventListener('click', () => {
            contactForm.reset();
            limparErros();
            sucesso.classList.add('hidden');
            contactForm.classList.remove('hidden');
        });
    }

    // --- Marketing Modal ---
    const modal = document.getElementById('marketing-modal');
    if (modal) { // && !sessionStorage.getItem('lumira_promo_2027_seen')) {
        setTimeout(() => {
            modal.classList.remove('invisible', 'pointer-events-none', 'opacity-0');
            modal.querySelector('#marketing-modal-bg').classList.add('bg-black/60', 'backdrop-blur-sm');

            const content = document.getElementById('marketing-modal-content');
            content.classList.remove('scale-95', 'translate-y-10', 'opacity-0');
            content.classList.add('scale-100', 'translate-y-0', 'opacity-100');
        }, 2500);

        function closeModal() {
            const content = document.getElementById('marketing-modal-content');
            content.classList.remove('scale-100', 'translate-y-0', 'opacity-100');
            content.classList.add('scale-95', 'translate-y-10', 'opacity-0');

            modal.querySelector('#marketing-modal-bg').classList.remove('bg-black/60', 'backdrop-blur-sm');

            setTimeout(() => {
                modal.classList.add('opacity-0', 'invisible', 'pointer-events-none');
                sessionStorage.setItem('lumira_promo_2027_seen', 'true');
            }, 500);
        }

        document.getElementById('marketing-modal-close')?.addEventListener('click', closeModal);
        document.getElementById('marketing-modal-dismiss')?.addEventListener('click', closeModal);
        document.getElementById('marketing-modal-bg')?.addEventListener('click', closeModal);
        document.getElementById('marketing-modal-cta')?.addEventListener('click', closeModal);
    }

    // --- Initialize Lucide ---
    if (window.lucide) {
        lucide.createIcons();
    }
});
