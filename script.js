document.getElementById('showRegister').addEventListener('click', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    // Ngăn chặn hành động mặc định và thêm hiệu ứng fade
    document.body.classList.remove('fade-in');
    document.body.classList.add('fade-out');

    // Chuyển form đăng nhập ra ngoài
    loginForm.classList.remove('active');

    // Chờ cho hiệu ứng fade-out kết thúc trước khi chuyển sang form đăng ký
    setTimeout(function() {
        // Hiện form đăng ký
        registerForm.classList.add('active');
        document.body.classList.remove('fade-out');
        document.body.classList.add('fade-in');
    }, 500); // Thời gian trễ để cho hiệu ứng hoàn tất
});

document.getElementById('showLogin').addEventListener('click', function() {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');

    // Ngăn chặn hành động mặc định và thêm hiệu ứng fade
    document.body.classList.remove('fade-in');
    document.body.classList.add('fade-out');

    // Chuyển form đăng ký ra ngoài
    registerForm.classList.remove('active');

    // Chờ cho hiệu ứng fade-out kết thúc trước khi chuyển sang form đăng nhập
    setTimeout(function() {
        // Hiện form đăng nhập
        loginForm.classList.add('active');
        document.body.classList.remove('fade-out');
        document.body.classList.add('fade-in');
    }, 500); // Thời gian trễ để cho hiệu ứng hoàn tất
});
