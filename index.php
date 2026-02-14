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
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?= e($title) ?></title>
<meta name="description" content="<?= e($description) ?>">

<link rel="canonical" href="<?= e($canonical) ?>">
<meta name="google-site-verification" content="9nkCdhV2SwQrUw_haFmHmb9JnNQl4WKolT_lOTWo-3E" />
<meta property="og:title" content="<?= e($title) ?>">
<meta property="og:description" content="<?= e($description) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta property="og:type" content="website">

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




<meta name="google-site-verification" content="GA71h2ytKjPxDBXWXkrUGviyNGlmk1L3SUJMKpUT0JA" />
  <link rel="stylesheet" href="assets/style.css" />
  <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#ec1337",
                        "background-light": "#f8f6f6",
                        "background-dark": "#221013",
                        "accent-gold": "#D4AF37",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                },
            },
        }
    </script>
<style>

#splashOverlay {
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  backdrop-filter: blur(6px);
  z-index: 999999;
  display: flex;
  align-items: center;
  justify-content: center;
}

.splashCard {
  background: #fff;
  padding: 32px;
  border-radius: 16px;
  text-align: center;
  max-width: 320px;
  width: 90%;
  box-shadow: 0 20px 50px rgba(0,0,0,.3);
}

.splashCard h2 {
  font-weight: 800;
  letter-spacing: .2em;
  margin-bottom: 10px;
}

.splashCard p {
  font-size: 14px;
  color: #555;
  margin-bottom: 20px;
}

.visitBtn {
  display: block;
  background: #ec1337;
  color: white;
  padding: 14px;
  border-radius: 12px;
  font-weight: 700;
  text-decoration: none;
  margin-bottom: 12px;
}

