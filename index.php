<?php
/**
 * Yoga Blog Website - Home Page
 * A simple, responsive yoga blog homepage built with PHP.
 * 
 * Features:
 * - Hero section with a calming yoga-themed background
 * - Dynamic blog post listing using an array (easily replaceable with database queries)
 * - Sidebar with categories, recent posts, and newsletter signup
 * - Footer with social links and copyright
 * 
 * To use this as a template:
 * - Replace the sample blog posts with your own data.
 * - Connect to a database and fetch posts dynamically.
 * - Customize colors, fonts, and layout as needed.
 */

// Sample blog posts data (simulate database results)
$blogPosts = [
    [
        'id' => 1,
        'title' => '10 Morning Yoga Poses to Start Your Day',
        'excerpt' => 'Discover a gentle morning routine that awakens your body and mind. These poses help improve flexibility and set a positive tone for the day.',
        'date' => '2026-07-28',
        'author' => 'Lena',
        'category' => 'Morning Yoga',
        'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'slug' => '10-morning-yoga-poses'
    ],
    [
        'id' => 2,
        'title' => 'Yoga for Stress Relief: 5 Poses to Calm Your Mind',
        'excerpt' => 'Stress can take a toll on our well-being. Learn how these five restorative yoga poses can help you release tension and find inner peace.',
        'date' => '2026-07-25',
        'author' => 'Maya',
        'category' => 'Mindfulness',
        'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'slug' => 'yoga-for-stress-relief'
    ],
    [
        'id' => 3,
        'title' => 'The Power of Pranayama: Breathing Techniques for Energy',
        'excerpt' => 'Pranayama is the art of breath control. Explore three powerful breathing techniques that can boost your energy levels and improve focus.',
        'date' => '2026-07-20',
        'author' => 'Arjun',
        'category' => 'Pranayama',
        'image' => 'https://images.unsplash.com/photo-1545205597-3d9d02c29597?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'slug' => 'pranayama-breathing-techniques'
    ],
    [
        'id' => 4,
        'title' => 'Yoga for Better Sleep: A Bedtime Routine',
        'excerpt' => 'Struggling with insomnia? This gentle bedtime yoga sequence will help you unwind and prepare your body for a deep, restful sleep.',
        'date' => '2026-07-15',
        'author' => 'Lena',
        'category' => 'Evening Yoga',
        'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'slug' => 'yoga-for-better-sleep'
    ],
    [
        'id' => 5,
        'title' => 'Vinyasa Flow: Building a Dynamic Practice',
        'excerpt' => 'Vinyasa is about linking movement with breath. Learn how to create a flowing sequence that builds strength, flexibility, and mindfulness.',
        'date' => '2026-07-10',
        'author' => 'Maya',
        'category' => 'Vinyasa',
        'image' => 'https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'slug' => 'vinyasa-flow-dynamic-practice'
    ]
];

// Sample categories for sidebar
$categories = [
    'Morning Yoga' => 12,
    'Vinyasa' => 8,
    'Pranayama' => 6,
    'Mindfulness' => 10,
    'Evening Yoga' => 5,
    'Yoga Philosophy' => 4
];

// Recent posts (last 3 from the array)
$recentPosts = array_slice($blogPosts, 0, 3);

// Helper function to format date
function formatDate($date) {
    return date('F j, Y', strtotime($date));
}

