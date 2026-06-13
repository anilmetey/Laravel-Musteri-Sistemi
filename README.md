<div align="center">
  <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?auto=format&fit=crop&w=1600&q=80" alt="LuxeBook Banner" style="border-radius: 20px; margin-bottom: 20px; width: 100%; height: 300px; object-fit: cover;">
  
  <h1 style="color: #f59e0b;">LuxeBook</h1>
  <p><strong>Premium Güzellik & Randevu Yönetim Sistemi (SaaS)</strong></p>
</div>

---

## 📌 Proje Hakkında

**LuxeBook**, güzellik merkezleri, kuaförler ve premium hizmet veren işletmeler için tasarlanmış uçtan uca bir randevu ve müşteri yönetim sistemidir. 

Standart bir tanıtım sitesinin ötesinde; **Filament Yönetici Paneli**, **Livewire Müşteri Dashboard'u**, **Gece/Gündüz Modu**, **Animasyonlu Güvenli Ödeme Ekranı (Mock)** ve tam kapsamlı **Randevu Sihirbazı** ile eksiksiz bir SaaS (Software as a Service) ürünü olarak geliştirilmiştir.

## ✨ Temel Özellikler

### 1. 👥 Müşteri Arayüzü (B2C)
- **Glassmorphism & Lüks Tasarım:** Tamamen modern, altın (amber) detaylı, premium UI/UX.
- **Gece / Gündüz Modu (Dark Mode):** Livewire SPA geçişlerinde bile kusursuz çalışan kalıcı karanlık mod.
- **Çok Adımlı Randevu Sihirbazı:** Hizmet Seçimi -> Uzman Seçimi -> Tarih ve Saat -> Müşteri Bilgileri -> Güvenli Ödeme (Sanal POS Mock) adımları.
- **Müşteri Dashboard'u:** Üye olan kullanıcılar için yaklaşan ve geçmiş randevularını takip edebilecekleri, auth korumalı özel panel.

### 2. 🛡️ Yönetici Paneli (Filament - B2B)
- Gelişmiş veri tabloları ve istatistikler.
- **Çalışan (Uzman) ve Hizmet Yönetimi.**
- **Randevu Takibi:** Gelen tüm randevuların anlık listelenmesi ve yönetimi.
- **Hediye Kartı & İletişim Formu** verilerinin izlenmesi.
- Yetkilendirilmemiş kullanıcıların erişimine tamamen kapalı (Sadece yetkili adminler girebilir).

### 3. 🔒 Güvenlik & İş Mantığı
- **LockForUpdate (Pesimistik Kilit):** Aynı saniyede iki müşterinin aynı uzman ve saate randevu almasını engelleyen eşzamanlılık koruması.
- **Laravel Breeze & Volt:** Şifre göster/gizle eklentileriyle tam Türkçe, güvenilir kullanıcı kimlik doğrulama sistemi.

---

## 🛠️ Kullanılan Teknolojiler

- **Backend:** Laravel 12, PHP 8.3, SQLite (Geliştirme için)
- **Frontend:** Tailwind CSS, Alpine.js, Livewire 3 (Volt), Blade
- **Yönetici Paneli:** Filament PHP v3
- **Tasarım Mimarisi:** Custom Tailwind Config, Inter & Outfit font ailesi, SPA (Single Page Application) hissi için `wire:navigate`

---

## 🚀 Kurulum ve Çalıştırma

Projeyi bilgisayarınızda yerel olarak çalıştırmak için aşağıdaki adımları izleyin:

### Gereksinimler
- PHP 8.3 veya üzeri
- Composer
- Node.js ve npm

### Adımlar

1. **Depoyu Klonlayın:**
   ```bash
   git clone https://github.com/anilmetey/Laravel-Musteri-Sistemi.git
   cd Laravel-Musteri-Sistemi
   ```

2. **Bağımlılıkları Yükleyin:**
   ```bash
   composer install --ignore-platform-reqs
   npm install
   ```

3. **Çevre Değişkenlerini (Env) Ayarlayın:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Veritabanını Hazırlayın:**
   *(SQLite kullanıldığı için ekstra bir veritabanı sunucusuna ihtiyaç yoktur)*
   ```bash
   touch database/database.sqlite
   php artisan migrate:fresh --seed
   ```
   *Not: Seed işlemi, örnek hizmetleri, uzmanları ve **admin kullanıcısını** otomatik oluşturacaktır.*

5. **Uygulamayı Başlatın:**
   Projeyi çalıştırmak için 2 ayrı terminal açın:
   
   *Terminal 1 (Arka plan):*
   ```bash
   php artisan serve
   ```
   
   *Terminal 2 (Ön yüz derleyicisi):*
   ```bash
   npm run dev
   ```

### 🔐 Giriş Bilgileri

**Yönetici (Admin) Paneli:**
- **URL:** `http://localhost:8000/admin`
- **Email:** `admin@luxebook.com`
- **Şifre:** `password`

**Müşteri Paneli (Ön Yüz):**
- **URL:** `http://localhost:8000`
- Sağ üstteki "Giriş Yap" veya "Kayıt Ol" butonunu kullanabilirsiniz.

---

<p align="center">Made with ❤️ by <strong>Anıl Mete Yıldız</strong></p>
