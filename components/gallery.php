<?php
// Quantos cards aparecem antes do "Ver mais"
$GALLERY_INITIAL = 8;
?>
<section id="gallery" class="py-20 md:py-28 bg-white relative overflow-hidden">
    <!-- Decorative -->
    <div class="absolute top-24 right-0 w-96 h-96 bg-lumira-light rounded-full blur-3xl -translate-y-1/3 translate-x-1/3 opacity-60">
    </div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-orange-50 rounded-full blur-3xl translate-y-1/3 -translate-x-1/3">
    </div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">

        <!-- Header -->
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 text-lumira-blue font-bold uppercase tracking-wider text-sm">
                <i data-lucide="camera" class="w-4 h-4"></i> Galeria Lumirá
            </span>
            <h2 class="text-3xl md:text-5xl font-bold text-lumira-dark mt-2 mb-6">Conheça nossos espaços</h2>
            <p class="text-slate-500 max-w-2xl mx-auto text-lg">
                Os espaços onde as crianças passam o dia. Toque em uma foto para ampliar.
            </p>
        </div>

        <!-- Filtros -->
        <div class="flex flex-wrap justify-center gap-2 mb-10" id="gallery-filters">
            <?php foreach ($GALLERY_CATEGORIES as $cat): ?>
                <button type="button"
                    class="gallery-filter px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300 <?php echo $cat['id'] === 'todos' ? 'bg-lumira-blue text-white shadow-md shadow-lumira-blue/20' : 'bg-lumira-light/60 text-slate-500 hover:bg-lumira-light hover:text-lumira-blue'; ?>"
                    data-filter="<?php echo $cat['id']; ?>"
                    aria-pressed="<?php echo $cat['id'] === 'todos' ? 'true' : 'false'; ?>">
                    <?php echo $cat['label']; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Bento Grid -->
        <div id="gallery-grid"
            class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 grid-flow-row-dense gap-3 md:gap-4 auto-rows-[9.5rem] md:auto-rows-[11rem] lg:auto-rows-[12rem]">
            <?php foreach ($GALLERY_ITEMS as $index => $item): ?>
                <button type="button"
                    class="gallery-item group relative overflow-hidden rounded-2xl md:rounded-[1.75rem] bg-lumira-light text-left shadow-sm hover:shadow-xl transition-shadow duration-300 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-lumira-orange/40 <?php echo $item['span']; ?> <?php echo $index >= $GALLERY_INITIAL ? 'hidden' : ''; ?>"
                    data-index="<?php echo $index; ?>" data-category="<?php echo $item['category']; ?>"
                    data-src="<?php echo $item['src']; ?>"
                    data-caption="<?php echo htmlspecialchars($item['caption'], ENT_QUOTES, 'UTF-8'); ?>"
                    data-desc="<?php echo htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8'); ?>"
                    aria-label="Ampliar foto: <?php echo htmlspecialchars($item['caption'], ENT_QUOTES, 'UTF-8'); ?>">

                    <img src="<?php echo $item['thumb']; ?>"
                        alt="<?php echo htmlspecialchars($item['caption'] . '. ' . $item['desc'], ENT_QUOTES, 'UTF-8'); ?>"
                        loading="lazy" decoding="async" width="900" height="600"
                        class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />

                    <!-- Gradient -->
                    <div
                        class="absolute inset-0 bg-gradient-to-t from-lumira-dark/90 via-lumira-dark/20 to-transparent opacity-0 group-hover:opacity-100 md:opacity-0 transition-opacity duration-500">
                    </div>

                    <!-- Legenda -->
                    <div
                        class="absolute inset-x-0 bottom-0 p-4 md:p-5 translate-y-3 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        <p class="text-white font-bold text-base md:text-lg leading-tight drop-shadow">
                            <?php echo $item['caption']; ?>
                        </p>
                        <p class="text-white/80 text-xs md:text-sm mt-1 leading-snug">
                            <?php echo $item['desc']; ?>
                        </p>
                    </div>

                    <!-- Ícone -->
                    <div
                        class="absolute top-3 right-3 bg-white/20 backdrop-blur-md p-2 rounded-full text-white opacity-0 scale-75 group-hover:opacity-100 group-hover:scale-100 transition-all duration-300">
                        <i data-lucide="maximize-2" class="w-4 h-4"></i>
                    </div>
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Ver mais -->
        <div class="mt-10 flex flex-col items-center gap-3">
            <p id="gallery-counter" class="text-sm text-slate-400 font-medium"></p>
            <button type="button" id="gallery-more"
                class="px-8 py-4 bg-lumira-orange hover:bg-orange-500 text-white rounded-full font-bold text-lg transition-all transform hover:scale-105 shadow-lg flex items-center gap-2">
                <span id="gallery-more-label">Ver mais fotos</span>
                <span id="gallery-more-icon" class="inline-flex transition-transform duration-300">
                    <i data-lucide="chevron-down" class="w-5 h-5"></i>
                </span>
            </button>
        </div>

        <!-- Vazio (filtro sem resultado) -->
        <p id="gallery-empty" class="hidden text-center text-slate-400 py-12">
            Nenhuma foto nesta categoria ainda.
        </p>
    </div>

    <!-- Lightbox -->
    <div id="lightbox-modal"
        class="fixed inset-0 z-[70] bg-lumira-dark/95 backdrop-blur-sm hidden opacity-0 transition-opacity duration-300"
        role="dialog" aria-modal="true" aria-label="Foto ampliada">

        <button type="button" id="lightbox-close"
            class="absolute top-4 right-4 md:top-6 md:right-6 p-3 bg-white/10 hover:bg-white/20 rounded-full text-white transition-colors z-50"
            aria-label="Fechar">
            <i data-lucide="x" class="w-6 h-6"></i>
        </button>

        <button type="button" id="lightbox-prev"
            class="absolute left-2 md:left-6 top-1/2 -translate-y-1/2 p-3 md:p-4 bg-white/10 hover:bg-white/20 rounded-full text-white transition-colors z-50"
            aria-label="Foto anterior">
            <i data-lucide="chevron-left" class="w-6 h-6 md:w-8 md:h-8"></i>
        </button>

        <button type="button" id="lightbox-next"
            class="absolute right-2 md:right-6 top-1/2 -translate-y-1/2 p-3 md:p-4 bg-white/10 hover:bg-white/20 rounded-full text-white transition-colors z-50"
            aria-label="Próxima foto">
            <i data-lucide="chevron-right" class="w-6 h-6 md:w-8 md:h-8"></i>
        </button>

        <div class="h-full w-full flex flex-col items-center justify-center p-4 md:p-16 pointer-events-none">
            <img id="lightbox-image" src="" alt=""
                class="max-h-[75vh] max-w-full rounded-2xl shadow-2xl object-contain transition-opacity duration-200 pointer-events-auto" />
            <div class="mt-5 text-center max-w-xl pointer-events-auto">
                <p id="lightbox-caption" class="text-white text-lg md:text-2xl font-bold"></p>
                <p id="lightbox-desc" class="text-white/70 text-sm md:text-base mt-1"></p>
                <p id="lightbox-position" class="text-white/40 text-xs mt-3 font-medium tracking-wider"></p>
            </div>
        </div>
    </div>
</section>
