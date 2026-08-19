<?php
/**
 * Sitemap XML — servido em /sitemap.xml (regra de rewrite no .htaccess).
 *
 * As URLs usam a forma limpa, sem .php, que é a mesma declarada no
 * rel="canonical" de cada página. Trocar de domínio aqui e em includes/meta.php.
 */

header('Content-Type: application/xml; charset=UTF-8');

$base = 'https://www.colegiolumira.com';
$raiz = __DIR__;

/** Data da última alteração a partir do arquivo, no formato W3C. */
function lumira_data(string ...$arquivos): string
{
    $t = 0;
    foreach ($arquivos as $a) {
        $p = __DIR__ . '/' . $a;
        if (file_exists($p)) {
            $t = max($t, filemtime($p));
        }
    }
    return date('Y-m-d', $t ?: time());
}

// Páginas fixas. 'fontes' são os arquivos que, mudando, mudam a página.
$paginas = [
    [
        'loc' => '/',
        'fontes' => ['index.php', 'includes/constants.php', 'components/hero.php', 'components/gallery.php'],
        'freq' => 'weekly',
        'prioridade' => '1.0',
    ],
    [
        'loc' => '/agendar',
        'fontes' => ['agendar.php'],
        'freq' => 'monthly',
        'prioridade' => '0.9',
    ],
    [
        'loc' => '/trabalhe-conosco/',
        'fontes' => ['trabalhe-conosco/index.php'],
        'freq' => 'weekly',
        'prioridade' => '0.7',
    ],
    [
        'loc' => '/calendario-2026',
        'fontes' => ['calendario-2026.php'],
        'freq' => 'monthly',
        'prioridade' => '0.6',
    ],
    [
        'loc' => '/politica-de-privacidade',
        'fontes' => ['politica-de-privacidade.php'],
        'freq' => 'yearly',
        'prioridade' => '0.3',
    ],
];

// Fotos da galeria entram na home, para o Google indexar as imagens.
$imagens_home = [];
if (file_exists($raiz . '/includes/constants.php')) {
    include_once $raiz . '/includes/constants.php';
    foreach ($GALLERY_ITEMS ?? [] as $item) {
        $imagens_home[] = $base . '/' . ltrim($item['src'], '/');
    }
}

// Vagas abertas, se o Supabase responder. Sitemap não pode quebrar por causa disso.
$vagas = [];
try {
    $secretsPath = $raiz . '/includes/secrets.php';
    if (file_exists($secretsPath)) {
        $secrets = include $secretsPath;
        require_once $raiz . '/includes/supabase_helper.php';
        $supabase = new SupabaseHelper($secrets['SUPABASE_URL'], $secrets['SUPABASE_KEY']);
        foreach ($supabase->getJobs(true) ?: [] as $vaga) {
            if (!empty($vaga['id'])) {
                $vagas[] = $vaga;
            }
        }
    }
} catch (Throwable $e) {
    $vagas = [];
}

$esc = fn($s) => htmlspecialchars((string) $s, ENT_XML1 | ENT_QUOTES, 'UTF-8');

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
<?php foreach ($paginas as $p): ?>
    <url>
        <loc><?php echo $esc($base . $p['loc']); ?></loc>
        <lastmod><?php echo lumira_data(...$p['fontes']); ?></lastmod>
        <changefreq><?php echo $p['freq']; ?></changefreq>
        <priority><?php echo $p['prioridade']; ?></priority>
<?php if ($p['loc'] === '/'):
    foreach ($imagens_home as $img): ?>
        <image:image><image:loc><?php echo $esc($img); ?></image:loc></image:image>
<?php endforeach;
endif; ?>
    </url>
<?php endforeach; ?>
<?php foreach ($vagas as $vaga): ?>
    <url>
        <loc><?php echo $esc($base . '/vagas/' . $vaga['id']); ?></loc>
<?php if (!empty($vaga['created_at'])): ?>
        <lastmod><?php echo $esc(date('Y-m-d', strtotime($vaga['created_at']))); ?></lastmod>
<?php endif; ?>
        <changefreq>weekly</changefreq>
        <priority>0.5</priority>
    </url>
<?php endforeach; ?>
</urlset>
