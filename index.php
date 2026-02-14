<?php
// ================================
// CONFIG
// ================================
$domain = "https://kurta.luxeloom.co/";
$brand  = "luxeloom";

// ================================
// LOAD KEYWORDS
// ================================
$keywordsFile = __DIR__ . '/keywords.txt';
$keywords = file_exists($keywordsFile)
    ? file($keywordsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
    : [];

// Convert keywords to slugs
$keywordMap = [];
foreach ($keywords as $kw) {
    $slug = strtolower(trim(preg_replace('/[^a-z0-9]+/i', '-', $kw), '-'));
    $keywordMap[$slug] = trim($kw);
}

// ================================
// DETECT PAGE
// ================================
$slug = $_GET['slug'] ?? '';

// Homepage
if ($slug === '' || !isset($keywordMap[$slug])) {
    $isHomepage = true;
    $keyword = "Premium Women's Kurtis Online in India";
    $canonical = $domain;
} else {
    $isHomepage = false;
    $keyword = $keywordMap[$slug];
    $canonical = $domain . $slug;
}

// Escape output
function e($str) {
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// ================================
// SEO CONTENT GENERATOR
// ================================
function seo_paragraph($keyword) {
    return "
    Discover the latest collection of {$keyword} crafted with premium fabrics,
    modern silhouettes, and traditional elegance. Our {$keyword} designs are
    perfect for office wear, festive occasions, and everyday comfort. Each piece
    is carefully tailored to ensure breathability, durability, and a flattering
    fit for Indian body types. Shop {$keyword} online and experience ethnic fashion
    that blends heritage craftsmanship with contemporary style.
    ";
}

// ================================
// META
// ================================
$title = $isHomepage
    ? "Buy Women's Kurtis Online | $brand India"
    : "$keyword for Women | Buy Online at $brand";

$description = $isHomepage
    ? "Shop premium women's kurtis online in India. Office wear, festive, cotton & designer kurtis with fast delivery and easy returns."
    : "Shop $keyword with elegant designs, breathable fabrics and perfect fits. Buy online with free shipping & easy returns.";

?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($description) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($description) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:type" content="website">
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&amp;family=Plus+Jakarta+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#800020", // Deep Maroon
                        "accent": "#D4AF37",  // Gold
                        "background-light": "#FFFDF9",
                        "background-dark": "#1a0f0f",
                    },
                    fontFamily: {
                        "display": ["Playfair Display", "serif"],
                        "sans": ["Plus Jakarta Sans", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "0.125rem", "lg": "0.25rem", "xl": "0.5rem", "full": "9999px"},
                },
            },
        }
    </script>
    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ClothingStore",
  "name": "<?= $brand ?>",
  "alternateName": "<?= e($keyword) ?>",
  "url": "<?= e($canonical) ?>",
  "address": {
    "@type": "PostalAddress",
    "addressCountry": "IN"
  },
  "priceRange": "₹₹"
}
</script>
<style type="text/tailwindcss">
        @layer base {
            body { font-family: 'Plus Jakarta Sans', sans-serif; }
            h1, h2, h3, .font-serif { font-family: 'Playfair Display', serif; }
        }
        .gold-gradient {
            background: linear-gradient(135deg, #D4AF37 0%, #F1D382 50%, #D4AF37 100%);
        }
        .no-scrollbar::-webkit-scrollbar { display: none; }
    </style>
</head>
<body class="bg-background-light dark:bg-background-dark text-slate-900 dark:text-slate-100 transition-colors duration-300">
<header class="sticky top-0 z-50 bg-white/95 dark:bg-background-dark/95 backdrop-blur-md border-b border-accent/20">
<nav class="container mx-auto px-6 py-4 flex items-center justify-between">
<div class="flex items-center gap-10">
<a class="text-2xl font-bold tracking-widest text-primary dark:text-accent uppercase" href="/">
                luxeloom<span class="text-accent">.</span>
</a>
<div class="hidden lg:flex items-center gap-8 text-[11px] font-bold uppercase tracking-[0.2em]">
<a class="hover:text-primary transition-colors border-b-2 border-transparent hover:border-accent pb-1" href="#cotton-kurtas">Cotton Kurtas</a>
<a class="hover:text-primary transition-colors border-b-2 border-transparent hover:border-accent pb-1" href="#anarkali">Anarkali Suits</a>
<a class="hover:text-primary transition-colors border-b-2 border-transparent hover:border-accent pb-1" href="#festive">Festive Sets</a>
<a class="text-primary hover:text-primary/80" href="#new-arrivals">New Arrivals</a>
</div>
</div>
<div class="flex items-center gap-6">
<div class="hidden md:flex items-center bg-stone-100 dark:bg-white/5 px-4 py-2 border border-stone-200 dark:border-white/10">
<span class="material-symbols-outlined text-sm text-stone-400">search</span>
<input class="bg-transparent border-none text-xs focus:ring-0 w-40 placeholder-stone-400" placeholder="Find your style..." type="text"/>
</div>
<button class="hover:text-primary transition-colors p-1">
<span class="material-symbols-outlined">favorite</span>
</button>
<button class="hover:text-primary transition-colors p-1">
<span class="material-symbols-outlined">shopping_bag</span>
</button>
</div>
</nav>
</header>
<main>
<section class="relative h-[90vh] flex items-center overflow-hidden bg-stone-200">
<div class="absolute inset-0 z-0">
<img alt="Designer Women's Kurtas Collection" class="w-full h-full object-cover" data-alt="Model in elegant designer ethnic wear" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDYEZ6u5WvHbV_rTauM4Ml-Dk5FWJ4asD07kIlSrfKQ5i0FMznSxX1K1X5XozaoUyrtDnmfKiciqkOdP4Gj3m_apiXwZx77ttqhn9opJRYDjnW_PIkwXxQER6qgIbbc2tBl0koHLYyZroHhpb_QocLYnZ-B6IGVZA92dOrYV7Wf0SDbLr5hl6yCvK7CQVHBIuBdZbSJw7Z5Jo-AGOaRXyUaDA8NupoEg77rJ7CQjaIZishpXwUqhVHNa00wBcADhM_LcR_YTu6BsUEq"/>
<div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent"></div>
</div>
<div class="container mx-auto px-6 relative z-10">
<div class="max-w-3xl">
<span class="inline-block px-4 py-1 mb-6 text-[10px] font-bold tracking-[0.3em] uppercase bg-accent text-primary">The Royal Edit</span>
<h1 class="text-5xl md:text-7xl font-bold text-white leading-tight mb-6">
                    <?= e($keyword) ?>

                </h1>
<p class="text-lg text-stone-200 mb-10 max-w-xl leading-relaxed font-light">
                    Discover timeless elegance with our curated collection of artisanal kurtas and ethnic sets. Crafted from premium fabrics for the modern woman who cherishes tradition.
                </p>
<div class="flex flex-wrap gap-5">
<a class="bg-primary hover:bg-primary/90 text-white font-bold py-5 px-12 transition-all border border-accent/30 shadow-2xl" href="#categories">
                        Explore Collection
                    </a>
<a class="bg-white/10 backdrop-blur-sm hover:bg-white/20 text-white font-bold py-5 px-12 border border-white/30 transition-all" href="#festive">
                        View Festive Sets
                    </a>
</div>
</div>
</div>
</section>
<section class="py-8 bg-primary text-accent border-y border-accent/30">
<div class="container mx-auto px-6">
<div class="grid grid-cols-2 md:grid-cols-4 gap-8">
<div class="flex items-center justify-center gap-3">
<span class="material-symbols-outlined text-2xl">verified</span>
<span class="text-[11px] font-bold uppercase tracking-widest">Authentic Fabric</span>
</div>
<div class="flex items-center justify-center gap-3">
<span class="material-symbols-outlined text-2xl">published_with_changes</span>
<span class="text-[11px] font-bold uppercase tracking-widest">Easy Returns</span>
</div>
<div class="flex items-center justify-center gap-3">
<span class="material-symbols-outlined text-2xl">handyman</span>
<span class="text-[11px] font-bold uppercase tracking-widest">Artisan Crafted</span>
</div>
<div class="flex items-center justify-center gap-3">
<span class="material-symbols-outlined text-2xl">local_shipping</span>
<span class="text-[11px] font-bold uppercase tracking-widest">Global Shipping</span>
</div>
</div>
</div>
</section>
<section class="py-24 container mx-auto px-6" id="categories">
<div class="text-center mb-16">
<h2 class="text-4xl md:text-5xl font-bold mb-4 text-primary dark:text-accent italic"> <?= e($keyword) ?> Our Curated Categories</h2>
<div class="w-24 h-1 bg-accent mx-auto mb-6"></div>
<p class="text-stone-500 dark:text-stone-400 max-w-2xl mx-auto uppercase tracking-widest text-xs">Exquisite styles for every occasion</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
<div class="group relative aspect-[4/5] overflow-hidden" id="cotton-kurtas">
<img alt="Handcrafted Cotton Kurtas for Women" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" data-alt="Woman in breathable cotton kurta" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwbu-udxo_OIoxvsFqK_mwfz07E1HYILanEH7MJGJHCRbP7SoPDKEXEZID8JH9VTtMWnzmhzBnJ1MjvFVNndlzm6vtvVvGpPFEo3mhEAARzaeybVpGQ21VFqh_tg6r34Fe3XfgWFwl_HXj02aPoTW-MaRX43B8yid--JUqFEP3VnIVFBLN9yNrnVUHnPwOBPNkQgNl1A_GwC72Wf0gUo6j8KxFEBT0fA9nGx6G4i8pu2GDHslBTIojTe5aZHy6GWxdOx4Y_r1kaiA6"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent flex flex-col justify-end p-10">
<h2 class="text-white text-3xl font-bold mb-3">Cotton Kurtas</h2>
<p class="text-accent/80 text-sm mb-6 font-medium tracking-wide">Daily Wear &amp; Office Essentials</p>
<a class="inline-flex items-center text-white font-bold text-xs uppercase tracking-[0.2em] group-hover:text-accent transition-colors border-b border-white/30 pb-2 w-fit" href="#">
                        Shop Now <span class="material-symbols-outlined ml-2 text-sm">arrow_right_alt</span>
</a>
</div>
</div>
<div class="group relative aspect-[4/5] overflow-hidden" id="anarkali">
<img alt="Designer Anarkali Suits for Weddings" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" data-alt="Graceful model in floor length anarkali" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAkfl-Da4X13ks35rPA3_mhVZIScwBjVsSxnQw35SLqDd9wydYe74vr0QdBxQkrW8nj-Dt5-9s1v6pNSlxuB1j4QvJQZNLAt3qp_WltQtmvCeyFMvygkAwI5Hq_b18Kzx0KYhofrhR9z3LHtF5QJ-RoDP8DAtzFTh9hiNIwExX9enD2Rs98eyJZ7mdVQd75XiN88djKTv7cAwYAAic2dd7I-cYAnA1Nj9kplMA6on618ZbjKDTKmDenizhfW-_030bkclZLeIEizYSV"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent flex flex-col justify-end p-10">
<h2 class="text-white text-3xl font-bold mb-3">Anarkali Suits</h2>
<p class="text-accent/80 text-sm mb-6 font-medium tracking-wide">Flowing Silhouettes &amp; Luxury Fits</p>
<a class="inline-flex items-center text-white font-bold text-xs uppercase tracking-[0.2em] group-hover:text-accent transition-colors border-b border-white/30 pb-2 w-fit" href="#">
                        Shop Now <span class="material-symbols-outlined ml-2 text-sm">arrow_right_alt</span>
</a>
</div>
</div>
<div class="group relative aspect-[4/5] overflow-hidden" id="festive">
<img alt="Festive Ethnic Sets and Party Wear" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110" data-alt="Traditional festive wear with embroidery" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUp-bvq5z9_vna0ANAPNFDC3wdTyqQRBr8kBFGIpLy_rUBSgYa8tj_KFYeydeSaEEcYI8Hy1c0scoBYfL_KwgB2iQepEI-nefOgUDqeAlZi7FnXQQpLPLdJtCIrnpd2ox2mn68sAXlNR2jUhFXRKW5p3D9cUVKpEpfl7YQZ_tJLjV5WPvoSWt7Ra0cugNRCyX7mTTmt1YXNzwcGlSwarA51C_hRcJVpmJnQ69EmtrI1ey8hzw0nbZSaAROikFrPiXxovO3qG-iMs6b"/>
<div class="absolute inset-0 bg-gradient-to-t from-primary/90 via-transparent to-transparent flex flex-col justify-end p-10">
<h2 class="text-white text-3xl font-bold mb-3">Festive Ethnic Sets</h2>
<p class="text-accent/80 text-sm mb-6 font-medium tracking-wide">Celebration Ready Ensembles</p>
<a class="inline-flex items-center text-white font-bold text-xs uppercase tracking-[0.2em] group-hover:text-accent transition-colors border-b border-white/30 pb-2 w-fit" href="#">
                        Shop Now <span class="material-symbols-outlined ml-2 text-sm">arrow_right_alt</span>
</a>
</div>
</div>
</div>
</section>
<section class="bg-stone-50 dark:bg-stone-900/50 py-24 border-y border-stone-200 dark:border-white/5">
<div class="container mx-auto px-6">
<div class="flex justify-between items-end mb-12">
<div>
<span class="text-accent font-bold text-[10px] uppercase tracking-[0.3em] mb-2 block">Top Rated</span>
<h2 class="text-4xl font-bold text-primary dark:text-white">Trending Styles</h2>
</div>
<a class="text-primary dark:text-accent font-bold text-xs uppercase tracking-widest border-b-2 border-accent pb-1" href="#">View Full Catalog</a>
</div>
<div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
<div class="group">
<div class="relative overflow-hidden mb-5">
<img alt="Maroon Embroidered Kurta" class="w-full aspect-[4/5] object-cover transition duration-700 group-hover:scale-105" data-alt="Premium maroon kurta with gold embroidery" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDe2WocuojijMqHii5Z0rNyqMi4HwkDYSBNdq4rcdcQg_W3tqUcrGgG8NtRPfAKNkgOlfxwc6K6_YRY3kTBaU8DTNNCUEcCQ0oq3G2Kgk9oJPZeOUbtEiPfmCriyZEh-tTCx6R1zHnm1ucb9E4gwrSl60E0WA4bda2SaUOE6842X2y9Kpntmyn3TQ3VMjStlB4_6FM90i-S0bHltPMF_EJu0hVGXjyp6dpAYugn2EV2IUpqBnCBcEEmBmbFPvTBaA_s6Z2j9wfCtTTl"/>
<button class="absolute bottom-0 left-0 right-0 bg-primary/95 text-white py-4 font-bold text-xs uppercase tracking-widest translate-y-full group-hover:translate-y-0 transition-transform flex items-center justify-center gap-2">
                            Add to Wardrobe
                        </button>
<span class="absolute top-4 left-4 bg-accent text-primary text-[10px] font-black px-3 py-1 uppercase tracking-tighter">Bestseller</span>
</div>
<h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Crimson Silk Blend Kurta</h3>
<p class="text-xs text-stone-500 mb-2 italic">Zari Work Collection</p>
<span class="text-xl font-bold text-primary dark:text-accent">₹4,299</span>
</div>
<div class="group">
<div class="relative overflow-hidden mb-5">
<img alt="White Chikankari Kurta" class="w-full aspect-[4/5] object-cover transition duration-700 group-hover:scale-105" data-alt="Elegant white chikankari embroidery kurta" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCK7mcs04R5LKOWHdvuRYj9IYnmj_FWqyKtRa_tpQMHLI_O0IZji8w3r9wjnoPaEKNmyvE0vHhOFQYDYR6oRpw12S2IEYs5iGkLkHMrv4F8yKtj2TBSSMyZObw79coTxyyWqZIVESthXAzFjBe-0log9ypraeHOnnvnqTlbxv18IPw0aNppyYgqj1JnExe4iFAXcF4MMRwh6HglRNen2TTXUpDua-s49DLqjgFhMyGEhgC5Huzaj8d6b-8V0Y3GHVlcMF_m70bTj0Vk"/>
<button class="absolute bottom-0 left-0 right-0 bg-primary/95 text-white py-4 font-bold text-xs uppercase tracking-widest translate-y-full group-hover:translate-y-0 transition-transform flex items-center justify-center gap-2">
                            Add to Wardrobe
                        </button>
</div>
<h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Pearl White Chikankari</h3>
<p class="text-xs text-stone-500 mb-2 italic">Lucknowi Heritage</p>
<span class="text-xl font-bold text-primary dark:text-accent">₹3,850</span>
</div>
<div class="group">
<div class="relative overflow-hidden mb-5">
<img alt="Velvet Anarkali Set" class="w-full aspect-[4/5] object-cover transition duration-700 group-hover:scale-105" data-alt="Royal velvet anarkali set for festive season" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDW4ErribEU-wIHlSxZjEG1Vu7it9ps8xZP265Mby6WgetvoUlpbDjsSw0ABUodthP8OLe2hF0OedWacyjfZWSfAmEdeCm2iGU2PdU7pGFiXLIfBtnDKViMfca-N2mHFGZ5DKP_frASUU6whYm7Jr_uOmV_aYPf163N0eI9C7TLvLQo0iiyxIV8-VVFLoJjSSODo_k1_ceF7peNReim6OSZOixzQAvhidXD9d4CubBEV9AMl9_8Ket_9H572Lz5hFFPn6en0iknc2yH"/>
<button class="absolute bottom-0 left-0 right-0 bg-primary/95 text-white py-4 font-bold text-xs uppercase tracking-widest translate-y-full group-hover:translate-y-0 transition-transform flex items-center justify-center gap-2">
                            Add to Wardrobe
                        </button>
<span class="absolute top-4 left-4 bg-stone-800 text-white text-[10px] font-bold px-3 py-1 uppercase tracking-tighter">New Arrival</span>
</div>
<h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Royal Velvet Anarkali Set</h3>
<p class="text-xs text-stone-500 mb-2 italic">Winter Festive</p>
<span class="text-xl font-bold text-primary dark:text-accent">₹12,999</span>
</div>
<div class="group">
<div class="relative overflow-hidden mb-5">
<img alt="Hand-block Printed Set" class="w-full aspect-[4/5] object-cover transition duration-700 group-hover:scale-105" data-alt="Traditional hand-block printed ethnic set" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCdBN4xSBpztu9ERqXIUe0x81g2N33E_ftH9rT-Vo9_HYIB2eQKRXVVBzq6ilxgN4wFSuUmTdVl1NfBHngirfROq0IUzFg8qtzqPrYz4AL2jFnjJTm1C0YISG7DJZjazy4fpaEz5XY-KkPkHYb4inmf4NyBMCZaeFPKSrQqaG8eWaFdoQmAwSOGHhIheqPy9yrdHaGEOnIombLGGplXNtW-nP4mD-dD5egTKKlHF-x9OzvrhKRDNtKBEIhkMnyXt0a39K5uL9sdbS67"/>
<button class="absolute bottom-0 left-0 right-0 bg-primary/95 text-white py-4 font-bold text-xs uppercase tracking-widest translate-y-full group-hover:translate-y-0 transition-transform flex items-center justify-center gap-2">
                            Add to Wardrobe
                        </button>
</div>
<h3 class="font-bold text-lg text-slate-800 dark:text-white mb-1">Indigo Block Print Set</h3>
<p class="text-xs text-stone-500 mb-2 italic">Artisan Series</p>
<span class="text-xl font-bold text-primary dark:text-accent">₹5,400</span>
</div>
</div>
</div>
</section>
<section class="py-24 container mx-auto px-6">
<div class="flex flex-col lg:flex-row gap-20">
<div class="lg:w-1/2">
<h2 class="text-4xl font-bold mb-8 text-primary dark:text-accent leading-tight">
                    Authentic <span class="italic">Women's Ethnic Wear</span> &amp; Designer Kurtas
                </h2>
<div class="prose prose-stone dark:prose-invert max-w-none space-y-6 text-stone-600 dark:text-stone-400">
<p>
                        Elevate your wardrobe with luxeloom's premium selection of <strong>women's ethnic wear</strong>. From the breezy comfort of <strong>cotton kurtas for daily wear</strong> to the majestic sweep of <strong>luxury Anarkali suits</strong>, our designs bridge the gap between ancient Indian heritage and contemporary fashion trends.
                    </p>
<p>
                        Our <strong>designer kurtas online</strong> are curated with a focus on long-tail keyword relevance and high-quality craftsmanship. We use only the finest natural fibers, including GOTS-certified organic cotton, pure mulmul, and high-thread-count silk. Whether you are searching for a <strong>festive ethnic set for weddings</strong> or a <strong>minimalist office-wear kurta</strong>, our collection offers unparalleled variety.
                    </p>
<p>
                        Each piece in our <strong>ethnic clothing store</strong> tells a story of traditional craftsmanship, featuring intricate hand-embroidery, artisanal block prints, and time-honored weaving techniques. We are committed to ethical fashion, ensuring fair wages for our artisans while delivering the <strong>best ethnic wear for women</strong> directly to your doorstep with carbon-neutral shipping.
                    </p>
</div>
<div class="mt-10 grid grid-cols-2 gap-6">
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary dark:text-accent">workspace_premium</span>
<span class="text-xs font-bold uppercase tracking-widest">Handmade Quality</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary dark:text-accent">eco</span>
<span class="text-xs font-bold uppercase tracking-widest">Natural Dyes</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary dark:text-accent">history_edu</span>
<span class="text-xs font-bold uppercase tracking-widest">Heritage Designs</span>
</div>
<div class="flex items-center gap-3">
<span class="material-symbols-outlined text-primary dark:text-accent">diversity_3</span>
<span class="text-xs font-bold uppercase tracking-widest">Supporting Artisans</span>
</div>
</div>
</div>
<div class="lg:w-1/2" itemscope="" itemtype="https://schema.org/FAQPage">
<h2 class="text-4xl font-bold mb-10 text-primary dark:text-white">Style Guidance &amp; FAQs</h2>
<div class="space-y-6">
<div class="border-b border-stone-200 dark:border-white/10 pb-6" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
<button class="flex justify-between items-center w-full text-left group">
<span class="font-bold text-slate-800 dark:text-stone-100 uppercase tracking-widest text-sm" itemprop="name">How do I choose the right size for Kurtas?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-45 transition-transform">add</span>
</button>
<div class="mt-4 text-sm text-stone-500 leading-relaxed" itemprop="acceptedAnswer" itemscope="" itemtype="https://schema.org/Answer">
<div itemprop="text">
                                We provide a comprehensive size guide on every product page. For a traditional fit, we recommend selecting your regular size. For a more modern, relaxed look in cotton kurtas, you might consider sizing up.
                            </div>
</div>
</div>
<div class="border-b border-stone-200 dark:border-white/10 pb-6" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
<button class="flex justify-between items-center w-full text-left group">
<span class="font-bold text-slate-800 dark:text-stone-100 uppercase tracking-widest text-sm" itemprop="name">Are these ethnic sets suitable for dry clean only?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-45 transition-transform">add</span>
</button>
<div class="mt-4 text-sm text-stone-500 leading-relaxed" itemprop="acceptedAnswer" itemscope="" itemtype="https://schema.org/Answer">
<div itemprop="text">
                                Our festive and silk collections are 'Dry Clean Only' to preserve the delicate embroidery and fabric luster. However, our 100% cotton kurtas are designed for gentle hand wash or machine wash at home.
                            </div>
</div>
</div>
<div class="border-b border-stone-200 dark:border-white/10 pb-6" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
<button class="flex justify-between items-center w-full text-left group">
<span class="font-bold text-slate-800 dark:text-stone-100 uppercase tracking-widest text-sm" itemprop="name">Do you offer customization for Anarkali suits?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-45 transition-transform">add</span>
</button>
<div class="mt-4 text-sm text-stone-500 leading-relaxed" itemprop="acceptedAnswer" itemscope="" itemtype="https://schema.org/Answer">
<div itemprop="text">
                                Yes, we offer basic tailoring services including sleeve length and hem adjustments for our Anarkali suits. <?= e($keyword) ?>  Please contact our style concierge after placing your order for assistance.
                            </div>
</div>
</div>
<div class="border-b border-stone-200 dark:border-white/10 pb-6" itemprop="mainEntity" itemscope="" itemtype="https://schema.org/Question">
<button class="flex justify-between items-center w-full text-left group">
<span class="font-bold text-slate-800 dark:text-stone-100 uppercase tracking-widest text-sm" itemprop="name">What is your return policy for ethnic wear?</span>
<span class="material-symbols-outlined text-primary group-hover:rotate-45 transition-transform">add</span>
</button>
<div class="mt-4 text-sm text-stone-500 leading-relaxed" itemprop="acceptedAnswer" itemscope="" itemtype="https://schema.org/Answer">
<div itemprop="text">
                                We offer a hassle-free 15-day return policy for all unworn ethnic wear.<?= e($keyword) ?> Items must have original tags and be in their original packaging to qualify for a full refund or exchange.
                            </div>
</div>
</div>
</div>
</div>
</div>
</section>
</main>
<footer class="bg-primary text-stone-200 pt-20 pb-10">
<div class="container mx-auto px-6">
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-16 mb-20">
<div class="space-y-8">
<a class="text-3xl font-bold text-accent uppercase tracking-widest block" href="/">
                    luxeloom<span class="text-white">.</span>
</a>
<p class="text-sm text-stone-300 leading-relaxed">
                    Embrace the essence of Indian luxury. <?= e($keyword) ?>  Sign up for exclusive access to our festive launches and seasonal styling guides.
                </p>
<form class="flex border-b border-accent/40 pb-2">
<input class="w-full bg-transparent border-none text-sm focus:ring-0 placeholder-stone-400 p-0" placeholder="Your Email Address" type="email"/>
<button class="text-accent font-bold text-xs uppercase tracking-widest" type="submit">Join</button>
</form>
</div>
<div>
<h4 class="font-bold text-white uppercase tracking-[0.2em] text-[11px] mb-8">Collections</h4>
<ul class="space-y-4 text-sm text-stone-400">
<li><a class="hover:text-accent transition-colors" href="#">Pure Cotton Kurtas</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Wedding Anarkali Suits</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Festive Palazzo Sets</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Chanderi Silk Series</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Hand-Block Prints</a></li>
</ul>
</div>
<div>
<h4 class="font-bold text-white uppercase tracking-[0.2em] text-[11px] mb-8">Concierge</h4>
<ul class="space-y-4 text-sm text-stone-400">
<li><a class="hover:text-accent transition-colors" href="#">Shipping Information</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Returns &amp; Exchanges</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Size Measurement Guide</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Track Order</a></li>
<li><a class="hover:text-accent transition-colors" href="#">Artisan Story</a></li>
</ul>
</div>
<div>
<h4 class="font-bold text-white uppercase tracking-[0.2em] text-[11px] mb-8">Follow Us</h4>
<div class="flex gap-6 mb-10">
<a class="text-stone-300 hover:text-accent transition-colors" href="#"><span class="material-icons">facebook</span></a>
<a class="text-stone-300 hover:text-accent transition-colors" href="#"><span class="material-symbols-outlined">camera</span></a>
<a class="text-stone-300 hover:text-accent transition-colors" href="#"><span class="material-symbols-outlined">play_circle</span></a>
</div>
<div class="flex flex-wrap gap-4 opacity-40">
<span class="material-symbols-outlined" title="Visa">credit_card</span>
<span class="material-symbols-outlined" title="MasterCard">payments</span>
<span class="material-symbols-outlined" title="Secure">lock</span>
</div>
</div>
</div>
<div class="border-t border-white/5 pt-10 flex flex-col md:flex-row justify-between items-center gap-6 text-[10px] font-bold uppercase tracking-[0.2em] text-stone-500">
<p>© 2024 luxeloom ETHNIC WEAR. ALL RIGHTS RESERVED.</p>
<div class="flex gap-8">
<a class="hover:text-accent transition-colors" href="#">Privacy Policy</a>
<a class="hover:text-accent transition-colors" href="#">Terms &amp; Conditions</a>
<a class="hover:text-accent transition-colors" href="#">Sitemap</a>
</div>
</div>
</div>
</footer>

</body></html>
