<?php
$domain = "https://tempmessage.com/";

// --- Load keyword.txt file (each line = one keyword) ---
$keywordsFile = __DIR__ . '/keywords.txt';
$keywordsList = file_exists($keywordsFile)
  ? file($keywordsFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)
  : [];

// --- Choose keyword ---
// 1. If ?q= is present, use it
// 2. Else randomly pick one from keywords.txt (changes daily for SEO stability)
// 3. Else fallback to default keyword
if (isset($_GET['q']) && trim($_GET['q']) !== '') {
    $keyword = trim($_GET['q']);
} elseif (!empty($keywordsList)) {
    // Optional: stable random keyword per day (better for SEO)
    $daySeed = date('Ymd');
    srand(crc32($daySeed));
    $keyword = $keywordsList[array_rand($keywordsList)];
} else {
    $keyword = 'Temporary Message Creator';
}

// --- Sanitize output ---
$keyword = htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');

// --- Dynamic description ---
$description = "$keyword — Create and share self-destructing messages online with TempMessage.com. End-to-end encryption ensures total privacy — no data stored, no accounts needed.";
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?php echo $keyword; ?> — Send Self-Destructing Private Messages Online</title>
  <meta name="description" content="<?php echo $description; ?>" />
  <meta name="keywords" content="temporary message, secret message, encrypted message, self-destructing message, anonymous message, private message, one-time link, secure message sharing, tempmessage, private note, burn after reading" />
  <meta property="og:title" content="<?php echo $keyword; ?> — Secure & Private Messaging" />
  <meta property="og:description" content="<?php echo $description; ?>" />
  <meta property="og:url" content="<?php echo $domain; ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?php echo $domain; ?>assets/preview.jpg" />
  <link rel="canonical" href="<?php echo $domain . '?q=' . urlencode($keyword); ?>" />
  <link rel="stylesheet" href="assets/style.css" />
  <!-- Google Ads Performance Boost -->
<link rel="preconnect" href="https://pagead2.googlesyndication.com">
<link rel="preconnect" href="https://googleads.g.doubleclick.net">
<link rel="dns-prefetch" href="https://pagead2.googlesyndication.com">
<link rel="dns-prefetch" href="https://googleads.g.doubleclick.net">

<script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
<link href="https://fonts.googleapis.com/css2?family=Courier+Prime:wght@400;700&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"/>

  <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "WebSite",
      "@id": "<?php echo $domain; ?>#website",
      "url": "<?php echo $domain; ?>",
      "name": "TempMessage",
      "description": "<?php echo $description; ?>",
      "publisher": {
        "@id": "<?php echo $domain; ?>#organization"
      },
      "potentialAction": {
        "@type": "SearchAction",
        "target": "<?php echo $domain; ?>?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@type": "Organization",
      "@id": "<?php echo $domain; ?>#organization",
      "name": "Temp Message",
      "url": "<?php echo $domain; ?>",
      "logo": {
        "@type": "ImageObject",
        "url": "<?php echo $domain; ?>assets/logo.png"
      },
      "sameAs": [
        "https://twitter.com/",
        "https://www.facebook.com/",
        "https://www.linkedin.com/"
      ]
    },
    {
      "@type": "WebApplication",
      "@id": "<?php echo $domain; ?>#webapp",
      "name": "<?php echo $keyword; ?>",
      "url": "<?php echo $domain; ?>",
      "applicationCategory": "UtilityApplication",
      "operatingSystem": "All",
      "browserRequirements": "Requires JavaScript",
      "description": "<?php echo $description; ?>",
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "reviewCount": "18234"
      }
    }
  ]
}
</script>

<script async
  src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2885050972904135"
  crossorigin="anonymous">
</script>


<script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#10B981", // Emerald/Teal color from Copy button
                        secondary: "#FDE047", // Yellow for Premium
                        "background-light": "#F3F4F6", // Light gray background
                        "background-dark": "#111827", // Dark gray/black background
                        "surface-dark": "#1F2937", // Specific dark surface for header
                    },
                    fontFamily: {
                        display: ["'Courier Prime'", "monospace"],
                        sans: ["'Inter'", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                    },
                },
            },
        };
    </script>

<style>::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: transparent;
        }
        ::-webkit-scrollbar-thumb {
            background-color: rgba(156, 163, 175, 0.5);
            border-radius: 20px;
        }
    </style>
<style>
    body {
      min-height: max(884px, 100dvh);
    }
  </style>
  </head>
