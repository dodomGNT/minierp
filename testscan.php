<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi RFID Real-Time - Sistem Sekolah</title>
    <style>
        :root {
            --primary: #1a73e8;
            --success: #34a853;
            --bg: #f8f9fa;
            --dark: #202124;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--bg);
            margin: 0;
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }

        /* --- HEADER --- */
        .school-header {
            background: white;
            padding: 15px 40px;
            display: flex;
            align-items: center;
            border-bottom: 3px solid var(--primary);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            z-index: 10;
        }

        .school-logo {
            width: 70px; height: 70px;
            object-fit: contain;
            margin-right: 25px;
        }

        .school-info h1 {
            margin: 0; font-size: 1.6em;
            color: var(--dark);
            text-transform: uppercase;
        }

        /* --- LAYOUT --- */
        .main-content {
            display: flex;
            flex: 1;
            overflow: hidden;
            flex-direction: row;
        }

        .left-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: white;
            border-right: 2px solid #eee;
        }

        .scan-illustration {
            font-size: 100px;
            animation: pulse 2s infinite;
        }

        #live-clock {
            font-size: 2.5em;
            font-weight: bold;
            color: #333;
            background: #eee;
            padding: 10px 30px;
            border-radius: 50px;
            margin-top: 20px;
        }

        .right-column {
            flex: 1.2;
            padding: 30px;
            overflow-y: auto;
        }

        /* --- CARD STYLING --- */
        .student-card {
            background: white;
            padding: 15px 20px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            margin-bottom: 12px;
            border-left: 6px solid #ddd;
            /* Kecepatan animasi kartu masuk diperlambat (0.8s) */
            animation: slideIn 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        .student-card:first-child {
            border-left-color: var(--success);
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .photo-container {
            flex-shrink: 0;
            margin-right: 25px;
            border-radius: 20px;
            overflow: hidden;
            background: #eee;
            border: 2px solid #fff;
            width: 75px; height: 75px;
            transition: all 0.6s ease-in-out;
        }

        .student-card:first-child .photo-container {
            width: 220px !important;
            height: 220px !important;
            border-radius: 30px;
            border: 5px solid var(--success);
        }

        .student-photo {
            width: 100%; height: 100%;
            object-fit: cover;
        }

        .student-info { flex-grow: 1; }
        .student-name { font-weight: bold; font-size: 1.2em; color: #333; }
        .student-card:first-child .student-name { font-size: 2.2em; }
        .student-detail { color: #666; }
        .student-card:first-child .student-detail { font-size: 1.4em; }

        .time-stamp { font-weight: 600; color: #999; text-align: right; min-width: 80px; }

        /* --- MOBILE RESPONSIVE --- */
        @media (max-width: 768px) {
            .main-content { flex-direction: column; overflow-y: auto; }
            .left-column { flex: none; padding: 30px 0; border-right: none; border-bottom: 2px solid #eee; }
            .student-card:first-child { flex-direction: column; text-align: center; }
            .student-card:first-child .photo-container { margin-right: 0; margin-bottom: 15px; width: 180px !important; height: 180px !important; }
            .student-card:first-child .time-stamp { text-align: center; width: 100%; margin-top: 10px; }
        }

        @keyframes pulse { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes slideIn { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <header class="school-header">
        <img src="assets/images/logosekolah.jpg" alt="Logo" class="school-logo"> 
        <div class="school-info">
            <h1>SMK Negeri 1 Contoh Indonesia</h1>
            <p>Sistem Absensi RFID Real-Time</p>
        </div>
    </header>

    <div class="main-content">
        <div class="left-column">
            <div class="scan-illustration">💳</div>
            <h1>Silakan Scan</h1>
            <div id="live-clock">00:00:00</div>
        </div>

        <div class="right-column">
            <h2 style="color: #444; margin-bottom: 15px; font-weight: 500; border-bottom: 2px solid #ddd; padding-bottom: 10px;">Aktivitas Terkini</h2>
            <div id="log-list" class="attendance-list"></div>
        </div>
    </div>

    <script>
        function updateClock() {
            const now = new Date();
            document.getElementById('live-clock').innerText = now.toLocaleTimeString('id-ID');
        }
        setInterval(updateClock, 1000);
        updateClock();

        function addAttendance(nama, detail, fotoUrl) {
            const list = document.getElementById('log-list');
            const now = new Date();
            const timeStr = now.getHours().toString().padStart(2, '0') + ":" + 
                            now.getMinutes().toString().padStart(2, '0');

            const card = document.createElement('div');
            card.className = 'student-card';
            card.innerHTML = `
                <div class="photo-container">
                    <img src="${fotoUrl}" class="student-photo">
                </div>
                <div class="student-info">
                    <div class="student-name">${nama}</div>
                    <div class="student-detail">${detail}</div>
                </div>
                <div class="time-stamp">${timeStr}<br>WIB</div>
            `;

            list.prepend(card);
            if (list.children.length > 10) list.removeChild(list.lastElementChild);
        }

        // --- SIMULASI 10 DATA DENGAN KECEPATAN RENDAH ---
        const dummyData = [
            { n: "Budi Santoso", d: "Siswa • XI-IPA 1", p: "assets/images/pasfoto/1.jpg" },
            { n: "Siti Aminah", d: "Siswa • X-IPS 2", p: "assets/images/pasfoto/2.jpg" },
            { n: "Drs. Mulyadi", d: "Kepala Sekolah", p: "assets/images/pasfoto/3.jpg" },
            { n: "Rizky Pratama", d: "Siswa • XII-TKJ 1", p: "assets/images/pasfoto/1.jpg" },
            { n: "Dewi Lestari", d: "Siswa • XI-AKL 2", p: "assets/images/pasfoto/2.jpg" },
            { n: "Ahmad Fauzi", d: "Guru Produktif", p: "assets/images/pasfoto/3.jpg" },
            { n: "Putri Rahayu", d: "Siswa • X-IPA 3", p: "assets/images/pasfoto/1.jpg" },
            { n: "Eko Prasetyo", d: "Siswa • XII-RPL 2", p: "assets/images/pasfoto/2.jpg" },
            { n: "Ani Wijaya", d: "Siswa • XI-OTKP 1", p: "assets/images/pasfoto/3.jpg" },
            { n: "Hendra Wijaya", d: "Siswa • X-TKJ 2", p: "assets/images/pasfoto/1.jpg" }
        ];

        // Kecepatan ditingkatkan menjadi 1.5 detik (1500ms) per data
        dummyData.forEach((data, index) => {
            setTimeout(() => {
                addAttendance(data.n, data.d, data.p);
            }, index * 1500); 
        });
    </script>
</body>
</html>