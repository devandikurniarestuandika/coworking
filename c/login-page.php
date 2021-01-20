<?php
if(!defined('S')) {
	header("Location: s.php?auth=masuk");
}
?>
<!-- Form content box start -->
                <div class="form-content-box">
                    <!-- logo -->
                    <a href="javascript:void(0)" class="clearfix alpha-logo">
                        <img src="../img/logos/white-logo.png" alt="white-logo">
                    </a>
                    <!-- details -->
                    <div class="details">
                        <h3>Selamat Datang</h3>
                        <!-- Form start -->
                        <form action="includes/login.php" method="POST">
                            <div class="form-group">
                                <input type="email" required="" name="email" class="input-text" placeholder="Nama Pengguna">
                            </div>
                            <div class="form-group">
                                <input type="password" required="" name="password" class="input-text" placeholder="Kata Sandi">
                            </div>
                            <div class="checkbox">
                                <a href="javascript:void(0)" class="link-not-important pull-right">Lupa kata sandi ?</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="mb-0">
                                <button type="submit" class="btn-md btn-theme btn-block" name="submit">masuk</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            Tidak memiliki akun ? <a href="s.php?auth=daftar">Daftar disini</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->