<body class="bg-background-light dark:bg-background-dark text-gray-800 dark:text-gray-200 transition-colors duration-300 font-sans antialiased pb-20">
<header class="bg-surface-dark dark:bg-black pt-6 pb-12 px-4 rounded-b-[2rem] shadow-lg relative overflow-hidden">
<div class="absolute top-4 right-4 z-10">
<button class="bg-secondary text-black font-bold text-xs px-4 py-1.5 rounded-full shadow-md hover:bg-yellow-300 transition uppercase tracking-wider">
                Premium
            </button>
</div>
<div class="mt-8 max-w-md mx-auto">
<div class="border-2 border-dashed border-gray-600 dark:border-gray-700 rounded-xl p-6 bg-gray-800/50 dark:bg-gray-900/50 backdrop-blur-sm">
<h1 class="text-white font-display text-center text-lg font-bold mb-6 tracking-wide">
                   <?php echo $keyword; ?>
                </h1>
<div class="bg-gray-700/50 dark:bg-gray-800/80 rounded-lg h-12 mb-6 flex items-center justify-center border border-gray-600 dark:border-gray-700">
<span id="emailAddress" class="text-gray-400 font-mono text-sm">Loading address...</span>

</div>
<div class="grid grid-cols-2 gap-4">
<button class="flex items-center justify-center gap-2 bg-gray-600 hover:bg-gray-500 text-white py-2.5 px-4 rounded-lg transition shadow-sm group">
<span class="material-icons-outlined text-lg group-hover:scale-110 transition-transform">qr_code</span>
<span class="text-sm font-medium">QR code</span>
</button>
<button onclick="copyEmail()" class="flex items-center justify-center gap-2 bg-primary hover:bg-emerald-600 text-white py-2.5 px-4 rounded-lg transition shadow-sm shadow-emerald-900/20 group">
<span class="material-icons-outlined text-lg group-hover:scale-110 transition-transform">content_copy</span>
<span class="text-sm font-medium">Copy</span>
</button>
</div>
</div>
<!-- 🔴 AD SLOT 1 : BELOW EMAIL ADDRESS (TOP RPM) -->
<div class="max-w-md mx-auto px-4 mt-4">
  <ins class="adsbygoogle ad-fast"
       style="display:block"
       data-ad-client="ca-pub-2885050972904135"
       data-ad-slot="5643353039"
       data-ad-format="auto"
       data-full-width-responsive="true"></ins>
</div>
<script>
(function () {
  let loaded = false;

  function loadAd() {
    if (loaded) return;
    loaded = true;
    (adsbygoogle = window.adsbygoogle || []).push({});
  }

  const ad = document.querySelector(".ad-fast");
  if (!ad) return;

  // Load instantly if already in viewport
  if (ad.getBoundingClientRect().top < window.innerHeight + 200) {
    loadAd();
    return;
  }

  // Otherwise load when about to be visible
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        loadAd();
        observer.disconnect();
      }
    });
  }, { rootMargin: "200px" });

  observer.observe(ad);
})();
</script>


<p class="text-gray-400 text-xs text-center mt-6 leading-relaxed px-4 font-mono">
                <?php echo $keyword; ?> Forget about hacking, robot attacks, advertising mailings, and spam. Your actual mailbox should be kept safe and clean. Temp Mail offers a free, disposable, anonymous, secure, and temporary email address.
            </p>
</div>
</header>
<div class="max-w-md mx-auto px-4 -mt-6 relative z-10">
<div class="bg-white dark:bg-surface-dark rounded-xl shadow-lg p-4 grid grid-cols-2 gap-3 border border-gray-100 dark:border-gray-700">
<button onclick="copyEmail()"  class="flex items-center justify-center py-3 bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg text-xs font-mono font-bold hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                Copy
            </button>
<button onclick="loadInbox()" class="flex items-center justify-center py-3 bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg text-xs font-mono font-bold hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                Refresh
            </button>
<button onclick="changeEmail()" class="flex items-center justify-center py-3 bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg text-xs font-mono font-bold hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                Change
            </button>
<button onclick="deleteEmail()" class="flex items-center justify-center py-3 bg-gray-50 dark:bg-gray-800 text-gray-600 dark:text-gray-300 rounded-lg text-xs font-mono font-bold hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                Delete
            </button>