// Helper to truncate excerpt
function truncateExcerpt($text, $limit = 100) {
    if (strlen($text) > $limit) {
        return substr($text, 0, $limit) . '...';
    }
    return $text;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZenFlow Yoga Blog - Find Your Inner Peace</title>
    <!-- Google Fonts for elegant typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* ----- CSS Reset & Base Styles ----- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            color: #2d2d2d;
            background-color: #faf8f6;
            line-height: 1.7;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ----- Header ----- */
        .site-header {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            padding: 20px 0;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-inner {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: #2e5c4e;
            letter-spacing: -0.5px;
        }
        .logo span {
            color: #c9a27b;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            font-weight: 500;
        }
        .nav-links a {
            color: #4a4a4a;
            transition: color 0.3s;
        }
        .nav-links a:hover {
            color: #2e5c4e;
        }
        .nav-links .active {
            color: #2e5c4e;
            border-bottom: 2px solid #c9a27b;
        }

        /* ----- Hero Section ----- */
        .hero {
            background: linear-gradient(135deg, #e8f0ee 0%, #d4e2dd 100%);
            padding: 80px 0;
            text-align: center;
            margin-bottom: 50px;
            border-radius: 0 0 40px 40px;
        }
        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: 3.2rem;
            color: #1e3b31;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        .hero p {
            font-size: 1.2rem;
            color: #3d5a4e;
            max-width: 600px;
            margin: 0 auto 2rem;
            font-weight: 300;
        }
        .btn {
            display: inline-block;
            background: #2e5c4e;
            color: #fff;
            padding: 12px 32px;
            border-radius: 50px;
            font-weight: 600;
            transition: background 0.3s, transform 0.2s;
        }
        .btn:hover {
            background: #1e3b31;
            transform: translateY(-2px);
        }

        /* ----- Blog Grid & Sidebar Layout ----- */
        .content-area {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 40px;
            margin-bottom: 60px;
        }

        /* ----- Blog Posts ----- */
        .post-card {
            background: #ffffff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .post-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        }
        .post-card img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }
        .post-content {
            padding: 25px 30px 30px;
        }
        .post-meta {
            font-size: 0.85rem;
            color: #8a8a8a;
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }
        .post-meta .category {
            color: #c9a27b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        .post-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            margin-bottom: 12px;
            line-height: 1.3;
        }
        .post-title a {
            color: #1e3b31;
            transition: color 0.3s;
        }
        .post-title a:hover {
            color: #c9a27b;
        }
        .post-excerpt {
            color: #555;
            margin-bottom: 15px;
        }
        .read-more {
            font-weight: 600;
            color: #2e5c4e;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: gap 0.3s;
        }
        .read-more:hover {
            gap: 12px;
        }

        /* ----- Sidebar ----- */
        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .sidebar-widget {
            background: #ffffff;
            border-radius: 16px;
            padding: 25px 25px 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.04);
        }
        .sidebar-widget h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: #1e3b31;
            margin-bottom: 1.2rem;
            border-bottom: 2px solid #e8f0ee;
            padding-bottom: 10px;
        }
        .sidebar-widget ul {
            list-style: none;
        }
        .sidebar-widget ul li {
            margin-bottom: 10px;
        }
        .sidebar-widget ul li a {
            color: #4a4a4a;
            transition: color 0.3s;
            display: flex;
            justify-content: space-between;
        }
        .sidebar-widget ul li a:hover {
            color: #2e5c4e;
        }
        .sidebar-widget ul li .count {
            background: #e8f0ee;
            padding: 0 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #2e5c4e;
        }
        .recent-post-item {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
            align-items: center;
        }
        .recent-post-item img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }
        .recent-post-item .recent-title {
            font-weight: 500;
            font-size: 0.95rem;
            line-height: 1.3;
        }
        .recent-post-item .recent-title a {
            color: #1e3b31;
        }
        .recent-post-item .recent-date {
            font-size: 0.8rem;
            color: #8a8a8a;
        }

        .newsletter input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 50px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            margin-bottom: 12px;
            outline: none;
            transition: border 0.3s;
        }
        .newsletter input:focus {
            border-color: #2e5c4e;
        }
        .newsletter .btn {
            width: 100%;
            text-align: center;
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        /* ----- Footer ----- */
        .site-footer {
            background: #1e3b31;
            color: #d4e2dd;
            padding: 40px 0 20px;
            margin-top: 40px;
            border-radius: 40px 40px 0 0;
        }
        .footer-inner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 30px;
        }
        .footer-col h4 {
            font-family: 'Playfair Display', serif;
            color: #fff;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }
        .footer-col p, .footer-col a {
            color: #b3cfc4;
            font-size: 0.95rem;
        }
        .footer-col a:hover {
            color: #fff;
        }
        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }
        .social-links a {
            background: rgba(255,255,255,0.1);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.3s;
            font-weight: 600;
        }
        .social-links a:hover {
            background: #2e5c4e;
        }
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            margin-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            font-size: 0.9rem;
            color: #b3cfc4;
        }

        /* ----- Responsive ----- */
        @media (max-width: 992px) {
            .content-area {
                grid-template-columns: 1fr;
            }
            .hero h1 {
                font-size: 2.5rem;
            }
        }
        @media (max-width: 768px) {
            .header-inner {
                flex-direction: column;
                gap: 15px;
            }
            .nav-links {
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            .hero {
                padding: 50px 0;
            }
            .hero h1 {
                font-size: 2rem;
            }
            .post-card img {
                height: 180px;
            }
            .footer-inner {
                flex-direction: column;
                text-align: center;
            }
            .social-links {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- ===== HEADER ===== -->
    <header class="site-header">
        <div class="container header-inner">
            <div class="logo">Zen<span>Flow</span></div>
            <nav class="nav-links">
                <a href="#" class="active">Home</a>
                <a href="#">Blog</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </nav>
        </div>
    </header>

    <!-- ===== HERO ===== -->
    <section class="hero">
        <div class="container">
            <h1>Breathe. Flow. Connect.</h1>
            <p>Explore our collection of yoga insights, sequences, and mindfulness practices to nurture your body and soul.</p>
            <a href="#" class="btn">Explore the Blog</a>
        </div>
    </section>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="container content-area">

        <!-- Blog Posts -->
        <main class="blog-posts">
            <?php foreach ($blogPosts as $post): ?>
                <article class="post-card">
                    <img src="<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>">
                    <div class="post-content">
                        <div class="post-meta">
                            <span class="category"><?php echo htmlspecialchars($post['category']); ?></span>
                            <span><?php echo formatDate($post['date']); ?></span>
                            <span>By <?php echo htmlspecialchars($post['author']); ?></span>
                        </div>
                        <h2 class="post-title">
                            <a href="post.php?slug=<?php echo htmlspecialchars($post['slug']); ?>">
                                <?php echo htmlspecialchars($post['title']); ?>
                            </a>
                        </h2>
                        <p class="post-excerpt">
                            <?php echo truncateExcerpt($post['excerpt'], 120); ?>
                        </p>
                        <a href="post.php?slug=<?php echo htmlspecialchars($post['slug']); ?>" class="read-more">
                            Read More →
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </main>

        <!-- Sidebar -->
        <aside class="sidebar">
            <!-- Categories -->
            <div class="sidebar-widget">
                <h3>Categories</h3>
                <ul>
                    <?php foreach ($categories as $cat => $count): ?>
                        <li>
                            <a href="#">
                                <?php echo htmlspecialchars($cat); ?>
                                <span class="count"><?php echo $count; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Recent Posts -->
            <div class="sidebar-widget">
                <h3>Recent Posts</h3>
                <?php foreach ($recentPosts as $recent): ?>
                    <div class="recent-post-item">
                        <img src="<?php echo htmlspecialchars($recent['image']); ?>" alt="<?php echo htmlspecialchars($recent['title']); ?>">
                        <div>
                            <div class="recent-title">
                                <a href="post.php?slug=<?php echo htmlspecialchars($recent['slug']); ?>">
                                    <?php echo htmlspecialchars($recent['title']); ?>
                                </a>
                            </div>
                            <div class="recent-date"><?php echo formatDate($recent['date']); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Newsletter Signup -->
            <div class="sidebar-widget newsletter">
                <h3>Join Our Community</h3>
                <p style="margin-bottom: 1rem; font-size: 0.95rem; color: #555;">Subscribe to get the latest yoga tips and sequences delivered to your inbox.</p>
                <form action="#" method="post">
                    <input type="email" placeholder="Your email address" required>
                    <button type="submit" class="btn">Subscribe</button>
                </form>
            </div>
        </aside>
    </div>

    <!-- ===== FOOTER ===== -->
    <footer class="site-footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-col">
                    <h4>ZenFlow Yoga</h4>
                    <p>Empowering your journey toward inner peace, strength, and mindfulness through the ancient practice of yoga.</p>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Connect With Us</h4>
                    <div class="social-links">
                        <a href="#">IG</a>
                        <a href="#">FB</a>
                        <a href="#">YT</a>
                        <a href="#">P</a>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                &copy; <?php echo date('Y'); ?> ZenFlow Yoga. All rights reserved. | Designed with love and mindfulness.
            </div>
        </div>
    </footer>
</body>
</html>
