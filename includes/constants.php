<?php

// Redes sociais da escola. Alimentam os icones do rodape e o "sameAs" do
// schema.org, que e o sinal que liga este site a entidade Colegio Lumira
// aos olhos do Google. Deixe fora da lista o que ainda nao existir:
// URL errada aqui aponta o Google para o perfil de outra pessoa.
$SOCIAL_LINKS = [
    // 'instagram' => 'https://www.instagram.com/________/',
    // 'facebook'  => 'https://www.facebook.com/________/',
    // 'linkedin'  => 'https://www.linkedin.com/company/________/',
];

$SCHOOL_EMAIL = 'contato@colegiolumira.com';

// Dados de contato em um lugar so: usados no rodape, no bloco de contato,
// no mapa, no link de rota e na mensagem do WhatsApp.
$SCHOOL_PHONE_LABEL = '(11) 2422-6635';
$SCHOOL_WHATSAPP = '551124226635';          // formato do wa.me: pais + DDD + numero
$SCHOOL_ADDRESS_LINE = 'R. Eng. Alexandre Machado, 208';
$SCHOOL_ADDRESS_AREA = 'Vila Augusta, Guarulhos - SP, 07040-040';
$SCHOOL_ADDRESS_FULL = $SCHOOL_ADDRESS_LINE . ' - ' . $SCHOOL_ADDRESS_AREA;
$SCHOOL_HOURS = 'Segunda a sexta, 7h às 19h';

$FEATURES = [
    [
        'title' => 'Pedagogia Afetiva',
        'description' => 'Acreditamos que o vínculo emocional é a base para um aprendizado significativo e duradouro.',
        'icon' => 'heart',
    ],
    [
        'title' => 'Natureza Viva',
        'description' => 'Amplas áreas verdes onde as crianças exploram, descobrem e respeitam o meio ambiente.',
        'icon' => 'sprout',
    ],
    [
        'title' => 'Segurança Total',
        'description' => 'Ambiente monitorado e seguro, com controle de acesso rigoroso para a tranquilidade da sua família.',
        'icon' => 'shield-check',
    ],
    [
        'title' => 'Família na Escola',
        'description' => 'Uma comunidade acolhedora onde pais e educadores constroem juntos o caminho da educação.',
        'icon' => 'users',
    ],
];

$SCHOOL_ACTIVITIES = [
    [
        'id' => 'nutrition',
        'n' => '01',
        'title' => 'Nutrição Consciente',
        'body' => 'Cardápio elaborado por nutricionista e preparado na cozinha da escola, sem açúcar e sem ultraprocessados.',
        'image' => 'assets/images/galeria/full/hora-da-refeicao.webp',
        'alt' => 'Refeitório do Colégio Lumirá com mesas e cadeiras infantis',
        // Ainda nao exibido no layout atual, mantido para reuso
        'benefits' => ['Cardápio sem açúcar', 'Introdução alimentar assistida', 'Oficinas culinárias']
    ],
    [
        'id' => 'garden',
        'n' => '02',
        'title' => 'Horta Pedagógica',
        'body' => 'As crianças plantam, regam e colhem. O que sai da horta vai para o prato no almoço.',
        'image' => 'assets/images/mini-maternal-horta.webp',
        'alt' => 'Crianças da Lumirá na horta pedagógica ao lado dos pés de couve',
        'benefits' => ['Educação ambiental', 'Responsabilidade e cuidado', 'Consumo do que se planta']
    ],
    [
        'id' => 'english',
        'n' => '03',
        'title' => 'Inglês Lúdico',
        'body' => 'As crianças ouvem e falam inglês em músicas, histórias e brincadeiras, sem prova e sem cobrança.',
        'image' => 'assets/images/leitura-roda.webp',
        'alt' => 'Professora lendo um livro para as crianças sentadas em roda',
        'benefits' => ['Imersão diária', 'Storytelling', 'Músicas e rimas']
    ],
    [
        'id' => 'arts',
        'n' => '04',
        'title' => 'Ateliê de Artes',
        'body' => 'Espaço livre para pintar, modelar e experimentar tintas, papéis e texturas.',
        'image' => 'assets/images/jardim-1-artes.webp',
        'alt' => 'Crianças pintando em cavaletes no ateliê de artes da Lumirá',
        'benefits' => ['Exploração de texturas', 'Coordenação motora fina', 'Liberdade criativa']
    ]
];

