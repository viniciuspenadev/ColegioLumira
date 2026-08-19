<footer class="bg-white border-t border-gray-100 py-12">
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-8">

            <div class="flex flex-col items-center md:items-start">
                <img src="<?php echo $base_url ?? ''; ?>assets/images/logo_original.webp" alt="Colégio Lumirá"
                    class="h-12 mb-4 w-auto" />
                <p class="text-slate-500 text-sm text-center md:text-left max-w-xs">
                    Educação com afeto, inovação e respeito à infância. Construindo o futuro hoje.
                </p>
            </div>

            <?php if (!empty($SOCIAL_LINKS)): ?>
                <div class="flex gap-6">
                    <?php foreach ($SOCIAL_LINKS as $rede => $url): ?>
                        <a href="<?php echo htmlspecialchars($url, ENT_QUOTES, 'UTF-8'); ?>" target="_blank"
                            rel="noopener" aria-label="<?php echo ucfirst($rede); ?> do Colégio Lumirá"
                            class="p-2 bg-gray-50 rounded-full text-lumira-dark hover:bg-lumira-blue hover:text-white transition-colors">
                            <i data-lucide="<?php echo $rede; ?>" class="w-5 h-5"></i>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="text-center md:text-right text-slate-400 text-xs">
                <p>&copy; <?php echo date("Y"); ?> Colégio Lumirá. Todos os direitos reservados.</p>
                <p class="mt-1">Desenvolvido com carinho.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Main JS -->
<script src="<?php echo $base_url ?? ''; ?>js/main.js"></script>
</body>

</html>