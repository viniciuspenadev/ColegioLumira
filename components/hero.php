<?php
// Vaga-lumes (o bicho do logo): posição/ritmo fixos, para não "dançar" a cada reload
$FIREFLIES = [
    ['x' => 8, 'y' => 22, 's' => 7, 'dx' => 18, 'dy' => -26, 'd' => 11, 'g' => 3.2, 'delay' => 0],
    ['x' => 17, 'y' => 58, 's' => 5, 'dx' => -14, 'dy' => -20, 'd' => 14, 'g' => 4.1, 'delay' => 1.4],
    ['x' => 26, 'y' => 12, 's' => 4, 'dx' => 22, 'dy' => 16, 'd' => 16, 'g' => 2.8, 'delay' => 2.6],
    ['x' => 34, 'y' => 44, 's' => 6, 'dx' => -20, 'dy' => 22, 'd' => 12, 'g' => 3.6, 'delay' => 0.8],
    ['x' => 45, 'y' => 18, 's' => 5, 'dx' => 16, 'dy' => -18, 'd' => 15, 'g' => 4.4, 'delay' => 3.1],
    ['x' => 56, 'y' => 62, 's' => 8, 'dx' => -24, 'dy' => -14, 'd' => 13, 'g' => 3.0, 'delay' => 1.9],
    ['x' => 63, 'y' => 30, 's' => 4, 'dx' => 20, 'dy' => 24, 'd' => 17, 'g' => 3.8, 'delay' => 0.4],
    ['x' => 71, 'y' => 52, 's' => 6, 'dx' => -18, 'dy' => -22, 'd' => 12, 'g' => 4.6, 'delay' => 2.2],
    ['x' => 79, 'y' => 16, 's' => 5, 'dx' => 14, 'dy' => 20, 'd' => 14, 'g' => 3.4, 'delay' => 1.1],
    ['x' => 86, 'y' => 40, 's' => 7, 'dx' => -22, 'dy' => 18, 'd' => 16, 'g' => 2.9, 'delay' => 3.6],
    ['x' => 92, 'y' => 66, 's' => 4, 'dx' => 18, 'dy' => -16, 'd' => 13, 'g' => 4.2, 'delay' => 0.6],
    ['x' => 40, 'y' => 78, 's' => 5, 'dx' => -16, 'dy' => -24, 'd' => 15, 'g' => 3.3, 'delay' => 2.9],
    ['x' => 50, 'y' => 88, 's' => 6, 'dx' => 20, 'dy' => -18, 'd' => 16, 'g' => 3.9, 'delay' => 1.7],
    ['x' => 22, 'y' => 84, 's' => 4, 'dx' => -18, 'dy' => -14, 'd' => 13, 'g' => 4.3, 'delay' => 3.3],
];
?>
<section id="home" class="relative w-full overflow-hidden min-h-[34rem] bg-lumira-dark">

    <!-- Foto da escola -->
    <div class="hero-layer absolute inset-0" data-depth="0.12">
        <img src="assets/images/fachada-lumira.webp"
            alt="Fachada do Colégio Lumirá, berçário e educação infantil na Vila Augusta, Guarulhos"
            fetchpriority="high" decoding="async" class="w-full h-full object-cover object-center" />
    </div>

    <!-- Véus: escurece a esquerda (onde fica o texto) e a base, sem apagar a escola -->
    <div class="absolute inset-0 bg-gradient-to-r from-lumira-dark/90 via-lumira-dark/55 to-lumira-dark/15"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-lumira-dark/70 via-transparent to-lumira-dark/40"></div>

    <!-- Vaga-lumes -->
    <div class="absolute inset-0 z-10 pointer-events-none" aria-hidden="true">
        <?php foreach ($FIREFLIES as $f): ?>
            <span class="firefly"
                style="left:<?php echo $f['x']; ?>%; top:<?php echo $f['y']; ?>%; width:<?php echo $f['s']; ?>px; height:<?php echo $f['s']; ?>px; --dx:<?php echo $f['dx']; ?>px; --dy:<?php echo $f['dy']; ?>px; --dur:<?php echo $f['d']; ?>s; --gdur:<?php echo $f['g']; ?>s; animation-delay:<?php echo $f['delay']; ?>s, <?php echo $f['delay'] / 2; ?>s;"></span>
        <?php endforeach; ?>
    </div>

    <!-- Conteúdo -->
    <div class="absolute inset-0 z-20 flex items-center pt-24 md:pt-28">
        <div class="container mx-auto px-4 md:px-8">
            <div class="max-w-4xl text-white">
                <!-- H1: o termo que as famílias digitam + cidade -->
                <h1 class="text-fluid-h1 font-bold mb-5 drop-shadow-lg leading-[1.08] text-balance">
                    Educação Infantil
                    <span class="block text-lumira-orange">em Guarulhos</span>
                </h1>

                <p class="text-lg md:text-xl mb-8 font-light text-white/90 max-w-2xl drop-shadow-md leading-relaxed">
                    O <strong class="font-semibold text-white">Colégio Lumirá</strong> acolhe crianças de
                    <strong class="font-semibold text-white">4 meses a 6 anos</strong> na Vila Augusta, em período
                    regular, semi-integral ou integral. Horta, cozinha própria, ateliê e inglês fazem parte da
                    rotina de todos os dias.
                </p>

                <div class="flex flex-wrap gap-3 md:gap-4">
                    <a href="<?php echo ($base_url ?? '') . 'agendar.php'; ?>"
                        class="px-7 md:px-8 py-4 bg-lumira-orange hover:bg-orange-500 text-white rounded-full font-bold text-base md:text-lg transition-all transform hover:scale-105 shadow-lg shadow-lumira-dark/40 flex items-center gap-2">
                        Agende uma visita <i data-lucide="arrow-right" class="w-5 h-5"></i>
                    </a>
                    <a href="#school-life"
                        class="px-7 md:px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/30 text-white rounded-full font-bold text-base md:text-lg transition-all flex items-center gap-2">
                        Conheça o dia a dia
                    </a>
                </div>

                <!-- Dados que as famílias procuram (e que o Google lê) -->
                <ul class="hidden sm:flex flex-wrap items-center gap-x-6 gap-y-2 mt-8 text-sm text-white/75">
                    <li class="flex items-center gap-2">
                        <i data-lucide="map-pin" class="w-4 h-4 text-lumira-orange"></i>
                        Vila Augusta, Guarulhos
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="clock" class="w-4 h-4 text-lumira-orange"></i>
                        Seg a Sex, 7h às 19h
                    </li>
                    <li class="flex items-center gap-2">
                        <i data-lucide="baby" class="w-4 h-4 text-lumira-orange"></i>
                        A partir de 4 meses
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Convite a rolar -->
    <a href="#about"
        class="absolute bottom-5 left-1/2 -translate-x-1/2 z-30 hidden md:flex flex-col items-center gap-1 text-white/70 hover:text-white transition-colors"
        aria-label="Rolar para a próxima seção">
        <span class="text-[0.7rem] font-bold uppercase tracking-[0.18em]">Role</span>
        <i data-lucide="chevron-down" class="w-5 h-5 animate-bounce"></i>
    </a>
</section>

<style>
    /* Tela cheia. svh = altura estavel no celular (nao pula quando a barra do navegador some) */
    #home {
        height: 100vh;
    }

    @supports (height: 100svh) {
        #home {
            height: 100svh;
        }
    }

    /* Parallax suave da foto. A escala dá margem para o deslocamento não abrir borda. */
    #home .hero-layer {
        transform: translate3d(var(--px, 0), var(--py, 0), 0) scale(1.12);
        will-change: transform;
    }

    @media (prefers-reduced-motion: reduce) {

        #home .animate-bounce {
            animation: none;
        }

        #home .hero-layer {
            transform: scale(1.12);
        }
    }
</style>