$CLASSES = [
    [
        'title' => "Mini-Maternal",
        'age' => "1 a 3 anos",
        'description' => "Cuidado, estímulo e socialização, promovendo o desenvolvimento motor, sensorial e emocional por meio de brincadeiras, música e vivências adequadas à idade, em um ambiente seguro e acolhedor.",
        'image' => "assets/images/mini-maternal-horta.webp",
        'features' => ["Horticultura", "Contação de histórias", "Inglês", "Musicalização", "Culinária", "Acompanhamento Nutricional", "Psicomotricidade"]
    ],
    [
        'title' => "Maternal",
        'age' => "3 a 4 anos",
        'description' => "Autonomia, criatividade e socialização, promovendo o desenvolvimento cognitivo, motor e emocional por meio de brincadeiras, projetos e vivências que estimulam a curiosidade, a comunicação e o trabalho em grupo, em um ambiente acolhedor e estimulante.",
        'image' => "assets/images/maternal-vivencias.webp",
        'features' => ["Horticultura", "Contação de histórias", "Inglês", "Musicalização", "Culinária", "Acompanhamento nutricional", "Psicomotricidade"]
    ],
    [
        'title' => "Jardim 1",
        'age' => "4 anos a 5 anos",
        'description' => "Autonomia, responsabilidade e pensamento crítico, promovendo o desenvolvimento cognitivo, socioemocional e motor por meio de vivências que estimulam a criatividade, a resolução de problemas e a convivência em grupo, em um ambiente acolhedor e desafiador.",
        'image' => "assets/images/jardim-1-artes.webp",
        'features' => ["Horticultura", "Contação de histórias", "Inglês", "Musicalização", "Culinária", "Acompanhamento Nutricional", "Psicomotricidade"]
    ],
    [
        'title' => "Jardim 2 (Pré)",
        'age' => "5 anos a 6 anos",
        'description' => "Preparar as crianças para a passagem ao Ensino Fundamental com cuidado, projetos pedagógicos, olhar individualizado e material estruturado, desenvolvendo autonomia e confiança. Valorizamos também o brincar como parte essencial da aprendizagem, garantindo uma transição leve, segura e acolhedora para a próxima etapa.",
        'image' => "assets/images/criancas-fantasiadas-em-festa.webp",
        'features' => ["Horticultura", "Contação de histórias", "Inglês", "Musicalização", "Culinária", "Acompanhamento Nutricional", "Psicomotricidade"]
    ]
];

$GALLERY_CATEGORIES = [
    ['id' => 'todos', 'label' => 'Todos'],
    ['id' => 'estrutura', 'label' => 'Estrutura'],
    ['id' => 'salas', 'label' => 'Salas de Aula'],
    ['id' => 'parque', 'label' => 'Parque & Pátio'],
    ['id' => 'convivencia', 'label' => 'Convivência'],
];