</div>
</div>
<section class="max-w-md mx-auto px-4 mt-8">
<div class="rounded-lg overflow-hidden border border-gray-200 dark:border-gray-700 shadow-sm">
<div class="bg-surface-dark dark:bg-black px-4 py-3 flex justify-between items-center">
<span class="text-white font-mono font-bold text-sm tracking-widest uppercase">Inbox</span>
<span class="material-icons-outlined text-gray-400 text-sm">refresh</span>
</div>
<div id="inbox" class="bg-white dark:bg-surface-dark h-48 overflow-y-auto p-4 text-sm text-gray-700 dark:text-gray-200">


<div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center mb-4">
<span class="material-icons-outlined text-gray-400 text-3xl">mail_outline</span>
</div>
<h3 class="text-gray-700 dark:text-gray-200 font-display font-bold mb-1">Your inbox is empty</h3>
<p class="text-gray-400 text-xs font-mono">Waiting for incoming emails</p>
</div>
</div>
</section>
<!-- 🔴 AD SLOT 1 : BELOW EMAIL ADDRESS (TOP RPM) -->
<div class="max-w-md mx-auto px-4 mt-4">
  <ins class="adsbygoogle ad-fast"
       style="display:block"
       data-ad-client="ca-pub-2885050972904135"
       data-ad-slot="5643353039"
       data-ad-format="auto"
       data-full-width-responsive="true"></ins>
</div>
<script>
(function () {
  let loaded = false;

  function loadAd() {
    if (loaded) return;
    loaded = true;
    (adsbygoogle = window.adsbygoogle || []).push({});
  }

  const ad = document.querySelector(".ad-fast");
  if (!ad) return;

  // Load instantly if already in viewport
  if (ad.getBoundingClientRect().top < window.innerHeight + 200) {
    loadAd();
    return;
  }

  // Otherwise load when about to be visible
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        loadAd();
        observer.disconnect();
      }
    });
  }, { rootMargin: "200px" });

  observer.observe(ad);
})();
</script>

<main class="max-w-md mx-auto px-6 mt-12 space-y-10">
<article>
<h2 class="font-display font-bold text-xl mb-4 text-gray-900 dark:text-white">What is Disposable<br/>Temporary E-mail?</h2>
<p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed text-justify">
<strong class="text-gray-800 dark:text-gray-200">Disposable email</strong> - is a free email service that lets users receive emails at a temporary address before it self-destructs after a predetermined amount of time. Other names for it include tempmail, 10minutemail, 10minmail, throwaway email, fake-mail, fake-email generator, burner mail, and trash-mail. Before users can view content, leave comments, or download anything, many forums, Wi-Fi providers, websites, and blogs require registration. The most sophisticated disposable email service that keeps you safe and helps you avoid spam is called Temp-Mail.
            </p>

<!-- 🔴 AD SLOT 1 : BELOW EMAIL ADDRESS (TOP RPM) -->
<div class="max-w-md mx-auto px-4 mt-4">
  <ins class="adsbygoogle ad-fast"
       style="display:block"
       data-ad-client="ca-pub-2885050972904135"
       data-ad-slot="5643353039"
       data-ad-format="auto"
       data-full-width-responsive="true"></ins>
</div>
<script>
(function () {
  let loaded = false;

  function loadAd() {
    if (loaded) return;
    loaded = true;
    (adsbygoogle = window.adsbygoogle || []).push({});
  }

  const ad = document.querySelector(".ad-fast");
  if (!ad) return;

  // Load instantly if already in viewport
  if (ad.getBoundingClientRect().top < window.innerHeight + 200) {
    loadAd();
    return;
  }

  // Otherwise load when about to be visible
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        loadAd();
        observer.disconnect();
      }
    });
  }, { rootMargin: "200px" });

  observer.observe(ad);
})();
</script>


