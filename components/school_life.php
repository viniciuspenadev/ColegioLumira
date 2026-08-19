<section id="school-life" class="py-20 md:py-28 bg-orange-50/40 relative overflow-hidden">
    <!-- Decorative -->
    <div class="absolute top-1/2 left-0 w-64 h-64 bg-white rounded-full blur-3xl -translate-y-1/2 -translate-x-1/2">
    </div>
    <div
        class="absolute bottom-0 right-0 w-96 h-96 bg-lumira-light rounded-full blur-3xl translate-y-1/3 translate-x-1/3">
    </div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">

        <!-- Header -->
        <div class="text-center max-w-2xl mx-auto mb-12 md:mb-16">
            <span class="text-lumira-orange font-bold uppercase tracking-wider text-sm">Nosso Dia a Dia</span>
            <h2 class="text-fluid-h2 font-bold text-lumira-dark mt-2 mb-6">
                O que acontece em <span class="text-lumira-blue">um dia na Lumirá</span>
            </h2>
            <p class="text-slate-500 text-lg">
                Horta, cozinha, ateliê e inglês fazem parte da rotina.
                Escolha uma vivência para ver como funciona.
            </p>
        </div>

        <!-- Moldura -->
        <div
            class="rounded-[1.75rem] md:rounded-[3rem] p-2 md:p-4 bg-gradient-to-br from-lumira-light via-lumira-blue/50 to-lumira-blue shadow-2xl shadow-lumira-dark/20">
            <div
                class="relative rounded-[1.25rem] md:rounded-[2.25rem] bg-white overflow-hidden grid grid-cols-1 lg:grid-cols-[minmax(23rem,0.78fr)_minmax(0,1.45fr)]">

                <!-- Menu -->
                <div class="relative z-20 min-w-0 p-4 md:p-7 lg:p-9 lg:-mr-20 lg:pr-24 flex flex-col justify-center bg-white lg:bg-transparent lg:bg-gradient-to-r lg:from-white lg:from-75% lg:to-transparent"
                    role="tablist" aria-label="Vivências do dia a dia">
                    <div id="activity-strip"
                        class="flex lg:block gap-2 lg:gap-0 overflow-x-auto lg:overflow-visible snap-x snap-mandatory scrollbar-hide -mx-4 px-4 pb-1 lg:mx-0 lg:px-0 lg:pb-0">
                        <?php foreach ($SCHOOL_ACTIVITIES as $index => $activity):
                            $isActive = $index === 0;
                            ?>
                            <button type="button" role="tab" id="tab-<?php echo $activity['id']; ?>"
                                aria-controls="activity-<?php echo $activity['id']; ?>"
                                aria-selected="<?php echo $isActive ? 'true' : 'false'; ?>"
                                tabindex="<?php echo $isActive ? '0' : '-1'; ?>"
                                data-id="<?php echo $activity['id']; ?>"
                                class="activity-tab group shrink-0 w-[13.5rem] snap-start lg:w-full lg:shrink text-left cursor-pointer transition-colors duration-300 grid grid-cols-[1.6rem_minmax(0,1fr)] lg:grid-cols-[2rem_minmax(0,1fr)_1.5rem] gap-x-2 lg:gap-x-3 items-start p-3 lg:px-1 lg:py-6 rounded-2xl lg:rounded-none border lg:border-0 lg:border-b border-slate-200 lg:first:border-t focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-lumira-orange/30 <?php echo $isActive ? 'is-active bg-lumira-light/70 border-lumira-blue/20 lg:bg-transparent' : 'bg-slate-50 border-slate-100 lg:bg-transparent hover:bg-lumira-light/40 lg:hover:bg-transparent'; ?>">

                                <span
                                    class="activity-number pt-0.5 lg:pt-1 text-[0.65rem] font-bold tracking-[0.14em] transition-colors duration-300 <?php echo $isActive ? 'text-lumira-orange' : 'text-slate-400'; ?>">
                                    <?php echo $activity['n']; ?>
                                </span>

                                <span class="grid gap-1 min-w-0">
                                    <strong
                                        class="activity-title font-bold text-[0.95rem] lg:text-lg leading-tight transition-colors duration-300 <?php echo $isActive ? 'text-lumira-dark' : 'text-slate-500 lg:group-hover:text-lumira-dark'; ?>">
                                        <?php echo $activity['title']; ?>
                                    </strong>
                                    <!-- Descrição: só abre na aba ativa (grid-rows 0fr -> 1fr anima suave) -->
                                    <span
                                        class="activity-body hidden lg:grid transition-all duration-500 ease-out <?php echo $isActive ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'; ?>">
                                        <span class="overflow-hidden text-sm leading-relaxed text-slate-500">
                                            <?php echo $activity['body']; ?>
                                        </span>
                                    </span>
                                </span>

                                <i data-lucide="arrow-up-right"
                                    class="activity-arrow hidden lg:block w-5 h-5 mt-1 transition-all duration-300 group-hover:rotate-45 group-hover:text-lumira-orange <?php echo $isActive ? 'rotate-45 text-lumira-orange' : 'rotate-0 text-slate-300'; ?>"></i>
                            </button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Painéis -->
                <div class="relative aspect-[4/3] sm:aspect-[16/10] lg:aspect-auto lg:min-h-[32rem] bg-lumira-light">
                    <?php foreach ($SCHOOL_ACTIVITIES as $index => $activity):
                        $isActive = $index === 0;
                        ?>
                        <article class="activity-content absolute inset-0 transition-opacity duration-500 <?php echo $isActive ? 'opacity-100 z-10' : 'opacity-0 z-0 invisible'; ?>"
                            id="activity-<?php echo $activity['id']; ?>" role="tabpanel"
                            aria-labelledby="tab-<?php echo $activity['id']; ?>">

                            <img src="<?php echo $activity['image']; ?>"
                                alt="<?php echo htmlspecialchars($activity['alt'], ENT_QUOTES, 'UTF-8'); ?>"
                                <?php echo $index === 0 ? 'loading="eager"' : 'loading="lazy"'; ?> decoding="async"
                                class="absolute inset-0 w-full h-full object-cover" />

                            <!-- Véu para o texto respirar -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-lumira-dark/90 via-lumira-dark/50 via-30% to-transparent to-72%">
                            </div>
                            <!-- Emenda com o menu no desktop -->
                            <div
                                class="absolute inset-y-0 left-0 w-1/3 hidden lg:block bg-gradient-to-r from-white from-5% via-white/40 via-24% to-transparent">
                            </div>

                            <div
                                class="absolute inset-x-5 bottom-5 md:inset-x-8 md:bottom-8 lg:left-[clamp(8rem,11vw,12rem)] lg:right-10 text-white">
                                <span class="text-xs font-bold uppercase tracking-[0.13em] text-white/70">
                                    <?php echo $activity['n']; ?> · Vivência
                                </span>
                                <strong class="block font-bold leading-none text-3xl md:text-5xl mt-1 drop-shadow-lg">
                                    <?php echo $activity['title']; ?>
                                </strong>
                                <p class="lg:hidden text-sm text-white/85 mt-2 max-w-md leading-relaxed">
                                    <?php echo $activity['body']; ?>
                                </p>
                                <a href="<?php echo ($base_url ?? '') . 'agendar.php'; ?>"
                                    class="inline-flex items-center gap-2 mt-4 text-sm font-bold border-b border-white/50 pb-1 hover:text-lumira-orange hover:border-lumira-orange transition-colors">
                                    Agende uma visita <i data-lucide="arrow-right" class="w-4 h-4"></i>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>
    </div>
</section>
