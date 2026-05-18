<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Split-Screen Portfolio - Free HTML Template</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;600;700&family=Archivo:wght@300;400;600;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('front/tooplate-split-portfolio.css') }}">
</head>
<body>
    <header>
        <a href="#work" class="logo">
            <svg class="logo-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#ff3366" stroke-width="3"/>
                <path d="M 30 40 L 50 60 L 70 40" fill="none" stroke="#ff3366" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="50" cy="70" r="3" fill="#ff3366"/>
            </svg>
            <span>Portfolio</span>
        </a>
        <nav>
            <ul class="desktop-nav">
                <li><a href="#work">Work</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#testimonials">Testimonials</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="menu-icon">
            <span></span>
        </div>
    </header>

    <div class="mobile-nav">
        <button class="mobile-nav-close" aria-label="Close menu">×</button>
        <ul>
            <li><a href="#work">Work</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#testimonials">Testimonials</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <p>Let's create something amazing together</p>
            <!-- Perbaikan tautan email pada menu mobile -->
            <a href="mailto:ahmadsolij@gmail.com?subject=Tanya%20Mengenai%20Project">ahmadsolij@gmail.com</a>
        </div>
    </div>

    <div class="split-container" id="work">
        <div class="left-panel">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $index => $project)
                <div class="image-container {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                    <div class="project-image" style="background-image: url('{{ asset('image/bandung.jpeg') }}');"></div>
                </div>
                @endforeach
            @else
                <div class="image-container active" data-project="0">
                    <div class="project-image" style="background-image: url('{{ asset('image/bandung.jpeg') }}');"></div>
                </div>
                <div class="image-container" data-project="1">
                    <div class="project-image" style="background-image: url('{{ asset('image/bandung.jpeg') }}');"></div>
                </div>
                <div class="image-container" data-project="2">
                    <div class="project-image" style="background-image: url('{{ asset('image/bandung.jpeg') }}');"></div>
                </div>
            @endif
        </div>

        <div class="right-panel">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $index => $project)
                <div class="project-details {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                    <div class="project-number">0{{ $index + 1 }} / 0{{ count($projects) }}</div>
                    <h1 class="project-title">{{ $project->title }}</h1>
                    <span class="project-category">{{ $project->category ?? 'Web Design' }}</span>
                    <p class="project-description">
                        {{ $project->description }}
                    </p>
                    <div class="project-info">
                        <div class="info-item">
                            <h4>Client</h4>
                            <p>{{ $project->client ?? 'Internal Project' }}</p>
                        </div>
                        <div class="info-item">
                            <h4>Year</h4>
                            <p>{{ $project->year ?? '2026' }}</p>
                        </div>
                        <div class="info-item">
                            <h4>Role</h4>
                            <p>{{ $project->role ?? 'Developer' }}</p>
                        </div>
                    </div>
                    <div class="project-tags">
                        <span class="tag">Web Dev</span>
                        <span class="tag">Fullstack</span>
                    </div>
                    <a href="{{ $project->link ?? '#' }}" class="view-project-btn">View Project →</a>
                </div>
                @endforeach
            @else
                <div class="project-details active" data-project="0">
                    <div class="project-number">01 / 03</div>
                    <h1 class="project-title">UTS</h1>
                    <span class="project-category">Web Design</span>
                    <p class="project-description">Laporan project pemograman web : Sistem Pemesanan Alat Olahraga Berbasis Web</p>
                    <div class="project-info">
                        <div class="info-item"><h4>Client</h4><p>Mister</p></div>
                        <div class="info-item"><h4>Year</h4><p>2026</p></div>
                        <div class="info-item"><h4>Role</h4><p>Frontend Dev</p></div>
                    </div>
                    <div class="project-tags"><span class="tag">UI/UX</span><span class="tag">Frontend</span></div>
                    <a href="#" class="view-project-btn">View Project →</a>
                </div>
            @endif
        </div>

        <div class="project-controls">
            <div class="progress-indicator">
                @if(isset($projects) && count($projects) > 0)
                    @foreach($projects as $index => $project)
                    <div class="progress-dot {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}"></div>
                    @endforeach
                @else
                    <div class="progress-dot active" data-project="0"></div>
                    <div class="progress-dot" data-project="1"></div>
                    <div class="progress-dot" data-project="2"></div>
                @endif
            </div>
            <div class="navigation">
                <div class="nav-arrow" id="prevBtn">
                    <div class="arrow arrow-left"></div>
                </div>
                <div class="nav-arrow" id="nextBtn">
                    <div class="arrow arrow-right"></div>
                </div>
            </div>
        </div>
    </div>

    <section id="about" class="about-section">
        <div class="about-split">
            <div class="about-content">
                <h2>{{ $profile_title ?? 'Tentang Saya' }}</h2>
                <p>{{ $profile_bio_1 ?? "Hi, Nama saya AHMAD SOLIH DARMAWAN Kelahiran 02 Desember 2006, saat ini saya menempuh pendidikan di universitas esa unggul kampus Tangerang, dengan jurusan SISTEM INFORMASI" }}</p>
                <p>{{ $profile_bio_2 ?? 'saat ini saya merancang web SISTEM PEMESANAN ALAT OLAHRAGA BERBASIS WEB, dengan bertujuan memudahkan proses pemesanan online dalam dunia digital' }}</p>
                <p>program ini akan berjalan selama beberapa tahun kedepan, demi mendukung era teknologi digital khususnya pada dunia olahraga, hingga menempuh kesuksesan untuk para pecinta olahraga, "hdup sehat, Akal Sehat".</p>
                <div class="about-stats">
                    <div class="stat-item">
                        <h3>{{ isset($projects) ? count($projects) : 3 }}+</h3>
                        <p>Projects</p>
                    </div>
                    <div class="stat-item">
                        <h3>18</h3>
                        <p>Usia</p>
                    </div>
                    <div class="stat-item">
                        <h3>{{ $years_experience ?? '2' }}</h3>
                        <p>Years</p>
                    </div>
                </div>
            </div>
            <div class="about-image" style="background-image: url('{{ asset('image/fa.jpeg') }}'); background-size: cover; background-position: center;"></div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="services-container">
            <div class="section-header">
                <h2>Tentang Saya</h2>
                <p>Informasi Pribadi</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3>Info Lebih Lanjut</h3>
                    <p>Pencapaian Individu</p>
                    <ul class="service-list">
                        <li>Latar Belakang</li>
                        <li>Edukasi</li>
                        <li>Penghargaan</li>
                        <li>Pengalaman</li>
                    </ul>
                </div>
                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Visual</h3>
                    <p>Mimpi yang ingin dicapai</p>
                    <ul class="service-list">
                        <li>Identitas</li>
                        <li>Visi & Misi</li>
                        <li>Kehidupan</li>
                        <li>Keluarga</li>
                    </ul>
                </div>
                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>Planing Web</h3>
                    <p>Tugas Akhir</p>
                    <ul class="service-list">
                        <li>Logo</li>
                        <li>Fitur</li>
                        <li>Design</li>
                        <li>Analisis</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials-section">
        <div class="testimonials-container">
            <div class="section-header">
                <h2>Client Testimonials</h2>
                <p>What people say about working with me</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Working with this designer was an absolute pleasure. The brand identity they created exceeded our expectations and perfectly captured our vision. Highly recommended!</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SK</div>
                        <div class="author-info">
                            <h4>Prinsip</h4>
                            <p>Kemajuan Pribadi</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">The attention to detail and creative approach made all the difference. Our website redesign not only looks stunning but has significantly improved our conversion rates.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MJ</div>
                        <div class="author-info">
                            <h4>Kemajuan Pribadi</h4>
                            <p>Hidup Dalam Dunia Digital</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Professional, creative, and always on time. The entire process was smooth and collaborative. We couldn't be happier with the final results.</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">EC</div>
                        <div class="author-info">
                            <h4>Harapan</h4>
                            <p>Prinsip Keluarga.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="contact-split">
            <div class="contact-info">
                <h2>Let's Work Together</h2>
                <p>Have a project in mind? I'd love to hear about it. Send me a message and let's create something amazing together.</p>
                <div class="contact-details">
                    <!-- Tautan Email Otomatis -->
                    <div class="contact-item">
                        <div class="contact-item-icon">📧</div>
                        <div class="contact-item-content">
                            <h4>Email</h4>
                            <a href="mailto:ahmadsolij@gmail.com?subject=Tanya%20Mengenai%20Project">ahmadsolij@gmail.com</a>
                        </div>
                    </div>
                    <!-- Tautan WhatsApp Otomatis -->
                    <div class="contact-item">
                        <div class="contact-item-icon">📱</div>
                        <div class="contact-item-content">
                            <h4>WhatsApp</h4>
                            <a href="https://wa.me/6282310094281?text=Halo%20Ahmad,%20saya%20tertarik%20dengan%20sistem%20pemesanan%20alat%20olahraga%20kamu." target="_blank">
                                +62 82310094281
                            </a>
                        </div>
                    </div>
                    <!-- Tautan Google Maps -->
                    <div class="contact-item">
                        <div class="contact-item-icon">📍</div>
                        <div class="contact-item-content">
                            <h4>Location</h4>
                            <a href="https://www.google.com/maps/place/Indonesia, Banten, Tangerang" target="_blank">Indonesia, Banten, Tangerang</a>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#" class="social-link" title="Dribbble">Dr</a>
                    <a href="#" class="social-link" title="Behance">Be</a>
                    <a href="#" class="social-link" title="Instagram">In</a>
                    <a href="#" class="social-link" title="LinkedIn">Li</a>
                    <a href="#" class="social-link" title="Twitter">Tw</a>
                </div>
            </div>

            <form class="contact-form" action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <p>Copyright © 2026 Your Company Name. All rights reserved. Design: <a rel="nofollow" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
    </footer>

    <script src="{{ asset('front/tooplate-split-scripts.js') }}"></script>
</body>
</html>