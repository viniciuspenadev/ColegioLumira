<?php
// Vaga-lumes que passeiam por cima dos cards. Posicao fixa para nao "dançar" a cada reload.
$PILAR_FIREFLIES = [
    ['x' => 6, 'y' => 14, 's' => 6, 'dx' => 16, 'dy' => 22, 'd' => 13, 'g' => 3.4, 'delay' => 0],
    ['x' => 88, 'y' => 8, 's' => 5, 'dx' => -14, 'dy' => 26, 'd' => 16, 'g' => 4.2, 'delay' => 1.6],
    ['x' => 24, 'y' => 46, 's' => 7, 'dx' => 20, 'dy' => -18, 'd' => 14, 'g' => 2.9, 'delay' => 3.1],
    ['x' => 72, 'y' => 38, 's' => 4, 'dx' => -18, 'dy' => -22, 'd' => 17, 'g' => 3.8, 'delay' => 0.7],
    ['x' => 12, 'y' => 74, 's' => 5, 'dx' => 22, 'dy' => -16, 'd' => 15, 'g' => 4.5, 'delay' => 2.4],
    ['x' => 92, 'y' => 66, 's' => 6, 'dx' => -16, 'dy' => 20, 'd' => 12, 'g' => 3.2, 'delay' => 4.0],
    ['x' => 52, 'y' => 92, 's' => 5, 'dx' => 18, 'dy' => -24, 'd' => 18, 'g' => 3.6, 'delay' => 1.1],
];
?>
<section id="methodology" class="py-16 md:py-24 lg:min-h-[44rem] flex items-center bg-lumira-dark relative overflow-hidden">
    <!-- Foto do pátio ocupando a seção inteira -->
    <img src="assets/images/pilares-bg.webp" alt="" aria-hidden="true" loading="lazy" decoding="async"
        width="2400" height="1600"
        class="absolute inset-0 w-full h-full object-cover object-center pointer-events-none" />
    <!-- Véu azul-petróleo: garante contraste do título branco e dos cards
         centralizados sem apagar as cores do pátio. -->
    <div
        class="absolute inset-0 pointer-events-none bg-gradient-to-b from-[#1F5F73]/80 via-[#1F5F73]/45 to-[#1F5F73]/30">
    </div>

    <!-- Linhas pontilhadas: andam pelo traçado e vão sumindo e voltando -->
    <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 1200 620"
        preserveAspectRatio="xMidYMid slice" aria-hidden="true" focusable="false">
        <g class="trilhas" fill="none" stroke-linecap="round" vector-effect="non-scaling-stroke">
            <path class="trilha trilha--1" d="M-40,150 C260,60 480,250 760,150 S1080,70 1260,160" />
            <path class="trilha trilha--2" d="M-40,330 C220,430 520,240 820,340 S1120,420 1260,320" />
            <path class="trilha trilha--3" d="M-40,500 C300,410 560,560 900,470 S1160,530 1260,480" />
            <path class="trilha trilha--4" d="M180,-40 C240,180 120,360 260,560 S320,640 300,700" />
            <path class="trilha trilha--5" d="M980,-40 C900,200 1060,360 960,660" />
        </g>
    </svg>

    <div class="container w-full mx-auto px-4 md:px-8 relative z-10">

        <h2 class="text-white font-extrabold uppercase tracking-wider text-2xl md:text-4xl flex items-center justify-center gap-3 md:gap-5 mb-8 md:mb-12 [text-shadow:0_2px_12px_rgba(0,0,0,0.35)]">
            <span class="w-8 md:w-14 h-1 rounded-full bg-lumira-orange"></span>
            Nossos Pilares
            <span class="w-8 md:w-14 h-1 rounded-full bg-lumira-orange"></span>
        </h2>

        <!-- Pilares 2x2, centralizados -->
        <div class="grid sm:grid-cols-2 gap-4 md:gap-6 max-w-3xl mx-auto relative">

            <!-- vaga-lumes passeando por cima dos cards -->
            <div class="absolute -inset-4 z-20 pointer-events-none" aria-hidden="true">
                <?php foreach ($PILAR_FIREFLIES as $f): ?>
                    <span class="firefly"
                        style="left:<?php echo $f['x']; ?>%; top:<?php echo $f['y']; ?>%; width:<?php echo $f['s']; ?>px; height:<?php echo $f['s']; ?>px; --dx:<?php echo $f['dx']; ?>px; --dy:<?php echo $f['dy']; ?>px; --dur:<?php echo $f['d']; ?>s; --gdur:<?php echo $f['g']; ?>s; animation-delay:<?php echo $f['delay']; ?>s, <?php echo $f['delay'] / 2; ?>s;"></span>
                <?php endforeach; ?>
            </div>

            <?php foreach ($FEATURES as $idx => $feature):
                $par = $idx % 2 === 0;
                // coluna da esquerda inclina para um lado, a da direita para o outro
                $lado = $par ? 'sm:-rotate-[1.2deg]' : 'sm:rotate-[1.2deg] sm:translate-y-4';
                $canto = $par ? 'rounded-3xl sm:rounded-bl-md' : 'rounded-3xl sm:rounded-tr-md';
                $cor = $par
                    ? 'bg-lumira-light text-lumira-blue group-hover:bg-lumira-blue group-hover:text-white'
                    : 'bg-orange-50 text-lumira-orange group-hover:bg-lumira-orange group-hover:text-white';
                ?>
                <article
                    class="group <?php echo $lado; ?> <?php echo $canto; ?> bg-white shadow-lg shadow-lumira-dark/20 p-4 sm:p-5 transition-all duration-500 hover:shadow-xl hover:-translate-y-1 sm:hover:rotate-0">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-10 h-10 rounded-lg flex items-center justify-center shrink-0 transition-colors duration-300 <?php echo $cor; ?>">
                            <i data-lucide="<?php echo $feature['icon']; ?>" class="w-5 h-5" stroke-width="1.9"></i>
                        </div>
                        <div class="min-w-0">
                            <h3
                                class="text-base font-bold text-lumira-dark mb-1 group-hover:text-lumira-blue transition-colors">
                                <?php echo $feature['title']; ?>
                            </h3>
                            <p class="text-slate-500 text-sm leading-snug">
                                <?php echo $feature['description']; ?>
                            </p>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<style>
    /* Traçado pontilhado que caminha e pisca, atrás de tudo */
    #methodology .trilhas {
        stroke: #FFFFFF;
        stroke-width: 2.5;
        stroke-dasharray: 1 16;
    }

    #methodology .trilha {
        opacity: 0;
        animation:
            trilha-andar 18s linear infinite,
            trilha-piscar 11s ease-in-out infinite;
    }

    #methodology .trilha--2 {
        stroke: #F59E3F;
        animation-duration: 24s, 9s;
        animation-delay: -3s, -2s;
    }

    #methodology .trilha--3 {
        animation-duration: 21s, 13s;
        animation-delay: -8s, -5s;
    }

    #methodology .trilha--4 {
        stroke: #F59E3F;
        animation-duration: 26s, 15s;
        animation-delay: -12s, -7s;
    }

    #methodology .trilha--5 {
        animation-duration: 20s, 10s;
        animation-delay: -5s, -9s;
    }

    @keyframes trilha-andar {
        to {
            stroke-dashoffset: -340;
        }
    }

    @keyframes trilha-piscar {

        0%,
        100% {
            opacity: 0;
        }

        20%,
        70% {
            opacity: 0.75;
        }
    }

    @media (prefers-reduced-motion: reduce) {
        #methodology .trilha {
            animation: none;
            opacity: 0.45;
        }
    }
</style>
