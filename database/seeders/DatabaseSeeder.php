<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 0. Admin User
        \App\Models\User::factory()->create([
            'name' => 'LuxeBook Admin',
            'email' => 'admin@luxebook.com',
            'password' => bcrypt('password'),
        ]);

        // 1. Services
        \App\Models\Service::create([
            'name' => 'Premium Saç Kesimi & Bakım',
            'description' => 'Yüz hatlarınıza ve saç yapınıza en uygun kesimi belirleyerek başlıyoruz. İşlem öncesinde argan yağı ile hafif bir saç derisi masajı uyguluyor, saç tellerini onarıma hazırlıyoruz. Kérastase ve Dyson teknolojisiyle yaptığımız fön işlemi sayesinde, saçlarınız gün boyu hacmini ve doğal parlaklığını koruyor.',
            'duration_minutes' => 45,
            'price' => 350.00
        ]);

        \App\Models\Service::create([
            'name' => 'Cilt Bakımı & Spa',
            'description' => 'Cilt tipinize uygun ürünleri belirlemek için detaylı bir analizle başlıyoruz. Hyaluronik asit destekli serumlar ve yoğun nem maskeleriyle cildin bariyerini güçlendiriyoruz. Estée Lauder ve Dermalogica serilerini kullandığımız bu seansta, profesyonel yüz masajıyla cildinizin daha canlı ve sağlıklı bir görünüme kavuşmasını hedefliyoruz.',
            'duration_minutes' => 60,
            'price' => 550.00
        ]);

        \App\Models\Service::create([
            'name' => 'Tırnak Bakımı & Nail Art',
            'description' => 'Organik peeling ve sıcak havlu kompresiyle el-ayak bakımınıza başlıyoruz. Medikal manikür ve pedikür işlemlerinin ardından, tırnak yapınıza zarar vermeyen CND Shellac ve OPI marka cilalarla kalıcı oje veya nail art uygulamasını tamamlıyoruz. Temiz, bakımlı ve şık tırnaklara sahip olmanız için özenle çalışıyoruz.',
            'duration_minutes' => 90,
            'price' => 400.00
        ]);

        \App\Models\Service::create([
            'name' => 'Masaj Terapisi',
            'description' => 'Kas gerginliklerini azaltmak ve günün yorgunluğunu atmak için tasarlanmış masaj seansımız. Aromaterapik yağlar eşliğinde İsveç ve derin doku masaj tekniklerini uyguluyoruz. Sessiz ve huzurlu bir ortamda, bedensel rahatlamanızı ön planda tutarak profesyonel bir dinlenme deneyimi sunuyoruz.',
            'duration_minutes' => 75,
            'price' => 650.00
        ]);

        \App\Models\Service::create([
            'name' => 'Profesyonel Makyaj',
            'description' => 'Düğün, nişan veya özel davetleriniz için kalıcılığı yüksek ve yüz hatlarınıza uygun makyaj uygulamaları yapıyoruz. MAC, Kryolan ve Dior gibi profesyonel ürünler kullanarak, fotoğraflarda kusursuz görünen ve gece boyu bozulmayan, doğal ama etkileyici bir görünüm elde ediyoruz.',
            'duration_minutes' => 50,
            'price' => 450.00
        ]);

        // 2. Employees
        \App\Models\Employee::create([
            'name' => 'Elif Yıldırım',
            'email' => 'elif@luxebook.com',
            'bio' => '15 yılı aşkın tecrübesiyle saç kesimi ve renklendirme konusunda uzmanlaşmış Kıdemli Saç Stilisti. Kişiye özel saç tasarımlarıyla öne çıkıyor.',
            'avatar_url' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=256&q=80'
        ]);

        \App\Models\Employee::create([
            'name' => 'Ahmet Kaya',
            'email' => 'ahmet@luxebook.com',
            'bio' => 'Klinik cilt bakımı ve yaşlanma karşıtı uygulamalarda sertifikalı Baş Terapist. Cilt sağlığını ön planda tutan medikal bakım prosedürlerini yönetiyor.',
            'avatar_url' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=256&q=80'
        ]);

        \App\Models\Employee::create([
            'name' => 'Zeynep Demir',
            'email' => 'zeynep@luxebook.com',
            'bio' => 'Derin doku ve aromaterapi alanında sertifikalı uzman masaj terapisti. Fiziksel rahatlama ve stres yönetimi odaklı seanslar uyguluyor.',
            'avatar_url' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=256&q=80'
        ]);

        \App\Models\Employee::create([
            'name' => 'Can Özkan',
            'email' => 'can@luxebook.com',
            'bio' => 'Özel gün ve set makyajlarında deneyimli Profesyonel Makyaj Sanatçısı. Yüz hatlarına uygun, doğal ve kalıcı uygulamalarıyla biliniyor.',
            'avatar_url' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=256&q=80'
        ]);
    }
}
