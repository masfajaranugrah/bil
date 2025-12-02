@php
    $user = auth('customer')->user();
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
body {
    background: #f3f6fa;
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding-bottom: 120px;
}

/* WELCOME CARD */
.welcome-box {
    margin: 80px auto 0;
    max-width: 520px;
    padding: 2rem 1.5rem;
    border-radius: 24px;
    background: #ffffff;
    box-shadow: 0 10px 28px rgba(0,0,0,0.08);
    text-align: center;
}

.welcome-icon {
    font-size: 60px;
    margin-bottom: 10px;
    display: inline-block;
    animation: wave 2s infinite;
}

@keyframes wave {
    0%, 100% { transform: rotate(0deg); }
    15% { transform: rotate(14deg); }
    30% { transform: rotate(-8deg); }
    40% { transform: rotate(14deg); }
    50% { transform: rotate(-4deg); }
    60% { transform: rotate(10deg); }
    70% { transform: rotate(0deg); }
}

.welcome-text {
    font-size: 22px;
    font-weight: 600;
    color: #1f2937;
}

/* INFO CARD */
.info-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 1.6rem 1rem;
    margin-top: 1.2rem;
    text-align: center;
    box-shadow: 0 12px 26px rgba(0,0,0,0.06);
    transition: 0.3s ease;
    cursor: pointer;
}
.info-card i { font-size: 2.2rem; }
.info-card:hover { transform: translateY(-5px); box-shadow: 0 15px 32px rgba(0,0,0,0.10); }
.logout-red { color: #dc2626; font-weight: 600; }

/* Responsive Grid */
.row { display: flex; flex-wrap: wrap; justify-content: center; gap: 16px; }
.col-11 { flex: 0 0 91.666667%; max-width: 91.666667%; }
@media(min-width: 768px) {
    .col-md-4 { flex: 0 0 32%; max-width: 32%; }
}

/* Bottom Navbar */
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 70px;
    background: #fff;
    display: flex;
    justify-content: space-around;
    align-items: center;
    box-shadow: 0 -5px 15px rgba(0,0,0,0.08);
    border-radius: 15px 15px 0 0;
    z-index: 999;
}

.bottom-nav .tab-btn {
    background: none;
    border: none;
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 0.82rem;
    color: #6b7280;
    position: relative;
    transition: all 0.3s ease;
    text-decoration: none !important;
}

.bottom-nav .tab-btn i {
    font-size: 20px; /* Ukuran ikon sesuai permintaan */
}

.bottom-nav .tab-btn span {
    font-size: 0.82rem;
    line-height: 1.2;
}


/* PROFILE DROPDOWN */
#profile-dropdown {
    position: absolute;
    bottom: 90px;
    right: 10px;
    background: #ffffff;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
    display: none;
    min-width: 200px;
    overflow: hidden;
    z-index: 1000;
    animation: fadeIn 0.2s ease-in-out;
}
#profile-dropdown div {
    padding: 0.9rem 1.2rem;
    cursor: pointer;
    font-weight: 500;
    transition: all 0.2s ease;
}
#profile-dropdown div:hover { background: #f3f4f6; border-radius: 12px; }

/* Animasi Dropdown */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(5px); }
    to { opacity: 1; transform: translateY(0); }
}

/* NOTIF BUTTON */
#btnNotif {
    margin: 20px auto;
    display: block;
    padding: 0.7rem 1.2rem;
    border-radius: 8px;
    border: none;
    background: #3b82f6;
    color: #fff;
    font-weight: 600;
    cursor: pointer;
}
.welcome-icon::before {
    content: "\1F44B"; /* Unicode emoji melambai */
    display: inline-block;
}

</style>
</head>

<body>

<div class="container">

    <!-- WELCOME CARD -->
    <div class="welcome-box">
