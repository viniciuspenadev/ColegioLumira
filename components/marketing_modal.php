<?php
$promo_whatsapp_msg = rawurlencode('Olá! Vi que as matrículas 2027 estão abertas e gostaria de agendar uma visita ao Colégio Lumirá.');
?>
<div id="marketing-modal"
    class="fixed inset-0 z-[60] flex items-center justify-center px-4 transition-all duration-500 bg-black/0 backdrop-blur-none opacity-0 invisible pointer-events-none"
    role="dialog" aria-modal="true" aria-labelledby="marketing-modal-title">
    <!-- Click outside to close -->
    <div class="absolute inset-0" id="marketing-modal-bg"></div>

    <!-- Modal Content -->
    <div id="marketing-modal-content"
        class="bg-white w-full max-w-4xl max-h-[92vh] overflow-y-auto md:overflow-hidden rounded-[2rem] md:rounded-[2.5rem] shadow-2xl relative flex flex-col md:flex-row transform transition-all duration-700 scale-95 translate-y-10 opacity-0">

        <!-- Close Button -->
        <button id="marketing-modal-close" aria-label="Fechar"
            class="absolute top-3 right-3 md:top-4 md:right-4 z-20 p-2.5 bg-lumira-orange rounded-full text-white hover:bg-orange-500 hover:scale-110 ring-4 ring-white/70 transition-all shadow-lg shadow-lumira-orange/40">
            <i data-lucide="x" class="w-5 h-5" stroke-width="2.75"></i>
        </button>

        <!-- Image Section -->
        <div class="w-full md:w-[42%] relative h-40 [@media(max-height:700px)]:h-36 sm:h-52 md:h-auto shrink-0 overflow-hidden group">
            <img src="assets/images/crianca-pintando-no-atelie.webp" alt="Criança pintando no ateliê do Colégio Lumirá"
                class="absolute inset-0 w-full h-full object-cover transition-transform duration-[2000ms] group-hover:scale-110" />
            <div class="absolute inset-0 bg-gradient-to-t from-lumira-dark/90 via-lumira-dark/30 to-transparent"></div>

            <!-- Faixa etária -->
            <span
                class="absolute top-4 left-4 inline-flex items-center gap-1.5 bg-white/95 backdrop-blur text-lumira-dark px-3 py-1.5 rounded-full text-xs font-bold shadow-md">
                <i data-lucide="baby" class="w-3.5 h-3.5 text-lumira-orange"></i> 1 ano a 6 anos
            </span>

            <!-- Selo 2027 -->
            <div class="absolute bottom-4 left-5 md:bottom-8 md:left-8 text-white">
                <span class="inline-block bg-lumira-orange text-white px-2.5 py-1 rounded-md text-[0.65rem] md:text-xs font-bold uppercase tracking-[0.18em] mb-2 shadow-md">
                    Matrículas abertas
                </span>
                <span class="block text-5xl [@media(max-height:700px)]:text-[2.75rem] sm:text-6xl md:text-8xl font-extrabold leading-none tracking-tight drop-shadow-lg">
                    2027
                </span>
            </div>
        </div>

        <!-- Content Section -->
        <div class="w-full md:w-[58%] shrink-0 md:shrink p-6 sm:p-7 md:p-10 lg:p-12 flex flex-col justify-center relative bg-white md:overflow-hidden">
            <!-- Decorative Elements -->
            <div class="hidden md:block absolute -top-10 -right-10 w-40 h-40 bg-lumira-orange/10 rounded-full pointer-events-none"></div>

            <span
                class="relative self-start inline-flex items-center gap-2 bg-orange-50 text-lumira-orange px-3 py-1.5 rounded-full text-[0.7rem] sm:text-xs font-bold uppercase tracking-wider mb-3 md:mb-4">
                <span class="relative flex w-2 h-2">
                    <span class="absolute inline-flex w-full h-full rounded-full bg-lumira-orange opacity-75 animate-ping"></span>
                    <span class="relative inline-flex w-2 h-2 rounded-full bg-lumira-orange"></span>
                </span>
                Vagas limitadas por turma
            </span>

            <h2 id="marketing-modal-title"
                class="relative text-2xl sm:text-3xl lg:text-[2.6rem] font-bold text-lumira-dark mb-4 md:mb-3 leading-tight">
                Garanta a vaga do seu filho para <span class="text-lumira-orange">2027</span>
            </h2>

            <p class="relative hidden sm:block text-slate-600 md:text-lg mb-6 leading-relaxed">
                Venha conhecer a escola de perto: o pátio, as salas e a proposta pedagógica que faz cada descoberta
                ser celebrada.
            </p>

            <ul class="relative space-y-2.5 md:space-y-3 mb-6 md:mb-7">
                <li class="flex items-start gap-3">
                    <span class="w-8 h-8 rounded-lg bg-orange-50 text-lumira-orange flex items-center justify-center shrink-0">
                        <i data-lucide="badge-percent" class="w-4 h-4"></i>
                    </span>
                    <span class="text-slate-700 text-sm md:text-base pt-1">
                        <strong class="text-lumira-dark">Condição especial</strong> para matrícula antecipada até
                        <strong class="text-lumira-dark">30/11</strong>
                    </span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-8 h-8 rounded-lg bg-lumira-light text-lumira-blue flex items-center justify-center shrink-0">
                        <i data-lucide="map-pin" class="w-4 h-4"></i>
                    </span>
                    <span class="text-slate-700 text-sm md:text-base pt-1">
                        <strong class="text-lumira-dark">Visita guiada</strong> pela escola, sem compromisso
                    </span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-8 h-8 rounded-lg bg-lumira-light text-lumira-blue flex items-center justify-center shrink-0">
                        <i data-lucide="clock" class="w-4 h-4"></i>
                    </span>
                    <span class="text-slate-700 text-sm md:text-base pt-1">
                        Períodos <strong class="text-lumira-dark">regular, semi-integral e integral</strong>
                    </span>
                </li>
            </ul>

            <div class="relative flex gap-3">
                <a href="agendar.php" id="marketing-modal-cta"
                    class="flex-1 whitespace-nowrap px-5 md:px-6 py-3.5 md:py-4 bg-lumira-orange text-white rounded-xl font-bold text-lg text-center hover:bg-orange-500 transition-all shadow-lg shadow-lumira-orange/30 hover:shadow-xl hover:-translate-y-0.5 flex items-center justify-center gap-2 group">
                    Agendar visita <i data-lucide="arrow-right"
                        class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                </a>
                <a href="https://wa.me/<?php echo $SCHOOL_WHATSAPP; ?>?text=<?php echo $promo_whatsapp_msg; ?>"
                    target="_blank" rel="noopener"
                    aria-label="Falar no WhatsApp"
                    class="shrink-0 px-4 md:px-5 py-3.5 md:py-4 bg-white border-2 border-green-500 text-green-600 rounded-xl font-bold text-lg text-center hover:bg-green-50 transition-colors flex items-center justify-center gap-2">
                    <i data-lucide="message-circle" class="w-5 h-5"></i> <span class="hidden sm:inline">WhatsApp</span>
                </a>
            </div>

            <div class="relative mt-5 md:mt-6 pt-4 md:pt-5 border-t border-gray-100 flex items-center justify-between gap-4 text-xs sm:text-sm">
                <span class="flex items-center gap-2 text-slate-400">
                    <i data-lucide="calendar" class="w-4 h-4"></i> Seg a Sex, das 07h às 19h
                </span>
                <button id="marketing-modal-dismiss"
                    class="shrink-0 py-1 text-slate-500 font-semibold hover:text-slate-700 underline-offset-4 hover:underline transition-colors">
                    Agora não
                </button>
            </div>
        </div>
    </div>
</div>
