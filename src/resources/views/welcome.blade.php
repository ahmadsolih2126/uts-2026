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
                <li><a href="#work">Pembuka</a></li>
                <li><a href="#about">Tentang saya</a></li>
                <li><a href="#services">Informasi Lanjut</a></li>
                <li><a href="#testimonials">Motivasi</a></li>
                <li><a href="#contact">Kumpul Tugas</a></li>
            </ul>
        </nav>
        <div class="menu-icon">
            <span></span>
        </div>
    </header>

    <div class="mobile-nav">
        <button class="mobile-nav-close" aria-label="Close menu">×</button>
        <ul>
            <li><a href="#work">Pembuka</a></li>
            <li><a href="#about">Tentang saya</a></li>
            <li><a href="#services">Informasi Lanjut</a></li>
            <li><a href="#testimonials">Motivasi</a></li>
            <li><a href="#contact">Kumpul Tugas</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <p>Let's create something amazing together</p>
            <a href="mailto:ahmadsolij@gmail.com?subject=Tanya%20Mengenai%20Project">ahmadsolij@gmail.com</a>
        </div>
    </div>

    <div class="split-container" id="work">
        <div class="left-panel">
            @if(isset($projects) && count($projects) > 0)
                @foreach($projects as $index => $project)
                <div class="image-container {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                    <div class="project-image" style="background-image: url('{{ asset($project->image_path ?? 'image/bandung.jpeg') }}');"></div>
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
                    <span class="project-category">{{ $project->category ?? 'Personal Web' }}</span>
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
                    <a href="{{ asset($project->file_path ?? '#') }}" target="_blank" class="view-project-btn">View Project →</a>
                </div>
                @endforeach
            @else
                <div class="project-details active" data-project="0">
                    <div class="project-number">01 / 03</div>
                    <h1 class="project-title">UTS</h1>
                    <span class="project-category">Web Design</span>
                    <p class="project-description">Anything about me</p>
                    <div class="project-info">
                        <div class="info-item"><h4>Date</h4><p>02</p></div>
                        <div class="info-item"><h4>month</h4><p>Desember</p></div>
                        <div class="info-item"><h4>Year</h4><p>2005</p></div>
                    </div>
                    <div class="project-tags"><span class="tag">UI/UX</span><span class="tag">Frontend</span></div>
                    <a href="{{ asset('dokumen/tugas_uts.pdf') }}" target="_blank" class="view-project-btn">View Project →</a>
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
                <h2>{{ $profile_title ?? 'Tentang saya' }}</h2>
                <p>{{ $profile_bio_1 ?? "Hi, Nama saya AHMAD SOLIH DARMAWAN Kelahiran 02 Desember 2006, saat ini saya menempuh pendidikan di universitas esa unggul kampus Tangerang, dengan jurusan SISTEM INFORMASI" }}</p>
                <p>{{ $profile_bio_2 ?? 'Semakin Berjalanya Teknologi kini saya mengembangkan PERSONAL WEB tentang pribadi/portofolio saya, mengingat saya ingin mengembangkan portofolio berbasis web' }}</p>
                <p>mungkin personal web ini bisa menjadi pelajaran untuk rekan rekan anak muda di luar sana yang ingin berkarir melalui pengambangan era teknologi seperti saat ini".</p>
                <div class="about-stats">
                    <div class="stat-item">
                        <h3>{{ isset($projects) ? count($projects) : 5 }}</h3>
                        <p>Pencapaian</p>
                    </div>
                    <div class="stat-item">
                        <h3>5</h3>
                        <p>Dokumentasi</p>
                    </div>
                    <div class="stat-item">
                        <h3>{{ $years_experience ?? '5' }}</h3>
                        <p>pengalaman</p>
                    </div>
                </div>
            </div>
            <div class="about-image" style="background-image: url('{{ asset('image/my.jpg') }}'); background-size: cover; background-position: center;"></div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="services-container">
            <div class="section-header">
                <h2>Informasi lebih lanjut</h2>
                <p>Deskripsi kecil, Tujuan & Motivasi, Pengembangan Website</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3>Deskripsi Kecil</h3>
                    <p>Perjalanan dan latar belakang saya dalam dunia teknologi</p>
                    <ul class="service-list">
                        <li>Latar Belakang</li>
                        <li>Pendidikan</li>
                        <li>Pengalaman</li>
                        <li>Pencapaian</li>
                    </ul>
                </div>
                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Tujuan & Motivasi</h3>
                    <p>Hal-hal yang memotivasi saya dalam belajar dan berkembang</p>
                    <ul class="service-list">
                        <li>Visi pribadi</li>
                        <li>Target karir</li>
                        <li>Motivasi belajar</li>
                        <li>pengambangan diri</li>
                    </ul>
                </div>
                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>Pengambangan Website</h3>
                    <p>Proses dan perancangan pengembangan personal website</p>
                    <ul class="service-list">
                        <li>Konsep Website</li>
                        <li>Fitur Website</li>
                        <li>Design Interface</li>
                        <li>Teknologi yang digunakan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="testimonials-section">
        <div class="testimonials-container">
            <div class="section-header">
                <h2>Motivasi</h2>
                <p>Beberapa peran penting</p>
            </div>
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Mungkin orang tua menjadi salah satu peran utama atas apa yang saya lakukan ini, hanya merekalah yang ada di saat saya terjatuh dalam ke adaan apapun</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">SK</div>
                        <div class="author-info">
                            <h4>Orang Tua</h4>
                            <p>Tokoh utama</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Adapun guru yang memberikan ilmu atas pembuatan website ini, hingga saya dapat menempuh ilmu sampai saat ini</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">MJ</div>
                        <div class="author-info">
                            <h4>Guru</h4>
                            <p>Tokoh Kedua</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="quote-icon">"</div>
                    <p class="testimonial-text">Selain orang tua dan guru yaitu diri saya sendiri, karena saya selalu berpikir hanya diri kita sendiri lah yang bisa membangun kerangka kesuksesan</p>
                    <div class="testimonial-author">
                        <div class="author-avatar">EC</div>
                        <div class="author-info">
                            <h4>Diri Sendiri</h4>
                            <p>Tokoh ketiga</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="contact-split">
            <div class="contact-info">
                <h2>Punya Tugas Baru?</h2>
                <p>Kumpulkan file tugas (PDF atau Word) kamu di sini agar sistem menyimpannya ke dalam server lokal secara dinamis.</p>
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-item-icon">📧</div>
                        <div class="contact-item-content">
                            <h4>Email</h4>
                            <a href="mailto:ahmadsolij@gmail.com?subject=Tanya%20Mengenai%20Project">ahmadsolij@gmail.com</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">📱</div>
                        <div class="contact-item-content">
                            <h4>WhatsApp</h4>
                            <a href="https://wa.me/6282310094281?text=Halo%20Ahmad,%20saya%20tertarik%20dengan%20sistem%20pemesanan%20alat%20olahraga%20kamu." target="_blank">
                                +62 82310094281
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <form class="contact-form" action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if(session('success'))
                    <div style="color: #28a745; margin-bottom: 15px; font-weight: bold;">{{ session('success') }}</div>
                @endif
                @if(session('error'))
                    <div style="color: #dc3545; margin-bottom: 15px; font-weight: bold;">{{ session('error') }}</div>
                @endif

                <div class="form-group">
                    <label for="name">Nama Mahasiswa</label>
                    <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap">
                </div>
                <div class="form-group">
                    <label for="subject">Mata Kuliah / Judul Tugas</label>
                    <input type="text" id="subject" name="subject" required placeholder="Contoh: Pemrograman Berbasis Web">
                </div>
                <div class="form-group">
                    <label for="file_tugas" style="display: block; margin-bottom: 8px;">Pilih File Tugas (PDF, DOC, DOCX)</label>
                    <input type="file" id="file_tugas" name="file_tugas" accept=".pdf,.doc,.docx" required style="padding: 10px 0; color: #fff;">
                </div>
                <button type="submit" class="submit-btn">Kumpulkan Tugas</button>
            </form>
        </div>
    </section>

    <footer>
        <p>Copyright © 2026 Your Company Name. All rights reserved. Design: <a rel="nofollow" href="https://www.tooplate.com" target="_blank">Tooplate</a></p>
    </footer>

    <script src="{{ asset('front/tooplate-split-scripts.js') }}"></script>
</body>
</html>