// Fotos em assets/images/galeria/ (thumb = grade, full = lightbox).
// 'span' recebe classes de grid do Tailwind; vazio = card padrão 1x1.
$GALLERY_ITEMS = [
    [
        'id' => 'galeria-01',
        'thumb' => 'assets/images/galeria/thumb/fachada-colegio-lumira.webp',
        'src' => 'assets/images/galeria/full/fachada-colegio-lumira.webp',
        'category' => 'estrutura',
        'caption' => 'Nossa fachada',
        'desc' => 'Rua Eng. Alexandre Machado, 208, Vila Augusta',
        'span' => 'col-span-2'
    ],
    [
        'id' => 'galeria-05',
        'thumb' => 'assets/images/galeria/thumb/circuito-de-madeira-parque.webp',
        'src' => 'assets/images/galeria/full/circuito-de-madeira-parque.webp',
        'category' => 'parque',
        'caption' => 'Circuito de madeira',
        'desc' => 'Ponte de corda, escalada e equilíbrio',
        'span' => 'col-span-2 row-span-2 md:col-span-1 md:row-span-1 lg:col-span-2 lg:row-span-2'
    ],
    [
        'id' => 'galeria-18',
        'thumb' => 'assets/images/galeria/thumb/cantinho-da-leitura.webp',
        'src' => 'assets/images/galeria/full/cantinho-da-leitura.webp',
        'category' => 'salas',
        'caption' => 'Cantinho da Leitura',
        'desc' => 'Árvore de papel e cadeiras para a hora da história',
        'span' => ''
    ],
    [
        'id' => 'galeria-15',
        'thumb' => 'assets/images/galeria/thumb/sala-do-maternal.webp',
        'src' => 'assets/images/galeria/full/sala-do-maternal.webp',
        'category' => 'salas',
        'caption' => 'Sala do Maternal',
        'desc' => 'Armários coloridos com material ao alcance',
        'span' => ''
    ],
    [
        'id' => 'galeria-22',
        'thumb' => 'assets/images/galeria/thumb/quintal-area-externa.webp',
        'src' => 'assets/images/galeria/full/quintal-area-externa.webp',
        'category' => 'parque',
        'caption' => 'Quintal suspenso',
        'desc' => 'Sol, grama sintética e vista da cidade',
        'span' => 'col-span-2 row-span-2 md:col-span-1 md:row-span-1 lg:col-span-2 lg:row-span-2'
    ],
    [
        'id' => 'galeria-20',
        'thumb' => 'assets/images/galeria/thumb/refeitorio.webp',
        'src' => 'assets/images/galeria/full/refeitorio.webp',
        'category' => 'convivencia',
        'caption' => 'Refeitório',
        'desc' => 'Mesas coletivas para comer junto',
        'span' => 'col-span-2'
    ],
    [
        'id' => 'galeria-06',
        'thumb' => 'assets/images/galeria/thumb/parque-dos-pequenos.webp',
        'src' => 'assets/images/galeria/full/parque-dos-pequenos.webp',
        'category' => 'parque',
        'caption' => 'Parque dos pequenos',
        'desc' => 'Balanços, gangorra e brinquedos por faixa etária',
        'span' => ''
    ],
    [
        'id' => 'galeria-25',
        'thumb' => 'assets/images/galeria/thumb/espaco-de-leitura-e-musica.webp',
        'src' => 'assets/images/galeria/full/espaco-de-leitura-e-musica.webp',
        'category' => 'convivencia',
        'caption' => 'Leitura e música',
        'desc' => 'Estante de livros e instrumentos na parede',
        'span' => ''
    ],
    [
        'id' => 'galeria-10',
        'thumb' => 'assets/images/galeria/thumb/mural-de-bolinhas-corredor.webp',
        'src' => 'assets/images/galeria/full/mural-de-bolinhas-corredor.webp',
        'category' => 'estrutura',
        'caption' => 'Mural das bolinhas',
        'desc' => 'Mural de bolinhas no corredor principal',
        'span' => 'col-span-2'
    ],
    [
        'id' => 'galeria-02',
        'thumb' => 'assets/images/galeria/thumb/entrada-do-colegio.webp',
        'src' => 'assets/images/galeria/full/entrada-do-colegio.webp',
        'category' => 'estrutura',
        'caption' => 'Entrada do colégio',
        'desc' => 'Acesso seguro e monitorado',
        'span' => ''
    ],
    [
        'id' => 'galeria-03',
        'thumb' => 'assets/images/galeria/thumb/acesso-coberto.webp',
        'src' => 'assets/images/galeria/full/acesso-coberto.webp',
        'category' => 'estrutura',
        'caption' => 'Acesso coberto',
        'desc' => 'Circulação protegida do sol e da chuva',
        'span' => ''
    ],
    [
        'id' => 'galeria-23',
        'thumb' => 'assets/images/galeria/thumb/casinha-de-escalada.webp',
        'src' => 'assets/images/galeria/full/casinha-de-escalada.webp',
        'category' => 'parque',
        'caption' => 'Casinha de escalada',
        'desc' => 'Escorregador, rampa e mural do fundo do mar',
        'span' => 'col-span-2 row-span-2 md:col-span-1 md:row-span-1 lg:col-span-2 lg:row-span-2'
    ],
    [
        'id' => 'galeria-04',
        'thumb' => 'assets/images/galeria/thumb/rampa-de-acessibilidade.webp',
        'src' => 'assets/images/galeria/full/rampa-de-acessibilidade.webp',
        'category' => 'estrutura',
        'caption' => 'Rampa de acessibilidade',
        'desc' => 'Todos os ambientes conectados sem degraus',
        'span' => ''
    ],
    [
        'id' => 'galeria-07',
        'thumb' => 'assets/images/galeria/thumb/portoes-de-seguranca.webp',
        'src' => 'assets/images/galeria/full/portoes-de-seguranca.webp',
        'category' => 'estrutura',
        'caption' => 'Portões de segurança',
        'desc' => 'Portão que separa os trechos do corredor',
        'span' => ''
    ],
    [
        'id' => 'galeria-08',
        'thumb' => 'assets/images/galeria/thumb/corredor-das-mochilas.webp',
        'src' => 'assets/images/galeria/full/corredor-das-mochilas.webp',
        'category' => 'estrutura',
        'caption' => 'Corredor das mochilas',
        'desc' => 'Ganchos para as mochilas logo na entrada',
        'span' => ''
    ],
    [
        'id' => 'galeria-09',
        'thumb' => 'assets/images/galeria/thumb/circulacao-interna.webp',
        'src' => 'assets/images/galeria/full/circulacao-interna.webp',
        'category' => 'estrutura',
        'caption' => 'Circulação interna',
        'desc' => 'Piso emborrachado do início ao fim',
        'span' => ''
    ],
    [
        'id' => 'galeria-19',
        'thumb' => 'assets/images/galeria/thumb/hora-da-refeicao.webp',
        'src' => 'assets/images/galeria/full/hora-da-refeicao.webp',
        'category' => 'convivencia',
        'caption' => 'Hora da refeição',
        'desc' => 'Alimentação natural preparada na escola',
        'span' => 'col-span-2'
    ],
    [
        'id' => 'galeria-11',
        'thumb' => 'assets/images/galeria/thumb/espaco-de-higiene.webp',
        'src' => 'assets/images/galeria/full/espaco-de-higiene.webp',
        'category' => 'estrutura',
        'caption' => 'Espaço de higiene',
        'desc' => 'Lavatórios na altura das crianças',
        'span' => ''
    ],
    [
        'id' => 'galeria-12',
        'thumb' => 'assets/images/galeria/thumb/sala-do-mini-maternal.webp',
        'src' => 'assets/images/galeria/full/sala-do-mini-maternal.webp',
        'category' => 'salas',
        'caption' => 'Sala do Mini-Maternal',
        'desc' => 'Mesas baixas e espelho para explorar',
        'span' => ''
    ],
    [
        'id' => 'galeria-21',
        'thumb' => 'assets/images/galeria/thumb/patio-externo.webp',
        'src' => 'assets/images/galeria/full/patio-externo.webp',
        'category' => 'parque',
        'caption' => 'Pátio externo',
        'desc' => 'Área verde para brincar ao ar livre',
        'span' => 'col-span-2 row-span-2 md:col-span-1 md:row-span-1 lg:col-span-2 lg:row-span-2'
    ],
    [
        'id' => 'galeria-13',
        'thumb' => 'assets/images/galeria/thumb/banheiro-infantil.webp',
        'src' => 'assets/images/galeria/full/banheiro-infantil.webp',
        'category' => 'estrutura',
        'caption' => 'Banheiro infantil',
        'desc' => 'Cabines e pias no tamanho certo',
        'span' => ''
    ],
    [
        'id' => 'galeria-14',
        'thumb' => 'assets/images/galeria/thumb/frase-na-parede-da-escada.webp',
        'src' => 'assets/images/galeria/full/frase-na-parede-da-escada.webp',
        'category' => 'estrutura',
        'caption' => 'Nossa filosofia na parede',
        'desc' => 'Frase pintada na parede da escada',
        'span' => ''
    ],
    [
        'id' => 'galeria-16',
        'thumb' => 'assets/images/galeria/thumb/rotina-visual-calendario.webp',
        'src' => 'assets/images/galeria/full/rotina-visual-calendario.webp',
        'category' => 'salas',
        'caption' => 'Rotina visual',
        'desc' => 'Calendário e combinados da turma na parede',
        'span' => ''
    ],
    [
        'id' => 'galeria-17',
        'thumb' => 'assets/images/galeria/thumb/sala-do-jardim.webp',
        'src' => 'assets/images/galeria/full/sala-do-jardim.webp',
        'category' => 'salas',
        'caption' => 'Sala do Jardim',
        'desc' => 'Preparação para a alfabetização',
        'span' => ''
    ],
    [
        'id' => 'galeria-24',
        'thumb' => 'assets/images/galeria/thumb/banheiros-sinalizados.webp',
        'src' => 'assets/images/galeria/full/banheiros-sinalizados.webp',
        'category' => 'estrutura',
        'caption' => 'Banheiros sinalizados',
        'desc' => 'Portas com placas de sinalização',
        'span' => ''
    ],
    [
        'id' => 'galeria-26',
        'thumb' => 'assets/images/galeria/thumb/musicalizacao-instrumentos.webp',
        'src' => 'assets/images/galeria/full/musicalizacao-instrumentos.webp',
        'category' => 'convivencia',
        'caption' => 'Musicalização',
        'desc' => 'Instrumentos de percussão usados na musicalização',
        'span' => ''
    ]
];

$FAQS = [
    [
        'question' => "Como funciona o período de adaptação?",
        'answer' => "A adaptação é feita de forma gradual e respeitosa, onde a permanência da criança aumenta aos poucos. Os pais são bem-vindos para acompanhar nos primeiros dias, garantindo segurança emocional."
    ],
    [
        'question' => "Qual o horário de funcionamento?",
        'answer' => "Funcionamos das 07h00 às 19h00, com opções de período Regular (5h), Semi-integral (8h) e Integral (12h), para atender a rotina de cada família."
    ],
    [
        'question' => "Como é a alimentação na escola?",
        'answer' => "Nossa alimentação é 100% natural, preparada na escola e acompanhada por nutricionista. Não utilizamos açúcar ou ultraprocessados, priorizando frutas, verduras e integrais."
    ],
    [
        'question' => "A partir de qual idade vocês aceitam?",
        'answer' => "Aceitamos bebês a partir de 4 meses no nosso Berçário, com turmas segmentadas até a Pré-Escola (5 anos)."
    ]
];

// O hero agora e ilustrado (ceu + vaga-lumes); a foto da fachada vive em components/hero.php.
// \$CAROUSEL_IMAGES foi removido por nao ter mais consumidor.
?>