</article>
<section>
<h2 class="font-display font-bold text-xl mb-6 text-center text-gray-900 dark:text-white border-b-2 border-gray-200 dark:border-gray-700 pb-2 inline-block w-full">Popular Articles</h2>
<div class="space-y-6">
<a class="flex justify-between items-start gap-4 group" href="#">
<span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-primary transition-colors">Personal domains. How to get your own Temporary Email (2026)</span>
<div class="flex-shrink-0 w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-md overflow-hidden">
<img alt="Abstract article thumbnail" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDVZPGv7unH8ZwmB6bsShDKjX6cFC3xGezZb0lMOT0y-Pi4yDwGxv9SP71zBd8Cz3ngdrBUw7l4ya7U6Tf0rMnP3d5R3lsgIgLW5o5h8NDd7hDoXvgb7XXQlC8cNauzI5IZ9L7KcS9c2fb9NcuAIQWfuqCsbAZRkbqmXGtNEjRg_sdIg9IinYkiLjJtk4tOjeuYobjHqnNi5SrXBXQusieweSh3RVrrdRxAhNINl_XUvVkozjtjUIkaHhC9XdEQadskyw8nsN9XOwM"/>
</div>
</a>
<hr class="border-gray-100 dark:border-gray-800"/>
<a class="flex justify-between items-start gap-4 group" href="#">
<span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-primary transition-colors">How to get online SMS OTP verification in five minutes. Guide (2026)</span>
<div class="flex-shrink-0 w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-md overflow-hidden">
<img alt="SMS verification abstract thumbnail" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAdxBKZOfF3FXtTF6t0WgoKp403EM_1i08LHXHOEV58i_eYKp2ymgo9iQUiH7BBhynNXBMRRju0mWiQZkTyqVUItkhUCYiD4DGp9K-XrHKJBmAHc6AKtf0Pq5qarfr6sZ0wYFwYRzZgu8PIzfZBFqvfaAea-azWz8uosLd1WQAk_qfzKjX7_wvtxuqIisB1iadEEbpu-skQp2CQyoZPjgZGqPhz2rymmg9MQXLQOIkleToi0FRZlS7drEpCM3-J3OJHBWZtAGZyv5E"/>
</div>
</a>
<hr class="border-gray-100 dark:border-gray-800"/>
<a class="flex justify-between items-start gap-4 group" href="#">
<span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-primary transition-colors">Android's new Temp Mail app (2026)


</span>
<div class="flex-shrink-0 w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-md overflow-hidden">
<img alt="Android phone abstract thumbnail" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCPo10loj0MebudOto6-fqv9UOON27J65SEYVv57adFCBg32qqxGVrhzl7SGl5Xe1IQkTCqAGsYmlJJGQj4dg6KkV8Rq-1tNCgElDqhHrPRqqzMb0Oe1Wzp67ddQw1z75tbzCCV4wSzjgpNDkwGHtq42MrITDGX5ZBezxlP9GlhvM_wMEsNzOTDSWNjBWuiMtlx5Zn3OJaxcFaCDTp2lTRhDqh-h7EOIuuRqUhfJeWMvL8pz9h_K4diksfpyX97KMCOD3On8WaTgt8"/>
</div>
</a>
<hr class="border-gray-100 dark:border-gray-800"/>
<a class="flex justify-between items-start gap-4 group" href="#">
<span class="text-sm font-medium text-gray-700 dark:text-gray-300 group-hover:text-primary transition-colors">The best Android mobile games and anonymous email registration
</span>
<div class="flex-shrink-0 w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-md overflow-hidden">
<img alt="Mobile gaming abstract thumbnail" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition" src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4H7d5ARe8XmWCw-97Z77K1gabBrmhMl6Z3Hw7xNN-yggvPG9YLwxFE8JR88jmBmA2qHoYw9YZIdMz5Zjox3P618BWiV9vUQZG9tQ34ZQa2o0Srd58_tpxZPPeSbAxJwehmTZYwP0SkCZtuNMeqtYDI27aMyCRZquNSqBAaWL1epvbZIitMhCpgHo7qCI6kBsvymrERpBSze1UkxHAAUai1bDrOU3KKJ0FtsLO5HwjMB1RqHdkoifeS3fCzY-h4A04P81IYhV4pUc"/>
</div>
</a>
</div>
</section>
<div class="space-y-8 pb-8">
<section>
<h3 class="font-display font-bold text-lg mb-3 text-gray-900 dark:text-white">The Tech behind Disposable Email Addresses</h3>
<p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-justify">
                    Everybody has an email account, and they use it as an online passport for everything from communicating with friends and coworkers to interacting with business prospects at work. Today, the majority of shoppers' loyalty cards, contest and offer submissions, and over 99% of all apps and services we sign up for demand an email address.


                </p>
<p class="text-sm text-gray-600 dark:text-gray-400 text-justify">
                    We all like having an email address, but getting lots of spam emails each day doesn't feel comfortable. Furthermore, it's entirely typical for stores to have their databases hacked, leaving your company email address at danger and more likely to show up on spam lists. However, nothing done on the internet is completely private. As a result, you must safeguard your email contact information, which is best accomplished by utilizing a disposable email account.

                </p>