<div class="welcome-icon"></div>
        <div class="welcome-text">
            Halo, <strong>{{ $user->nama_lengkap ?? $user->name }}</strong>!<br>
            Selamat datang kembali
        </div>
    </div>

    <!-- MAIN CARDS -->
    <div class="row justify-content-center mt-4">
        <div class="col-11 col-md-4">
            <div class="info-card" onclick="window.location.href='/dashboard/customer/tagihan'">
                <i class="bi bi-card-list" style="color:#2563eb;"></i>
                <h5 class="mt-2 mb-1">Tagihan</h5>
                <p class="text-muted m-0">Cek semua tagihan terbaru Anda</p>
            </div>
        </div>

        <div class="col-11 col-md-4">
            <div class="info-card" onclick="window.location.href='/dashboard/customer/tagihan/selesai'">
                <i class="bi bi-file-earmark-text" style="color:#10b981;"></i>
                <h5 class="mt-2 mb-1">Kwitansi</h5>
                <p class="text-muted m-0">Download dan lihat kwitansi dengan mudah</p>
            </div>
        </div>
    </div>
</div>

 
<!-- Bottom Navigation -->
<div class="bottom-nav">
    <button class="tab-btn active" onclick="window.location.href='/dashboard/customer/tagihan/home'">
        <i class="bi bi-house-door"></i>
        <span>Home</span>
    </button>
<button class="tab-btn" onclick="window.location.href='https://direct.lc.chat/19389138'">
    <i class="bi bi-envelope"></i>
    <span>Chat</span>
</button>

    <button class="tab-btn" onclick="window.location.href='/dashboard/customer/tagihan'">
        <i class="bi bi-card-list"></i>
        <span>Tagihan</span>
    </button>

    <button class="tab-btn" onclick="window.location.href='/dashboard/customer/tagihan/selesai'">
        <i class="bi bi-file-earmark-text"></i>
        <span>Kwitansi</span>
    </button>

    <button id="btn-profile" class="tab-btn">
        <i class="bi bi-person-circle"></i>
        <span>Profile</span>
        <div id="profile-dropdown">
            <div id="profile-name">{{ $user->nama_lengkap ?? 'Nama Pelanggan' }}</div>
            <div id="btn-logout" class="logout-red">Logout</div>
        </div>
    </button>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- WebPushr SDK -->
<script>
(function(w,d,s,id){
    if(typeof w.webpushr!=='undefined') return;
    w.webpushr=w.webpushr||function(){(w.webpushr.q=w.webpushr.q||[]).push(arguments)};
    var js,fjs=d.getElementsByTagName(s)[0];
    js=d.createElement(s); js.id=id; js.async=1;
    js.src="https://cdn.webpushr.com/app.min.js";
    fjs.parentNode.insertBefore(js,fjs);
}(window,document,'script','webpushr-js'));

webpushr('setup',{
    'key':'BA6E203ONU9JRrWFSTUFepnOgRg7JZ0hZKGtfZ_nT_WWOzRCvjlF9BJT8hvmA_Rvbl_W4NbpYiy7SDwoQKK6g2M'
});

// Update SID
const nomerid = "{{ $user->nomer_id }}";
webpushr('fetch_id', function(sid){
    if(sid){
        $.post('/pelanggan/'+nomerid+'/update-sid',{
            sid:sid,_token:'{{ csrf_token() }}'
        });
    } else {
        console.log('Subscriber belum terdaftar atau user belum mengizinkan notifikasi.');
    }
});
</script>

<script>
// PROFILE DROPDOWN TOGGLE
const btnProfile = document.getElementById('btn-profile');
const dropdown = document.getElementById('profile-dropdown');

btnProfile.addEventListener('click', e=>{
    e.stopPropagation();
    dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
});

document.addEventListener('click', ()=> dropdown.style.display = 'none');

// LOGOUT
document.getElementById('btn-logout').addEventListener('click', ()=>{
    fetch('/customer/logout', {
        method:'POST',
        headers:{'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content}
    })
    .then(()=> window.location.href='/')
    .catch(()=> Swal.fire('Error','Gagal logout','error'));
});
</script>

</body>
</html>