#closeSplash {
  background: none;
  border: none;
  font-size: 12px;
  color: #666;
  cursor: pointer;
}


        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
        }
        body {
            font-family: 'Manrope', sans-serif;
            -webkit-tap-highlight-color: transparent;
        }
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .fill-1 {
            font-variation-settings: 'FILL' 1;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
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

  </head>
<body class="bg-background-light dark:bg-background-dark text-[#181112] dark:text-white antialiased">
<div class="sticky top-0 z-50 bg-white/80 dark:bg-background-dark/80 backdrop-blur-md border-b border-[#e6dbdd] dark:border-white/10">
<div class="flex items-center p-4 justify-between max-w-md mx-auto">
<div class="text-[#181112] dark:text-white flex size-10 shrink-0 items-center justify-start cursor-pointer">
<span class="material-symbols-outlined">search</span>
</div>
<h2 class="text-[#181112] dark:text-white text-xl font-extrabold tracking-[0.15em] flex-1 text-center uppercase">AAVYA</h2>
<div class="flex w-10 items-center justify-end gap-4">
<button class="flex cursor-pointer items-center justify-center text-[#181112] dark:text-white">
<span class="material-symbols-outlined">shopping_bag</span>
</button>
</div>
</div>
</div>
<main class="max-w-md mx-auto pb-32">
<div class="@container">
<div class="p-4">
<div class="relative bg-cover bg-center flex flex-col justify-end overflow-hidden rounded-xl min-h-[480px] shadow-lg" style='background-image: linear-gradient(180deg, rgba(0, 0, 0, 0) 40%, rgba(0, 0, 0, 0.7) 100%), url("https://lh3.googleusercontent.com/aida-public/AB6AXuAIUL8TSegTfDdcbqT0KwxC1L0m8DVSnxRPsBUUVY_mOQY6ZWMtEUh67OgwAKNVpX9WCbooKLIDQyH0KgqQJrJfrFKfLS3hF3asS6GSrQhJcrMHo6bClrg5fTDdWJ_31xqYAaV9-6Rg4nxHTTfef6dE0yZwa4mEco2oCiuockzH7eV1xmtmACgA6jkTklcgWZgKg20vmD1WC0_iXZhpnUXhcXqHKwnKtY4CO1L5hYiVaLVe7NB98OpqXoFW2U-jokVXWgmRy0fuoCTe");'>
<div class="flex flex-col p-6 gap-3">
<span class="text-accent-gold font-semibold tracking-widest text-xs uppercase">Premium Collection</span>
<h1 class="text-white text-3xl font-bold leading-tight tracking-tight"><?= e($keyword) ?></h1>
<button class="mt-2 bg-primary text-white w-fit px-6 py-3 rounded-lg font-bold text-sm tracking-wide shadow-lg active:scale-95 transition-transform">
                            SHOP THE COLLECTION
                        </button>
</div>
</div>
</div>
</div>
<div class="px-4 py-2">
<div class="grid grid-cols-3 gap-2 py-4 border-y border-[#e6dbdd] dark:border-white/10 bg-white dark:bg-background-dark/50 rounded-lg">
<div class="flex flex-col items-center justify-center gap-1 border-r border-[#e6dbdd] dark:border-white/10">
<span class="material-symbols-outlined text-primary text-xl">local_shipping</span>
<span class="text-[10px] font-bold uppercase tracking-tighter text-[#181112] dark:text-white/80">Free Shipping</span>
</div>
<div class="flex flex-col items-center justify-center gap-1 border-r border-[#e6dbdd] dark:border-white/10">
<span class="material-symbols-outlined text-primary text-xl">payments</span>
<span class="text-[10px] font-bold uppercase tracking-tighter text-[#181112] dark:text-white/80">Cash on Delivery</span>
</div>
<div class="flex flex-col items-center justify-center gap-1">
<span class="material-symbols-outlined text-primary text-xl">keyboard_return</span>
<span class="text-[10px] font-bold uppercase tracking-tighter text-[#181112] dark:text-white/80">Easy Returns</span>
</div>
</div>
</div>
<div>
<div class="flex justify-between items-center px-4 pt-6 pb-2">
<h3 class="text-[#181112] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Shop by Category</h3>
<span class="text-primary text-sm font-semibold cursor-pointer">View All</span>
</div>
<div class="flex w-full overflow-x-auto no-scrollbar px-4 py-3 gap-6">
<div class="flex flex-col items-center gap-2 min-w-[72px] text-center">
<div class="w-16 h-16 bg-center bg-cover rounded-full border-2 border-primary/20 p-0.5" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuALbaAlcgUdVWYczcuQ9Wjs2gBQwlJBYcpvWdUWtdP38GnuCY1c_zSUGFgSj0KbwYUC2GlxPJDIgA3xMbxYFYKvpAAeYtMNiFN2wI2zJ0cVrRdZMP7_MpI4pO7WrZvXxgCV61nmb_eDbowl--Gf0b8dzzrgIT_CGPQe3JFw6dGAomZIZlD4E_-xUGF9DJ0bz7ibYM5yFzkgYxiy4bLFRCQEG35ULzh61Myh2K_h33ESRAfGfKPUVi56f-02DAjRQMWADn3tj6YkGhEn");'>
<div class="w-full h-full rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDhk0KRLR66aGduuA4p4nqOhfpsbFliuVfaIGaexMFcUzVNk6-SxWzzjvD40MY58RIOwHWGtEcdWIffGQauAEmwe4G19l04iM8qHcMlU4MgpPIbrmO6_ommE9XxMGl5uRz2lFu6qHnLRTiiJ9AtK9Vqo6cPSzeDDOwaL77dFwYAhYNZ5f-hTek0J0dUiTRpf9T4m2_3n9Qw2yX0KKxWFkdBJvTdEzZLkYwL8I5_bd5YCveCrg0k5j2gLW4oKrzgSnCNmex-pQOQZVCL");'></div>
</div>
<p class="text-[#181112] dark:text-white text-xs font-semibold leading-tight">New Arrivals</p>
</div>
<div class="flex flex-col items-center gap-2 min-w-[72px] text-center">
<div class="w-16 h-16 bg-center bg-cover rounded-full border-2 border-transparent p-0.5" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDsxLghIxgv6NQ05ObvymiYG6HZWRVDOZk-zNWzXfP2M7WU_xKD3-gDAENXQpYsLauTy1J8edrTc57cXvB5Hslgv0h_fTN89nCUrclUYNltWG58UQBkB6HfJizAR8hs7xR-5NAMorxh-EQ7KgfwNgm0UT2Tm52COY4tpRoMHQLm6c9XIxJSSvAiZi5Tzfaxj4pxGezMBn3jfDI2en6AJsdofdhircZVbLgGZ-QSuNp5VdaBeqn9icFpCPCMQ6jmnZNcp6Rw9aihsCPz");'>
<div class="w-full h-full rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCHY6qc-LP04zjIyKnhAOH7ybbkn4dsq7Ul95xUYsJfmxVrY40D2TOfoq1zuqHEfmQ9BiPjIxaRTudQAEIxnwN9iAuCvanIk0PXkhNDqBbRSOp0A0lwSCnQKQQ_eqlaRGBcP-QwntVnQ6mXICf5ckggtPUN8984S8Hjx1wIIpVJP8mspE-9AB4sBJ5LM9OxDyIxW4VZYl9SP5_qgqb1Tj7AGtxne_uC9RZWVTjhMK6lxDyP1qUoIKYDanDs3TFlyVeStS36oiZX6Ncn");'></div>
</div>
<p class="text-[#181112] dark:text-white text-xs font-semibold leading-tight">Wedding Edit</p>
</div>
<div class="flex flex-col items-center gap-2 min-w-[72px] text-center">
<div class="w-16 h-16 bg-center bg-cover rounded-full border-2 border-transparent p-0.5" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD_bU0PfqqYrlGVlw2y4Hd8ELgzepkvw-qfOz2yPmxGmeeBHoJif-_9kzL-GVsQ9HzvLW6DcgoaFOxD9N6UEaYVrHfChFmKtOPmSwv8p-SMJXSlOfcwTkFMioNlM-vAZSIdwd6RcMA7fK_l7hRAVxvqD4z9qXkgQfSjdr_2fWIinESWoI2IFPGcFFbjZYw4P-CWd07F0rvpzTaz8xh-g8xrbVWlPoEhTb45kUGF7V5mIEQB8ckGmVxiSB44TExM4QdFEsYS-LW06L5v");'>
<div class="w-full h-full rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuCYlMMdjUV4pg0QPlZ0RdNe_HSAZiC6tTCNAMWj-S3up17813BYDhQpfhWhis3o9HBYHtvsdf-ku8y8LMt-7CSGc4X3Dys47vWrnt5ISu8RHoR1zs6xc9WoFhhuA2afGiTNmSF_1obgkJwvT2UTrBrsp0BMgMQyEpE-OWfxyUZod3RYQHsSSO-AKoqvfSzxxwt3ZBqBgPyTGDB6oQVfhW06ShBRqMD31-AA2M-cwQ5RNpRwp0IBdqhelXhUy7D8urSQk6tbuvKV5Cxm");'></div>
</div>
<p class="text-[#181112] dark:text-white text-xs font-semibold leading-tight">Indo-Western</p>
</div>
<div class="flex flex-col items-center gap-2 min-w-[72px] text-center">
<div class="w-16 h-16 bg-center bg-cover rounded-full border-2 border-transparent p-0.5" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuAQtfipVCwlQcSwW208xm4uEZNelvigztAuXmgjWW7bPrZzO45964G3toAeJd30ubWg6SPBxyKFMF_kZVtgwACIbK295u3C0XtTyz_IPLCbj7Z3NorKEUExkxGRlrSa_8BlmtTV_gZpAaf0q5ml8jGiT5_4MIhhj0LT9vMC5QxGxVLiIBF9Dcyfgk-wv0N1Sgv4VsIRM-3hbKZgp_uhjO55eH9A96oBsPk5h8hN5VE1J0bk_kaNPGN_kq8uSKXhiIawD3NoOg6Zvno2");'>
<div class="w-full h-full rounded-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBTuN9841GQzWsVMU8Nx4Hv95AsNPdB7jtDiJatusUFbafclEUtlgZ8DAkVvYfISmLaSB2QLd-sWAS4Aeg_NmtGBVHbjKAmjCrgEPXWxcUfolwK2a72n-QazMWPPNoJ34Rj5EiNQqfU3P5oTOCtCmwngo_2JoRhc16KtW4nw6Oogn3ILFgspsF7fm8cP54v4JYOjiIBsnvgH_xOW1LllnSOUOotUJO9XtNIy4McJMxDZdz6JHDj1ZlQI2EGR7ZdmknbU1nvucgQSJSj");'></div>
</div>
<p class="text-[#181112] dark:text-white text-xs font-semibold leading-tight">Office Wear</p>
</div>
</div>
</div>
<div class="mt-4">
<div class="flex justify-between items-center px-4 py-4">
<h3 class="text-[#181112] dark:text-white text-lg font-bold leading-tight tracking-[-0.015em]">Trending Now</h3>
<div class="flex gap-1">
<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
<span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
<span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
</div>
</div>
<div class="flex w-full overflow-x-auto no-scrollbar px-4 gap-4 pb-4">
<div class="min-w-[200px] flex flex-col gap-2 bg-white dark:bg-white/5 rounded-xl overflow-hidden shadow-sm border border-[#e6dbdd] dark:border-white/5">
<div class="relative h-64 w-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDdJ8xgUWHzEMUNSudDZ0QT47aXs-o-lX-DsfBrVLjMbRZcz9gSznIwPNh6WKNifiUCQjIaD21Jv86J0nQgyBntVCW82BFJy0tgdHJMZdgyhKSduEl_3EXMQzRNBguOoJDKXc9PQywNFuLEbsjVgOM_jWf0aWTSHztQCMqCyjcKvAbHbuQvIEQkMPOuIMii0qZaTrwjiJaA_JjO8ZVKE2CIXgLhj73iOiofDmFHCN5M77QGpnkIGf7WQDTcGDCQMm7a_3cnDxzCRgqR");'>
<button class="absolute top-2 right-2 bg-white/80 backdrop-blur p-1.5 rounded-full shadow-sm">
<span class="material-symbols-outlined text-sm text-[#181112]">favorite</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1">
<h4 class="text-sm font-semibold truncate text-[#181112] dark:text-white">Emerald Silk Anarkali</h4>
<div class="flex items-center justify-between mt-1">
<p class="text-primary font-bold">₹4,999</p>
<button class="bg-primary/10 text-primary p-1.5 rounded-lg">
<span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
</button>
</div>
</div>
</div>
<div class="min-w-[200px] flex flex-col gap-2 bg-white dark:bg-white/5 rounded-xl overflow-hidden shadow-sm border border-[#e6dbdd] dark:border-white/5">
<div class="relative h-64 w-full bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBw_ECjtnT79CZEYn0vhHOMGExU2zLkeKyhJQGZHQmeW3Fji5StatnhTxbS6NNUPuKmou69QRG-HTP0mIEVMEBHZMtUR5YnruHJVbP2BeMiju8ZM0QkrSl68AAqPNOBpHMIx4V7ZTqwUa7QTuZv4NFUKtc4NdSgPyJZNkfRZD3nsrKBRQb9PiHeOY0bdSrTQzPY4es0jbRa2UqyToQu5AwBT8bylxm3zGXPJ-UN88xJaBxW10As8ribgqOxoRexKJIxRpqO52sMONtN");'>
<button class="absolute top-2 right-2 bg-white/80 backdrop-blur p-1.5 rounded-full shadow-sm text-primary">
<span class="material-symbols-outlined text-sm fill-1">favorite</span>
</button>
</div>
<div class="p-3 flex flex-col gap-1">
<h4 class="text-sm font-semibold truncate text-[#181112] dark:text-white">Ivory Pearl Sharara</h4>
<div class="flex items-center justify-between mt-1">
<p class="text-primary font-bold">₹7,250</p>
<button class="bg-primary/10 text-primary p-1.5 rounded-lg">
<span class="material-symbols-outlined text-[20px]">add_shopping_cart</span>
</button>
</div>
</div>
</div>
</div>
</div>
<div class="px-4 py-4">
<div class="h-32 w-full rounded-xl bg-gradient-to-r from-pink-100 to-red-50 dark:from-red-950/30 dark:to-pink-900/10 flex items-center justify-between px-6 border border-pink-200 dark:border-pink-900/30">
<div class="flex flex-col">
<p class="text-[#181112] dark:text-white font-bold text-lg leading-tight">Exclusive Offers</p>
<p class="text-primary text-sm font-bold">Up to 30% OFF</p>
<p class="text-gray-500 dark:text-gray-400 text-[10px] mt-1">On your first app purchase</p>
</div>
<div class="bg-white dark:bg-background-dark px-4 py-2 rounded-lg border-2 border-dashed border-primary/30">
<p class="text-xs font-bold text-primary tracking-widest uppercase">FESTIVE30</p>
</div>
</div>
</div>
<section class="mt-8">
<div class="flex justify-between items-center px-4 mb-4">
<h3 class="text-[#181112] dark:text-white text-lg font-bold leading-tight"><?= e($keyword) ?></h3>
<span class="text-primary text-sm font-semibold">Read Blog</span>
</div>
<div class="flex overflow-x-auto no-scrollbar px-4 gap-4 pb-4">
<div class="min-w-[280px] bg-white dark:bg-white/5 rounded-xl overflow-hidden border border-[#e6dbdd] dark:border-white/5 shadow-sm">
<div class="h-40 bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuDsxLghIxgv6NQ05ObvymiYG6HZWRVDOZk-zNWzXfP2M7WU_xKD3-gDAENXQpYsLauTy1J8edrTc57cXvB5Hslgv0h_fTN89nCUrclUYNltWG58UQBkB6HfJizAR8hs7xR-5NAMorxh-EQ7KgfwNgm0UT2Tm52COY4tpRoMHQLm6c9XIxJSSvAiZi5Tzfaxj4pxGezMBn3jfDI2en6AJsdofdhircZVbLgGZ-QSuNp5VdaBeqn9icFpCPCMQ6jmnZNcp6Rw9aihsCPz");'></div>
<div class="p-4">
<p class="text-accent-gold text-[10px] font-bold uppercase mb-1">Styling Guide</p>
<h4 class="text-sm font-bold text-[#181112] dark:text-white leading-tight"> <?= e($keyword) ?> 5 Ways to Style Your Kurti for Office</h4>
<p class="text-xs text-gray-500 mt-2">Elevate your daily workwear with these simple ethnic fusion tips...</p>
</div>
</div>
<div class="min-w-[280px] bg-white dark:bg-white/5 rounded-xl overflow-hidden border border-[#e6dbdd] dark:border-white/5 shadow-sm">
<div class="h-40 bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuD_bU0PfqqYrlGVlw2y4Hd8ELgzepkvw-qfOz2yPmxGmeeBHoJif-_9kzL-GVsQ9HzvLW6DcgoaFOxD9N6UEaYVrHfChFmKtOPmSwv8p-SMJXSlOfcwTkFMioNlM-vAZSIdwd6RcMA7fK_l7hRAVxvqD4z9qXkgQfSjdr_2fWIinESWoI2IFPGcFFbjZYw4P-CWd07F0rvpzTaz8xh-g8xrbVWlPoEhTb45kUGF7V5mIEQB8ckGmVxiSB44TExM4QdFEsYS-LW06L5v");'></div>
<div class="p-4">
<p class="text-accent-gold text-[10px] font-bold uppercase mb-1">Festive Trends</p>
<h4 class="text-sm font-bold text-[#181112] dark:text-white leading-tight">Choosing the Perfect Wedding Lehenga</h4>
<p class="text-xs text-gray-500 mt-2">A comprehensive guide to finding your dream bridal silhouette...</p>
</div>
</div>
</div>
</section>
<section class="mt-8 px-4 py-8 bg-white dark:bg-white/5 border-y border-[#e6dbdd] dark:border-white/10">
<h3 class="text-[#181112] dark:text-white text-xl font-bold mb-6 text-center">Why Shop at Aavya?</h3>
<div class="grid grid-cols-2 gap-6">
<div>
<h4 class="text-xs font-bold text-primary uppercase mb-2">Heritage Craft</h4>
<p class="text-[11px] leading-relaxed text-gray-600 dark:text-gray-400">We celebrate the rich tapestry of Indian heritage, working directly with master artisans to preserve traditional embroidery and weaving techniques.</p>
</div>
<div>
<h4 class="text-xs font-bold text-primary uppercase mb-2">Pure Fabrics</h4>
<p class="text-[11px] leading-relaxed text-gray-600 dark:text-gray-400">From ethically sourced organic cotton to premium handloom silk, every piece is crafted using skin-friendly, high-quality natural fibers.</p>
</div>
<div>
<h4 class="text-xs font-bold text-primary uppercase mb-2">Ethical Fashion</h4>
<p class="text-[11px] leading-relaxed text-gray-600 dark:text-gray-400">Our commitment to slow fashion ensures fair wages for our craftsmen and sustainable production cycles that respect the environment.</p>
</div>
<div>
<h4 class="text-xs font-bold text-primary uppercase mb-2">Modern Fit</h4>
<p class="text-[11px] leading-relaxed text-gray-600 dark:text-gray-400">Combining traditional aesthetics with modern ergonomic fits, ensuring style never comes at the cost of your comfort.</p>
</div>
</div>
</section>
<section class="mt-8 px-4">
<h3 class="text-[#181112] dark:text-white text-lg font-bold mb-4">Customer Questions</h3>
<div class="space-y-3">
<div class="border border-[#e6dbdd] dark:border-white/10 rounded-lg p-4 bg-white dark:bg-white/5">
<div class="flex justify-between items-center cursor-pointer">
<p class="text-xs font-bold">How do I find my perfect size?</p>
<span class="material-symbols-outlined text-sm">expand_more</span>
</div>
</div>
<div class="border border-[#e6dbdd] dark:border-white/10 rounded-lg p-4 bg-white dark:bg-white/5">
<div class="flex justify-between items-center cursor-pointer">
<p class="text-xs font-bold text-primary">What is the shipping time?</p>
<span class="material-symbols-outlined text-sm">expand_less</span>
</div>
<p class="text-[11px] mt-2 text-gray-600 dark:text-gray-400 leading-relaxed">Most orders are delivered within 3-5 business days across India. Express shipping is available for major cities.</p>
</div>
<div class="border border-[#e6dbdd] dark:border-white/10 rounded-lg p-4 bg-white dark:bg-white/5">
<div class="flex justify-between items-center cursor-pointer">
<p class="text-xs font-bold">How to care for silk fabrics?</p>
<span class="material-symbols-outlined text-sm">expand_more</span>
</div>
</div>
</div>
</section>
<footer class="mt-12 bg-white dark:bg-background-dark border-t border-[#e6dbdd] dark:border-white/10 pt-8 pb-12 px-6">
<div class="flex flex-col items-center mb-8">
<h2 class="text-[#181112] dark:text-white text-2xl font-extrabold tracking-[0.2em] mb-2">AAVYA</h2>
<div class="flex items-center gap-2 bg-gray-100 dark:bg-white/5 px-3 py-1.5 rounded-full">
<span class="material-symbols-outlined text-sm text-green-600">verified</span>
<span class="text-[10px] font-bold uppercase tracking-wider">Made in India</span>
</div>
</div>
<div class="grid grid-cols-2 gap-8 mb-8">
<div>
<h5 class="text-xs font-bold mb-4 uppercase text-primary">Collections</h5>
<ul class="space-y-2 text-[11px] text-gray-500">
<li><a class="hover:text-primary transition-colors" href="#">Cotton Kurtis</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Wedding Lehengas</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Silk Sarees</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Anarkali Sets</a></li>
<li><a class="hover:text-primary transition-colors" href="#"><?= e($keyword) ?></a></li>
</ul>
</div>
<div>
<h5 class="text-xs font-bold mb-4 uppercase text-primary">Quick Links</h5>
<ul class="space-y-2 text-[11px] text-gray-500">
<li><a class="hover:text-primary transition-colors" href="#">Track Order</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Return Policy</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Size Guide</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Sustainability</a></li>
<li><a class="hover:text-primary transition-colors" href="#">Contact Us</a></li>
</ul>
</div>
</div>
<div class="flex justify-center gap-6 mb-8">
<div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 dark:bg-white/5 border border-[#e6dbdd] dark:border-white/10">
<span class="material-symbols-outlined text-lg">share</span>
</div>
<div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 dark:bg-white/5 border border-[#e6dbdd] dark:border-white/10">
<span class="material-symbols-outlined text-lg">mail</span>
</div>
<div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 dark:bg-white/5 border border-[#e6dbdd] dark:border-white/10">
<span class="material-symbols-outlined text-lg">podcasts</span>
</div>
</div>
<p class="text-[10px] text-center text-gray-400">© 2026 AAVYA Fashion Private Limited. All Rights Reserved.</p>
</footer>
</main>
<div class="fixed bottom-0 left-0 right-0 bg-white/90 dark:bg-background-dark/90 backdrop-blur-lg border-t border-[#e6dbdd] dark:border-white/10 px-6 py-3 z-50">
<div class="max-w-md mx-auto flex justify-between items-center">
<div class="flex flex-col items-center gap-1 text-primary">
<span class="material-symbols-outlined fill-1">home</span>
<span class="text-[10px] font-bold">Home</span>
</div>
<div class="flex flex-col items-center gap-1 text-gray-400">
<span class="material-symbols-outlined">category</span>
<span class="text-[10px] font-medium">Shop</span>
</div>
<div class="flex flex-col items-center gap-1 text-gray-400">
<span class="material-symbols-outlined">auto_awesome</span>
<span class="text-[10px] font-medium">Stories</span>
</div>
<div class="flex flex-col items-center gap-1 text-gray-400">
<span class="material-symbols-outlined">person</span>
<span class="text-[10px] font-medium">Profile</span>
</div>
</div>
<div class="mt-4 mx-auto w-32 h-1 bg-gray-300 dark:bg-white/20 rounded-full"></div>
</div>
<!-- SPLASH OVERLAY -->
<div id="splashOverlay">
  <div class="splashCard">
    <h2>LuxeLoom</h2>
    <p>Discover our full women’s ethnic collection</p>

    <a
      href="https://luxeloom.co/collections/women"
      class="visitBtn"
    >
      Visit Store →
    </a>

    <button id="closeSplash">Continue Here</button>
  </div>
</div>

</body></html>




