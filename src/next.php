<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกการเข้าสู่ระบบ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;700&display=swap');
        body {
            font-family: 'Kanit', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-4xl w-full">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">เลือกประเภทการเข้าสู่ระบบ</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php
            $users = [
                ['title' => 'ผู้พิการ', 'icon' => 'M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z', 'href' => 'disabled/login_disabled/login_disabled.php'],
                ['title' => 'แอดมิน', 'icon' => 'M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75', 'href' => 'admin/login_admin/login_admin.php'],
                ['title' => 'ผู้ประกอบการ', 'icon' => 'M6 22V4a2 2 0 012-2h8a2 2 0 012 2v18M6 12h12M6 18h12', 'href' => 'entrepreneur/login_entrepreneur/login_entrepreneur.php']
            ];

            foreach ($users as $user): ?>
                <a href="<?= $user['href'] ?>" class="flex flex-col items-center justify-center p-6 bg-gray-50 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-24 h-24 text-blue-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?= $user['icon'] ?>"/>
                    </svg>
                    <span class="text-xl font-semibold text-gray-700"><?= $user['title'] ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>