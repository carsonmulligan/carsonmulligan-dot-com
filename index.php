<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carson Mulligan - Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --border-color: #e5e7eb;
            --card-shadow: 0 1px 3px rgba(0,0,0,0.1);
            --card-hover-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        header {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            padding: 1rem 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-wrap: wrap;
        }

        nav a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        nav a:hover {
            color: var(--primary-color);
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }

        main {
            margin-top: 80px;
            padding: 2rem 0;
        }

        .hero {
            text-align: center;
            padding: 4rem 0;
            background: white;
            border-radius: 20px;
            margin-bottom: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto;
        }

        .section {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .section-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
            color: var(--text-dark);
            position: relative;
            padding-bottom: 1rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background: linear-gradient(135deg, #667eea, #764ba2);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: var(--bg-light);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 1px solid var(--border-color);
        }

        .project-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-hover-shadow);
            border-color: var(--primary-color);
        }

        .project-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--text-dark);
        }

        .project-card p {
            color: var(--text-light);
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .project-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: gap 0.3s ease;
        }

        .project-link:hover {
            gap: 0.75rem;
        }

        .project-link::after {
            content: '→';
        }

        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-dark);
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border: 2px solid var(--border-color);
            border-radius: 10px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .social-link:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 99, 235, 0.2);
        }

        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }

            .section {
                padding: 2rem 1.5rem;
            }

            nav ul {
                gap: 1rem;
            }

            .social-links {
                flex-direction: column;
                align-items: center;
            }

            .social-link {
                width: 200px;
                justify-content: center;
            }
        }

        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        #back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: none;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: transform 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
            z-index: 999;
        }

        #back-to-top:hover {
            transform: scale(1.1);
        }

        #back-to-top::before {
            content: '↑';
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="container">
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#apps">Mobile Apps</a></li>
                    <li><a href="#web">Web Projects</a></li>
                    <li><a href="#languages">Languages</a></li>
                    <li><a href="#writing">Writing</a></li>
                    <li><a href="#connect">Connect</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <section id="home" class="hero fade-in">
                <h1>Carson Mulligan</h1>
                <p>Developer, Language Enthusiast, Creator</p>
                <p style="margin-top: 1rem; font-size: 1rem;">Building digital experiences that bridge technology, language, and human connection.</p>
            </section>

            <section id="apps" class="section fade-in">
                <h2 class="section-title">Mobile Applications</h2>
                <div class="projects-grid">
                    <div class="project-card" onclick="window.open('https://apps.apple.com/us/app/verbum-dei-latin-bible-prayer/id6745453748', '_blank')">
                        <span class="badge">iOS</span>
                        <span class="badge">Latin</span>
                        <h3>Verbum Dei - Latin Bible</h3>
                        <p>A comprehensive Latin-English Bible application for prayer and study, bringing ancient texts to modern devices.</p>
                        <a href="https://apps.apple.com/us/app/verbum-dei-latin-bible-prayer/id6745453748" target="_blank" class="project-link">View on App Store</a>
                    </div>

                    <div class="project-card" onclick="window.open('https://apps.apple.com/us/app/dxp-labs-ai-image-generator/id6747624476', '_blank')">
                        <span class="badge">iOS</span>
                        <span class="badge">AI</span>
                        <h3>DXP Labs AI Image Generator</h3>
                        <p>Harness the power of AI to create stunning images from text prompts. Creative tools for the modern artist.</p>
                        <a href="https://apps.apple.com/us/app/dxp-labs-ai-image-generator/id6747624476" target="_blank" class="project-link">View on App Store</a>
                    </div>

                    <div class="project-card" onclick="window.open('https://apps.apple.com/us/app/verticalchinese/id6739588080', '_blank')">
                        <span class="badge">iOS</span>
                        <span class="badge">Chinese</span>
                        <h3>Vertical Chinese</h3>
                        <p>An innovative approach to learning Chinese characters with vertical text display and interactive lessons.</p>
                        <a href="https://apps.apple.com/us/app/verticalchinese/id6739588080" target="_blank" class="project-link">View on App Store</a>
                    </div>
                </div>
            </section>

            <section id="web" class="section fade-in">
                <h2 class="section-title">Web Projects</h2>
                <div class="projects-grid">
                    <div class="project-card" onclick="window.open('https://divr.systems/app', '_blank')">
                        <span class="badge">Web App</span>
                        <span class="badge">Research</span>
                        <h3>Web Research Aggregator</h3>
                        <p>A powerful tool for aggregating and analyzing web research data, streamlining the information gathering process.</p>
                        <a href="https://divr.systems/app" target="_blank" class="project-link">Visit Website</a>
                    </div>

                    <div class="project-card" onclick="window.open('https://github.com/carsonmulligan', '_blank')">
                        <span class="badge">Open Source</span>
                        <h3>GitHub Projects</h3>
                        <p>Explore my open-source contributions and personal projects. Code, documentation, and collaborative development.</p>
                        <a href="https://github.com/carsonmulligan" target="_blank" class="project-link">View GitHub</a>
                    </div>
                </div>
            </section>

            <section id="languages" class="section fade-in">
                <h2 class="section-title">Language & Culture</h2>
                <div class="projects-grid">
                    <div class="project-card" onclick="window.open('https://www.youtube.com/watch?v=UVtrvArSihQ&ab_channel=PekingUniversity', '_blank')">
                        <span class="badge">Chinese</span>
                        <span class="badge">Video</span>
                        <h3>Speaking Chinese</h3>
                        <p>Watch me speak Chinese in various contexts, demonstrating language proficiency and cultural understanding.</p>
                        <a href="https://www.youtube.com/watch?v=UVtrvArSihQ&ab_channel=PekingUniversity" target="_blank" class="project-link">Watch on YouTube</a>
                    </div>
                </div>
                <div class="skills-container" style="margin-top: 2rem;">
                    <span class="badge">Mandarin Chinese</span>
                    <span class="badge">Latin</span>
                    <span class="badge">Language Learning Resources</span>
                    <span class="badge">Cultural Exchange</span>
                </div>
            </section>

            <section id="writing" class="section fade-in">
                <h2 class="section-title">Writing & Publications</h2>
                <div class="projects-grid">
                    <div class="project-card" onclick="window.open('https://a.co/d/1ZOCC7S', '_blank')">
                        <span class="badge">Book</span>
                        <span class="badge">Amazon</span>
                        <h3>Published Author</h3>
                        <p>My book available on Amazon. Sharing insights, experiences, and knowledge through the written word.</p>
                        <a href="https://a.co/d/1ZOCC7S" target="_blank" class="project-link">View on Amazon</a>
                    </div>
                </div>
            </section>

            <section id="connect" class="section fade-in">
                <h2 class="section-title">Connect With Me</h2>
                <div class="social-links">
                    <a href="https://github.com/carsonmulligan" target="_blank" class="social-link">
                        GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/carsonmulliganosu/" target="_blank" class="social-link">
                        LinkedIn
                    </a>
                    <a href="https://x.com/us_east_3" target="_blank" class="social-link">
                        X (Twitter)
                    </a>
                </div>
            </section>
        </div>
    </main>

    <div id="back-to-top"></div>

    <script src="script.js"></script>
</body>
</html>