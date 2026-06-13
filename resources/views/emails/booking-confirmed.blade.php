<x-mail::message>
# Randevunuz Onaylandı!

Sayın **{{ $appointment->customer_name }}**,

Bizi tercih ettiğiniz için teşekkür ederiz. Randevu detaylarınız aşağıda yer almaktadır:

<x-mail::panel>
**Hizmet:** {{ $appointment->service->name }}  
**Uzman:** {{ $appointment->employee->name }}  
**Tarih:** {{ $appointment->start_time->format('d.m.Y') }}  
**Saat:** {{ $appointment->start_time->format('H:i') }}
</x-mail::panel>

Lütfen randevu saatinizden 10 dakika önce merkezimizde olunuz.

İyi günler dileriz,<br>
LuxeBook
</x-mail::message>
