<div align="center">
  <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1600&q=80" alt="LuxeBook Architecture" style="border-radius: 12px; margin-bottom: 24px; width: 100%; height: 280px; object-fit: cover;">
  
  <h1>LuxeBook</h1>
  <p><strong>Enterprise Beauty & Appointment Management System | Kurumsal Randevu Yönetim Sistemi</strong></p>
</div>

---

<div align="center">
  <a href="#english-documentation">English</a> •
  <a href="#türkçe-dokümantasyon">Türkçe</a>
</div>

---

<h2 id="english-documentation">🇬🇧 English Documentation</h2>

### 📌 System Overview

**LuxeBook** is an enterprise-grade appointment and customer management SaaS solution tailored for premium beauty centers, salons, and high-end service providers. 

Engineered for scalability and performance, it bridges the gap between B2C customer engagement and B2B operational management. The architecture leverages **Filament PHP** for robust administration and **Laravel Livewire (Volt)** for a seamless, dynamic Single Page Application (SPA) experience on the customer front.

### ✨ Core Capabilities

#### 1. Customer Interface (B2C)
- **Premium UX/UI:** Implemented with Tailwind CSS utilizing Glassmorphism principles and high-end typography (Outfit & Inter).
- **Persistent Dark/Light Mode:** Seamlessly integrated theme toggling optimized for Livewire SPA navigations.
- **Multi-Step Booking Engine:** A sophisticated booking wizard handling service selection, professional assignment, date/time scheduling, customer data validation, and mock POS integrations.
- **Client Portal:** Authenticated customer dashboard for tracking upcoming and historical appointments.

#### 2. Administrative Dashboard (B2B - Filament)
- **Advanced Data Management:** Comprehensive CRUD operations for Employees, Services, and Appointments.
- **Real-Time Monitoring:** Dashboard analytics, gift card tracking, and incoming contact form management.
- **Access Control:** Strict authorization protocols isolating administrative routes from standard users.

#### 3. Security & Concurrency
- **Pessimistic Locking:** Utilizes database-level `lockForUpdate()` to completely eliminate race conditions and double-booking scenarios.
- **Authentication:** Integrated Laravel Breeze with Alpine.js enhancements for secure session handling.

### 🚀 Installation Guide

**Requirements:** PHP 8.3+, Composer, Node.js

```bash
# 1. Clone the repository
git clone https://github.com/anilmetey/Laravel-Musteri-Sistemi.git
cd Laravel-Musteri-Sistemi

# 2. Install dependencies
composer install --ignore-platform-reqs
npm install

# 3. Environment setup
cp .env.example .env
php artisan key:generate

# 4. Database initialization (SQLite by default)
touch database/database.sqlite
php artisan migrate:fresh --seed

# 5. Run the application (requires two terminal instances)
php artisan serve
npm run dev
```

*Note: The `db:seed` process automatically provisions default services, personnel, and the master administrative account (`admin@luxebook.com` / `password`).*

---

<h2 id="türkçe-dokümantasyon">🇹🇷 Türkçe Dokümantasyon</h2>

### 📌 Sistem Özeti

**LuxeBook**, premium güzellik merkezleri, salonlar ve üst düzey hizmet sağlayıcıları için geliştirilmiş, kurumsal ölçekte bir randevu ve müşteri yönetimi (SaaS) çözümüdür.

Ölçeklenebilirlik ve performans odaklı mimarisiyle, B2C müşteri deneyimi ile B2B operasyonel yönetimi tek bir çatıda birleştirir. Sistem, arka planda güçlü yönetim süreçleri için **Filament PHP**, ön yüzde ise kesintisiz ve dinamik bir Tek Sayfa Uygulaması (SPA) deneyimi için **Laravel Livewire (Volt)** kullanmaktadır.

### ✨ Temel Özellikler

#### 1. Müşteri Arayüzü (B2C)
- **Premium UX/UI:** Tailwind CSS ve Glassmorphism prensipleri kullanılarak kurumsal bir tasarım dili oluşturulmuştur.
- **Kalıcı Tema (Dark/Light):** Livewire SPA geçişlerine entegre edilmiş, kullanıcı tercihini hatırlayan tema yönetimi.
- **Dinamik Randevu Motoru:** Hizmet, uzman, takvim doğrulaması ve POS ödeme adımlarını kapsayan çok adımlı, güvenli rezervasyon sihirbazı.
- **Müşteri Portalı:** Kullanıcıların geçmiş ve gelecek randevularını yönetebilecekleri yetkilendirilmiş özel dashboard.

#### 2. Yönetim Paneli (B2B - Filament)
- **Veri Yönetimi:** Uzmanlar, hizmetler ve randevular için kapsamlı yönetim ekranları.
- **Operasyonel Takip:** Sistem istatistikleri, hediye kartı talepleri ve müşteri iletişim mesajlarının merkezi takibi.
- **Erişim Kontrolü:** İdari rotaların standart kullanıcılardan tamamen izole edildiği katı yetkilendirme altyapısı.

#### 3. Güvenlik ve Eşzamanlılık
- **Pesimistik Kilit (Pessimistic Locking):** Veritabanı seviyesinde `lockForUpdate()` kullanılarak çifte rezervasyon (double-booking) senaryoları sıfıra indirilmiştir.
- **Kimlik Doğrulama:** Alpine.js ile zenginleştirilmiş, yüksek güvenlikli Laravel Breeze entegrasyonu.

### 🚀 Kurulum Rehberi

**Gereksinimler:** PHP 8.3+, Composer, Node.js

```bash
# 1. Depoyu klonlayın
git clone https://github.com/anilmetey/Laravel-Musteri-Sistemi.git
cd Laravel-Musteri-Sistemi

# 2. Bağımlılıkları yükleyin
composer install --ignore-platform-reqs
npm install

# 3. Çevre değişkenlerini yapılandırın
cp .env.example .env
php artisan key:generate

# 4. Veritabanını başlatın (Varsayılan: SQLite)
touch database/database.sqlite
php artisan migrate:fresh --seed

# 5. Uygulamayı çalıştırın (İki ayrı terminal gerektirir)
php artisan serve
npm run dev
```

*Not: `db:seed` işlemi, varsayılan hizmetleri, personelleri ve ana yönetici hesabını (`admin@luxebook.com` / `password`) otomatik olarak oluşturacaktır.*

---

<div align="center">
  <small>© 2026 LuxeBook Enterprise Solutions. All Rights Reserved.</small>
</div>
