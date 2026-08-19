<?php
$mapa_query = rawurlencode($SCHOOL_ADDRESS_FULL);
$mapa_embed = 'https://www.google.com/maps?q=' . $mapa_query . '&z=17&output=embed';
$mapa_rota = 'https://www.google.com/maps/dir/?api=1&destination=' . $mapa_query;
?>
<section id="contact" class="py-20 md:py-28 bg-lumira-blue/5 relative overflow-hidden">
    <!-- Decorative -->
    <div
        class="absolute top-0 right-0 w-96 h-96 bg-lumira-blue/10 rounded-full blur-3xl translate-x-1/2 -translate-y-1/2 pointer-events-none">
    </div>

    <div class="container mx-auto px-4 md:px-8 relative z-10">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">

            <!-- Dados -->
            <div>
                <h2 class="text-3xl md:text-5xl font-bold text-lumira-dark mb-6">
                    Venha nos conhecer
                </h2>
                <p class="text-slate-600 text-lg mb-10 max-w-lg">
                    A melhor forma de conhecer a Lumirá é andando por ela. Marque um horário e venha ver
                    a escola funcionando, com as crianças em atividade.
                </p>

                <ul class="space-y-6">
                    <li class="flex items-start gap-4">
                        <span class="p-3 bg-white rounded-2xl shadow-sm text-lumira-blue shrink-0">
                            <i data-lucide="map-pin" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <h3 class="font-bold text-lumira-dark text-lg">Endereço</h3>
                            <p class="text-slate-600"><?php echo $SCHOOL_ADDRESS_LINE; ?><br /><?php echo $SCHOOL_ADDRESS_AREA; ?></p>
                            <a href="<?php echo $mapa_rota; ?>" target="_blank" rel="noopener"
                                class="inline-flex items-center gap-1.5 mt-1 text-lumira-blue font-bold text-sm hover:underline">
                                Como chegar <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </li>

                    <li class="flex items-start gap-4">
                        <span class="p-3 bg-white rounded-2xl shadow-sm text-lumira-blue shrink-0">
                            <i data-lucide="message-circle" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <h3 class="font-bold text-lumira-dark text-lg">Telefone &amp; WhatsApp</h3>
                            <a href="https://wa.me/<?php echo $SCHOOL_WHATSAPP; ?>" target="_blank" rel="noopener"
                                class="text-slate-600 hover:text-lumira-blue transition-colors">
                                <?php echo $SCHOOL_PHONE_LABEL; ?>
                            </a>
                        </div>
                    </li>

                    <li class="flex items-start gap-4">
                        <span class="p-3 bg-white rounded-2xl shadow-sm text-lumira-blue shrink-0">
                            <i data-lucide="clock" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <h3 class="font-bold text-lumira-dark text-lg">Horário de Atendimento</h3>
                            <p class="text-slate-600"><?php echo $SCHOOL_HOURS; ?></p>
                        </div>
                    </li>

                    <li class="flex items-start gap-4">
                        <span class="p-3 bg-white rounded-2xl shadow-sm text-lumira-blue shrink-0">
                            <i data-lucide="mail" class="w-6 h-6"></i>
                        </span>
                        <div>
                            <h3 class="font-bold text-lumira-dark text-lg">Email</h3>
                            <a href="mailto:<?php echo $SCHOOL_EMAIL; ?>"
                                class="text-slate-600 hover:text-lumira-blue transition-colors">
                                <?php echo $SCHOOL_EMAIL; ?>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Formulário -->
            <div class="bg-white p-6 md:p-10 rounded-[2rem] shadow-xl">
                <div id="contact-success" class="hidden text-center py-14 animate-fade-in-up">
                    <div
                        class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i data-lucide="check" class="w-10 h-10"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-lumira-dark mb-2">Abrimos o WhatsApp para você</h3>
                    <p class="text-slate-500 max-w-xs mx-auto">
                        Sua mensagem já foi montada com os dados preenchidos. É só tocar em enviar por lá.
                    </p>
                    <button type="button" id="contact-reset"
                        class="mt-6 text-lumira-blue font-bold text-sm hover:underline">
                        Preencher de novo
                    </button>
                </div>

                <form id="contact-form" class="space-y-5" novalidate
                    data-whatsapp="<?php echo $SCHOOL_WHATSAPP; ?>">
                    <div>
                        <h3 class="text-2xl font-bold text-lumira-dark">Fale conosco</h3>
                        <p class="text-slate-500 text-sm mt-1">
                            Respondemos pelo WhatsApp, normalmente no mesmo dia.
                        </p>
                    </div>

                    <div>
                        <label for="contact-name" class="block text-sm font-semibold text-slate-700 mb-2">
                            Seu nome
                        </label>
                        <input type="text" id="contact-name" name="nome" required autocomplete="name"
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-transparent focus:border-lumira-blue/50 focus:bg-white focus:outline-none transition-all"
                            placeholder="Como podemos te chamar" />
                        <p class="erro-campo hidden mt-1.5 text-sm text-red-600"></p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label for="contact-phone" class="block text-sm font-semibold text-slate-700 mb-2">
                                Telefone
                            </label>
                            <input type="tel" id="contact-phone" name="telefone" required autocomplete="tel"
                                inputmode="tel" maxlength="15"
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-transparent focus:border-lumira-blue/50 focus:bg-white focus:outline-none transition-all"
                                placeholder="(11) 90000-0000" />
                            <p class="erro-campo hidden mt-1.5 text-sm text-red-600"></p>
                        </div>
                        <div>
                            <label for="contact-child" class="block text-sm font-semibold text-slate-700 mb-2">
                                Idade da criança
                            </label>
                            <select id="contact-child" name="idade"
                                class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-transparent focus:border-lumira-blue/50 focus:bg-white focus:outline-none transition-all appearance-none">
                                <option value="">Prefiro não dizer</option>
                                <option>Menos de 1 ano</option>
                                <option>1 a 2 anos</option>
                                <option>3 a 4 anos</option>
                                <option>4 a 5 anos</option>
                                <option>5 a 6 anos</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label for="contact-message" class="block text-sm font-semibold text-slate-700 mb-2">
                            Mensagem
                        </label>
                        <textarea id="contact-message" name="mensagem" rows="4" required
                            class="w-full px-4 py-3 rounded-xl bg-gray-50 border-2 border-transparent focus:border-lumira-blue/50 focus:bg-white focus:outline-none transition-all resize-none"
                            placeholder="Gostaria de agendar uma visita para conhecer a escola."></textarea>
                        <p class="erro-campo hidden mt-1.5 text-sm text-red-600"></p>
                    </div>

                    <!-- Isca de spam: invisível para gente, tentadora para robô -->
                    <div class="absolute -left-[9999px]" aria-hidden="true">
                        <label for="contact-site">Não preencha este campo</label>
                        <input type="text" id="contact-site" name="site" tabindex="-1" autocomplete="off" />
                    </div>

                    <div class="flex items-start gap-3">
                        <input id="privacy-consent" type="checkbox" required
                            class="mt-0.5 w-5 h-5 rounded border-gray-300 text-lumira-blue focus:ring-lumira-blue/30 shrink-0" />
                        <label for="privacy-consent" class="text-sm text-slate-500">
                            Li e concordo com a
                            <a href="<?php echo ($base_url ?? '') . 'politica-de-privacidade.php'; ?>" target="_blank"
                                class="text-lumira-blue font-bold hover:underline">Política de Privacidade</a>.
                        </label>
                    </div>
                    <p id="consent-erro" class="erro-campo hidden -mt-2 text-sm text-red-600"></p>

                    <button type="submit"
                        class="w-full py-4 bg-lumira-orange hover:bg-orange-500 text-white rounded-xl font-bold text-lg transition-colors shadow-lg flex items-center justify-center gap-2">
                        <i data-lucide="message-circle" class="w-5 h-5"></i>
                        Enviar pelo WhatsApp
                    </button>
                </form>
            </div>
        </div>

        <!-- Mapa -->
        <div class="mt-14 md:mt-20">
            <div class="relative rounded-[2rem] overflow-hidden shadow-xl bg-lumira-light aspect-[16/10] sm:aspect-[21/9]">
                <iframe id="mapa-lumira" title="Mapa com a localização do Colégio Lumirá"
                    src="<?php echo $mapa_embed; ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    class="absolute inset-0 w-full h-full border-0"></iframe>

                <!-- Trava: sem isto, rolar a página em cima do mapa dá zoom em vez de rolar -->
                <button type="button" id="mapa-destravar"
                    class="absolute inset-0 w-full h-full bg-lumira-dark/10 hover:bg-lumira-dark/20 backdrop-blur-[1px] transition-colors flex items-center justify-center group cursor-pointer">
                    <span
                        class="bg-white/95 text-lumira-dark font-bold px-5 py-3 rounded-full shadow-lg flex items-center gap-2 group-hover:scale-105 transition-transform">
                        <i data-lucide="hand" class="w-5 h-5 text-lumira-blue"></i>
                        Toque para mexer no mapa
                    </span>
                </button>

                <a href="<?php echo $mapa_rota; ?>" target="_blank" rel="noopener"
                    class="absolute bottom-4 right-4 z-10 bg-lumira-orange hover:bg-orange-500 text-white font-bold text-sm px-5 py-3 rounded-full shadow-lg flex items-center gap-2 transition-colors">
                    <i data-lucide="navigation" class="w-4 h-4"></i>
                    Traçar rota
                </a>
            </div>
        </div>
    </div>
</section>
