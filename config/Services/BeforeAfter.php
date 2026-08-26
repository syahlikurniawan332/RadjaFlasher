<?php

return [
    'items' => [
        [
            'id' => 1,
            'title' => 'POCO X3',
            'description' => 'Perangkat mengalami mati total. Setelah pemeriksaan, kendala teridentifikasi pada area CPU dan RAM.',
            'before' => [
                'image' => 'images/service/before1.webp',
                'title' => 'Perangkat Mati Total',
                'description' => 'Layar tidak menampilkan respons dan perangkat tidak dapat dinyalakan.',
            ],
            'after' => [
                'image' => 'images/service/after1.webp',
                'title' => 'Perangkat Kembali Menyala',
                'description' => 'Setelah proses perbaikan, perangkat dapat menyala dan digunakan kembali.',
            ],
            'tags' => ['Android', 'POCO', 'Mati Total'],
            'date' => '15 Jan 2024',
        ],

        [
            'id' => 2,
            'title' => 'Vivo Y16',
            'description' => 'Perangkat mengalami mati total. Hasil pemeriksaan menunjukkan kendala pada komponen penyimpanan eMMC.',
            'before' => [
                'image' => 'images/service/before2.webp',
                'title' => 'Perangkat Tidak Menyala',
                'description' => 'Perangkat tidak memberikan respons saat dicoba untuk dinyalakan.',
            ],
            'after' => [
                'image' => 'images/service/after2.webp',
                'title' => 'Perangkat Berfungsi Kembali',
                'description' => 'Setelah penanganan pada komponen terkait, perangkat dapat kembali menyala dan digunakan.',
            ],
            'tags' => ['Android', 'Vivo', 'Mati Total'],
            'date' => '20 Jan 2024',
        ],

        [
            'id' => 3,
            'title' => 'Samsung Galaxy A54',
            'description' => 'Perangkat mengalami mati total dan dilakukan pemeriksaan serta penanganan pada area IC dan CPU.',
            'before' => [
                'image' => 'images/service/before3.webp',
                'title' => 'Perangkat Mati Total',
                'description' => 'Perangkat tidak memberikan respons dan layar tetap dalam kondisi mati.',
            ],
            'after' => [
                'image' => 'images/service/after3.webp',
                'title' => 'Perangkat Kembali Menyala',
                'description' => 'Setelah proses penanganan, perangkat dapat kembali menyala dan digunakan.',
            ],
            'tags' => ['Android', 'Samsung', 'Mati Total'],
            'date' => '25 Jan 2024',
        ],

        [
            'id' => 4,
            'title' => 'Vivo Y27E',
            'description' => 'Perangkat mengalami kendala pada koneksi Wi-Fi sehingga jaringan tidak dapat terdeteksi atau tersambung.',
            'before' => [
                'image' => 'images/service/before4.webp',
                'title' => 'Wi-Fi Tidak Terhubung',
                'description' => 'Perangkat mengalami kesulitan mendeteksi dan terhubung ke jaringan Wi-Fi.',
            ],
            'after' => [
                'image' => 'images/service/after4.webp',
                'title' => 'Koneksi Wi-Fi Kembali Normal',
                'description' => 'Setelah penanganan, perangkat dapat kembali mendeteksi dan terhubung ke jaringan Wi-Fi.',
            ],
            'tags' => ['Android', 'Vivo', 'Wi-Fi'],
            'date' => '10 Jan 2024',
        ],

        [
            'id' => 5,
            'title' => 'Samsung Galaxy A02s',
            'description' => 'Perangkat mengalami kendala pada koneksi jaringan sehingga akses internet tidak dapat digunakan sebagaimana mestinya.',
            'before' => [
                'image' => 'images/service/before5.webp',
                'title' => 'Koneksi Jaringan Bermasalah',
                'description' => 'Perangkat mengalami gangguan koneksi dan tidak dapat menggunakan jaringan internet.',
            ],
            'after' => [
                'image' => 'images/service/after5.webp',
                'title' => 'Koneksi Kembali Berfungsi',
                'description' => 'Setelah proses penanganan, perangkat dapat kembali terhubung ke jaringan.',
            ],
            'tags' => ['Android', 'Samsung', 'Jaringan'],
            'date' => '10 Jan 2024',
        ],
    ],
];