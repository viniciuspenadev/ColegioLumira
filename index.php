<?php
// Load data
include 'includes/constants.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- SEO -->
  <title>Colégio Lumirá - Berçário e Educação Infantil na Vila Augusta, Guarulhos</title>
  <meta name="description"
    content="Berçário e Educação Infantil em Guarulhos, na Vila Augusta. Crianças de 4 meses a 6 anos, em período regular, semi-integral ou integral. Agende uma visita." />
  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="Colégio Lumirá - Berçário e Educação Infantil na Vila Augusta, Guarulhos" />
  <meta property="og:description"
    content="Berçário e Educação Infantil em Guarulhos, na Vila Augusta. Crianças de 4 meses a 6 anos, em período regular, semi-integral ou integral. Agende uma visita." />

  <!-- Twitter -->
  <meta property="twitter:title" content="Colégio Lumirá - Berçário e Educação Infantil na Vila Augusta, Guarulhos" />
  <meta property="twitter:description"
    content="Berçário e Educação Infantil em Guarulhos, na Vila Augusta. Crianças de 4 meses a 6 anos, em período regular, semi-integral ou integral. Agende uma visita." />

  <!-- Schema.org JSON-LD -->
  <?php
  $school_schema = [
    '@context' => 'https://schema.org',
    '@type' => 'School',
    '@id' => 'https://www.colegiolumira.com/#escola',
    'name' => 'Colégio Lumirá',
    'url' => 'https://www.colegiolumira.com',
    'logo' => 'https://www.colegiolumira.com/assets/logo_og.png',
    'image' => 'https://www.colegiolumira.com/assets/logo_og.png',
    'description' => 'Berçário e Educação Infantil na Vila Augusta, Guarulhos. Crianças de 4 meses a 6 anos, em período regular, semi-integral ou integral.',
    'email' => $SCHOOL_EMAIL,
    'telephone' => '+551124226635',
    'priceRange' => '$$$',
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => 'R. Eng. Alexandre Machado, 208 - Vila Augusta',
      'addressLocality' => 'Guarulhos',
      'addressRegion' => 'SP',
      'postalCode' => '07040-040',
      'addressCountry' => 'BR',
    ],
    'geo' => ['@type' => 'GeoCoordinates', 'latitude' => -23.4705, 'longitude' => -46.5418],
    'areaServed' => ['@type' => 'City', 'name' => 'Guarulhos'],
    'openingHoursSpecification' => [[
      '@type' => 'OpeningHoursSpecification',
      'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
      'opens' => '07:00',
      'closes' => '19:00',
    ]],
  ];
  // sameAs so entra com URL real: apontar para o perfil errado confunde o Google
  if (!empty($SOCIAL_LINKS)) {
    $school_schema['sameAs'] = array_values($SOCIAL_LINKS);
  }
  ?>
  <script type="application/ld+json">
<?php echo json_encode($school_schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
  </script>

  <!-- Common Assets -->
  <?php include 'includes/meta.php'; ?>
</head>

<body class="bg-gray-50 text-slate-700 antialiased selection:bg-lumira-orange selection:text-white">

  <?php
  // Header
  include 'includes/header.php';
  ?>

  <main>
    <?php
    // Load components in order
    include 'components/marketing_modal.php';
    include 'components/hero.php';
    include 'components/about.php';
    include 'components/methodology.php';
    include 'components/school_life.php';
    include 'components/classes.php';
    include 'components/gallery.php';
    include 'components/faq.php';
    include 'components/contact.php';
    ?>
  </main>

  <?php include 'components/cookie_consent.php'; ?>
  <?php include 'includes/footer.php'; ?>
</body>

</html>
