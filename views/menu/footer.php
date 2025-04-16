<style>
    footer {
        background: #222;
        color: white;
        text-align: center;
        padding: 20px 0;
        margin-top: 50px;
    }

    footer a {
        color: #ffcc00;
        text-decoration: none;
    }

    .social-icons {
        margin-top: 10px;
    }

    .social-icons a {
        margin: 0 10px;
        color: white;
        font-size: 18px;
    }

    /* Footer Section */
    .copyright_section {
        background: #2c3e50;
        color: #fff;
        padding: 20px 0;
        text-align: center;
    }

    .copyright_section .copyright_text {
        font-size: 14px;
        margin-bottom: 0;
    }

    .copyright_section .copyright_text a {
        color: #1abc9c;
        text-decoration: none;
        font-weight: bold;
    }

    .copyright_section .copyright_text a:hover {
        text-decoration: underline;
    }

    /* Footer */
    .footer {
        background: #2c3e50;
        color: white;
        padding: 50px 0;
        font-size: 14px;
    }

    .footer .container {
        max-width: 1100px;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .footer-content {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        width: 100%;
    }

    .footer-col {
        flex: 1;
        min-width: 200px;
        margin-bottom: 20px;
    }

    .footer-col h4 {
        font-size: 18px;
        margin-bottom: 15px;
        font-weight: bold;
        position: relative;
        padding-bottom: 5px;
    }

    .footer-col h4::after {
        content: '';
        width: 50px;
        height: 2px;
        background: #1abc9c;
        position: absolute;
        bottom: 0;
        left: 0;
    }

    .footer-col p {
        font-size: 14px;
        color: #ddd;
        line-height: 1.6;
    }

    .footer-col ul {
        list-style: none;
        padding: 0;
    }

    .footer-col ul li {
        margin-bottom: 10px;
    }

    .footer-col ul li a {
        color: #ddd;
        text-decoration: none;
        transition: all 0.3s;
    }

    .footer-col ul li a:hover {
        color: #1abc9c;
    }

    /* Newsletter Form */
    .newsletter-form {
        display: flex;
        background: white;
        border-radius: 5px;
        overflow: hidden;
        margin-top: 10px;
    }

    .newsletter-form input {
        flex: 1;
        padding: 10px;
        border: none;
        outline: none;
    }

    .newsletter-form button {
        background: #1abc9c;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }

    .newsletter-form button:hover {
        background: #16a085;
    }

    /* Mạng xã hội */
    .footer-social {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .footer-social a {
        color: white;
        font-size: 18px;
        background: #34495e;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        transition: background 0.3s;
        text-decoration: none;
    }

    .footer-social a:hover {
        background: #1abc9c;
    }

    /* Copyright */
    .copyright {
        text-align: center;
        background: #222;
        color: white;
        padding: 15px 0;
        margin-top: 30px;
        font-size: 13px;
    }

    .copyright a {
        color: #1abc9c;
        text-decoration: none;
        font-weight: bold;
    }

    .copyright a:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            text-align: center;
        }

        .footer-col {
            min-width: 100%;
        }

        .footer-social {
            justify-content: center;
        }
    }
</style>
<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <!-- Cột 1: Logo và giới thiệu -->
            <div class="footer-col">
                <h4>WeCLE</h4>
                <p>Nền tảng học từ vựng và dịch thuật thông minh, giúp bạn mở rộng vốn từ vựng một cách hiệu quả.</p>
                <p>Email: support@wecle.com</p>
                <p>Phone: +84 123 456 789</p>
            </div>

            <!-- Cột 2: Danh mục nhanh -->
            <div class="footer-col">
                <h4>Danh mục</h4>
                <ul>
                    <li><a href="index.html">Trang chủ</a></li>
                    <li><a href="translation.html">Dịch thuật</a></li>
                    <li><a href="about.html">Giới thiệu</a></li>
                    <li><a href="contact.html">Liên hệ</a></li>
                </ul>
            </div>

            <!-- Cột 3: Bản tin đăng ký -->
            <div class="footer-col">
                <h4>Đăng ký nhận tin</h4>
                <p>Nhận những bài học từ vựng và cập nhật mới nhất qua email.</p>
                <form action="#" class="newsletter-form">
                    <input type="email" placeholder="Nhập email của bạn" required>
                    <button type="submit"><i class="fa fa-paper-plane"></i></button>
                </form>
            </div>

            <!-- Cột 4: Mạng xã hội -->
            <div class="footer-col">
                <h4>Kết nối với chúng tôi</h4>
                <div class="footer-social">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>© 2025 WeCLE. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>