</section>
<section>
<h3 class="font-display font-bold text-lg mb-3 text-gray-900 dark:text-white">So, What Is A Disposable Email Address?</h3>
<p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-justify">
                   On my most recent email blast, I discovered a bounce rate that was higher than normal! Later, I became aware of the increase in people (or bots) registering for my services while using throwaway mail addresses to conceal their true identities.
                </p>
<p class="text-sm text-gray-600 dark:text-gray-400 text-justify">
                    
     Technically speaking, disposable email address (DEA) refers to a method in which a user with a unique email address is given a temporary email address for your present interaction. The DEA permits the construction of a genuine email account so that you can register for websites and services without having to provide your real identify.
                </p>
</section>
<section>
<h3 class="font-display font-bold text-lg mb-3 text-gray-900 dark:text-white">Why would you need a fake email address?</h3>
<p class="text-sm text-gray-600 dark:text-gray-400 mb-4 text-justify">
                   You must have seen that sites like Netflix, Hulu, and Amazon Prime provide time-limited test runs, or trials. If you are still determined to use the services, all you need is a disposable email account. In theory, after the trial time ends, you can continue to use it using a different email address connected to your original (real) account.


                </p>
<ul class="list-disc pl-5 space-y-3 text-sm text-gray-600 dark:text-gray-400">
<li>
<strong class="text-gray-800 dark:text-gray-200">Sign-Up For Store Loyalty Card:</strong>
                        Use a temporary email address rather than your business email address if you do not want to receive promotional emails from the store promoting new products.

                    </li>
<li>
<strong class="text-gray-800 dark:text-gray-200">Test Your App:</strong>
                        You may easily obtain 100 disposable emails if you have just finished creating a web application and want to thoroughly test it before putting it up for sale.
                    </li>
<li>
<strong class="text-gray-800 dark:text-gray-200">Sign-Up For Double Account With A Web App:</strong>
                       You may easily obtain 100 disposable emails if you have just finished creating a web application and want to thoroughly test it before putting it up for sale.
                    </li>
</ul>
</section>
</div>
</main>
<footer class="bg-surface-dark dark:bg-black text-gray-400 pt-10 pb-20 px-6 mt-8 rounded-t-[2rem]">
<div class="max-w-md mx-auto flex flex-col items-center text-center">
<div class="flex flex-wrap justify-center gap-x-4 gap-y-2 mb-8 text-[10px] font-mono tracking-widest uppercase">
<a class="hover:text-white transition" href="#">Premium</a>
<a class="hover:text-white transition" href="#">API</a>
<a class="hover:text-white transition" href="#">Articles</a>
<a class="hover:text-white transition" href="#">10 Minute Mail</a>
<a class="hover:text-white transition" href="#">Email Generator</a>
<a class="hover:text-white transition" href="#">Privacy</a>
<a class="hover:text-white transition" href="#">Terms</a>
<a class="hover:text-white transition" href="#">FAQ</a>
<a class="hover:text-white transition" href="#">Contacts</a>
<a class="hover:text-white transition" href="#">Advertising</a>
</div>
<div class="flex gap-4 mb-8">
<a class="w-8 h-8 rounded bg-gray-700 hover:bg-primary text-white flex items-center justify-center transition" href="#">
<span class="material-icons-outlined text-sm">share</span>
</a>
<a class="w-8 h-8 rounded bg-gray-700 hover:bg-primary text-white flex items-center justify-center transition" href="#">
<span class="material-icons-outlined text-sm">thumb_up</span>
</a>
<a class="w-8 h-8 rounded bg-gray-700 hover:bg-primary text-white flex items-center justify-center transition" href="#">
<span class="material-icons-outlined text-sm">chat</span>
</a>
<a class="w-8 h-8 rounded bg-gray-700 hover:bg-primary text-white flex items-center justify-center transition" href="#">
<span class="material-icons-outlined text-sm">rss_feed</span>
</a>
</div>
<p class="text-[10px] text-gray-600 mb-6">
                Temp Number | 10MinuteMail | My Phone Number
            </p>
<button class="bg-gray-700 hover:bg-gray-600 text-white text-xs font-bold py-2 px-6 rounded-full shadow-lg transition">
                EN
            </button>
</div>

</footer>
<script>
/* ================= CONFIG ================= */
let login = "";
let domain = "";
let token = "";
let polling = null;
let isReading = false;
let password = "TempMail@123";

