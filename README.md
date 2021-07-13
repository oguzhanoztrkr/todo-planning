# **Proje Hakkında**


Birim zamanda farklı yeteneklere sahip 5 çalışan için işlerin en optimal sürede bitmesi için planlama yapan bir web servis.

Haftalık çalışma süresi 45 saat olarak alınmıştır.

Çalışanların birim zamanda yaptıkları işler tablodaki gibidir;

Çalışan | Birim Zaman | İş Gücü
--- | --- | --- |
Çalışan 1 | 1 | 1x
Çalışan 2 | 1 | 2x
Çalışan 3 | 1 | 3x
Çalışan 4 | 1 | 4x
Çalışan 5 | 1 | 5x

Uygulamayı çalıştırmak için sırasıyla;

- `php artisan migrate --seed`
- `php artisan serve`

API Endpointler

- /api/todo-planning/business
- /api/todo-planning/it

Yeni bir görev eklemek için komut satırında `php artisan task:append` komutunu çalıştırdıktan sonra yönergeleri takip etmeniz yeterlidir.

Komut önizlemesi;

![Alt Text](https://media.giphy.com/media/H2W9D3VtEE2T05iBPR/giphy.gif)
