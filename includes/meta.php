<?php
$meta_base_url = $base_url ?? '/';

if (!isset($base_url)) {
    $meta_host = $_SERVER['HTTP_HOST'] ?? '';

    if (strpos($meta_host, 'localhost') !== false || strpos($meta_host, '127.0.0.1') !== false) {
        $meta_base_url = '/lumira/';
    }
}

// Canonical: uma URL oficial por pagina (com www, sem .php), igual ao sitemap
$canonical_host = 'https://www.colegiolumira.com';
if (!isset($canonical_path)) {
    $script = $_SERVER['SCRIPT_NAME'] ?? '/index.php';
    $canonical_path = preg_replace('#^/lumira#', '', $script);
    $canonical_path = preg_replace('#/index\.php$#', '/', $canonical_path);
    $canonical_path = preg_replace('#\.php$#', '', $canonical_path);
}

$style_version = file_exists(__DIR__ . '/../assets/css/style.css')
    ? filemtime(__DIR__ . '/../assets/css/style.css')
    : '1';
?>

<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<?php
// Open Graph / Twitter para TODAS as paginas. Sem isto, compartilhar /agendar
// ou /trabalhe-conosco no WhatsApp mostra o link sem imagem nenhuma.
// A imagem tem de ser PNG ou JPG: WhatsApp e Facebook nao renderizam webp.
$og_url = $canonical_host . $canonical_path;
$og_image = $og_image ?? ($canonical_host . '/assets/logo_og.png');
$og_type = $og_type ?? 'website';
$e = fn($v) => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
?>
<meta property="og:type" content="<?php echo $e($og_type); ?>" />
<meta property="og:url" content="<?php echo $e($og_url); ?>" />
<meta property="og:image" content="<?php echo $e($og_image); ?>" />
<meta property="og:locale" content="pt_BR" />
<meta property="og:site_name" content="Colégio Lumirá" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo $e($og_image); ?>" />

<link rel="canonical" href="<?php echo htmlspecialchars($canonical_host . $canonical_path, ENT_QUOTES, 'UTF-8'); ?>" />

<!-- Icones -->
<link rel="icon" href="<?php echo htmlspecialchars($meta_base_url, ENT_QUOTES, 'UTF-8'); ?>favicon.ico" sizes="32x32" />
<link rel="icon" type="image/png" href="<?php echo htmlspecialchars($meta_base_url, ENT_QUOTES, 'UTF-8'); ?>favicon.png" sizes="512x512" />
<link rel="apple-touch-icon" href="<?php echo htmlspecialchars($meta_base_url, ENT_QUOTES, 'UTF-8'); ?>apple-touch-icon.png" />

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">

<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<!-- Tailwind CSS (Compiled) -->
<link rel="stylesheet" href="<?php echo htmlspecialchars($meta_base_url, ENT_QUOTES, 'UTF-8'); ?>assets/css/style.css?v=<?php echo urlencode((string) $style_version); ?>">

<style>
    /* 
       Expertise Dev: Tipografia Fluida 
       Garante que os títulos escalem suavemente entre mobile e desktop 1366px+
    */
    .text-fluid-h1 {
        font-size: clamp(2.25rem, 5vw + 1rem, 4.5rem);
        line-height: 1.1;
    }

    .text-fluid-h2 {
        font-size: clamp(1.875rem, 4vw + 0.5rem, 3rem);
        line-height: 1.2;
    }

    /* Smooth scrolling for anchor links */
    html {
        scroll-behavior: smooth;
    }

    .fade-enter {
        opacity: 0;
    }

    .fade-enter-active {
        opacity: 1;
        transition: opacity 1000ms ease-in-out;
    }

    .fade-exit {
        opacity: 1;
    }

    .fade-exit-active {
        opacity: 0;
        transition: opacity 1000ms ease-in-out;
    }

    /* Additional Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translate3d(0, 40px, 0);
        }

        to {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
    }

    .animate-fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }

        100% {
            transform: translateY(0px);
        }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .blob-shape-1 {
        border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
    }

    .blob-shape-2 {
        border-radius: 53% 47% 52% 48% / 36% 41% 59% 64%;
    }
</style>