/* ================= HELPERS ================= */
function randomString(len = 10) {
  return Math.random().toString(36).substring(2, 2 + len);
}

/* ================= INIT ================= */
async function initMailbox() {
  try {
    const res = await fetch("https://api.mail.tm/domains");
    const data = await res.json();

    const domains = data["hydra:member"];
    domain = domains[Math.floor(Math.random() * domains.length)].domain;

    await generateEmail();
    startPolling();
  } catch {
    document.getElementById("emailAddress").textContent =
      "Failed to load domains";
  }
}

/* ================= EMAIL ================= */
async function generateEmail() {
  login = randomString();
  const email = `${login}@${domain}`;
  document.getElementById("emailAddress").textContent = email;

  // Create mailbox
  await fetch("https://api.mail.tm/accounts", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ address: email, password })
  });

  // Login
  const res = await fetch("https://api.mail.tm/token", {
    method: "POST",
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ address: email, password })
  });

  const data = await res.json();
  token = data.token;

  isReading = false;
  loadInbox();
}

function copyEmail() {
  navigator.clipboard.writeText(`${login}@${domain}`);
  alert("Email copied");
}

function changeEmail() {
  clearInterval(polling);
  initMailbox();
}

function deleteEmail() {
  clearInterval(polling);
  document.getElementById("inbox").innerHTML =
    "<div class='text-center mt-10 text-gray-400'>Mailbox reset</div>";
  initMailbox();
}

/* ================= INBOX ================= */
async function loadInbox() {
  if (!token || isReading) return;

  const inbox = document.getElementById("inbox");
  inbox.innerHTML =
    "<div class='text-center mt-10 text-gray-400'>Loading inbox…</div>";

  try {
    const res = await fetch("https://api.mail.tm/messages", {
      headers: { Authorization: `Bearer ${token}` }
    });

    const data = await res.json();
    const mails = data["hydra:member"];

    if (!mails || mails.length === 0) {
      inbox.innerHTML =
        "<div class='text-center mt-10 text-gray-400'>Inbox is empty</div>";
      return;
    }

    inbox.innerHTML = "";
    mails.forEach(mail => {
      const row = document.createElement("div");
      row.className =
        "border-b py-3 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700";

      row.innerHTML = `
        <div class="font-bold text-sm">${mail.from.address}</div>
        <div class="text-xs text-gray-500">${mail.subject || "(No subject)"}</div>
      `;

      row.onclick = () => openMail(mail.id);
      inbox.appendChild(row);
    });
  } catch {
    inbox.innerHTML =
      "<div class='text-center mt-10 text-red-400'>Inbox unavailable</div>";
  }
}

/* ================= READ MAIL ================= */
async function openMail(id) {
  isReading = true;
  clearInterval(polling);

  const inbox = document.getElementById("inbox");
  inbox.innerHTML =
    "<div class='text-center mt-10 text-gray-400'>Opening email…</div>";

  try {
    const res = await fetch(`https://api.mail.tm/messages/${id}`, {
      headers: { Authorization: `Bearer ${token}` }
    });

    const mail = await res.json();

    inbox.innerHTML = `
      <button onclick="backToInbox()" class="mb-3 text-xs text-primary font-bold">
        ← Back to Inbox
      </button>

      <div class="mb-2">
        <div class="text-sm font-bold">From</div>
        <div class="text-xs break-all">${mail.from.address}</div>
      </div>

      <div class="mb-2">
        <div class="text-sm font-bold">Subject</div>
        <div class="text-xs">${mail.subject || "(No subject)"}</div>
      </div>

      <div class="mb-2 text-xs text-gray-500">
        ${new Date(mail.createdAt).toLocaleString()}
      </div>

      <hr class="my-2">

      <div class="text-sm leading-relaxed">
        ${mail.html ?? `<pre class="whitespace-pre-wrap">${mail.text}</pre>`}
      </div>
    `;
  } catch {
    inbox.innerHTML =
      "<div class='text-center mt-10 text-red-400'>Failed to open email</div>";
  }
}

/* ================= BACK ================= */
function backToInbox() {
  isReading = false;
  loadInbox();
  startPolling();
}

/* ================= POLLING ================= */
function startPolling() {
  clearInterval(polling);
  polling = setInterval(() => {
    if (!isReading) loadInbox();
  }, 10000);
}

/* ================= START ================= */
document.addEventListener("DOMContentLoaded", initMailbox);
</script>



</body></html>
